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
// $btnDetails = '<a href="#" class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
//                    <i class="fa fa-lg fa-fw fa-eye"></i>
//                </a>';

        $product_img = $product->images->map(function ($image) use($product) {
            $mid = $product->id.'-'.$image->id;
            $makemain = !$image->is_main ? '<form action="'. route('admin.products.image.update', $image->id).'" method="POST">
                                    <input type="hidden" name="_token" value="'.csrf_token().'" />
                                        <input type="hidden" name="operation" value="cover">
                                        <button type="submit"class="btn btn-primary">make this product cover</button>    
                                    </form>' : '';
            $deletehtml = $product->images->count() > 1 ? '<form action="'. route('admin.products.image.update', $image->id).'" method="POST">
                                       <input type="hidden" name="_token" value="'.csrf_token().'" />
                                        <input type="hidden" name="operation" value="delete">
                                        <button type="submit"class="btn btn-danger">delete</button>
                                    </form>' : '';
            $html = '<div class="modal fade" id="'.$mid.'" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                            <div class="modal-header">
                                <button
                                type="button"
                                class="close"
                                data-dismiss="modal"
                                aria-label="Close"
                                >
                                <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="mt-3 text-center">
                                    
                                    
                                    '.$makemain.'
                                    '.$deletehtml.'
                                </div>
                            </div>

                                <img src="'.Storage::disk('s3')->url($image->product_images).'" />
                                
                                
                            <div class="modal-footer">
                                <button
                                type="button"
                                class="btn btn-default bg-secondary"
                                data-dismiss="modal"
                                >
                                Close
                                </button>
                            </div>
                            </div>
                        </div>
                        </div>';
                        $ismain = $image->is_main ? 'border: 2px solid red;' : '';
            return '<img style="'.$ismain.'" width="50" onclick="jQuery(\'#'.$mid.'\').modal(\'show\')" src="'.Storage::disk('s3')->url($image->product_images).'" alt="'.$product->product_name.'" />'.$html;
        })->implode(' &nbsp;');
        
        return [
            $product->id, 
            $product->product_name,
            $product->product_price,
            $product_img, 
            '<nobr>'.$btnEdit.$btnDelete.'</nobr>'
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