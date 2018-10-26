<?php

namespace App\DataTables;

use App\Models\Post;
use Yajra\DataTables\Services\DataTable;

class PostDatatable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
            ->addColumn('edit', 'admin.Post.btn.edit')
            ->addColumn('delete', 'admin.Post.btn.delete') 
            ->addColumn('thumbnail', 'admin.Post.btn.img')
            ->rawColumns([
                'edit',
                'delete', 
                'thumbnail',
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Post $model)
    {
         return $model->query()->with('category')->with('user');
    } 

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->minifiedAjax() 
                    ->parameters([
                        'dom'        => 'Blfrtip',
                        'lengthMenu' => [[10, 25, 50, 100, -1], [10, 25, 50, 'All Record']],
                        'buttons'    => [
                            [
                                'text'      => '<i class="fa fa-plus"></i> ' .'Create' ,
                                'className' => 'btn btn-info',
                                'action'    => 'function(){
                                    window.location.href =  "/dashboard/Post/create";
                                }',
                            ], 
                        ],
                    ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id',
            'title',  
            'content',  
            'publish_date',    
            [
                'name'       => 'category',
                'data'       => 'category.name',
                'title'      => 'category',
                'exportable' => false,
                'printable'  => false,
                'orderable'  => false,
                'searchable' => false,
            ],   
            [
                'name'       => 'Author',
                'data'       => 'user.name',
                'title'      => 'Author',
                'exportable' => false,
                'printable'  => false,
                'orderable'  => false,
                'searchable' => false,
            ], 
            [
                'name'       => 'Thumbnail',
                'data'       => 'thumbnail',
                'title'      => 'thumbnail',
                'exportable' => false,
                'printable'  => false,
                'orderable'  => false,
                'searchable' => false,
            ], 
            [
                'name'       => 'edit',
                'data'       => 'edit',
                'title'      => 'Edit',
                'exportable' => false,
                'printable'  => false,
                'orderable'  => false,
                'searchable' => false,
            ], 
            [
                'name'       => 'delete',
                'data'       => 'delete',
                'title'      => 'Delete',
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
    protected function filename()
    {
        return 'Post_' . date('YmdHis');
    }
}
