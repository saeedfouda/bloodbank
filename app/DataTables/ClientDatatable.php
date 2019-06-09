<?php

namespace App\DataTables;

use App\Model\Client;
use Yajra\DataTables\Services\DataTable;

class ClientDatatable extends DataTable
{
   /**
	 * Build DataTable class.
	 *
	 * @param mixed $query Results from query() method.
	 * @return \Yajra\DataTables\DataTableAbstract
	 */
	public function dataTable($query) {
		return datatables($query)
			->addColumn('checkbox', 'clients.btn.checkbox')
			->addColumn('edit', 'clients.btn.edit')
            ->addColumn('delete', 'clients.btn.delete')

			->rawColumns([
				'edit',
				'delete',
				'checkbox',
			]);
	}
  /**
	 * Get query source of dataTable.
	 *
	 * @param \App\Client $model
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function query() {
		return Client::query();
	}




    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this
        ->builder()
        ->columns($this->getColumns())
        ->minifiedAjax()
      //  ->addAction(['width' => '80px'])
        // ->parameters($this->getBuilderParameters());
        ->parameters([
                        'dom'          => 'Blfrtip',
                        'lengthMenu'   => [[10, 25, 50, 100],[10,25,50, 'all_record']],
                        'buttons'      =>[
        ['extend' => 'print', 'className' => 'btn btn-primary', 'text' => '<i class="fa fa-print" aria-hidden="true"></i>' ],

        [
            'text' =>  '<i class="fa fa-plus"></i>' .'create_users',
            'className' => 'btn btn-info', "action"=>"function(){

                window.location.href = '".\URL::current()."/create';
            }"],


        ['extend' => 'excel', 'className' => 'btn btn-success','text' => '<i class="fa fa-file-excel-o" aria-hidden="true"></i>'.'excel_admin'],
        ['extend' => 'reload', 'className' => 'btn btn-info' , 'text' => '<i class="fa fa-refresh" aria-hidden="true"></i>'],
        [
            'text' =>  '<i class="fa fa-trash"></i>' .'delete_all',
            'className' => 'btn btn-danger dlBtn'
        ]
        ],

        'initComplete' => "function () {
            this.api().columns([2,3]).every(function () {
                var column = this;
                var input = document.createElement(\"input\");
                $(input).appendTo($(column.footer()).empty())
                .on('keyup', function () {
                    column.search($(this).val(), false, false, true).draw();
                });
            });
        }",


    ]);

    }

    /**
	 * Get columns.
	 *
	 * @return array
	 */
	protected function getColumns() {
		return [
			[
				'name'       => 'checkbox',
				'data'       => 'checkbox',
				'title'      => '<input type="checkbox" class="check_all" onclick="check_all()" />',
				'exportable' => false,
				'printable'  => false,
				'orderable'  => false,
				'searchable' => false,
			], [
				'name'  => 'id',
				'data'  => 'id',
				'title' => '#',
			], [
				'name'  => 'name ',
				'data'  => 'name ',
				'title' => 'name ',
			], [
				'name'  => 'created_at',
				'data'  => 'created_at',
				'title' => 'created_at',
			], [
				'name'  => 'updated_at',
				'data'  => 'updated_at',
				'title' => 'updated_at',
			],  [
				'name'       => 'edit',
				'data'       => 'edit',
				'title'      => 'edit',
				'exportable' => false,
				'printable'  => false,
				'orderable'  => false,
				'searchable' => false,
			], [
				'name'       => 'delete',
				'data'       => 'delete',
				'title'      => 'delete',
				'exportable' => false,
				'printable'  => false,
				'orderable'  => false,
				'searchable' => false,
			],
		];
	}
	/**
	 * Get filename for export.
	 *
	 * @return string
	 */
	protected function filename() {
		return 'clients_'.date('YmdHis');
	}
}
