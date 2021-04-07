@php
    use App\Helpers\Template;

    // echo '<pre style="color:red";>$items === '; print_r($items);echo '</pre>';
    // echo '<h3>Die is Called </h3>';die;   

    $perPage     = $items->perPage();
    $lastPage    = $items->lastPage();
    $currentPage = $items->currentPage();
    $total       = $items->total();

    // echo '<h3 style="color:red;font-weight:bold">$perPage = ' . $perPage .'</h3>';
    // echo '<h3 style="color:red;font-weight:bold">$lastPage = ' . $lastPage .'</h3>';
    // echo '<h3 style="color:red;font-weight:bold">$currentPage = ' . $currentPage .'</h3>';
    // echo '<h3 style="color:red;font-weight:bold">$total = ' . $total .'</h3>';
    
    $paginationFrontEnd = Template::createPaginationPublic($currentPage, $lastPage, $perPage, $total, $search, $search_price);
@endphp

<div class="shop-topbar-wrapper">
    <div class="product-sorting-wrapper">

        <div class="product-show shorting-style">
            {!! $paginationFrontEnd !!}
            {{-- <select>
                <option value="">12</option>
                <option value="">24</option>
                <option value="">36</option>
            </select> --}}
        </div>

    </div>
    <div class="grid-list-options">
        <ul class="view-mode">
            @if ($display == 'grid')
                <li class="active"><a href="#product-grid" data-view="product-grid"><i class="ti-layout-grid4-alt"></i></a></li>
                <li>                <a href="#product-list" data-view="product-list"><i class="ti-align-justify"></i></a></li>
            @else
                <li>                <a href="#product-grid" data-view="product-grid"><i class="ti-layout-grid4-alt"></i></a></li>
                <li class="active"><a href="#product-list" data-view="product-list"><i class="ti-align-justify"></i></a></li>
            @endif
        </ul>
    </div>
</div>
