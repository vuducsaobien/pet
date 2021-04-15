
@php
    use App\Helpers\Template as Template;
    $arrBox = [
    ['name' => 'Article',       'total' => $itemsArticleCount,      'link' => route('article'),     'class' => 'star' ],
    ['name' => 'Attribute',     'total' => $itemsAttributeCount,    'link' => route('attribute'),   'class' => 'star' ],
    ['name' => 'Cart',          'total' => $itemsCartCount,         'link' => route('cart'),        'class' => 'star' ],
    ['name' => 'Category',      'total' => $itemsCategoryCount,     'link' => route('category'),    'class' => 'star' ],
    ['name' => 'Comment',       'total' => $itemsCommentCount,      'link' => route('comment'),     'class' => 'star' ],
    ['name' => 'Contact',       'total' => $itemsContactCount,      'link' => route('contact'),     'class' => 'star' ],
    ['name' => 'Customer',      'total' => $itemsCustomerCount,     'link' => route('cart'),        'class' => 'star' ],
    ['name' => 'Discount',      'total' => $itemsDiscountCount,     'link' => route('discount'),    'class' => 'star' ],
    ['name' => 'Menu',          'total' => $itemsMenuCount,         'link' => route('menu'),        'class' => 'star' ],
    ['name' => 'Page',          'total' => $itemsPageCount,         'link' => route('page'),        'class' => 'star' ],
    ['name' => 'Payment',       'total' => $itemsPaymentCount,      'link' => route('payment'),     'class' => 'star' ],
    ['name' => 'Product',       'total' => $itemsProductCount,      'link' => route('product'),     'class' => 'star' ],
    ['name' => 'Recruitment',   'total' => $itemsRecruitmentCount,  'link' => route('recruitment'), 'class' => 'star' ],
    ['name' => 'Rss',           'total' => $itemsRssCount,          'link' => route('rss'),         'class' => 'star' ],
    ['name' => 'Setting',       'total' => $itemsSettingCount,      'link' => route('setting'),     'class' => 'star' ],
    ['name' => 'Shipping',      'total' => $itemsShippingCount,     'link' => route('shipping'),    'class' => 'star' ],
    ['name' => 'Slider',        'total' => $itemsSliderCount,       'link' => route('slider'),      'class' => 'star' ],
    ['name' => 'Team',          'total' => $itemsTeamCount,         'link' => route('team'),        'class' => 'star' ],
    ['name' => 'Testimonial',   'total' => $itemsTestimoniaCount,   'link' => route('testimonial'), 'class' => 'star' ],
    ['name' => 'User',          'total' => $itemsUserCount,         'link' => route('user'),        'class' => 'star' ],
    ['name' => 'Faq',           'total' => $itemsFaqCount,          'link' => route('faq'),         'class' => 'star' ],

    ['name' => 'Comment Article',   'total' => $itemsCommentArticleCount,   'link' => route('commentArticle'),  'class' => 'star' ],
    ['name' => 'Rss Content',       'total' => $itemsRssContentCount,       'link' => route('rss'),             'class' => 'star' ],
    ['name' => 'Product Attribute', 'total' => $itemsProductAttributeCount, 'link' => route('product')],
    ['name' => 'Product Image',     'total' => $itemsProductImageCount,     'link' => route('product')],
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
            <h3>Quản Lý Thống Kê</h3>
        </div>
        <div class="clearfix"></div>
    </div>

    <div class="row">
        {!! $xhtmlBoxDashboard !!}
    </div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                @include('admin.templates.x_title', ['title' => 'Danh sách 5 Đơn Hàng Mới Nhất !'])
                @include('admin.pages.cart.list')
                <a href="{{ route('cart') }}" class="btn btn-success">Tới Trang Đơn Hàng</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                @include('admin.templates.x_title', ['title' => 'Danh sách 5 Liên Hệ Mới Nhất !'])
                @include('admin.pages.contact.list')
                <a href="{{ route('contact') }}" class="btn btn-success">Tới Trang Liên Hệ</a>
            </div>
        </div>
    </div>

    
@endsection