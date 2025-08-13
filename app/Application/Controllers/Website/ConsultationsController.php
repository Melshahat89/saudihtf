<?php

namespace App\Application\Controllers\Website;

use App\Application\Controllers\AbstractController;
use App\Application\Model\Consultations;
use App\Application\Model\Consultationsavailability;
use App\Application\Model\Homesettings;
use App\Application\Model\User;
use Carbon\Carbon;

class ConsultationsController extends AbstractController
{
    public function __construct(Consultations $model)
    {
        parent::__construct($model);
    }

    public function category($slug = null)
    {
        $this->data['category'] = null;
        $this->data['slug'] = null;
        $this->data['homesettings'] = Homesettings::find(1);

        return view('website.consultations.category', $this->data);
    }

    public function page($slug){

        $this->data['item'] = $consultant = $this->model->where('slug', $slug)->firstOrFail();
        $consultant->visits = $consultant->visits + 1;
        $consultant->save();
        $this->data['enrolled'] = Consultations::isEnrolled($consultant->id);

        return view('website.consultations.page', $this->data);

    }

    public function availability($id){

        $availability = Consultationsavailability::where('consultation_id', $id)->where('day', request()->get('day'))->first();
        $output = "";
        $now = Carbon::now();
        $today = strtolower($now->format('l'));
        
        // $today = Carbon::now()['day'];
        if($availability){
            $startDateIn24 = intval(date("G:i", strtotime($availability->start_date)));
            $endDateIn24 = intval(date("G:i", strtotime($availability->end_date)));

            for($i = $startDateIn24; $i <= $endDateIn24; $i++){
                $time = (string) $i . ":00";
                $now = Carbon::now()->format('G:i');
                if(request()->get('day') == $today){
                    if($now < $time){
                        $timeIn12 = date("g:i A", strtotime($time));
                        $fullDateTime = request()->get('date') . " " . $time;
                        $output .= '<div class="event-card col-3 card p-1 m-2" data-val="' . $fullDateTime . '"><div class="event-name">' . $timeIn12 . '</div></div>';
                    }
                }else{
                    $timeIn12 = date("g:i A", strtotime($time));
                    $fullDateTime = request()->get('date') . " " . $time;
                    $output .= '<div class="event-card col-3 card p-1 m-2" data-val="' . $fullDateTime . '"><div class="event-name">' . $timeIn12 . '</div></div>';
                }
                
            }
        }else{
            $output = trans('consultations.no bookings');
        }
        
        return response()->json(['success'=>true, 'response'=>$output], 200);
    }

    public function profile($slug)
    {
        $this->data['consultant'] = User::where('group_id', User::TYPE_CONSULTANT)->where('slug', $slug)->firstOrFail();
        $this->data['latestTenConsultations'] = $this->data['consultant']->ConsultantConsultations;
        // $this->data['latestTenTalks'] = Talks::where('instructor_id', $this->data['instructor']['id'])->get()->all();
        return view('website.consultant', $this->data);
    }

}
