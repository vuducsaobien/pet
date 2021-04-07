@php
use App\Models\ArticleModel;
use App\Helpers\URL;
use App\Helpers\Template;
$article=new ArticleModel();
$items=$article->getItem(null,['task'=>'news-get-item-recent']);


@endphp

<div class="shop-widget mt-50">
    <h4 class="shop-sidebar-title">Recent Post</h4>
    @forelse($items as $item)
    <div class="recent-post-wrapper mt-30">

        <div class="single-recent-post mb-20">
            <div class="recent-post-img">
                <a href="#"><img src="{{ asset($item->thumb) }}" alt=""></a>
            </div>
            <div class="recent-post-content">
                <h4><a href="{{URL::linkArticle($item)}}">{{$item->name}}</a></h4>
                <span>{{Template::showDatetimeFrontend($item->created)}}</span>
            </div>
        </div>
    </div>
    @empty
    <p>chua co bai viet nao</p>
    @endforelse
</div>
