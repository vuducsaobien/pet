@extends('admin.main')

@php
    $type = Request::input('type', 'general');
@endphp

@section('content')
    @include('admin.templates.page_header', ['pageIndex' => false, 'nonForm' => true])
    <div class="ln_solid"></div>
    @include('admin.templates.error')
    @include('admin.templates.zvn_notify')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <ul id="settingTab" class="nav nav-tabs bar_tabs" role="tablist">
                <li @if ($type == 'general') class="active" @endif><a href="{{ route('setting', ['type' => 'general']) }}" role="tab">Cấu hình chung</a></li>
                <li @if ($type == 'email') class="active" @endif><a href="{{ route('setting', ['type' => 'email']) }}" role="tab">Email</a></li>
                <li @if ($type == 'social') class="active" @endif><a href="{{ route('setting', ['type' => 'social']) }}" role="tab">Social</a></li>
                <li @if ($type == 'share') class="active" @endif><a href="{{ route('setting', ['type' => 'share']) }}" role="tab">share</a></li>
            </ul>
            <div id="settingTabContent" class="tab-content">
                <div role="tabpanel" class="tab-pane fade active in">
                    @switch($type)
                        @case('general')
                            @include('admin.pages.setting.child_index.form_general')
                            @break
                        @case('email')
                            @include('admin.pages.setting.child_index.form_email_account')
                            @include('admin.pages.setting.child_index.form_email_bcc')
                            @break
                        @case('social')
                            @include('admin.pages.setting.child_index.form_social')
                            @break
                        @default
                            @include('admin.pages.setting.child_index.form_share')
                            @break
                    @endswitch
                </div>
            </div>
        </div>
    </div>
@endsection
