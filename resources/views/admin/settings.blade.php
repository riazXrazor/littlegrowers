@extends('layouts.admin')

{{-- Customize layout sections --}}

{{-- @section('subtitle', 'Welcome') --}}
@section('content_header_title', 'Settings')
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
    <form action="{{ route('admin.settings.update.post') }}" method="POST">
        @csrf <!-- {{ csrf_field() }} -->
        
        {{-- <div class="row">
            <div class="col-md-12">
                <x-adminlte-input name="category_name" label="Category Name" placeholder="Category Name" fgroup-class="col-md-12"
                    value="{{ old('category_name') }}" value="{{ $category->category_name }}" />
            </div>
        </div> --}}

        @foreach ($settings as $setting)
        <div class="row">
            <div class="col-md-12">
                <x-adminlte-input name="{{ $setting->setting_name }}" label="{{ $setting->setting_label }}" placeholder="{{ $setting->setting_label }}" fgroup-class="col-md-12"
                    value="{{ old($setting->setting_name) }}" value="{{ $setting->setting_value }}" />
            </div>
        </div>
        @endforeach

        <div class="row">
            <div class="col-md-12">
                <x-adminlte-button label="Update" type="submit" theme="primary" />
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
