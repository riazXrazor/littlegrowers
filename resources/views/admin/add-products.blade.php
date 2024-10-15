@extends('layouts.admin')

{{-- Customize layout sections --}}

{{-- @section('subtitle', 'Welcome') --}}
@section('content_header_title', 'Add Products')
{{-- @section('content_header_subtitle', 'Welcome') --}}

{{-- Content body: main page content --}}

@section('content_body')

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form action="{{ route('admin.products.add.post') }}" method="POST" enctype="multipart/form-data">
        @csrf <!-- {{ csrf_field() }} -->
        <div class="row">
            <div class="col-md-12">
                <x-adminlte-input name="product_name" label="Product Name" placeholder="Product Name" fgroup-class="col-md-12"
                    value="{{ old('product_name') }}" />
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <x-adminlte-input name="product_price" type="number" label="Product Price" placeholder="Product Price"
                    fgroup-class="col-md-12" value="{{ old('product_price') }}" />
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <x-adminlte-textarea name="product_description" type="number" label="Product Description"
                    placeholder="Product Description" fgroup-class="col-md-12" >{{ old('product_description') }}</x-adminlte-textarea>
            </div>
        </div>

        @php
        $categories = [
            'All' ,
            'Grow Bags' ,
            'Organic Bio Fertilizer & Manures' ,
            'Seeds' ,
            'Garden Accessories' ,
            'Plastic Pots' ,
    ];
    @endphp
        <div class="row">
            <div class="col-md-12">
                <x-adminlte-select2 name="product_category" label="Product Category" 
                data-placeholder="Select Product Category...">
                <x-slot name="prependSlot">
                    <div class="input-group-text">
                        <i class="fas fa-leaf"></i>
                    </div>
                </x-slot>
                @foreach ($categories as $category)
                <option value="{{ $category }}" 
                @if (old('product_category') == $category)
                selected    
                @endif
                
                >{{ $category }}</option>
            @endforeach
            </x-adminlte-select2>
            </div>
            </div>

        <div class="row">
            <div class="col-md-12">
                {{-- With multiple slots, and plugin config parameters --}}
                @php
                    $config = [
                        'placeholder' => 'Select Product Tags...',
                        'allowClear' => true,
                    ];

                    $tags = [
                        'Pots',
                        'Bags',
                        'Plants',
                        'Seeds',
                        'Cactus',
                        'Flower',
                        'Aquatic',
                        'Garden',
                        'Organic',
                        'Accessories',
                    ];

                    $selected_tags = old('product_tags');
                @endphp
                <x-adminlte-select2 id="product_tags" name="product_tags[]" label="Product Tags" :config="$config" multiple>
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-tag"></i>
                        </div>
                    </x-slot>
                    <x-slot name="appendSlot">
                        <x-adminlte-button theme="outline-dark" label="Clear" icon="fas fa-lg fa-ban" />
                    </x-slot>
                    @foreach ($tags as $tag)
                    <option value="{{ $tag }}" 
                        @if ($selected_tags && in_array($tag, $selected_tags)) selected @endif
                    >{{ $tag }}</option>
                @endforeach
                </x-adminlte-select2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                {{-- <x-adminlte-input-file id="product_images" name="product_images[]" label="Product Images"
                    placeholder="Choose multiple images..." igroup-size="lg" legend="Choose" multiple>

                    <x-slot name="prependSlot">
                        <div class="input-group-text text-primary">
                            <i class="fas fa-file-upload"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input-file> --}}

                @php
$config = [
    'allowedFileTypes' => ['image'],
    'browseOnZoneClick' => true,
    'theme' => 'explorer-fa5',
    'showUpload' => false,
    'initialPreviewShowDelete' => true,
    'maxFileSize'=> 5000,
    'maxFileCount'=> 8,
    'allowedFileExtensions' => ['jpeg','jpg','png','bmp','webp']
];
@endphp
<x-adminlte-input-file-krajee id="product_images" name="product_images[]" label="Product Images"
    data-msg-placeholder="Choose a image file..."
     :config="$config" multiple/>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <x-adminlte-button label="Submit" type="submit" theme="primary" />
                <x-adminlte-button label="Cancel" type="reset" theme="primary" />
            </div>
        </div>
    </form>
    @section('plugins.KrajeeFileinput', true)



@stop

{{-- Push extra CSS --}}

@push('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@endpush

{{-- Push extra scripts --}}

@push('js')
    {{-- <script>
        console.log("Hi, I'm using the Laravel-AdminLTE package!");
    </script> --}}
@endpush
