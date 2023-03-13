<?php

namespace App\DataTables\User;

use App\Models\Borrow;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class LoanDataTable extends DataTable
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
                return '<a href="' . route("books.show", $query->id) . '"><i class="fa-solid fa-eye"></i></a> | <form class="d-inline" action="' . route("loans.destroy", $query->id) . '" method="post">' . csrf_field() . method_field('delete') . '<a href="" class="confirm-delete"><i class="fa-solid fa-trash"></i></a></form>';
            })
            ->editColumn('user_id', function ($query) {
                return $query->user->name;
            })
            ->editColumn('book_id', function ($query) {
                return $query->book->title;
            })
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Borrow $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Borrow $model): QueryBuilder
    {
        return $model->where('status', 'borrowed')->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('loan-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('lfrtip')
            ->orderBy(0, 'asc')
            ->lengthChange(true)
            ->lengthMenu()
            ->pageLength(10)
            ->responsive(true)
            ->autoWidth(true)
            ->selectStyleSingle();
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
            Column::make('user_id')
                ->hidden(),
            Column::make('book_id')
                ->title('Book')
                ->addClass('text-center'),
            Column::make('status')
                ->title('Status')
                ->addClass('text-center'),
            Column::computed('action')
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
        return 'Loan_' . date('YmdHis');
    }
}
