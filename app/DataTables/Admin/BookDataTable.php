<?php

namespace App\DataTables\Admin;

use App\Models\Book;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class BookDataTable extends DataTable
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
                return '<a href="' . route("admin.books.show", $query->id) . '"><i class="fa-solid fa-eye"></i></a> | <a href="' . route('admin.books.edit', $query->id) . '"><i class="fa-solid fa-pen-to-square"></i></a> | <form action="' . route("admin.books.destroy", $query->id) . '" method="post" style="display: inline-block">' . csrf_field() . method_field("DELETE") . '<a href="" class="confirm-delete"><i class="fa-solid fa-trash"></i></a></form>';
            })
            ->editColumn('image', function ($query) {
                return '<a href="' . $query->image . '" data-lightbox="example-1"><img id="zoom-img" class="img-fluid mb-3" src="' . $query->image . '" width="50"></a>';
            })
            ->editColumn('author_id', function ($query) {
                return $query->author->name;
            })
            ->editColumn('publisher_id', function ($query) {
                return $query->publisher->name;
            })
            ->editColumn('category_id', function ($query) {
                return $query->category->name;
            })
            ->rawColumns(['action', 'image'])
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Book $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Book $model): QueryBuilder
    {
        return $model->with(['author', 'publisher', 'category'])->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('book-table')
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
            Column::make('image')
                ->title('cover')
                ->addClass('text-center'),
            Column::make('title')
                ->title('title')
                ->addClass('text-center'),
            Column::make('description')
                ->hidden(),
            Column::make('year')
                ->title('year')
                ->addClass('text-center'),
            Column::make('author_id')
                ->title('author')
                ->addClass('text-center'),
            Column::make('publisher_id')
                ->title('publisher')
                ->addClass('text-center'),
            Column::make('category_id')
                ->title('category')
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
        return 'Book_' . date('YmdHis');
    }
}
