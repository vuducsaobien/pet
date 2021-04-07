@php
    use App\Models\SettingModel;

    $settingModel = new SettingModel();
    $items        = $settingModel->getItem(null, ['task' => 'news-list-items-footer']);
    $general      = @$items['general'];
    $logo         = @$general['logo'];

@endphp

<header class="header-area">
    <div class="header-top theme-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="welcome-area">
                        <p>Welcome {{ @session('userInfo')['username'] }}! </p>
                    </div>
                </div>

                <!-- currency -->
                {{-- @include('news.elements.header.headr_currency') --}}

            </div>
        </div>
    </div>

    <div class="header-bottom transparent-bar">
        <div class="container">
            <div class="row">

                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-5">
                    <div class="logo pt-39">
                        <a href="{{route('home')}}">
                            <img src="{{ asset("$logo") }}" alt="">
                        </a>
                    </div>
                </div>

                <!-- menu -->
                <div class="col-xl-8 col-lg-7 d-none d-lg-block">
                    <div class="main-menu text-center">
                        @include('news.elements.menu')
                    </div>
                </div>

                <!-- icon -->
                <div class="col-xl-2 col-lg-2 col-md-8 col-sm-8 col-7">
                    <div class="search-login-cart-wrapper">
                        @include('news.elements.header.header_icon')
                    </div>
                </div>
                
                <!-- mobile -->
                @include('news.elements.header.header_mobile')

            </div>
        </div>
    </div>

</header>
