<!-- Blog Content -->
@php
use App\Helpers\Template;

@endphp
@section('meta')

    <meta property="og:title" content="The Rock"/>
    <meta property="og:type" content="movie"/>
    <meta property="og:url" content="{{URL::current()}}"/>
    <meta property="og:image" content="{{URL::current()}}"/>
    <meta property="og:site_name" content="IMDb"/>
    <meta property="fb:admins" content="USER_ID"/>
    <meta property="og:description"
          content="A group of U.S. Marines, under command of
               a renegade general, take over Alcatraz and
               threaten San Francisco Bay with biological
               weapons."/>
@stop
<div class="single-blog-wrapper">
    <div class="blog-img mb-30">
        <img src="{{ asset($item->thumb) }}" alt="">
    </div>
    <div class="blog-details-content">
        <h2>{{$item->name}}</h2>
        <div class="blog-meta">
            <ul>
                <li>May - 14.09.2018</li>
                <li>
                    <a href="#">{{$itemComment->count()>0? $itemComment->count() ." Comments":"" }}</a>
                </li>

                <li>

                    @isset($share_setting)
                    {!! Template::share($share_setting,URL::current(),'article','before') !!}
                    @endisset

                </li>
            </ul>
        </div>
    </div>
    {!! $item->content !!}
    <div class="blog-dec-tags-social">
        <div class="blog-dec-tags">
            <ul>
                <li><a href="#">Dog</a></li>
                <li><a href="#">Cat</a></li>
                <li><a href="#">Fish</a></li>
            </ul>
        </div>

                <div class="blog-dec-social">
                @isset($share_setting)
                    {!! Template::share($share_setting,URL::current(),'article','after') !!}
                @endisset
                </div>

    </div>
</div>
@section('script')

    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v10.0"
            nonce="A5MLOE14"></script>
@stop