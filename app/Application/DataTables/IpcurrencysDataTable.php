<?php

namespace App\Application\DataTables;

use App\Application\Model\Ipcurrency;
use Yajra\DataTables\Services\DataTable;

class IpcurrencysDataTable extends DataTable
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
              ->addColumn('id', 'admin.ipcurrency.buttons.id')
             ->addColumn('edit', 'admin.ipcurrency.buttons.edit')
             ->addColumn('delete', 'admin.ipcurrency.buttons.delete')
             ->addColumn('view', 'admin.ipcurrency.buttons.view')
             ->addColumn('flag', 'admin.ipcurrency.buttons.flag')
             /*->addColumn('name', 'admin.ipcurrency.buttons.langcol')*/
             ->rawColumns(['id', 'edit', 'delete', 'view','flag'])
             ->make(true);
    }
    /**
     * Get the query object to be processed by dataTables.
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
     */
    public function query()
    {
        $query = Ipcurrency::query();

        if(request()->has('from') && request()->get('from') != ''){
            $query = $query->whereDate('created_at' , '>=' , request()->get('from'));
        }

        if(request()->has('to') && request()->get('to') != ''){
            $query = $query->whereDate('created_at' , '<=' , request()->get('to'));
        }

		if(request()->has("ip") && request()->get("ip") != ""){
				$query = $query->where("ip","=", request()->get("ip"));
		}

		if(request()->has("type") && request()->get("type") != ""){
				$query = $query->where("type","=", request()->get("type"));
		}

		if(request()->has("continent") && request()->get("continent") != ""){
				$query = $query->where("continent","=", request()->get("continent"));
		}

		if(request()->has("continent_code") && request()->get("continent_code") != ""){
				$query = $query->where("continent_code","=", request()->get("continent_code"));
		}

		if(request()->has("country") && request()->get("country") != ""){
				$query = $query->where("country","=", request()->get("country"));
		}

		if(request()->has("country_code") && request()->get("country_code") != ""){
				$query = $query->where("country_code","=", request()->get("country_code"));
		}

		if(request()->has("country_flag") && request()->get("country_flag") != ""){
				$query = $query->where("country_flag","=", request()->get("country_flag"));
		}

		if(request()->has("region") && request()->get("region") != ""){
				$query = $query->where("region","=", request()->get("region"));
		}

		if(request()->has("city") && request()->get("city") != ""){
				$query = $query->where("city","=", request()->get("city"));
		}

		if(request()->has("timezone") && request()->get("timezone") != ""){
				$query = $query->where("timezone","=", request()->get("timezone"));
		}

		if(request()->has("currency") && request()->get("currency") != ""){
				$query = $query->where("currency","=", request()->get("currency"));
		}

		if(request()->has("currency_code") && request()->get("currency_code") != ""){
				$query = $query->where("currency_code","=", request()->get("currency_code"));
		}

		if(request()->has("currency_rates") && request()->get("currency_rates") != ""){
				$query = $query->where("currency_rates","=", request()->get("currency_rates"));
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
                'name' => 'ip',
                'data' => 'ip',
                'title' => "ip",
                
                ],
			[
                'name' => 'type',
                'data' => 'type',
                'title' => "type",

                ],
			[
                'name' => 'country',
                'data' => 'country',
                'title' => "country",

                ],
			[
                'name' => 'flag',
                'data' => 'flag',
                'title' => "flag",

                ],
			[
                'name' => 'country_code',
                'data' => 'country_code',
                'title' => "country_code",

                ],
			[
                'name' => 'city',
                'data' => 'city',
                'title' => "city",

                ],
			[
                'name' => 'region',
                'data' => 'region',
                'title' => "region",

                ],
			[
                'name' => 'currency_code',
                'data' => 'currency_code',
                'title' => "currency_code",

                ],
			[
                'name' => 'currency_rates',
                'data' => 'currency_rates',
                'title' => "currency_rates",

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
        return 'Ipcurrencydatatables_' . time();
    }
}