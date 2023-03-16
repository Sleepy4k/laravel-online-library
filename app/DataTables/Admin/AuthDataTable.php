<?php

namespace App\DataTables\Admin;

use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Spatie\Activitylog\Models\Activity;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class AuthDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('subject', function ($query) {
                $data = null;
                if (empty($query->subject_id)) {
                    $data = '-';
                } else {
                    $data = $query->subject_id;
                }
                if (empty($query->subject_type)) {
                    $data .= ' | -';
                } else {
                    $data .= ' | ' . $query->subject_type;
                }

                return $data;
            })
            ->editColumn('causer', function ($query) {
                $data = null;
                if (empty($query->causer_id)) {
                    $data = '-';
                } else {
                    $data = $query->causer_id;
                }
                if (empty($query->causer_type)) {
                    $data .= ' | -';
                } else {
                    $data .= ' | ' . $query->causer_type;
                }

                return $data;
            })
            ->editColumn('properties', function ($query) {
                return json_encode($query->properties);
            })
            ->editColumn('event', function ($query) {
                if (empty($query->event)) {
                    return '-';
                } else {
                    return $query->event;
                }
            })
            ->editColumn('created_at', function ($query) {
                return dateYmdToDmy($query->created_at);
            })
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \Spatie\Activitylog\Models\Activity $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Activity $model): QueryBuilder
    {
        return $model->where('log_name', 'auth');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('auth-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(0, 'desc')
            ->lengthChange(true)
            ->lengthMenu()
            ->pageLength(10)
            ->responsive(true)
            ->autoWidth(true)
            ->searching(false)
            ->buttons([
                Button::make('export'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload'),
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
            Column::make('id'),
            Column::make('log_name')
                ->hidden(),
            Column::make('description')
                ->title('Description')
                ->addClass('text-center'),
            Column::make('event')
                ->title('Event')
                ->searchable(false)
                ->addClass('text-center'),
            Column::computed('subject')
                ->title('Subject')
                ->searchable(false)
                ->addClass('text-center'),
            Column::computed('causer')
                ->title('Causer')
                ->searchable(false)
                ->addClass('text-center'),
            Column::make('properties')
                ->title('Properties')
                ->searchable(false)
                ->addClass('text-center'),
            Column::computed('created_at')
                ->title('Created At')
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
        return 'Auth_' . date('YmdHis');
    }
}
