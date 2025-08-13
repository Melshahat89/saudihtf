<?php

namespace App\Application\DataTables;

use App\Application\Model\Currencies;
use Yajra\DataTables\Services\DataTable;

class CurrenciessDataTable extends DataTable
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
              ->addColumn('id', 'admin.currencies.buttons.id')
             ->addColumn('edit', 'admin.currencies.buttons.edit')
             ->addColumn('delete', 'admin.currencies.buttons.delete')
             ->addColumn('view', 'admin.currencies.buttons.view')
             /*->addColumn('name', 'admin.currencies.buttons.langcol')*/
             ->make(true);
    }
    /**
     * Get the query object to be processed by dataTables.
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
     */
    public function query()
    {
        $query = Currencies::query();

        if(request()->has('from') && request()->get('from') != ''){
            $query = $query->whereDate('created_at' , '>=' , request()->get('from'));
        }

        if(request()->has('to') && request()->get('to') != ''){
            $query = $query->whereDate('created_at' , '<=' , request()->get('to'));
        }

		if(request()->has("currency_code") && request()->get("currency_code") != ""){
				$query = $query->where("currency_code","=", request()->get("currency_code"));
		}

		if(request()->has("country_id") && request()->get("country_id") != ""){
				$query = $query->where("country_id","=", request()->get("country_id"));
		}

		if(request()->has("discount_perc") && request()->get("discount_perc") != ""){
				$query = $query->where("discount_perc","=", request()->get("discount_perc"));
		}

		if(request()->has("exchangeratetoegp") && request()->get("exchangeratetoegp") != ""){
				$query = $query->where("exchangeratetoegp","=", request()->get("exchangeratetoegp"));
		}

		if(request()->has("exchangeratetousd") && request()->get("exchangeratetousd") != ""){
				$query = $query->where("exchangeratetousd","=", request()->get("exchangeratetousd"));
		}

		if(request()->has("b2c_monthly_discount_perc") && request()->get("b2c_monthly_discount_perc") != ""){
				$query = $query->where("b2c_monthly_discount_perc","=", request()->get("b2c_monthly_discount_perc"));
		}

		if(request()->has("b2c_yearly_discount_perc") && request()->get("b2c_yearly_discount_perc") != ""){
				$query = $query->where("b2c_yearly_discount_perc","=", request()->get("b2c_yearly_discount_perc"));
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
                'name' => 'currency_code',
                'data' => 'currency_code',
                'title' => "currency_code",
                
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
        return 'Currenciesdatatables_' . time();
    }
}