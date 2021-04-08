<?php

return [
    'url'              => [
        'prefix_admin' => 'admin123',
        'prefix_news'  => 'news69',
    ],
    'format'         => [
        'long_time'  => 'H:i:s d/m/Y',
        'short_time' => 'd/m/Y',
        // 'count_down' => "+10 hours" 
        'count_down' => "+2 day" 
    ],
    'template'         => [
        'form_input' => [
            'class' => 'form-control col-md-6 col-xs-12'
        ],
        'form_input_no_padding' => [
            'class' => 'form-control col-md-10 col-xs-12'
        ],
        'form_tag' => [
            'class' => 'form-control col-md-6 col-xs-12',
            'data-role' => 'tagsinput'
        ],
        'form_input_tags' => [
            'class' => 'tags form-control col-md-6 col-xs-12'
        ],
        'form_label' => [
            'class' => 'control-label col-md-3 col-sm-3 col-xs-12'
        ],
        'form_label_no_padding' => [
            'class' => 'control-label col-md-2 col-sm-3 col-xs-12'
        ],
        'form_label_edit' => [
            'class' => 'control-label col-md-4 col-sm-3 col-xs-12'
        ],

        'form_ckeditor' => [
            'class' => 'form-control col-md-6 col-xs-12 ckeditor'
        ],
        'status'       => [
            'all'      => ['name' => 'Tất cả', 'class' => 'btn-info'],
            'active'   => ['name' => 'Kích hoạt', 'class'      => 'btn-success'],
            'inactive' => ['name' => 'Chưa kích hoạt', 'class' => 'btn-danger'],
            'block'    => ['name' => 'Bị khóa', 'class' => 'btn-danger'],
            'default'  => ['name' => 'Chưa xác định', 'class' => 'btn-success'],
        ],
        'is_home'       => [
            'yes' => ['name'=> 'Hiển thị', 'class'=> 'btn-primary'],
            'no'  => ['name'=> 'Không hiển thị', 'class'=> 'btn-warning']
        ],
        'display'       => [
            'list' => ['name'=> 'Danh sách'],
            'grid' => ['name'=> 'Lưới'],
        ],
        'type' => [
            'featured' => ['name'=> 'Nổi bật'],
            'normal'   => ['name'=> 'Bình thường'],
        ],
        'type_menu' => [
            'link'             => ['name' => 'Link'],
            'category_article' => ['name' => 'Danh mục bài viết'],
            'category_product' => ['name'=>'Danh mục sản phẩm']
        ],
        'type_link' => [
            'new_tab' => ['name' => 'Tab mới', 'target' => '_blank'],
            'current' => ['name' => 'Trang hiện tại', 'target' => '_self'],
        ],
        'level'       => [
            'admin'  => ['name'=> 'Quản trị hệ thống'],
            'member' => ['name'=> 'Người dùng bình thường'],
        ],
        'rss_source' => [
            'vnexpress' => ['name' => 'VNExpress'],
            'cafebiz'   => ['name' => 'CafeBiz'],
            'tuoitre'   => ['name' => 'Tuổi Trẻ'],
        ],
        'search'       =>[
            'all'            => ['name'=> 'Tìm Tất Cả'],
            'id'             => ['name'=> 'ID'],
            'name'           => ['name'=> 'Tên'],
            'product_name'   => ['name'=> 'Tên SP'],
            'customer_name'  => ['name'=> 'Tên KH'],
            'address'        => ['name'=> 'Địa chỉ'],
            'username'       => ['name'=> 'Username'],
            'fullname'       => ['name'=> 'Fullname'],
            'email'          => ['name'=> 'Email'],
            'description'    => ['name'=> 'Mô tả'],
            'link'           => ['name'=> 'Link'],
            'content'        => ['name'=> 'Content'],
            'phone'          => ['name'=> 'Số Điện Thoại'],
            'message'        => ['name'=> 'Lời Nhắn'],
            'product_code'   => ['name'=> 'Mã Sản Phẩm'],
            'order_code'     => ['name'=> 'Mã Đơn Hàng'],
            'quantity'       => ['name'=> 'Số Lượng'],
            'price'          => ['name'=> 'Giá Cả'],
            'ip'             => ['name'=> 'Ip'],
            'code'           => ['name'=> 'Mã Giảm Giá'],
            'discount_price' => ['name'=> 'Số Tiền Giảm Giá'],
            'times_used'     => ['name'=> 'Số Lần Đã Sử Dụng'],
            'total_times'    => ['name'=> 'Số Lần Cho Phép'],
            'date_start'     => ['name'=> 'Ngày Bắt Đầu'],
        ],
        'button' => [
            'edit'      => ['class'=> 'btn-primary' , 'title'=> 'Edit'      , 'icon' => 'fa-pencil' , 'route-name' => '/form'],
            'delete'    => ['class'=> 'btn-danger btn-delete'  , 'title'=> 'Delete'    , 'icon' => 'fa-trash'  , 'route-name' => '/delete'],
            'info'      => ['class'=> 'btn-info'    , 'title'=> 'View'      , 'icon' => 'fa-eye' , 'route-name' => '/view'],
        ]

    ],
    'path' => [
        'gallery' => 'images/gallery/'
    ],
    'config' => [
        'search' => [
            'default'     => ['all', 'id'],
            'slider'      => ['all', 'name', 'link'],
            'category'    => ['all', 'name'],
            'shipping'    => ['all', 'name'],
            'article'     => ['all', 'name'],
            'user'        => ['all', 'username', 'email'],
            'menu'        => ['all', 'name', 'link'],
            'cart'        => ['all', 'order_code', 'customer_name', 'email', 'address', 'product_name', 'quantity', 'price'],
            'testimonial' => ['all', 'name'],
            'contact'     => ['all', 'email'],
            'product'     => ['all', 'product_code', 'name'],
            'attribute'   => ['all', 'name'],
            'comment'     => ['all', 'product_code', 'product_name','email','ip'],
            'discount'    => ['all', 'code', 'total_times', 'times_used'],
        ],
        'button' => [
            'default'        => ['edit', 'delete'],
            'slider'         => ['edit', 'delete'],
            'category'       => ['edit', 'delete'],
            'article'        => ['edit', 'delete'],
            'commentArticle' => ['edit', 'delete'],
            'user'           => ['edit'],
            'menu'           => ['edit', 'delete'],
            'testimonial'    => ['edit', 'delete'],
            'recruitment'    => ['edit', 'delete'],
            'comment'        => ['edit', 'delete'],
            'payment'        => ['edit', 'delete'],
            'page'           => ['edit', 'delete'],
            'customer'       => ['edit', 'delete'],
            'discount'       => ['edit', 'delete'],
            'cart'           => [ 'info'],
            'shipping'       => ['edit', 'delete'],
            'contact'        => [ 'delete'],
            'team'           => ['edit', 'delete'],
            'rss'            => ['edit', 'delete'],
            'attribute'      => ['edit', 'delete'],
            'product'        => ['edit', 'delete'],
        ]
    ],
    'notify' => [
        'success' => [
            'update' => 'Cập nhật thành công!'
        ]
    ]

];