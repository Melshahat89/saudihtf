<?php

namespace App\Application\DataTables;

use App\Application\Model\Courseenrollment;
use Yajra\DataTables\Services\DataTable;

class CourseenrollmentsDataTable extends DataTable
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
              ->addColumn('id', 'admin.courseenrollment.buttons.id')
              ->addColumn('courses', 'admin.courseenrollment.buttons.course')
              ->addColumn('user', 'admin.courseenrollment.buttons.user')
             ->addColumn('edit', 'admin.courseenrollment.buttons.edit')
             ->addColumn('delete', 'admin.courseenrollment.buttons.delete')
             ->addColumn('view', 'admin.courseenrollment.buttons.view')
             ->rawColumns(['id', 'edit', 'delete', 'view'])
             /*->addColumn('name', 'admin.courseenrollment.buttons.langcol')*/
             ->make(true);
    }
    /**
     * Get the query object to be processed by dataTables.
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
     */
    public function query()
    {
        $query = Courseenrollment::query()->with(['user' => function($query){
            $query->select('id', 'email');
        }, 'courses' => function($query){
            $query->select('id', 'title');
        }]);

        if(request()->has('from') && request()->get('from') != ''){
            $query = $query->whereDate('created_at' , '>=' , request()->get('from'));
        }

        if(request()->has('to') && request()->get('to') != ''){
            $query = $query->whereDate('created_at' , '<=' , request()->get('to'));
        }

		if(request()->has("start_time") && request()->get("start_time") != ""){
            $query = $query->where("start_time","=", request()->get("start_time"));
		}

		if(request()->has("end_time") && request()->get("end_time") != ""){
            $query = $query->where("end_time","=", request()->get("end_time"));
		}

		if(request()->has("status") && request()->get("status") != ""){
            $query = $query->where("status","=", request()->get("status"));
		}

		if(request()->has("course") && request()->get("course") != ""){
            $query = $query->where("courses_id","=", request()->get("course"));
        }

        if (request()->has("email") && request()->get("email") != "") {
            $query = $query->whereHas('user', function($q){
                $q->where('email', 'LIKE', '%' . request()->get("email") . '%' );
            });
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

             [
                'name' => 'title',
                'data' => 'courses',
                'title' => "Course",
                
            ],
            [
                'name' => 'email',
                'data' => 'user',
                'title' => "User Email",
                
            ],

             
			// [
            //     'name' => 'start_time',
            //     'data' => 'start_time',
            //     'title' => "start_time",
                
            //     ],

            // [
            //     'name' => 'end_time',
            //     'data' => 'end_time',
            //     'title' => "end_time",
                
            //     ],

            // [
            //     'name' => 'courses_id',
            //     'data' => 'courses_id',
            //     'title' => "Course",
                
            //     ],
             [
                  'name' => 'view',
                  'data' => 'view',
                  'title' => trans('curd.view'),
                  'exportable' => false,
                  'printable' => false,
                  'searchable' => false,
                  'orderable' => false,
             ],
             [
                  'name' => 'edit',
                  'data' => 'edit',
                  'title' =>  trans('curd.edit'),
                  'exportable' => false,
                  'printable' => false,
                  'searchable' => false,
                  'orderable' => false,
             ],
             [
                   'name' => 'delete',
                   'data' => 'delete',
                   'title' => trans('curd.delete'),
                   'exportable' => false,
                   'printable' => false,
                   'searchable' => false,
                   'orderable' => false,
             ],

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Courseenrollmentdatatables_' . time();
    }
}