<?php
namespace App\Application\Repository\Eloquent;

use App\Application\Model\Courseenrollment;
use App\Application\Model\Group;
use App\Application\Model\Log;
use App\Application\Model\Menu;
use App\Application\Model\Orders;
use App\Application\Model\Page;
use App\Application\Model\Payments;
use App\Application\Model\Permission;
use App\Application\Model\Role;
use App\Application\Model\Setting;
use App\Application\Model\User;
use App\Application\Model\UserInfo;
use App\Application\Repository\InterFaces\HomeInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;



class HomeEloquent extends AbstractEloquent implements HomeInterface{

    public function __construct(User $user )
    {
        $this->model = $user;
    }
    
    public function getData($days , $limit){
        $lastRegisterUser= $this->model->with('group')->limit(10)->orderBy('id' , 'desc')->get();
        $this->revenuePerMonth();
        return array(
            'userCount' => $this->model
                // ->whereYear('created_at', Carbon::now()->year)
                // ->whereMonth('created_at', Carbon::now()->month)
                ->count(),
            'instructors' => $this->model->where('group_id',3)
                // ->whereYear('created_at', Carbon::now()->year)
                // ->whereMonth('created_at', Carbon::now()->month)
                ->count(),
            'ordersCount' => Orders::where('status', Orders::STATUS_SUCCEEDED)
                // ->whereYear('created_at', Carbon::now()->year)
                // ->whereMonth('created_at', Carbon::now()->month)
                ->count(),
            'ordersAll' => Orders::where('id','>',0)
                ->where('status', '!=', Orders::STATUS_FAILED)
//                ->whereYear('created_at', Carbon::now()->year)
                // ->whereMonth('created_at', Carbon::now()->month)
                ->count(),
            'ordersCompleted' => Orders::where('status', Orders::STATUS_SUCCEEDED)
//                ->whereYear('created_at', Carbon::now()->year)
                // ->whereMonth('created_at', Carbon::now()->month)
                ->count(),
            'ordersPending' => Orders::where('status', '!=', Orders::STATUS_FAILED)
//                ->whereYear('created_at', Carbon::now()->year)
                ->where('status', '!=', Orders::STATUS_SUCCEEDED)
                // ->whereMonth('created_at', Carbon::now()->month)
                ->count(),
            'ordersCanceled' => Orders::where('status', Orders::STATUS_FAILED)
//                ->whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->count(),



            'revenue' => ceil(DB::table('orders')->join('payments', 'orders.payments_id', '=', 'payments.id')
                ->select('orders.id', 'orders.payments_id', 'payments.amount')
                ->where('orders.status', Orders::STATUS_SUCCEEDED)
                ->where('payments.status', Payments::STATUS_SUCCEEDED)
                ->groupBy('orders.id')
                // ->whereYear('orders.created_at', Carbon::now()->year)
                // ->whereMonth('orders.created_at', Carbon::now()->month)
                ->get()->sum('amount')),

            'revenuePerMonth' => $this->revenuePerMonth(),
                
            'freeOrdersCount' => Orders::where('status', Orders::STATUS_SUCCEEDED)->whereHas('payments', function($query){
                $query->where('amount', 0);
                })
                // ->whereYear('orders.created_at', Carbon::now()->year)
                // ->whereMonth('orders.created_at', Carbon::now()->month)
                ->count(),
            'groupCount' => Group::count(),
            'permissionsCount' => Permission::count(),
            'roleCount' => Role::count(),
            'lastRegisterUser' => $lastRegisterUser ,
            'pages' => Page::count() ,
            'menus' => Menu::count() ,
            'setting' => Setting::count(),
            'logs' => Log::count(),
            'log' => Log::with('user')->limit(10)->orderBy('id' , 'desc')->get(),
            'topEnrollments' => Courseenrollment::leftJoin('courses','courseenrollment.courses_id','=','courses.id')
//                ->whereYear('courseenrollment.created_at', Carbon::now()->year)
                ->whereMonth('courseenrollment.created_at', Carbon::now()->month)
                ->selectRaw('courseenrollment.*, count(courses.id) AS `count`')
                ->groupBy('courseenrollment.courses_id')
                ->orderBy('count','DESC')->limit(5)->get(),
            'lastOrders' => Orders::where('status',2)->with(array('user', 'payments', 'employee', 'ordersposition'))->orderBy('updated_at', 'DESC')->limit(5)->get(),
            'bestSelling' => Courseenrollment::leftJoin('courses','courseenrollment.courses_id','=','courses.id')
//                ->whereYear('courseenrollment.created_at', Carbon::now()->year)
                ->whereMonth('courseenrollment.created_at', Carbon::now()->month)
                ->selectRaw('courseenrollment.*, count(courses.id) AS `count`')
                ->groupBy('courseenrollment.courses_id')
                ->orderBy('count','DESC')->limit(4)->get(),
        );
    }

    public function revenuePerMonth(){

        $monthsArr = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11' ,'12'];
        $result = array();
  
        foreach($monthsArr as $month){
            $result[] = ceil(DB::table('orders')->join('payments', 'orders.payments_id', '=', 'payments.id')
                ->select('orders.id', 'orders.payments_id', 'payments.amount', 'payments.created_at')
                ->where('orders.status', Orders::STATUS_SUCCEEDED)
                ->where('payments.status', Payments::STATUS_SUCCEEDED)
                ->groupBy('orders.id')->whereMonth('payments.created_at', $month)->whereYear('payments.created_at', Carbon::now()->year)->get()->sum('amount'));
        }

        return $result;
    }


}