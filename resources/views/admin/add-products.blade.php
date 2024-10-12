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
                    placeholder="Product Description" fgroup-class="col-md-12" value="{{ old('product_description') }}" />
            </div>
        </div>

       
        <div class="row">
            <div class="col-md-12">
                <x-adminlte-select2 name="product_category" label="Product Category" 
                data-placeholder="Select Product Category...">
                <x-slot name="prependSlot">
                    <div class="input-group-text">
                        <i class="fas fa-leaf"></i>
                    </div>
                </x-slot>
                <option/>
                <option>Outdoor Plants</option>
                <option>Indoor Plants</option>
                <option>Office Plants</option>
                <option>Potted</option>
                <option>Others</option>
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
                    <option>Plants</option>
                    <option>Green</option>
                    <option>Cactus</option>
                    <option>Flower</option>
                    <option>Leave</option>
                    <option>Aquatic</option>
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
    <script>
        console.log("Hi, I'm using the Laravel-AdminLTE package!");
    </script>
@endpush
