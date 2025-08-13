<?php

namespace App\Application\DataTables;

use App\Application\Model\Sectionquizstudentstatus;
use Yajra\DataTables\Services\DataTable;

class SectionquizstudentstatussDataTable extends DataTable
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
              ->addColumn('id', 'admin.sectionquizstudentstatus.buttons.id')
             ->addColumn('edit', 'admin.sectionquizstudentstatus.buttons.edit')
             ->addColumn('delete', 'admin.sectionquizstudentstatus.buttons.delete')
             ->addColumn('view', 'admin.sectionquizstudentstatus.buttons.view')
             /*->addColumn('name', 'admin.sectionquizstudentstatus.buttons.langcol')*/
             ->rawColumns(['id', 'edit', 'delete', 'view'])
            ->make(true);
    }
    /**
     * Get the query object to be processed by dataTables.
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
     */
    public function query()
    {
        $query = Sectionquizstudentstatus::query();

        if(request()->has('from') && request()->get('from') != ''){
            $query = $query->whereDate('created_at' , '>=' , request()->get('from'));
        }

        if(request()->has('to') && request()->get('to') != ''){
            $query = $query->whereDate('created_at' , '<=' , request()->get('to'));
        }

		if(request()->has("passed") && request()->get("passed") != ""){
				$query = $query->where("passed","=", request()->get("passed"));
		}

		if(request()->has("status") && request()->get("status") != ""){
				$query = $query->where("status","=", request()->get("status"));
		}

		if(request()->has("start_time") && request()->get("start_time") != ""){
				$query = $query->where("start_time","=", request()->get("start_time"));
		}

		if(request()->has("end_time") && request()->get("end_time") != ""){
				$query = $query->where("end_time","=", request()->get("end_time"));
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
                'name' => 'passed',
                'data' => 'passed',
                'title' => "passed",
                
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
        return 'Sectionquizstudentstatusdatatables_' . time();
    }
}