@php
    use App\Helpers\Template;
@endphp
@forelse($items as $item)
@php
    $link=route('article/detail',$item->slug);
@endphp

<div class="col-lg-6 col-md-6">

    <div class="blog-wrapper mb-30 gray-bg">
        <div class="blog-img hover-effect">
            <a href="{{$link}}"><img alt="" src="{{ asset($item->thumb) }}" ></a>
        </div>
        <div class="blog-content">
            <div class="blog-meta">
                <ul>
                    <li>By: <span>{{$item->created_by}}</span></li>
                    <li>{{Template::showDatetimeFrontend($item->created)}}</li>
                </ul>
            </div>
            <h4><a href="{{$link}}">{{$item->name}}</a></h4>
        </div>
    </div>
</div>

@empty
    <p>chua co bai viet nao</p>
@endforelse