@extends('admin.main')
@php
    use App\Helpers\Template;
@endphp

@section('content')
    @include ('admin.templates.page_header', ['pageIndex' => false])
    @include ('admin.templates.error')

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                @include('admin.templates.x_title', ['title' => 'Thông tin khách hàng'])
                <div class="x_content">

                    <div class="col-md-6">
                        <blockquote>
                            <ul>
                                <li><p>Họ tên : {{ $item['name'] }}</p></li>
                                <li><p>Địa chỉ: {{ $item['address'] }}</p></li>
                                <li><p>Số Điện Thoại : 0{{ $item['phone'] }}</p></li>
                                <li><p>Email : {{ $item['email'] }}</p></li>
                                <li><p>Phí Vận Chuyển : {!! Template::format_price($item['ship'],'vietnamese dong') !!}</p></li>
                                <li><p>Địa chỉ IP : {{ $item['ip'] }}</p></li>
                            </ul>
                        </blockquote>
                    </div>

                    <div class="col-md-6">
                        <blockquote>
                            <ul>
                                <li><p>Mã Đơn Hàng : {{ $item['order_code'] }}</p></li>
                                <li><p>Số Lượng: {{ $item['quantity'] }}</p></li>
                                <li><p>Tổng Số Tiền : {!! Template::format_price($item['amount'],'vietnamese dong') !!}</p></li>
                                <li><p>Hình thức Thanh toán : {{ $item['payment'] }}</p></li>
                                <li><p>Ngày Mua: {{ date(config('zvn.format.long_time'), strtotime($item['created'])) }}</p></li>
                                <li><p>Trạng Thái: {{ config("zvn.template.status.{$item['status']}.name") }}</p></li>
                            </ul>
                        </blockquote>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                @include('admin.templates.x_title', ['title' => " Chi Tiết Đơn Hàng {$item['order_code']}"])
                <div class="x_content">

                    <table class="table table-striped jambo_table bulk_action">
                        <thead>
                            <tr class="headings">
                                <th class="column-title">Mã Sản Phẩm </th>
                                <th class="column-title">Tên Sản Phẩm </th>
                                <th class="column-title">Thuộc tính </th>
                                <th class="column-title">Hình Ảnh </th>
                                <th class="column-title">Giá </th>
                                <th class="column-title">Số Lượng </th>
                                <th class="column-title">Tổng </th>
                            </tr>
                        </thead>

                        <tbody>
                            @include ('admin.pages.cart.view_detail')
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>
@endsection