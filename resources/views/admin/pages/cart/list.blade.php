@php
    use App\Helpers\Template as Template;
    use App\Helpers\Hightlight as Hightlight;
@endphp

<div class="x_content">
    <div class="table-responsive">
        <table class="table table-striped jambo_table bulk_action">
            <thead>
                <tr class="headings">
                    <th class="column-title">#</th>
                    <th class="column-title">Mã Đơn Hàng</th>
                    <th class="column-title">Thông tin Khách Hàng</th>
                    <th class="column-title">Tên Sản Phẩm</th>
                    <th class="column-title">Số Lượng</th>
                    <th class="column-title">Giá</th>
                    <th class="column-title">Trạng thái</th>
                    <th class="column-title">Ngày mua</th>
                    <th class="column-title">Chỉnh sửa</th>
                    <th class="column-title">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @include ('admin.pages.cart.list_detail')
            </tbody>
        </table>
    </div>
</div>
           