<!-- menu profile quick info -->
<div class="profile clearfix">
    <div class="profile_pic">
        <img src="{{ asset(session('userInfo')['thumb']) }}" alt="..." class="img-circle profile_img">
    </div>
    <div class="profile_info">

        <h2><span>{{__('message.welcome')}},</span>
            {{ session('userInfo')['username'] }} <br>

            <a href="{{route('language','en')}}"><img width="30" src="{{asset('images/logo/en.png')}}" alt=""></a>
            &nbsp; <a href="{{route('language','vi')}}"><img width="30" src="{{asset('images/logo/vi.png')}}"
                                                             alt=""></a>
        </h2>

    </div>
</div>
<!-- /menu profile quick info -->
<br/>
<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section active">
        {{-- <div class="menu_section"> --}}

        <h3>Menu</h3>
        <ul class="nav side-menu">

            <li id="dashboard">
                <a href="{{ route('dashboard') }}">
                    <i class="fa fa-home"></i> {{__('message.dashboard')}}
                </a>
            </li>

            <li id = "menu"><a href="{{ route('menu') }}"><i class="fa fa-sitemap"></i> Quản lý Menu</a></li>
            <li id = "slider"><a href="{{ route('slider') }}"><i class="fa fa-sliders"></i> Slider</a></li>
            <li id = "contact"><a href="{{ route('contact') }}"><i class="fa fa-connectdevelop"></i> Liên Hệ</a></li>
            <li id = "subcribe"><a href="{{ route('subcribe') }}"><i class="fa fa-paypal"></i> Subcribe</a></li>
            <li id = "payment"><a href="{{ route('payment') }}"><i class="fa fa-money"></i> Phương Thức Thanh Toán</a></li>

            <li>
                <a><i class="fa fa-product-hunt"></i> Quản lý sản phẩm <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li id="category"><a href="{{ route('category') }}"> Danh mục</a></li>
                    <li id="attribute"><a href="{{ route('attribute') }}"> Thuộc tính</a></li>
                    <li id="discount"><a href="{{ route('discount') }}"> Mã Giảm Giá</a></li>
                    <li id="shipping"><a href="{{ route('shipping') }}"> Phí ship</a></li>
                    <li id="comment"><a href="{{ route('comment') }}"> Nhận Xét KH Về Sp</a></li>
                    <li id="product"><a href="{{ route('product') }}"> Sản phẩm</a></li>
                    <li id="cart"><a href="{{ route('cart') }}">Đơn Hàng</a></li>
                </ul>
            </li>

            <li>
                <a><i class="fa fa-archive"></i> Quản lý Tin Tức <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li id="rss"><a href="{{ route('rss') }}"> Tin Tức Online</a></li>
                    <li id="recruitment"><a href="{{ route('recruitment') }}"> Tuyển dụng</a></li>
                    <li id="faq"><a href="{{ route('faq') }}"> Câu Hỏi Thường Gặp</a></li>
                </ul>
            </li>

            <li>
                <a><i class="fa fa-archive"></i> Quản lý bài viết <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li id="article"><a href="{{ route('article') }}"> Bài Viết</a></li>
                    <li id="comment_article"><a href="{{ route('commentArticle') }}"> Nhận Xét KH Về Bài Viết</a></li>
                    <li id="testimonial"><a href="{{ route('testimonial') }}"> Testimonial</a></li>
                    <li id="team"><a href="{{ route('team') }}"> Nhóm</a></li>
                </ul>
            </li>

            <li>
                <a><i class="fa fa-image"></i> Quản lý Thư Viện <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li id="gallery"><a href="{{ route('gallery') }}"><i class="fa fa-image"></i> Hình Ảnh</a></li>
                    <li id="#"><a href="{{ route('youtube') }}"><i class="fa fa-youtube-play"></i> Youtube</a></li>
                </ul>
            </li>

            <li>
                <a><i class="fa fa-user"></i> Quản lý thành viên <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li id="user"><a href="{{ route('user') }}"> User</a></li>
                    <li class="none"><a href="{{ route('user/change-logged-password') }}"> Change Password</a></li>
                </ul>
            </li>

            <li>
                <a><i class="fa fa-cog"></i> Quản Lý Cài Đặt <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li id="setting"><a href="{{ route('setting', ['type' => 'general']) }}">Cấu hình chung</a></li>
                    <li id="setting"><a href="{{ route('setting', ['type' => 'policy']) }}">Chính Sách</a></li>
                    <li id="setting"><a href="{{ route('setting', ['type' => 'email']) }}">Email</a></li>
                    <li id="setting"><a href="{{ route('setting', ['type' => 'social']) }}">Social</a></li>
                    <li id="setting"><a href="{{ route('setting', ['type' => 'share']) }}">Share button</a></li>
                </ul>
            </li>

            <li id = "logs" class="none"><a href="{{ route('logs') }}"><i class="fa fa-history"></i> Logs</a></li>
            <li><a href="{{ route('home') }}"><i class="fa fa-globe"></i> {{__('message.view-website')}}</a></li>
            <li><a href="{{ route('auth/logout') }}"><i class="fa fa-sign-out"></i> {{__('message.logout')}}</a></li>

        </ul>
    </div>
</div>
<!-- /sidebar menu -->
