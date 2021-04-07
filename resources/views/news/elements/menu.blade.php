@php
    use App\Helpers\URL;
    use App\Models\CategoryModel;
    use App\Models\MenuModel;
    
        $menuModel = new MenuModel();
        $itemsMenu = $menuModel->listItems(null, ['task' => 'news-list-items']);

        $categoryModel = new CategoryModel();
        $itemsCategory = $categoryModel->listItems(null, ['task' => 'news-list-items']);

        $prefix=config('zvn.url.prefix_news')?"/".config('zvn.url.prefix_news'):"";

        // echo '<pre style="color:red";>$itemsMenu === '; print_r($itemsMenu);echo '</pre>';
        // echo '<h3>Die is Called </h3>';die;
@endphp
@if(count($itemsMenu))

<nav>
    <ul>
        @foreach($itemsMenu as $item)
        @switch($item->type_menu)
                @case("link")
                    <li><a href="{{$prefix.$item->link}}">{{$item->name}}</a></li>
                @break

                @case("category_product")
                    <li class="mega-menu-position"><a href="{{$prefix.$item->link}}">Food</a>
                        <ul class="mega-menu">
                            @foreach($itemsCategory as $item)
                            <li>
                                <ul>
                                    <li class="mega-menu-title">{{$item->name}}</li>
                                    @foreach($item->children as $i)
                                    <li><a href="{{URL::linkCategory($i)}}">{{$i->name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            @endforeach
                            <li class="mega-menu-title">
                                <ul>
                                    <li><a href="http://proj_news.xyz/news69/bai-viet/list-blog.html">Pet Shop - Blog<img alt="" src="{{ asset('news/images/banner/menu-img-4.jpg') }}"></a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                @break
        @endswitch

        @endforeach
    </ul>
</nav>
@endif
