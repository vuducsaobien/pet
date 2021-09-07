@php
    $arrContrAccept   = session()->get('userInfo')['permission_route_name_accepted'];
    $xhtml_1          = '';
    $xhtml_2          = '';
    $xhtmlMenu_1      = '';
    $xhtmlMenu_2      = '';
    $xhtmlMenu_3      = '';
    $xhtmlMenu_4      = '';
    $xhtmlMenu_5      = '';
    $xhtmlMenu_6      = '';
    $flag_xhtmlMenu_1 = false;
    $flag_xhtmlMenu_2 = false;
    $flag_xhtmlMenu_3 = false;
    $flag_xhtmlMenu_4 = false;
    $flag_xhtmlMenu_5 = false;
    $flag_xhtmlMenu_6 = false;

    foreach ($arrContrAccept as $key => $value) 
    {
        switch ($value) 
        {
            case 'dashboard':
                $xhtml_1 .= '<li id ="dashboard"><a href="'.route('dashboard').'"><i class="fa fa-home"></i> Quản lý Dashboard</a></li>';
            break;
            case 'menu':
                $xhtml_1 .= '<li id = "menu"><a href="'.route('menu').'"><i class="fa fa-sitemap"></i> Quản lý Menu</a></li>';
            break;
            case 'slider':
                $xhtml_1 .= '<li id = "slider"><a href="'.route('slider').'"><i class="fa fa-sliders"></i> Slider</a></li>';
            break;
            case 'contact':
                $xhtml_1 .= '<li id = "contact"><a href="'.route('contact').'"><i class="fa fa-connectdevelop"></i> Liên Hệ</a></li>';
            break;
            case 'subcribe':
                $xhtml_1 .= '<li id = "subcribe"><a href="'.route('subcribe').'"><i class="fa fa-paypal"></i> Subcribe</a></li>';
            break;
            case 'payment':
                $xhtml_1 .= '<li id = "payment"><a href="'.route('payment').'"><i class="fa fa-money"></i> Phương Thức Thanh Toán</a></li>';
            break;

            // 1 - Multi Level
            case('category'):
            case('attribute'):
            case('discount'):
            case('shipping'):
            case('comment'):
            case('product'):
            case('cart'):
            
                if ( !$flag_xhtmlMenu_1 ) 
                {
                    $xhtmlMenu_1 .= '
                        <li>
                            <a><i class="fa fa-product-hunt"></i> Quản lý sản phẩm <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                    ';

                    foreach ($arrContrAccept as $keyB => $valueB) {
                        switch ($valueB) 
                        {
                            case 'category':
                                $xhtmlMenu_1 .= '<li id="category"><a href="'.route("category").'"> Danh mục</a></li>';
                            break;
                            case 'attribute':
                                $xhtmlMenu_1 .= '<li id="attribute"><a href="'.route("attribute").'"> Thuộc tính</a></li>';
                            break;
                            case 'discount':
                                $xhtmlMenu_1 .= '<li id="discount"><a href="'.route("discount").'"> Mã Giảm Giá</a></li>';
                            break;
                            case 'shipping':
                                $xhtmlMenu_1 .= '<li id="shipping"><a href="'.route("shipping").'"> Phí ship</a></li>';
                            break;
                            case 'comment':
                                $xhtmlMenu_1 .= '<li id="comment"><a href="'.route("comment").'"> Nhận Xét KH Về Sp</a></li>';
                            break;
                            case 'product':
                                $xhtmlMenu_1 .= '<li id="product"><a href="'.route("product").'"> Sản phẩm</a></li>';
                            break;
                            case 'cart':
                                $xhtmlMenu_1 .= '<li id="cart"><a href="'.route("cart").'"> Đơn Hàng</a></li>';
                            break;
                        }
                    }

                    $xhtmlMenu_1 .= '</ul></li>';
                }
                $flag_xhtmlMenu_1 = true;
            break;

            // 2 - Multi Level
            case('rss'):
            case('recruitment'):
            case('faq'):
                if ( !$flag_xhtmlMenu_2 ) 
                {
                    $xhtmlMenu_2 .= '
                        <li>
                            <a><i class="fa fa-archive"></i> Quản lý Tin Tức <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                    ';

                    foreach ($arrContrAccept as $keyC => $valueC) {
                        switch ($valueC) 
                        {
                            case 'rss':
                                $xhtmlMenu_2 .= '<li id="rss"><a href="'.route("rss").'"> Tin Tức Online</a></li>';
                            break;
                            case 'recruitment':
                                $xhtmlMenu_2 .= '<li id="recruitment"><a href="'.route("recruitment").'"> Tuyển dụng</a></li>';
                            break;
                            case 'faq':
                                $xhtmlMenu_2 .= '<li id="faq"><a href="'.route("faq").'"> Câu Hỏi Thường Gặp</a></li>';
                            break;
                        }
                    }

                    $xhtmlMenu_2 .= '</ul></li>';
                }
                $flag_xhtmlMenu_2 = true;
            break;

            // 3 - Multi Level
            case('article'):
            case('comment_article'):
            case('testimonial'):
            case('team'):
                
                if ( !$flag_xhtmlMenu_3 ) 
                {
                    $xhtmlMenu_3 .= '
                        <li>
                            <a><i class="fa fa-archive"></i> Quản lý bài viết <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                    ';

                    foreach ($arrContrAccept as $key => $value) {
                        switch ($value) 
                        {
                            case 'article':
                                $xhtmlMenu_3 .= '<li id="article"><a href="'.route("article").'"> Bài Viết</a></li>';
                            break;
                            case 'comment_article':
                                $xhtmlMenu_3 .= '<li id="comment_article"><a href="'.route("comment_article").'"> Nhận Xét KH Về Bài Viết</a></li>';
                            break;
                            case 'testimonial':
                                $xhtmlMenu_3 .= '<li id="testimonial"><a href="'.route("testimonial").'"> Testimonial</a></li>';
                            break;
                            case 'team':
                                $xhtmlMenu_3 .= '<li id="team"><a href="'.route("team").'"> Nhóm</a></li>';
                            break;
                        }
                    }

                    $xhtmlMenu_3 .= '</ul></li>';
                }
                $flag_xhtmlMenu_3 = true;
            break;

            // 4 - Multi Level
            case('gallery'):
            case('youtube'):                
                if ( !$flag_xhtmlMenu_4 ) 
                {
                    $xhtmlMenu_4 .= '
                        <li>
                            <a><i class="fa fa-image"></i> Quản lý Thư Viện <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                    ';

                    foreach ($arrContrAccept as $key => $value) {
                        switch ($value) 
                        {
                            case 'gallery':
                                $xhtmlMenu_4 .= '<li id="gallery"><a href="'.route("gallery").'"> Hình Ảnh</a></li>';
                            break;
                            case 'youtube':
                                $xhtmlMenu_4 .= '<li id="youtube"><a href="'.route("youtube").'"> Youtube</a></li>';
                            break;
                        }
                    }

                    $xhtmlMenu_4 .= '</ul></li>';
                }
                $flag_xhtmlMenu_4 = true;
            break;

            // 5 - Multi Level
            case('group'):
            case('user'):
            case('controller'):
            case('action'):
                if ( !$flag_xhtmlMenu_5 ) 
                {
                    $xhtmlMenu_5 .= '
                        <li>
                            <a><i class="fa fa-user"></i> Quản lý Phân Quyền<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                    ';

                    foreach ($arrContrAccept as $key => $value) {
                        switch ($value) 
                        {
                            case 'group':
                                $xhtmlMenu_5 .= '<li id="group"><a href="'.route("group").'"> Group</a></li>';
                            break;
                            case 'user':
                                $xhtmlMenu_5 .= '<li id="user"><a href="'.route("user").'"> User</a></li>';
                            break;
                            case 'controller':
                                $xhtmlMenu_5 .= '<li id="controller"><a href="'.route("controller").'"> Controller</a></li>';
                            break;
                            case 'action':
                                $xhtmlMenu_5 .= '<li id="action"><a href="'.route("action").'"> Action</a></li>';
                            break;
                        }
                    }

                    $xhtmlMenu_5 .= '</ul></li>';
                }
                $flag_xhtmlMenu_5 = true;
            break;

            // 6 - Multi Level
            /*
            case('setting'):
                if ( !$flag_xhtmlMenu_6 ) 
                {
                    $xhtmlMenu_6 .= '
                        <li>
                            <a><i class="fa fa-cog"></i> Quản Lý Cài Đặt <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                    ';

                    foreach ($arrContrAccept as $key => $value) {
                        switch ($value) 
                        {
                            case 'category':
                                $xhtmlMenu_6 .= '<li id="setting"><a href="'.route("category").'"> Danh mục</a></li>';
                            break;
                            case 'attribute':
                                $xhtmlMenu_6 .= '<li id="setting"><a href="'.route("attribute").'"> Thuộc tính</a></li>';
                            break;
                            case 'discount':
                                $xhtmlMenu_6 .= '<li id="setting"><a href="'.route("discount").'"> Mã Giảm Giá</a></li>';
                            break;
                            case 'shipping':
                                $xhtmlMenu_6 .= '<li id="setting"><a href="'.route("shipping").'"> Phí ship</a></li>';
                            break;
                            case 'shipping':
                                $xhtmlMenu_6 .= '<li id="setting"><a href="'.route("shipping").'"> Phí ship</a></li>';
                            break;
                            case 'shipping':
                                $xhtmlMenu_6 .= '<li id="setting"><a href="'.route("shipping").'"> Phí ship</a></li>';
                            break;
                        }
                    }

                    $xhtmlMenu_6 .= '</ul></li>';
                }
                $flag_xhtmlMenu_6 = true;
            break;//*/

            case 'user-change-pass':
                $xhtml_2 .= '<li><a href="'.route('user/change-logged-password').'"><i class="fa fa-home"></i> Change Password</a></li>';
            break;
            case 'logs':
                $xhtml_2 .= '<li><a href="'.route('logs').'"><i class="fa fa-history"></i> Quản lý Logs</a></li>';
            break;
            case 'home':
                $xhtml_2 .= '<li><a href="'.route('home').'"><i class="fa fa-home"></i> Home</a></li>';
            break;
            case 'logout':
                $xhtml_2 .= '<li><a href="'.route('auth/logout').'"><i class="fa fa-sign-out"></i> Logout</a></li>';
            break;

        }
    }

    $xhtmlMenu_6 = '
        <li>
            <a><i class="fa fa-cog"></i> Quản Lý Cài Đặt <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
                <li id="setting"><a href="'.route('setting', ['type' => 'general']).'">Cấu hình chung</a></li>
                <li id="setting"><a href="'.route('setting', ['type' => 'policy']).'">Chính Sách</a></li>
                <li id="setting"><a href="'.route('setting', ['type' => 'email']).'">Email</a></li>
                <li id="setting"><a href="'.route('setting', ['type' => 'social']).'">Social</a></li>
                <li id="setting"><a href="'.route('setting', ['type' => 'share']).'">Share button</a></li>
            </ul>
        </li>
    ';


    $xhtml = $xhtml_1 . $xhtmlMenu_1 . $xhtmlMenu_2 . $xhtmlMenu_3 . $xhtmlMenu_4 . $xhtmlMenu_5 . $xhtmlMenu_6 .  $xhtml_2;

@endphp


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
            
            {!! $xhtml !!}

        </ul>
    </div>
</div>
<!-- /sidebar menu -->
