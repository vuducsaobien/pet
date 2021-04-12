@php
    use App\Helpers\URL;
    use App\Helpers\Template;

    use App\Models\CategoryModel;
    use App\Models\MenuModel;
    
        $menuModel = new MenuModel();
        // $itemsMenu = $menuModel->listItems(null, ['task' => 'news-list-items'])->toArray();
        $itemsMenu = $menuModel->listItems(null, ['task' => 'news-list-items']);
        // echo '<pre style="color:red";>$itemsMenu === '; print_r($itemsMenu);echo '</pre>';
        // echo '<h3>Die is Called </h3>';die;
        $prefix    = config('zvn.url.prefix_news') ? "/" . config('zvn.url.prefix_news') : "";
        $xhtmlMenu = '';

@endphp
@if(count($itemsMenu))

<nav>
    <ul>
        @foreach($itemsMenu as $item)
            @switch($item->type_menu)
                @case("link")
                    <li><a href="{{$prefix.$item->link}}">{{$item->name}}</a></li>
                @break

                @case ('category_product')
                    @php
                        $xhtmlMenu .= sprintf('
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="%s" data-name="category_product">%s 
                                </a>
                            ', $prefix . $item['link'] , $item['name']
                        );

                        $categoryModel = new CategoryModel();
                        $itemsCategory = $categoryModel->listItems(null, ['task' => 'news-list-items']);

                        if (count($itemsCategory) > 0) {
                            $xhtmlMenu .= '<ul class="dropdown-menu">';
                            Template::showNestedMenu($itemsCategory, $xhtmlMenu);
                            $xhtmlMenu .= '</ul>';
                        }
                        $xhtmlMenu .= '</li>';
                    @endphp
                    {!! $xhtmlMenu !!}

                @break

                @case("category_news")
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" 
                            data-toggle="dropdown" href="#" data-name="category_news">{{ $item['name'] }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('rss/index') }}"> RSS </a></li>
                            <li><a class="dropdown-item" href="{{ route('article/index') }}"> Blog </a></li>
                            <li><a class="dropdown-item" href="#"> Tuyển Dụng </a></li>
                            <li><a class="dropdown-item" href="#"> FAQ </a></li>
                        </ul>
                    </li>
                @break

                @case("category_library")
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" 
                            data-toggle="dropdown" href="#" data-name="category_library">{{ $item['name'] }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"> Hình Ảnh </a></li>
                            <li><a class="dropdown-item" href="#"> Video </a></li>
                        </ul>
                    </li>
                @break


            @endswitch

        @endforeach
    </ul>
</nav>
@endif
