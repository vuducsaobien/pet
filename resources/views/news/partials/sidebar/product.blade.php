@php
    use App\Models\CategoryModel;
    use App\Helpers\URL;

    $categoryModel = new CategoryModel();
    $itemsCategory = $categoryModel->listItems(null, ['task' => 'news-list-items-category']);

    // echo '<pre style="color:red";>$items === '; print_r($items);echo '</pre>';
    // echo '<h3>Die is Called </h3>';die;

@endphp

@foreach($itemsCategory as $key => $value)
<div class="shop-widget mt-50">
    <h4 class="shop-sidebar-title">{{ ucwords($value['name']) }}</h4>
     <div class="shop-list-style mt-20">
        <ul>
            @foreach($value['children'] as $keyChild => $valueChild)
                <li><a href="{{URL::linkCategoryArray($valueChild['slug'])}}">{{ ucwords($valueChild['name']) }}</a></li>
            @endforeach
        </ul>
    </div>
</div>
@endforeach
