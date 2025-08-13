<?php

namespace App\Application\DataTables;

use App\Application\Model\Futurex;
use Yajra\DataTables\Services\DataTable;

class FuturexsDataTable extends DataTable
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
              ->addColumn('id', 'admin.futurex.buttons.id')
             ->addColumn('edit', 'admin.futurex.buttons.edit')
             ->addColumn('delete', 'admin.futurex.buttons.delete')
             ->addColumn('view', 'admin.futurex.buttons.view')
             /*->addColumn('name', 'admin.futurex.buttons.langcol')*/
             ->make(true);
    }
    /**
     * Get the query object to be processed by dataTables.
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
     */
    public function query()
    {
        $query = Futurex::query();

        if(request()->has('from') && request()->get('from') != ''){
            $query = $query->whereDate('created_at' , '>=' , request()->get('from'));
        }

        if(request()->has('to') && request()->get('to') != ''){
            $query = $query->whereDate('created_at' , '<=' , request()->get('to'));
        }

		if(request()->has("uid") && request()->get("uid") != ""){
				$query = $query->where("uid","=", request()->get("uid"));
		}

		if(request()->has("cn") && request()->get("cn") != ""){
				$query = $query->where("cn","=", request()->get("cn"));
		}

		if(request()->has("displayName") && request()->get("displayName") != ""){
				$query = $query->where("displayName","=", request()->get("displayName"));
		}

		if(request()->has("givenName") && request()->get("givenName") != ""){
				$query = $query->where("givenName","=", request()->get("givenName"));
		}

		if(request()->has("sn") && request()->get("sn") != ""){
				$query = $query->where("sn","=", request()->get("sn"));
		}

		if(request()->has("mail") && request()->get("mail") != ""){
				$query = $query->where("mail","=", request()->get("mail"));
		}

		if(request()->has("Nationalid") && request()->get("Nationalid") != ""){
				$query = $query->where("Nationalid","=", request()->get("Nationalid"));
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
                'name' => 'uid',
                'data' => 'uid',
                'title' => "uid",
                
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
        return 'Futurexdatatables_' . time();
    }
}