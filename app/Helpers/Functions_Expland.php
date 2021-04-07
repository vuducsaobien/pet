<?php
/*
    A. Multidimensional Array
    $cars = [
        ["Volvo",22,18],
        ["BMW",15,13],
        ["Saab",5,2],
        ["Land Rover",17,15]
    ];

    1.0 Merge
        // 01. Function 01
            public static function merge_Multidi_Array_01($arrSource, $mergeElement)
            
            ------------------------- $arrSource Array -------------------------
            $mergeElement = 'product_id';
            $arrSource Array
            (
                [0] => Array
                    (
                        [product_id] => 1
                        [attribute_id] => 1
                        [attribute_name] => Màu sắc
                    )

                [1] => Array
                    (
                        [product_id] => 1
                        [attribute_id] => 3
                        [attribute_name] => Chất liệu
                    )

                [2] => Array
                    (
                        [product_id] => 1
                        [attribute_id] => 4
                        [attribute_name] => Kích thước
                    )

                [3] => Array
                    (
                        [product_id] => 3
                        [attribute_id] => 4
                        [attribute_name] => Kích thước
                    )

                [4] => Array
                    (
                        [product_id] => 88
                        [attribute_id] => 1
                        [attribute_name] => Màu sắc
                    )

                [5] => Array
                    (
                        [product_id] => 88
                        [attribute_id] => 2
                        [attribute_name] => Slogan
                    )

                [6] => Array
                    (
                        [product_id] => 88
                        [attribute_id] => 3
                        [attribute_name] => Chất liệu
                    )

                [7] => Array
                    (
                        [product_id] => 88
                        [attribute_id] => 5
                        [attribute_name] => sadd
                    )

                [8] => Array
                    (
                        [product_id] => 88
                        [attribute_id] => 6
                        [attribute_name] => đâ
                    )

                [9] => Array
                    (
                        [product_id] => 88
                        [attribute_id] => 7
                        [attribute_name] => duaw
                    )

                [10] => Array
                    (
                        [product_id] => 90
                        [attribute_id] => 1
                        [attribute_name] => Màu sắc
                    )

                [11] => Array
                    (
                        [product_id] => 90
                        [attribute_id] => 3
                        [attribute_name] => Chất liệu
                    )

                [12] => Array
                    (
                        [product_id] => 90
                        [attribute_id] => 9
                        [attribute_name] => da
                    )

            )

            ------------------------- $result Array -------------------------
            (
                [1] => Array
                    (
                        [product_id] => 1
                        [attribute_id] => Array
                            (
                                [0] => 1
                                [1] => 3
                                [2] => 4
                            )

                        [attribute_name] => Array
                            (
                                [0] => Màu sắc
                                [1] => Chất liệu
                                [2] => Kích thước
                            )

                    )

                [3] => Array
                    (
                        [product_id] => 3
                        [attribute_id] => 4
                        [attribute_name] => Kích thước
                    )

                [88] => Array
                    (
                        [product_id] => 88
                        [attribute_id] => Array
                            (
                                [0] => 1
                                [1] => 2
                                [2] => 3
                                [3] => 5
                                [4] => 6
                                [5] => 7
                            )

                        [attribute_name] => Array
                            (
                                [0] => Màu sắc
                                [1] => Slogan
                                [2] => Chất liệu
                                [3] => sadd
                                [4] => đâ
                                [5] => duaw
                            )

                    )

                [90] => Array
                    (
                        [product_id] => 90
                        [attribute_id] => Array
                            (
                                [0] => 1
                                [1] => 3
                                [2] => 9
                            )

                        [attribute_name] => Array
                            (
                                [0] => Màu sắc
                                [1] => Chất liệu
                                [2] => da
                            )

                    )

            )
        // 01. Function 01

        // 01. Function 02
            public static function merge_Multidi_Array_02($arrSource_1, $arrSource_2) 
            ------------------------- $arrSource_01 Array -------------------------
            (
                [1] => Array
                    (
                        [id] => 1
                        [name] => Bình Giữ Nhiệt
                        [status] => inactive
                        [ordering] => 1
                    )

                [2] => Array
                    (
                        [id] => 2
                        [name] => Chuột
                        [status] => active
                        [ordering] => 1
                    )

                [90] => Array
                    (
                        [id] => 90
                        [name] => TEST
                        [status] => active
                        [ordering] => 1
                    )

                [88] => Array
                    (
                        [id] => 88
                        [name] => vuvanduc
                        [status] => active
                        [ordering] => 1
                    )

                [3] => Array
                    (
                        [id] => 3
                        [name] => Giấy vệ sinh
                        [status] => active
                        [ordering] => 3
                    )

            )    
            ------------------------- $arrSource_02 Array -------------------------
            (
                [1] => Array
                    (
                        [product_id] => 1
                        [attribute_id] => Array
                            (
                                [0] => 1
                                [1] => 3
                                [2] => 4
                            )

                        [attribute_name] => Array
                            (
                                [0] => Màu sắc
                                [1] => Chất liệu
                                [2] => Kích thước
                            )

                    )

                [3] => Array
                    (
                        [product_id] => 3
                        [attribute_id] => 4
                        [attribute_name] => Kích thước
                    )

                [88] => Array
                    (
                        [product_id] => 88
                        [attribute_id] => Array
                            (
                                [0] => 1
                                [1] => 2
                                [2] => 3
                                [3] => 5
                                [4] => 6
                                [5] => 7
                            )

                        [attribute_name] => Array
                            (
                                [0] => Màu sắc
                                [1] => Slogan
                                [2] => Chất liệu
                                [3] => sadd
                                [4] => đâ
                                [5] => duaw
                            )

                    )

                [90] => Array
                    (
                        [product_id] => 90
                        [attribute_id] => Array
                            (
                                [0] => 1
                                [1] => 3
                                [2] => 9
                            )

                        [attribute_name] => Array
                            (
                                [0] => Màu sắc
                                [1] => Chất liệu
                                [2] => da
                            )

                    )

            )     
            ------------------------- $result Array -------------------------
            (
                [1] => Array
                    (
                        [id] => 1
                        [name] => Bình Giữ Nhiệt
                        [status] => inactive
                        [ordering] => 1
                        [detail] => Array
                            (
                                [product_id] => 1
                                [attribute_id] => Array
                                    (
                                        [0] => 1
                                        [1] => 3
                                        [2] => 4
                                    )

                                [attribute_name] => Array
                                    (
                                        [0] => Màu sắc
                                        [1] => Chất liệu
                                        [2] => Kích thước
                                    )

                            )

                    )

                [2] => Array
                    (
                        [id] => 2
                        [name] => Chuột
                        [status] => active
                        [ordering] => 1
                    )

                [90] => Array
                    (
                        [id] => 90
                        [name] => TEST
                        [status] => active
                        [ordering] => 1
                        [detail] => Array
                            (
                                [product_id] => 90
                                [attribute_id] => Array
                                    (
                                        [0] => 1
                                        [1] => 3
                                        [2] => 9
                                    )

                                [attribute_name] => Array
                                    (
                                        [0] => Màu sắc
                                        [1] => Chất liệu
                                        [2] => da
                                    )

                            )

                    )

                [88] => Array
                    (
                        [id] => 88
                        [name] => vuvanduc
                        [status] => active
                        [ordering] => 1
                        [detail] => Array
                            (
                                [product_id] => 88
                                [attribute_id] => Array
                                    (
                                        [0] => 1
                                        [1] => 2
                                        [2] => 3
                                        [3] => 5
                                        [4] => 6
                                        [5] => 7
                                    )

                                [attribute_name] => Array
                                    (
                                        [0] => Màu sắc
                                        [1] => Slogan
                                        [2] => Chất liệu
                                        [3] => sadd
                                        [4] => đâ
                                        [5] => duaw
                                    )

                            )

                    )

                [3] => Array
                    (
                        [id] => 3
                        [name] => Giấy vệ sinh
                        [status] => active
                        [ordering] => 3
                        [detail] => Array
                            (
                                [product_id] => 3
                                [attribute_id] => 4
                                [attribute_name] => Kích thước
                            )

                    )

            )
        // 01. Function 02

        // 01. Function 03
            public static function merge_Multidi_Array_03($arrSource, $arrMergeElement) 
            ------------------------- $arrSource Array -------------------------
            $arrSource_01 ---------
            (
                [0] => da
                [1] => uyuyuy
                [2] => ds
                [3] => trtrtr
            )
            ------------------------- $arrMergeElement Array -------------------------
            $arrSource_02 ---------
            (
                [0] => Array
                    (
                        [attribute_id] => 9
                        [attribute_name] => da
                    )

                [1] => Array
                    (
                    )

                [2] => Array
                    (
                        [attribute_id] => 8
                        [attribute_name] => ds
                    )

                [3] => Array
                    (
                    )
            )
            ------------------------- $result Array -------------------------
            $result ---- 03 ----- Array
            (
                [0] => Array
                    (
                        [attribute_id] => 9
                        [attribute_name] => da
                        [0] => da
                    )

                [1] => Array
                    (
                        [0] => uyuyuy
                    )

                [2] => Array
                    (
                        [attribute_id] => 8
                        [attribute_name] => ds
                        [0] => ds
                    )

                [3] => Array
                    (
                        [0] => trtrtr
                    )
            )
        // 01. Function 03

        // 01. Function 04
            ------------------------- $source Array -------------------------
            $source --------- Array
            (
                [0] => Array
                    (
                        [attribute_id] => 9
                        [attribute_name] => da
                        [0] => da
                    )

                [1] => Array
                    (
                        [0] => uyuyuy
                    )

                [2] => Array
                    (
                        [attribute_id] => 8
                        [attribute_name] => ds
                        [0] => ds
                    )

                [3] => Array
                    (
                        [0] => trtrtr
                    )
            )
            ------------------------- $result Array -------------------------
            $result --------- Array
            (
                [0] => Array
                    (
                        [attribute_id] => 9
                        [attribute_name] => da
                        [product_id] => 1
                    )

                [1] => Array
                    (
                        [product_id] => 1
                        [attribute_id] => 10
                        [attribute_name] => uyuyuy
                    )

                [2] => Array
                    (
                        [attribute_id] => 8
                        [attribute_name] => ds
                        [product_id] => 1
                    )

                [3] => Array
                    (
                        [product_id] => 1
                        [attribute_id] => 11
                        [attribute_name] => trtrtr
                    )
            )
        // 01. Function 04

        // 01. Function 05
            $itemsCart === Array
            (
                [0] => Array
                    (
                        [id] => 50
                        [quantity] => 3
                        [price] => 6000
                        [order_code] => kzwn2A8
                        [name] => Thức ăn Veggies cho Fish 28
                        [product_id] => 28
                        [detail] => Màu: trắng - Kích cỡ: nhỏ.
                    )

                [1] => Array
                    (
                        [id] => 49
                        [quantity] => 1
                        [price] => 77000
                        [order_code] => kzwn2A8
                        [name] => Thức ăn canxi cho chó 29
                        [product_id] => 29
                        [detail] => Màu: trắng - Kích cỡ: rất lớn.
                    )

                [2] => Array
                    (
                        [id] => 48
                        [quantity] => 4
                        [price] => 8000
                        [order_code] => kzwn2A8
                        [name] => Thức ăn Veggies cho Fish 28
                        [product_id] => 28
                        [detail] => Màu: đỏ - Kích cỡ: rất lớn.
                    )

                [3] => Array
                    (
                        [id] => 14
                        [quantity] => 3
                        [price] => 231000
                        [order_code] => uJ4rAKC
                        [name] => Thức ăn canxi cho chó 29
                        [product_id] => 29
                        [detail] => Màu: vàng - Kích cỡ: rất lớn.
                    )

                [4] => Array
                    (
                        [id] => 13
                        [quantity] => 2
                        [price] => 154000
                        [order_code] => uJ4rAKC
                        [name] => Thức ăn canxi cho chó 29
                        [product_id] => 29
                        [detail] => Màu: trắng - Kích cỡ: lớn.
                    )
            )

            $output === Array
            (
                [0] => Array
                    (
                        [0] => Array
                            (
                                [id] => 50
                                [quantity] => 3
                                [price] => 6000
                                [order_code] => kzwn2A8
                                [name] => Thức ăn Veggies cho Fish 28
                                [product_id] => 28
                                [detail] => Màu: trắng - Kích cỡ: nhỏ.
                            )

                        [1] => Array
                            (
                                [id] => 49
                                [quantity] => 1
                                [price] => 77000
                                [order_code] => kzwn2A8
                                [name] => Thức ăn canxi cho chó 29
                                [product_id] => 29
                                [detail] => Màu: trắng - Kích cỡ: rất lớn.
                            )

                        [2] => Array
                            (
                                [id] => 48
                                [quantity] => 4
                                [price] => 8000
                                [order_code] => kzwn2A8
                                [name] => Thức ăn Veggies cho Fish 28
                                [product_id] => 28
                                [detail] => Màu: đỏ - Kích cỡ: rất lớn.
                            )

                    )

                [1] => Array
                    (
                        [0] => Array
                            (
                                [id] => 14
                                [quantity] => 3
                                [price] => 231000
                                [order_code] => uJ4rAKC
                                [name] => Thức ăn canxi cho chó 29
                                [product_id] => 29
                                [detail] => Màu: vàng - Kích cỡ: rất lớn.
                            )

                        [1] => Array
                            (
                                [id] => 13
                                [quantity] => 2
                                [price] => 154000
                                [order_code] => uJ4rAKC
                                [name] => Thức ăn canxi cho chó 29
                                [product_id] => 29
                                [detail] => Màu: trắng - Kích cỡ: lớn.
                            )
                    )
            )
        // 01. Function 05

            2.0 Split
        // 02. Function 01
            ------------------------- $arrSource Array -------------------------
            (
                [0] => Array
                    (
                        [product_id] => 1
                        [attribute_id] => 1
                        [attribute_name] => Màu sắc
                    )

                [1] => Array
                    (
                        [product_id] => 1
                        [attribute_id] => 3
                        [attribute_name] => Chất liệu
                    )

                [2] => Array
                    (
                        [product_id] => 1
                        [attribute_id] => 4
                        [attribute_name] => Kích thước
                    )

                [3] => Array
                    (
                        [product_id] => 3
                        [attribute_id] => 4
                        [attribute_name] => Kích thước
                    )

                [4] => Array
                    (
                        [product_id] => 88
                        [attribute_id] => 1
                        [attribute_name] => Màu sắc
                    )

                [5] => Array
                    (
                        [product_id] => 88
                        [attribute_id] => 2
                        [attribute_name] => Slogan
                    )

                [6] => Array
                    (
                        [product_id] => 88
                        [attribute_id] => 3
                        [attribute_name] => Chất liệu
                    )

                [7] => Array
                    (
                        [product_id] => 88
                        [attribute_id] => 5
                        [attribute_name] => sadd
                    )

                [8] => Array
                    (
                        [product_id] => 88
                        [attribute_id] => 6
                        [attribute_name] => đâ
                    )

                [9] => Array
                    (
                        [product_id] => 88
                        [attribute_id] => 7
                        [attribute_name] => duaw
                    )

                [10] => Array
                    (
                        [product_id] => 90
                        [attribute_id] => 1
                        [attribute_name] => Màu sắc
                    )

                [11] => Array
                    (
                        [product_id] => 90
                        [attribute_id] => 3
                        [attribute_name] => Chất liệu
                    )

                [12] => Array
                    (
                        [product_id] => 90
                        [attribute_id] => 9
                        [attribute_name] => da
                    )

            )
            ------------------------- $result Array -------------------------
            $result Array
            (
                [0] => 1
                [1] => 3
                [2] => 88
                [3] => 90
            )
        // 02. Function 01

        // 02. Function 02
            public static function split_Multidi_Array_02($arrSource, $splitElement) 
            ------------------------- $arrSource Array -------------------------
            $arrSource --------- Array
            (
                [1] => Array
                    (
                        [attribute_id] => 1
                        [attribute_name] => Màu sắc
                        [attribute_value] => Array
                            (
                                [0] => Tím
                                [1] => Xanh
                                [2] => Đỏ
                            )

                    )

                [2] => Array
                    (
                        [attribute_id] => 2
                        [attribute_name] => Slogan
                        [attribute_value] => Array
                            (
                                [0] => Slogan 1
                                [1] => Slogan 2
                                [2] => Slogan 3
                                [3] => Slogan Custom
                            )

                    )

                [3] => Array
                    (
                        [attribute_id] => 3
                        [attribute_name] => Chất liệu
                        [attribute_value] => Array
                            (
                                [0] => Inox
                                [1] => Nhựa
                                [2] => Vải
                                [3] => Đá
                            )

                    )

                [4] => Array
                    (
                        [attribute_id] => 4
                        [attribute_name] => Kích thước
                        [attribute_value] => Array
                            (
                                [0] => Lớn
                                [1] => Nhỏ
                                [2] => Rất Nhỏ
                                [3] => Vừa
                            )

                    )

            )            
            ------------------------- $result Array -------------------------
            $result --------- Array
            (
                [1] => Array
                    (
                        [0] => Tím
                        [1] => Xanh
                        [2] => Đỏ
                    )

                [2] => Array
                    (
                        [0] => Slogan 1
                        [1] => Slogan 2
                        [2] => Slogan 3
                        [3] => Slogan Custom
                    )

                [3] => Array
                    (
                        [0] => Inox
                        [1] => Nhựa
                        [2] => Vải
                        [3] => Đá
                    )

                [4] => Array
                    (
                        [0] => Lớn
                        [1] => Nhỏ
                        [2] => Rất Nhỏ
                        [3] => Vừa
                    )

            )        
        // 02. Function 02

    3.0 Compare 2 Multidimensional Array
        // 03. Function 01
            ------------------------- $arrSource_1 Array -------------------------
            $arrSource_1 --------- Array
            (
                [0] => Array
                    (
                        [attribute_id] => 3
                        [attribute_name] => Chất liệu
                    )

                [1] => Array
                    (
                        [attribute_id] => 8
                        [attribute_name] => ds
                    )

                [2] => Array
                    (
                        [attribute_id] => 9
                        [attribute_name] => da
                    )

                [3] => Array
                    (
                        [attribute_id] => 10
                        [attribute_name] => sadsadio
                    )

                [4] => Array
                    (
                        [attribute_id] => 11
                        [attribute_name] => sndaonoids
                    )
            )
            ------------------------- $arrSource_2 Array -------------------------
            $arrSource_2 --------- Array
            (
                [0] => Array
                    (
                        [attribute_id] => 1
                        [attribute_name] => Màu sắc
                    )

                [1] => Array
                    (
                        [attribute_id] => 3
                        [attribute_name] => Chất liệu
                    )

            )
            ------------------------- $result Array -------------------------
            $result --------- Array
            (
                [0] => Chất liệu
            )
        // 03. Function 01
    4.0 Implode A Value Array in Multidimensional Array
        // 04. Function 01
            public static function implode_Multidi_Array_01($arrSource=null,$typeImplode='attribute_value')
            ------------------------- $arrSource Array -------------------------
            (
                [1] => Array
                    (
                        [attribute_id] => 1
                        [attribute_name] => Màu sắc
                        [attribute_value] => Array
                            (
                                [0] => Xanh
                                [1] => Đỏ
                            )

                    )

                [3] => Array
                    (
                        [attribute_id] => 3
                        [attribute_name] => Chất liệu
                        [attribute_value] => Array
                            (
                                [0] => Nhựa
                                [1] => Inox
                                [2] => Vải
                            )

                    )

                [4] => Array
                    (
                        [attribute_id] => 4
                        [attribute_name] => Kích thước
                        [attribute_value] => Array
                            (
                                [0] => Nhỏ
                                [1] => Vừa
                                [2] => Lớn
                            )

                    )

                [2] => Array
                    (
                        [attribute_id] => 2
                        [attribute_name] => Slogan
                        [attribute_value] => Slogan 1
                    )

            )
            ------------------------- $result Array -------------------------
            $result -------- Array
            (
                [1] => Array
                    (
                        [attribute_id] => 1
                        [attribute_name] => Màu sắc
                        [attribute_value] => Xanh,Đỏ
                    )

                [3] => Array
                    (
                        [attribute_id] => 3
                        [attribute_name] => Chất liệu
                        [attribute_value] => Nhựa,Inox,Vải
                    )

                [4] => Array
                    (
                        [attribute_id] => 4
                        [attribute_name] => Kích thước
                        [attribute_value] => Nhỏ,Vừa,Lớn
                    )

                [2] => Array
                    (
                        [attribute_id] => 2
                        [attribute_name] => Slogan
                        [attribute_value] => Slogan 1
                    )

            )
        // 04. Function 01

    4.0 Fix Array
        // 01. Function 01
        $list_attribute === Array
        (
            [1] => Array
                (
                    [0] => Array
                        (
                            [value] => vàng
                        )

                    [1] => Array
                        (
                            [value] => trắng
                        )

                    [2] => Array
                        (
                            [value] => xanh
                        )

                )

            [2] => Array
                (
                    [0] => Array
                        (
                            [value] => rất lớn
                        )

                    [1] => Array
                        (
                            [value] => lớn
                        )

                    [2] => Array
                        (
                            [value] => vừa
                        )

                )

        )

        $list_attribute === Array
        (
            [1] => Array
                (
                    [0] => vàng
                    [1] => trắng
                    [2] => xanh
                )

            [2] => Array
                (
                    [0] => rất lớn
                    [1] => lớn
                    [2] => vừa
                )

        )
    
    




    
    
    







        //*/
?>