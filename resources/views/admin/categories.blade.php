@extends('layouts.admin')

{{-- Customize layout sections --}}

{{-- @section('subtitle', 'Welcome') --}}
@section('content_header_title', 'Product Categories')
{{-- @section('content_header_subtitle', 'Welcome') --}}

{{-- Content body: main page content --}}

@section('content_body')
@php
$heads = [
    ['label' => 'ID',  'width' => 5],
    ['label' => 'Category Name',  'width' => 20],
    ['label' => 'Actions', 'no-export' => true, 'width' => 5],
];


$category_data = $categories->map(function ($category) {
        $btnEdit = '<a href="'. route('admin.categories.edit', $category->id).'" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                <i class="fa fa-lg fa-fw fa-pen"></i>
            </a>';
        $btnDelete = '<a href="'. route('admin.categories.delete', $category->id).'" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                        <i class="fa fa-lg fa-fw fa-trash"></i>
                    </a>';

        
        return [
            $category->id, 
            $category->category_name,
            '<nobr>'.$btnEdit.$btnDelete.'</nobr>'
    ];   
     });


$config = [
    'data' => $category_data,
    'order' => [[1, 'asc']],
    'columns' => [null, null, ['orderable' => false]],
];
$config['paging'] = true;
$config["lengthMenu"] = [ 10, 50, 100];
@endphp


<div class="float-right">
    <x-adminlte-button label="Add Category" theme="primary" icon="fas fa-plus" class="m-1" onclick="window.location='{{ route('admin.categories.add') }}'" />
</div>

{{-- Compressed with style options / fill data using the plugin config --}}
<x-adminlte-datatable id="categories_table" :heads="$heads" head-theme="dark" :config="$config"
    striped hoverable bordered compressed />
    @csrf
@stop

@push('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@endpush

{{-- Push extra scripts --}}

@push('js')
    {{-- <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script> --}}
@endpush