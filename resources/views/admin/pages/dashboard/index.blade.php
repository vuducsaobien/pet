
@php
    use App\Helpers\Template as Template;
    $arrBox = [
        ['name' => 'Slider', 'total' => $itemSliderCount, 'link' => route('slider')],
        ['name' => 'User', 'total' => $itemUserCount, 'link' => route('user')],
        ['name' => 'Category', 'total' => $itemCategoryCount, 'link' => route('category')],
        ['name' => 'Article', 'total' => $itemArticleCount, 'link' => route('article')],
    ];

    $xhtmlBoxDashboard = '';

    foreach ($arrBox as $box) {
        $xhtmlBoxDashboard .= sprintf('<div class="col-md-3 col-sm-3 col-xs-3">%s</div>',  Template::showBoxDashboard($box));
    }

@endphp

@extends('admin.main')
@section('content')
    <div class="page-header zvn-page-header clearfix">
        <div class="zvn-page-header-title">
            <h3>Dashboard</h3>
        </div>
    </div>
    <div class="row">
        {!! $xhtmlBoxDashboard !!}
    </div>
@endsection