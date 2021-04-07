@php
    use App\Models\ShippingModel;

    $shipModel = new ShippingModel();
    $items     = $shipModel->listItems(null, ['task' => 'news-list-items']);
@endphp

<div class="tax-select">
    <label>
        Tỉnh/Thành Phố
    </label>
    <select class="email s-email s-wid shipping_change">
        <option value="default">Chọn Tỉnh/Thành Phố</option>
        @foreach($items as $key => $value)
            <option value="{{ $value->fee }}">{{ $value->name }}</option>
        @endforeach
    </select>
</div>

{{-- <button class="cart-btn-2" type="submit">Lấy Báo Giá</button> --}}

