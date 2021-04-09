@extends('admin.main')
@php
    $type        = Request::input('type', 'general');
    $linkGeneral = route('product/form', ['id'=>$item['id'],'type' => 'general']);
    $linkForm    = route('product/form', ['id'=>$item['id'],'type' => 'attribute']);
    $linkSeo     = route('product/form', ['id'=>$item['id'],'type' => 'seo']);
@endphp
@section('content')
    @include ('admin.templates.page_header', ['pageIndex' => false])
    @include ('admin.templates.error')
    @include('admin.templates.zvn_notify')

    @if ( @$item['id'])
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">

                <ul id="settingTab" class="nav nav-tabs bar_tabs" role="tablist">
                    <li @if ($type == 'general') class="active" @endif>
                        <a href="{{ $linkGeneral }}" role="tab">Cấu hình chung</a>
                    </li>
                    <li @if ($type == 'images') class="active" @endif>
                        <a href="{{ $linkForm }}" role="tab">Cấu Hình SP</a>
                    </li>
                    <li @if ($type == 'attribute') class="active" @endif>
                        <a href="{{ $linkForm }}" role="tab">Thuộc tính SP</a>
                    </li>
                    <li @if ($type == 'seo') class="active" @endif>
                        <a href="{{ $linkSeo }}" role="tab">SEO</a>
                    </li>
                </ul>

                <div id="settingTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade active in">
                        @switch($type)

                            @case('general')
                                @include('admin.pages.product.child-form.form_general')
                                @include('admin.pages.product.child-form.form_images')
                            @break

                            @case('setting')
                                @include('admin.pages.product.child-form.form_setting')
                            @break

                            @case('attribute')
                                @include('admin.pages.product.child-form.form_attribute')
                            @break

                            @case('seo')
                                @include('admin.pages.product.child-form.form_seo')
                            @break

                            @default
                                @include('admin.pages.product.child-form.form_seo')
                            @break

                        @endswitch
                    </div>
                </div>
            </div>


        </div>
    @else
        @include('admin.pages.product.child-form.form_add')
    @endif
@endsection




