<?php

namespace App\Application\Controllers\Website;

use App\Application\Controllers\AbstractController;
use Alert;
use App\Application\Model\Businessgroups;
use App\Application\Model\Businessgroupsusers;
use App\Application\Model\BusinessInvitation;
use App\Application\Model\User;
use App\Application\Requests\Website\BusinessInvitation\AddRequestBusinessInvitation;
use App\Application\Requests\Website\BusinessInvitation\UpdateRequestBusinessInvitation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BusinessInvitationController extends AbstractController
{

     public function __construct(BusinessInvitation $model)
     {
        parent::__construct($model);
     }

     public function index(){
        $items = $this->model;

        if(request()->has('from') && request()->get('from') != ''){
            $items = $items->whereDate('created_at' , '>=' , request()->get('from'));
        }

        if(request()->has('to') && request()->get('to') != ''){
            $items = $items->whereDate('created_at' , '<=' , request()->get('to'));
        }

			if(request()->has("domainname") && request()->get("domainname") != ""){
				$items = $items->where("domainname","=", request()->get("domainname"));
			}

			if(request()->has("status") && request()->get("status") != ""){
				$items = $items->where("status","=", request()->get("status"));
			}



        $items = $items->paginate(env('PAGINATE'));
        return view('website.businessinvitations.index' , compact('items'));
     }

     public function show($id){

        $this->data['item'] = $invitation = BusinessInvitation::findOrFail($id);
        $this->data['Groups'] = Businessgroups::whereNull('parent_id')->where('businessdata_id', $invitation->businessdata_id)->get();

         
         return view('website.business.editInvitation' , $this->data);
     }

     public function store(AddRequestBusinessInvitation $request){
         $request->request->add(['token' => Str::random(12)]);
          $item =  $this->storeOrUpdate($request , null , true);
          alert()->success('Invitation Created');
          return back();
     }

     public function update($id , UpdateRequestBusinessInvitation $request){
          $item = $this->storeOrUpdate($request, $id, true);
          alert()->success('Invitation Updated');

return redirect()->back();

     }

     public function getById($id){
         $fields = $this->model->findOrFail($id);
         return $this->createOrEdit('website.businessinvitations.show' , $id , ['fields' =>  $fields]);
     }

     public function destroy($id){
        $fields = $this->model->findOrFail($id);
        

        // if($fields->businessdata->user->id != Auth::user()->id){
        //     abort('404');
        // }
        $this->deleteItem($id , 'businessinvitations')->with('sucess' , 'Done Delete businessinvitations From system');

         return redirect()->back(); 
     }

     public function invitation($token){

        $limitReached = false;
         if(Auth::check() && $token == Auth::user()->business_invitation){
            alert()->success('Invitation Already Accepted');
             return redirect('/');
         }

         if(Auth::check() && Auth::user()->businessdata_id && isValidBusiness(Auth::user()->businessdata_id)){
            alert()->error('You already have an active business subscription');
            return redirect('/');

         }

        $this->data['invitation'] = $invitation = BusinessInvitation::where('token', $token)->firstOrFail();

        if(Auth::check() && $this->data['invitation']->businessdata->user_id == Auth::user()->id){
             return redirect('/');
         }

         if($invitation->invitationslimit && BusinessInvitation::countInvitationUsers($token) >= $invitation->invitationslimit){
             $limitReached = true;
         }

         $this->data['limitReached'] = $limitReached;

        return view('website.businessinvitation', $this->data);
     }

     public function accept($token){
         $invitation = BusinessInvitation::where('token', $token)->firstOrFail();;

         $user = User::find(Auth::user()->id);
         $user->business_invitation = $invitation->token;
         $user->businessdata_id = $invitation->businessdata->id;
         $user->save();

         if($invitation->group_id){
             $businessGroupUser = new Businessgroupsusers();
             $businessGroupUser->user_id = $user->id;
             $businessGroupUser->businessgroups_id = $invitation->group_id;
             $businessGroupUser->save();
         }

         alert()->success('');

         return redirect('/');

     }
}
