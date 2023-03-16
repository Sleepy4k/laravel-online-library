<?php

namespace App\DataTables\Admin;

use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class UserDataTable extends DataTable
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
            ->addColumn('action', function ($query) {
                return '<a href="' . route("admin.users.show", $query->id) . '"><i class="fa-solid fa-eye"></i></a> | <a href="' . route('admin.users.edit', $query->id) . '"><i class="fa-solid fa-pen-to-square"></i></a> | <form action="' . route("admin.users.destroy", $query->id) . '" method="post" style="display: inline-block">' . csrf_field() . method_field("DELETE") . '<a href="" class="confirm-delete"><i class="fa-solid fa-trash"></i></a></form>';
            })
            ->editColumn('role', function ($query) {
                return ucfirst($query->getRoleNames()[0]);
            })
            ->editColumn('grade_id', function ($query) {
                return $query->grade->name();
            })
            ->editColumn('gender', function ($query) {
                return ucfirst($query->gender);
            })
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('user-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(0, 'asc')
            ->lengthChange(true)
            ->lengthMenu()
            ->pageLength(10)
            ->responsive(true)
            ->autoWidth(true)
            ->selectStyleSingle()
            ->buttons([
                Button::make('create'),
                Button::make('export'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
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
            Column::make('name')
                ->title('Name')
                ->addClass('text-center'),
            Column::make('address')
                ->hidden(),
            Column::make('email')
                ->title('Email')
                ->addClass('text-center'),
            Column::make('age')
                ->title('Age')
                ->addClass('text-center'),
            Column::make('phone')
                ->title('Phone')
                ->addClass('text-center'),
            Column::make('gender')
                ->title('Gender')
                ->addClass('text-center'),
            Column::make('grade_id')
                ->title('Grade')
                ->addClass('text-center'),
            Column::make('role')
                ->title('Role')
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
        return 'User_' . date('YmdHis');
    }
}
