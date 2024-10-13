@extends('layouts.admin')

{{-- Customize layout sections --}}

{{-- @section('subtitle', 'Welcome') --}}
@section('content_header_title', 'Products')
{{-- @section('content_header_subtitle', 'Welcome') --}}

{{-- Content body: main page content --}}

@section('content_body')
@php
$heads = [
    ['label' => 'ID',  'width' => 5],
    ['label' => 'Product Name',  'width' => 20],
    ['label' => 'Price',  'width' => 5],
    ['label' => 'Images'],
    ['label' => 'Actions', 'no-export' => true, 'width' => 5],
];


$product_data = $products->map(function ($product) {
        $btnEdit = '<a href="'. route('admin.products.edit', $product->id).'" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                <i class="fa fa-lg fa-fw fa-pen"></i>
            </a>';
$btnDelete = '<a href="'. route('admin.products.delete', $product->id).'" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                  <i class="fa fa-lg fa-fw fa-trash"></i>
              </a>';
$btnDetails = '<a href="#" class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                   <i class="fa fa-lg fa-fw fa-eye"></i>
               </a>';

        $product_img = $product->images->map(function ($image) use($product) {
            return '<img width="50" src="'.asset('uploads/'.$image->product_images).'" alt="'.$product->product_name.'" />';
        })->implode(' &nbsp;');
        
        return [
            $product->id, 
            $product->product_name,
            $product->product_price,
            $product_img, 
            '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'
    ];   
     });


$config = [
    'data' => $product_data,
    'order' => [[1, 'asc']],
    'columns' => [null, null, null, null, ['orderable' => false]],
];
$config['paging'] = true;
$config["lengthMenu"] = [ 10, 50, 100];
@endphp


<div class="float-right">
    <x-adminlte-button label="Add Product" theme="primary" icon="fas fa-plus" class="m-1" onclick="window.location='{{ route('admin.products.add') }}'" />
</div>

{{-- Compressed with style options / fill data using the plugin config --}}
<x-adminlte-datatable id="products_table" :heads="$heads" head-theme="dark" :config="$config"
    striped hoverable bordered compressed />
@stop

{{-- Push extra CSS --}}

@push('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@endpush

{{-- Push extra scripts --}}

@push('js')
    {{-- <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script> --}}
@endpush