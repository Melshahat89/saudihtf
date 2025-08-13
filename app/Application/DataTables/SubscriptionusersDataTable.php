<?php

namespace App\Application\DataTables;

use App\Application\Model\Subscriptionuser;
use Yajra\DataTables\Services\DataTable;

class SubscriptionusersDataTable extends DataTable
{
    /**
     * Display ajax response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return datatables()
             ->eloquent($this->query())
              ->addColumn('id', 'admin.subscriptionuser.buttons.id')
             ->addColumn('edit', 'admin.subscriptionuser.buttons.edit')
             ->addColumn('delete', 'admin.subscriptionuser.buttons.delete')
             ->addColumn('view', 'admin.subscriptionuser.buttons.view')
             ->addColumn('user', 'admin.subscriptionuser.buttons.user')
             ->addColumn('mobile', 'admin.subscriptionuser.buttons.mobile')
             ->addColumn('type', 'admin.subscriptionuser.buttons.type')
             ->addColumn('active', 'admin.subscriptionuser.buttons.active')
            ->rawColumns(['id', 'edit', 'delete', 'view','type','active'])
             /*->addColumn('name', 'admin.subscriptionuser.buttons.langcol')*/
             ->make(true);
    }
    /**
     * Get the query object to be processed by dataTables.
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
     */
    public function query()
    {
        $query = Subscriptionuser::query()
            ->with(['user' => function ($query) {
            $query->select('id', 'email','mobile');
        }])->orderBy('updated_at', 'DESC');

        if(request()->has('from') && request()->get('from') != ''){
            $query = $query->whereDate('created_at' , '>=' , request()->get('from'));
        }

        if(request()->has('to') && request()->get('to') != ''){
            $query = $query->whereDate('created_at' , '<=' , request()->get('to'));
        }

        if (request()->has("email") && request()->get("email") != "") {
            $query = $query->whereHas('user', function($q){
                $q->where('email', 'LIKE', '%' . request()->get("email") . '%' );
            });
        }


        if(request()->has("subscription_id") && request()->get("subscription_id") != ""){
				$query = $query->where("subscription_id","=", request()->get("subscription_id"));
		}

		if(request()->has("start_date") && request()->get("start_date") != ""){
				$query = $query->where("start_date","=", request()->get("start_date"));
		}

		if(request()->has("end_date") && request()->get("end_date") != ""){
				$query = $query->where("end_date","=", request()->get("end_date"));
		}

		if(request()->has("amount") && request()->get("amount") != ""){
				$query = $query->where("amount","=", request()->get("amount"));
		}

		if(request()->has("b_type") && request()->get("b_type") != ""){
				$query = $query->where("b_type","=", request()->get("b_type"));
		}

		if(request()->has("is_active") && request()->get("is_active") != ""){
				$query = $query->where("is_active","=", request()->get("is_active"));
		}

		if(request()->has("is_collected") && request()->get("is_collected") != ""){
				$query = $query->where("is_collected","=", request()->get("is_collected"));
		}



        return $this->applyScopes($query);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->parameters(dataTableConfig());
    }
    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
              [
                  'name' => "id",
                  'data' => 'id',
                  'title' => trans('curd.id'),
             ],
//			[
//                'name' => 'subscription_id',
//                'data' => 'subscription_id',
//                'title' => "subscription_id",
//
//                ],
			[
                'name' => 'user',
                'data' => 'user',
                'title' => "البريد الالكتروني",

                ],
//			[
//                'name' => 'mobile',
//                'data' => 'mobile',
//                'title' => "mobile",
//
//                ],
			[
                'name' => 'type',
                'data' => 'type',
                'title' => "نوع الاشتراك",

                ],
			[
                'name' => 'start_date',
                'data' => 'start_date',
                'title' => "تاريخ بداية الاشتراك",

                ],
			[
                'name' => 'end_date',
                'data' => 'end_date',
                'title' => "تاريخ نهاية الاشتراك",

                ],
//			[
//                'name' => 'orders_id',
//                'data' => 'orders_id',
//                'title' => "orders_id",
//
//                ],

            [
                'name' => 'active',
                'data' => 'active',
                'title' => "حالة الاشتراك",

            ],
			[
                'name' => 'amount',
                'data' => 'amount',
                'title' => "قيمة الاشتراك",

                ],
             [
                  'name' => 'view',
                  'data' => 'view',
                  'title' => trans('curd.view'),
                  'exportable' => false,
                  'printable' => false,
                  'searchable' => false,
                  'orderable' => false,
             ],
//             [
//                  'name' => 'edit',
//                  'data' => 'edit',
//                  'title' =>  trans('curd.edit'),
//                  'exportable' => false,
//                  'printable' => false,
//                  'searchable' => false,
//                  'orderable' => false,
//             ],
//             [
//                   'name' => 'delete',
//                   'data' => 'delete',
//                   'title' => trans('curd.delete'),
//                   'exportable' => false,
//                   'printable' => false,
//                   'searchable' => false,
//                   'orderable' => false,
//             ],

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Subscriptionuserdatatables_' . time();
    }
}