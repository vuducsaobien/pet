@php
    use App\Helpers\Template;
    use App\Helpers\URL;
@endphp
@foreach($itemsArticle as $item)
<div class="col-lg-4 col-md-6">

    <div class="blog-wrapper mb-30 gray-bg">
        <div class="blog-img hover-effect">
            <a href="{{URL::linkArticle($item)}}"><img alt="" src="{{ asset($item->thumb) }}"></a>
        </div>
        <div class="blog-content">
            <div class="blog-meta">
                <ul>
                    <li>By: <span>{{$item->created_by}}</span></li>
                    <li>{{Template::showDatetimeFrontend($item->created)}}</li>
                </ul>
            </div>
            <h4><a href="{{URL::linkArticle($item)}}">{{$item->name}}</a></h4>
        </div>
    </div>
</div>
@endforeach