
@php
    use App\Helpers\Template as Template;
    $arrBox = [
        ['name' => 'Article', 'total' => $itemsArticleCount, 'link' => route('article')],
        ['name' => 'Attribute', 'total' => $itemsAttributeCount, 'link' => route('attribute')],
        ['name' => 'Cart', 'total' => $itemsCartCount, 'link' => route('cart')],
        ['name' => 'Category', 'total' => $itemsCategoryCount, 'link' => route('category')],
        ['name' => 'Comment', 'total' => $itemsCommentCount, 'link' => route('comment')],
        ['name' => 'Contact', 'total' => $itemsContactCount, 'link' => route('contact')],
        ['name' => 'Customer', 'total' => $itemsCustomerCount, 'link' => route('cart')],
        ['name' => 'Discount', 'total' => $itemsDiscountCount, 'link' => route('discount')],
        ['name' => 'Menu', 'total' => $itemsMenuCount, 'link' => route('menu')],
        ['name' => 'Page', 'total' => $itemsPageCount, 'link' => route('page')],
        ['name' => 'Payment', 'total' => $itemsPaymentCount, 'link' => route('payment')],
        ['name' => 'Product', 'total' => $itemsProductCount, 'link' => route('product')],
        ['name' => 'Recruitment', 'total' => $itemsRecruitmentCount, 'link' => route('recruitment')],
        ['name' => 'Rss Content', 'total' => $itemsRssContentCount, 'link' => route('rss')],
        ['name' => 'Rss', 'total' => $itemsRssCount, 'link' => route('rss')],
        ['name' => 'Setting', 'total' => $itemsSettingCount, 'link' => route('setting')],
        ['name' => 'Shipping', 'total' => $itemsShippingCount, 'link' => route('shipping')],
        ['name' => 'Slider', 'total' => $itemsSliderCount, 'link' => route('slider')],
        ['name' => 'Team', 'total' => $itemsTeamCount, 'link' => route('team')],
        ['name' => 'Testimonial', 'total' => $itemsTestimoniaCount, 'link' => route('testimonial')],
        ['name' => 'User', 'total' => $itemsUserCount, 'link' => route('user')],

        ['name' => 'Comment Article', 'total' => $itemsCommentArticleCount, 'link' => route('commentArticle')],
        ['name' => 'Product Attribute', 'total' => $itemsProductAttributeCount, 'link' => route('product')],
        ['name' => 'Product Image', 'total' => $itemsProductImageCount, 'link' => route('product')],
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