<?php

namespace App\DataTables;

use App\Models\Banner2Carousel;
use App\Traits\datatablesTrait;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;


class Banner2CarouselDataTable extends DataTable
{
    use datatablesTrait;
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<Banner2Carousel> $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function($query){
                return $this->datatableAction($query,'bannercarousel');})
            ->addColumn('image', function($query){
                return $this->datatableImage($query);
            })
            ->addColumn('status', function($query){
                return $this->datatableStatus($query,'bannercarousel');
            })
            ->rawColumns(['image','action','status'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<Banner2Carousel>
     */
    public function query(Banner2Carousel $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('banner2carousel-table')
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

            Column::make('id')->width(20),
            Column::make('image'),
            Column::make('name'),
            Column::make('status'),
            Column::make('serial'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(150)
                ->addClass('text-center')
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Banner2Carousel_' . date('YmdHis');
    }
}
