@php
    use App\Models\ProductAttributeModel;
    use App\Helpers\URL;
    use Illuminate\Support\Str;

    $model      = new ProductAttributeModel();
    $itemsBrand = $model->listItems(null, ['task' => 'news-list-items-get-all-brand']);

    // echo '<pre style="color:red";>$itemsBrand === '; print_r($itemsBrand);echo '</pre>';
    // echo '<h3>Die is Called </h3>';die;

@endphp

<div class="shop-widget mt-50">
    <h4 class="shop-sidebar-title">Thương Hiệu</h4>
     <div class="shop-list-style mt-20">
        <ul>

            @forelse($itemsBrand as $key => $value)
            @php
                $linkBrand        = route('category/brand', [
                    'category_slug' => 'all-food.html',
                    'brand_name'    => Str::slug( $value ),
                ]);
            @endphp
    
            <li><a href="{{ $linkBrand }}">{{ $value }}</a></li>

        @empty
            
        @endforelse

        </ul>
    </div>
</div>