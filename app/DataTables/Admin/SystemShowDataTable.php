<?php

namespace App\DataTables\Admin;

use App\Traits\LogReader;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;

class SystemShowDataTable extends DataTable
{
    use LogReader;

    /**
     * Init log file.
     *
     * @return Collection
     */
    public function customData()
    {
        $name = basename(request()->path());

        return collect(
            (object) $this->getFileContent($name)
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
            ->setTableId('system-show-table')
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
            Column::make('env')
                ->title('Env')
                ->addClass('text-center'),
            Column::make('type')
                ->title('Type')
                ->addClass('text-center'),
            Column::make('timestamp')
                ->title('Timestamp')
                ->addClass('text-center'),
            Column::make('message')
                ->title('Message')
                ->addClass('text-center')
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'System_show_' . date('YmdHis');
    }
}
