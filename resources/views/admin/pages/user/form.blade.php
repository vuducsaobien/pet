@extends('admin.main')

@section('content')
    @include ('admin.templates.page_header', ['pageIndex' => false])
    @include ('admin.templates.error')
    @include ('admin.templates.zvn_notify')


    @isset ( $item['id'])

        <div class="row">
            @include('admin.pages.user.form_info')
            @include('admin.pages.user.form_change_password')
            @include('admin.pages.user.form_change_level')
        </div>
    @else
        @include('admin.pages.user.form_add')
    @endisset
@endsection