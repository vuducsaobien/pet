<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Marten - Pet Shop Food</title>
{{-- <title>@yield('title') - Laravel News</title> --}}
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
@yield('meta')
<!-- Favicon -->
<link rel="shortcut icon" type="image/x-icon" href="{{asset('news/images/favicon.png')}}">

<!-- all css here -->
<link rel="stylesheet" href="{{asset('news/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('news/css/animate.css')}}">
<link rel="stylesheet" href="{{asset('news/css/simple-line-icons.css')}}">
<link rel="stylesheet" href="{{asset('news/css/themify-icons.css')}}">
<link rel="stylesheet" href="{{asset('news/css/owl.carousel.min.css')}}">

@if ($controllerName == 'category')
    <link rel="stylesheet" href="{{asset('news/css/jquery-ui.css')}}">
@else
    <link rel="stylesheet" href="{{asset('news/css/slick.css')}}">
@endif

<link rel="stylesheet" href="{{asset('news/css/meanmenu.min.css')}}">
<link rel="stylesheet" href="{{asset('news/css/style.css')}}">
<link rel="stylesheet" href="{{asset('news/css/responsive.css')}}">
<script src="{{asset('news/js/vendor/modernizr-2.8.3.min.js')}}"></script>
@yield('css')
