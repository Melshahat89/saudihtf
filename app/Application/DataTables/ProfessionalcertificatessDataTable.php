<?php

namespace App\Application\DataTables;

use App\Application\Model\Professionalcertificates;
use Yajra\DataTables\Services\DataTable;

class ProfessionalcertificatessDataTable extends DataTable
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
              ->addColumn('id', 'admin.professionalcertificates.buttons.id')
             ->addColumn('edit', 'admin.professionalcertificates.buttons.edit')
             ->addColumn('delete', 'admin.professionalcertificates.buttons.delete')
             ->addColumn('view', 'admin.professionalcertificates.buttons.view')
             ->addColumn('course', 'admin.professionalcertificates.buttons.course')
             /*->addColumn('name', 'admin.professionalcertificates.buttons.langcol')*/
             ->rawColumns(['id', 'edit', 'delete', 'view','course'])

            ->make(true);
    }
    /**
     * Get the query object to be processed by dataTables.
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
     */
    public function query()
    {
        $query = Professionalcertificates::query();

        if(request()->has('from') && request()->get('from') != ''){
            $query = $query->whereDate('created_at' , '>=' , request()->get('from'));
        }

        if(request()->has('to') && request()->get('to') != ''){
            $query = $query->whereDate('created_at' , '<=' , request()->get('to'));
        }

		if(request()->has("startdate") && request()->get("startdate") != ""){
				$query = $query->where("startdate","=", request()->get("startdate"));
		}

		if(request()->has("appointment") && request()->get("appointment") != ""){
				$query = $query->where("appointment","=", request()->get("appointment"));
		}

		if(request()->has("days") && request()->get("days") != ""){
				$query = $query->where("days","=", request()->get("days"));
		}

		if(request()->has("hours") && request()->get("hours") != ""){
				$query = $query->where("hours","=", request()->get("hours"));
		}

		if(request()->has("seats") && request()->get("seats") != ""){
				$query = $query->where("seats","=", request()->get("seats"));
		}

		if(request()->has("registrationdeadline") && request()->get("registrationdeadline") != ""){
				$query = $query->where("registrationdeadline","=", request()->get("registrationdeadline"));
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
                'name' => 'course',
                'data' => 'course',
                'title' => "course",
                
                ],
			[
                'name' => 'startdate',
                'data' => 'startdate',
                'title' => "startdate",

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
        return 'Professionalcertificatesdatatables_' . time();
    }
}