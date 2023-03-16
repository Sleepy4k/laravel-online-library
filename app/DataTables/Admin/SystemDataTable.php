<?php

namespace App\DataTables\Admin;

use App\Traits\LogReader;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;

class SystemDataTable extends DataTable
{
    use LogReader;

    /**
     * Init log file.
     *
     * @return Collection
     */
    public function customData()
    {
        return collect(
            (object) $this->getFileList('daily')
        );
    }

    /**
     * Build DataTable class.
     *
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable()
    {
        return datatables()
            ->of($this->customData())
            ->addColumn('action', function ($query) {
                $name = explode('.', $query['name'])[0];

                return '<a href="' . route("admin.system.show", $name) . '" class="btn btn-success">View</a>';
            })
            ->setRowId('id');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->serverSide(false)
            ->setTableId('system-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(0, 'desc')
            ->lengthChange(true)
            ->lengthMenu()
            ->pageLength(10)
            ->responsive(true)
            ->autoWidth(true)
            ->buttons([
                Button::make('export'),
                Button::make('print'),
                Button::make('copy')
            ]);
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [
            Column::make('name')
                ->title('Name')
                ->addClass('text-center'),
            Column::make('size')
                ->title('Size')
                ->addClass('text-center'),
            Column::make('type')
                ->title('Type')
                ->addClass('text-center'),
            Column::make('content')
                ->title('Content')
                ->addClass('text-center'),
            Column::make('last_updated')
                ->title('Last Updated')
                ->addClass('text-center'),
            Column::computed('action')
                ->title('Action')
                ->exportable(false)
                ->printable(false)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'System_' . date('YmdHis');
    }
}
