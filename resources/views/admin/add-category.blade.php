@extends('layouts.admin')

{{-- Customize layout sections --}}

{{-- @section('subtitle', 'Welcome') --}}
@section('content_header_title', 'Add Category')
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
    <form action="{{ route('admin.categories.add.post') }}" method="POST">
        @csrf <!-- {{ csrf_field() }} -->
        <div class="row">
            <div class="col-md-12">
                <x-adminlte-input name="category_name" label="Category Name" placeholder="Category Name" fgroup-class="col-md-12"
                    value="{{ old('category_name') }}" />
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
