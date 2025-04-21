<?php

namespace App\DataTables;

use App\Models\Blog;
use App\Traits\datatablesTrait;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Http\Request;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BlogDataTable extends DataTable
{
    use datatablesTrait;
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<Blog> $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query,): EloquentDataTable
    {
        return (new EloquentDataTable($query,))
            ->setRowId('id')
            ->addColumn('action', function($query){
                return $this->datatableAction($query,
                    'blog','id');})
            ->addColumn('status', function($query){

            return $this->datatableStatus($query,'blog','id');
            })
            ->rawColumns(['image','action','status']);
    }
    /**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<Blog>
     */
    public function query(Blog $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('blog-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('name'),
            Column::make('status'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Blog_' . date('YmdHis');
    }
}
