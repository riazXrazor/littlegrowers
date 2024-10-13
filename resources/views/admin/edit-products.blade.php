@extends('layouts.admin')

{{-- Customize layout sections --}}

{{-- @section('subtitle', 'Welcome') --}}
@section('content_header_title', 'Add Products')
{{-- @section('content_header_subtitle', 'Welcome') --}}

{{-- Content body: main page content --}}

@section('content_body')

    {{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}
    <form action="{{ route('admin.products.edit.post', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf <!-- {{ csrf_field() }} -->
        <div class="row">
            <div class="col-md-12">
                <x-adminlte-input name="product_name" label="Product Name" placeholder="Product Name" fgroup-class="col-md-12"
                    value="{{ old('product_name') }}" value="{{ $product->product_name }}" />
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <x-adminlte-input name="product_price" type="number" label="Product Price" placeholder="Product Price"
                    fgroup-class="col-md-12" value="{{ old('product_price') }}" value="{{ $product->product_price }}"  />
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <x-adminlte-textarea name="product_description"  label="Product Description"
                    placeholder="Product Description" fgroup-class="col-md-12">{{ $product->product_description }}</x-adminlte-textarea>
            </div>
        </div>
        @php
            $categories = [
                'Outdoor Plants',
                'Indoor Plants',
                'Office Plants',
                'Potted',
                'Others',
            ]
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
                    <option value="{{ $category }}" selected={{ $product->product_category == $category }}>{{ $category }}</option>
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
                        'Plants',
                        'Green',
                        'Cactus',
                        'Flower',
                        'Leave',
                        'Aquatic',
                    ];

                    $selected_tags = json_decode($product->product_tags);
                
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
                        @if (in_array($tag, $selected_tags)) selected @endif
                    >{{ $tag }}</option>
                @endforeach
                </x-adminlte-select2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <x-adminlte-input-file id="product_images" name="product_images[]" label="Product Images"
                    placeholder="Choose multiple images..." igroup-size="lg" legend="Choose" multiple>

                    <x-slot name="prependSlot">
                        <div class="input-group-text text-primary">
                            <i class="fas fa-file-upload"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input-file>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <x-adminlte-button label="Submit" type="submit" theme="primary" />
                <x-adminlte-button label="Cancel" type="reset" theme="primary" />
            </div>
        </div>
    </form>


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
