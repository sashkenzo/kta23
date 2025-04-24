<?php

namespace App\DataTables;

use App\Models\Blog;
use App\Models\Navbar;
use App\Models\Product;
use App\Models\SubNavBar;
use App\Traits\datatablesTrait;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SubNavBarDataTable extends DataTable
{
    use datatablesTrait;
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<SubNavBar> $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function($query){
                return $this->datatableAction($query,'change.subnavs','id');
            })
            ->addColumn('parentCategory', function($query){
                return $parent= NavBar::where('id',$query->navbar_id)->get('name')->first()->name;
            })
            ->addColumn('status', function($query){
                return $this->datatableStatus($query,'change.subnavs','id');
            })
            ->addColumn('items', function($query){
                $subnavbar = SubNavBar::where('type',$query->type)->first()->type;
                if($subnavbar=='product'){
                    return $subnavproduct = Product::where('subcategory_id',$query->id)->count();
                }
                if($subnavbar=='product'){
                    return $subnavblog = Blog::where('subcategory_id',$query->id)->count();
                }
            })
            ->rawColumns(['action','status','items','parentCategory'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<SubNavBar>
     */
    public function query(SubNavBar $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('subnavbar-table')
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
            Column::make('id'),
            Column::make('name'),
            Column::make('parentCategory'),
            Column::make('items'),
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
        return 'SubNavBar_' . date('YmdHis');
    }
}
