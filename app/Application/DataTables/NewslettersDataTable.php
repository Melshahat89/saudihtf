<?php

namespace App\Application\DataTables;

use App\Application\Model\Newsletter;
use Yajra\DataTables\Services\DataTable;

class NewslettersDataTable extends DataTable
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
              ->addColumn('id', 'admin.newsletter.buttons.id')
             ->addColumn('edit', 'admin.newsletter.buttons.edit')
             ->addColumn('delete', 'admin.newsletter.buttons.delete')
             ->addColumn('view', 'admin.newsletter.buttons.view')
             /*->addColumn('name', 'admin.newsletter.buttons.langcol')*/
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
        $query = Newsletter::query();

        if(request()->has('from') && request()->get('from') != ''){
            $query = $query->whereDate('created_at' , '>=' , request()->get('from'));
        }

        if(request()->has('to') && request()->get('to') != ''){
            $query = $query->whereDate('created_at' , '<=' , request()->get('to'));
        }

		if(request()->has("email") && request()->get("email") != ""){
				$query = $query->where("email","=", request()->get("email"));
		}

		if(request()->has("active") && request()->get("active") != ""){
				$query = $query->where("active","=", request()->get("active"));
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
                'name' => 'email',
                'data' => 'email',
                'title' => "email",
                
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
        return 'Newsletterdatatables_' . time();
    }
}