<?php

namespace App\Helpers;

use App\Models\CategoryModel;
use Illuminate\Support\Facades\Config;

class Template
{
    public static function share($items, $url,$page,$position)
    {
        $html = '';
        if(in_array($page,$items['page']) && $position==$items['placement']) {
            foreach ($items['app'] as $name) {
                switch ($name) {
                    case "facebook":
                        $link = "http://www.facebook.com/sharer.php?u=";
                        break;

                    case "twitter":
                        $link = "http://www.twitter.com/sharer.php?u=";
                        break;


                    case "pinterest":
                        $link = "http://www.pinterest.com/sharer.php?u=";
                        break;

                }
                $html .= sprintf('<a target="_blank" href="%s">
                                <img width="30" src="%s" alt="">
                            </a>', $link . $url, asset('images/logo/' . $name . '.png'));
            }
        }

        return $html;
    }

    public static function randomDateForSeeding()
    {
        $timestamp = rand(strtotime("Jan 01 2021"), strtotime("Dec 12 2021"));
        return date("Y-m-d H:i:s", $timestamp);
    }

    public static function format_price($num, $type = 'dollar')
    {
        switch ($type) {
            case 'dollar':
                $result = "$" . number_format($num, 0, ',', '.');
                break;
            case 'vietnamese dong':
                $result = number_format($num, 0, ',', '.') . " <u>đ</u>";
                break;
            default:
                $result = "$" . number_format($num, 0, ',', '.');
                break;
        }

        return $result;
    }

    public static function showFileManager($thumb)
    {
        $img = sprintf('<img id="holder" src="%s" style="margin-top:15px;max-height:100px;">', !empty($thumb) ? asset($thumb) : '');
        $html = sprintf('
            <div class="input-group">
                <span class="input-group-btn">
                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                    <i class="fa fa-picture-o"></i> Choose
                    </a>
                </span>
                <input id="thumbnail" class="form-control" type="text" name="thumb" value="%s">
            </div>
            %s
            
            ', $thumb, $img);
        return $html;
    }

    public static function showButtonFilter($controllerName, $itemsStatusCount, $currentFilterStatus, $paramsSearch)
    { // $currentFilterStatus active inactive all
        $xhtml = null;
        $tmplStatus = Config::get('zvn.template.status');

        if (count($itemsStatusCount) > 0) {
            /* array_unshift($itemsStatusCount, [
                    'count' => array_sum(array_column($itemsStatusCount, 'count')),
                    'status' => 'all'
                ]);*/

            foreach ($itemsStatusCount as $item) {  // $item = [count,status]
                $statusValue = $item['status'];  // active inactive block
                $statusValue = array_key_exists($statusValue, $tmplStatus) ? $statusValue : 'default';

                $currentTemplateStatus = $tmplStatus[$statusValue]; // $value['status'] inactive block active
                $link = route($controllerName) . "?filter_status=" . $statusValue;

                if ($paramsSearch['value'] !== '') {
                    $link .= "&search_field=" . $paramsSearch['field'] . "&search_value=" . $paramsSearch['value'];
                }
                $class = $currentTemplateStatus['class'];

                $active = ($currentFilterStatus == $statusValue) ? ' active' : '';
                $xhtml .= sprintf('<a href="%s" type="button" class="btn %s">
                                    %s <span class="badge bg-white">%s</span>
                                </a>', $link, $class . $active, $currentTemplateStatus['name'], $item['count']);
            }
        }

        return $xhtml;
    }

    public static function showAreaSearch($controllerName, $paramsSearch)
    {
        $xhtml = null;
        $tmplField = Config::get('zvn.template.search');
        $fieldInController = Config::get('zvn.config.search');

        $controllerName = (array_key_exists($controllerName, $fieldInController)) ? $controllerName : 'default';
        $xhtmlField = null;

        foreach ($fieldInController[$controllerName] as $field) {// all id
            $xhtmlField .= sprintf('<li><a href="#" class="select-field" data-field="%s">%s</a></li>', $field, $tmplField[$field]['name']);
        }

        $searchField = (in_array($paramsSearch['field'], $fieldInController[$controllerName])) ? $paramsSearch['field'] : "all";

        $xhtml = sprintf('
            <div class="input-group">
                <div class="input-group-btn">
                    <button type="button" class="btn btn-default dropdown-toggle btn-active-field" data-toggle="dropdown" aria-expanded="false">
                        %s <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right" role="menu">
                        %s
                    </ul>
                </div>
                <input type="text" name="search_value" value="%s" class="form-control" >
                <input type="hidden" name="search_field" value="%s">
                <span class="input-group-btn">
                    <button id="btn-clear-search" type="button" class="btn btn-success" style="margin-right: 0px">Xóa tìm kiếm</button>
                    <button id="btn-search" type="button" class="btn btn-primary">Tìm kiếm</button>
                </span>
            </div>', $tmplField[$searchField]['name'], $xhtmlField, $paramsSearch['value'], $searchField);
        return $xhtml;
    }

    public static function showItemHistory($by, $time, $type='both')
    {
        if ($type == 'both') {
            $xhtml = sprintf('
                <p><i class="fa fa-user"></i> %s</p>
                <p><i class="fa fa-clock-o"></i> %s</p>', 
                $by, date(Config::get('zvn.format.long_time'), strtotime($time))
            );
        } else {
            $xhtml = sprintf('
                <p><i class="fa fa-clock-o"></i> %s</p>', 
                date(Config::get('zvn.format.long_time'), strtotime($time))
            );
        }
        
        return $xhtml;
    }

    public static function showItemStatus($controllerName, $id, $statusValue)
    {
        $tmplStatus = Config::get('zvn.template.status');
        $statusValue = array_key_exists($statusValue, $tmplStatus) ? $statusValue : 'default';
        $currentTemplateStatus = $tmplStatus[$statusValue];
        $link = route($controllerName . '/status', ['status' => $statusValue, 'id' => $id]);

        $xhtml = sprintf(
            '<a href="%s" type="button" class="btn-status btn btn-round %s" data-class="%s">%s</a>', $link, $currentTemplateStatus['class'], $currentTemplateStatus['class'], $currentTemplateStatus['name']);
        return $xhtml;
    }

    public static function showItemIsHome($controllerName, $id, $isHomeValue)
    {
        $tmplIsHome = Config::get('zvn.template.is_home');
        $isHomeValue = array_key_exists($isHomeValue, $tmplIsHome) ? $isHomeValue : 'yes';
        $currentTemplateIsHome = $tmplIsHome[$isHomeValue];
        $link = route($controllerName . '/isHome', ['is_home' => $isHomeValue, 'id' => $id]);

        $xhtml = sprintf(
            '<a href="%s" type="button" class="btn btn-round %s">%s</a>', $link, $currentTemplateIsHome['class'], $currentTemplateIsHome['name']);
        return $xhtml;
    }

    public static function showItemSelect($controllerName, $id, $displayValue, $fieldName)
    {
        $link = route($controllerName . '/' . $fieldName, [$fieldName => 'value_new', 'id' => $id]);

        $tmplDisplay = Config::get('zvn.template.' . $fieldName);
        $xhtml = sprintf('<select name="select_change_attr" data-url="%s" class="form-control select-ajax">', $link);

        foreach ($tmplDisplay as $key => $value) {
            $xhtmlSelected = '';
            if ($key == $displayValue) $xhtmlSelected = 'selected="selected"';
            $xhtml .= sprintf('<option value="%s" %s>%s</option>', $key, $xhtmlSelected, $value['name']);
        }
        $xhtml .= '</select>';

        return $xhtml;
    }

    public static function showItemThumb($controllerName, $thumbName, $thumbAlt)
    {
        $xhtml = sprintf(
            '<img width=100 src="%s" alt="%s" class="zvn-thumb">', asset("$thumbName"), $thumbAlt);
        return $xhtml;
    }

    public static function showButtonAction($controllerName, $id)
    {
        $tmplButton = Config::get('zvn.template.button');
        $buttonInArea = Config::get('zvn.config.button');

        $controllerName = (array_key_exists($controllerName, $buttonInArea)) ? $controllerName : "default";
        $listButtons = $buttonInArea[$controllerName]; // ['edit', 'delete']

        $xhtml = '<div class="zvn-box-btn-filter">';

        foreach ($listButtons as $btn) {
            $currentButton = $tmplButton[$btn];

            $link = route($controllerName . $currentButton['route-name'], ['id' => $id]);
            $xhtml .= sprintf(
                '<a href="%s" type="button" class="btn btn-icon %s" data-toggle="tooltip" data-placement="top" 
                    data-original-title="%s">
                    <i class="fa %s"></i>
                </a>', $link, $currentButton['class'], $currentButton['title'], $currentButton['icon']);
        }

        $xhtml .= '</div>';

        return $xhtml;
    }

    public static function showDatetimeFrontend($dateTime, $style = "short_time")
    {
        $time = Config::get('zvn.format.' . $style);
        return date_format(date_create($dateTime), $time);
    }

    public static function showContent($content, $length, $prefix = '...')
    {
        $prefix = ($length == 0) ? '' : $prefix;
        $content = str_replace(['<p>', '</p>'], '', $content);
        return preg_replace('/\s+?(\S+)?$/', '', substr($content, 0, $length)) . $prefix;
    }

    public static function showBoxDashboard($box)
    {
        $result = sprintf('<div class="tile-stats">
                                <div class="icon"><i class="fa fa-comments-o"></i></div>
                                <div class="count">%s</div>
                                <h3>%s</h3>
                                <p><a href="%s">Xem chi tiết</a></p>
                            </div>', $box['name'], $box['total'], $box['link']);

        return $result;
    }

    public static function showItemOrdering($controllerName, $orderingValue, $id)
    {
        $link = route("$controllerName/ordering", ['ordering' => 'value_new', 'id' => $id]);
        $xhtml = sprintf('<input type="number" min="1" class="form-control ordering" id="ordering-%s" data-url="%s" value="%s" style="width: 60px">', $id, $link, $orderingValue);
        return $xhtml;
    }

    public static function showItemLink($controllerName, $linkValue, $id)
    {

        $link = route("$controllerName/link", ['link' => 'value_new', 'id' => $id]);
        $xhtml = sprintf('<input type="text" min="1" class="form-control link" id="link-%s" data-url="%s" value="%s" style="width: 300px">', $id, $link, $linkValue);
        return $xhtml;
    }

    public static function showNestedSetName($name, $level)
    {
        $xhtml = str_repeat('|------ ', $level);
        $xhtml .= sprintf('<span class="badge badge-danger p-1">%s</span> <strong>%s</strong>', $level + 1, $name);
        return $xhtml;
    }

    public static function showNestedSetUpDown($controllerName, $id)
    {
        $upButton = sprintf('
        <a href="%s" type="button" class="btn btn-primary mb-0" data-toggle="tooltip" title="" data-original-title="Up">
            <i class="fa fa-long-arrow-up"></i>
        </a>', route("$controllerName/move", ['id' => $id, 'type' => 'up']));

        $downButton = sprintf('
        <a href="%s" type="button" class="btn btn-primary mb-0" data-toggle="tooltip" title="" data-original-title="Down">
            <i class="fa fa-long-arrow-down"></i>
        </a>', route("$controllerName/move", ['id' => $id, 'type' => 'down']));

        $node = CategoryModel::find($id);

        if (empty($node->getPrevSibling()) || empty($node->getPrevSibling()->parent_id)) $upButton = '';
        if (empty($node->getNextSibling())) $downButton = '';

        $xhtml = '
        <span style="width: 36px; display: inline-block">' . $upButton . '</span>
        <span style="width: 36px; display: inline-block">' . $downButton . '</span>
        ';

        return $xhtml;
    }

    public static function showNestedMenu($items, &$xhtml)
    {
        foreach ($items as $item) {
            $link = URL::linkCategory($item['id'], $item['name']);
            if (count($item['children'])) {
                $xhtml .= '<li class="nav-item">';
                $xhtml .= sprintf('<a href="%s" class="nav-link dropdown-item">%s <span class="fa fa-caret-right"></span></a><ul class="submenu dropdown-menu">', $link, $item['name']);

                Template::showNestedMenu($item['children'], $xhtml);

                $xhtml .= '</ul></li>';
            } else {
                $xhtml .= sprintf('<li class="nav-item"><a class="nav-link dropdown-item" href="%s">%s</a></li>', $link, $item['name']);
            }
        }
    }

    public static function caculatorPriceFrontend($price, $price_sale, $sale = 0, $type = 1)
    {
        switch ($type) {
            case 1:
                $price_sale = self::format_price($price_sale, 'vietnamese dong');
                $xhtml = '<span class="new">' . $price_sale . ' </span>';

                if ($sale > 0) {
                    $price = self::format_price($price, 'vietnamese dong');
                    $xhtml .= '<span class="old">' . $price . ' </span>';
                }
                break;
            case 2:

                if ($sale > 0) {
                    $price = self::format_price($price, 'vietnamese dong');
                    $price_sale = self::format_price($price_sale, 'vietnamese dong');
                    $xhtml = '
                        <span class="deal-old-price">' . $price . ' </span>
                        <span>' . $price_sale . ' </span>
                    ';

                }
                // <span class="deal-old-price">$16.00 </span>
                // <span> $10.00</span>

                break;
            default:
                $price_sale = self::format_price($price_sale, 'vietnamese dong');
                $xhtml = '<span class="new">' . $price_sale . ' </span>';

                if ($sale > 0) {
                    $price = self::format_price($price, 'vietnamese dong');
                    $xhtml .= '<span class="old">' . $price . ' </span>';
                }
                break;
        }

        return $xhtml;
    }

    public static function getHtmlAttribute($product_id = null, $attribute, $list_attribute)
    {
        $xhtml = '';

        foreach ($attribute as $val) {
            $id = $val['id'];

            foreach ($list_attribute as $index => $result) {

                if ($id == $index) {
                    $name = $val['name'];
                    // echo $id;
                    $xhtml .= '
                        <div class="product-details-style shorting-style mt-30">
                        <label>' . $name . ' : </label>
                        <select data-product-id="' . $product_id . '" data-attribute-id="' . $id . '" name="attribute_' . $id . '">
                            <option value="default"> Chọn ' . $name . ' </option>
                    ';

                    foreach ($list_attribute as $index => $result) {
                        foreach ($result as $resultChild) {
                            if ($id == $index) {
                                $xhtml .= '<option value="' . $resultChild['value'] . '">' . $resultChild['value'] . '</option>';
                            } else {
                                break;
                            }
                        }
                    }

                    $xhtml .= '</select></div>';
                }
            }
        }

        return $xhtml;
    }

    public static function showRating($rating)
    {
        if (is_numeric($rating)) {
            $tru = 5 - $rating;
            $xhtml = '';
            for ($i = 0; $i < $rating; $i++) {
                $xhtml .= '<i class="ti-star theme-color"></i>';
            }

            for ($i = 0; $i < $tru; $i++) {
                $xhtml .= '<i class="ti-star"></i>';
            }
        }

        return $xhtml;

    }

    public static function createPaginationPublic(
        $currentPage, $lastPage, $perPage, $total, $search = null, $search_price = null
    )
    {
        if ($lastPage == 1) {
            $startItem = 1;
            $endItem = $total;

        } elseif ($lastPage > 1 && $currentPage == 1) {
            $startItem = 1;
            $endItem = $currentPage * $perPage;

        } elseif ($lastPage > 1 && $currentPage > 1 && $currentPage < $lastPage) {
            $startItem = ($currentPage - 1) * $perPage + 1;
            $endItem = $currentPage * $perPage;

        } elseif ($lastPage > 1 && $currentPage == $lastPage) {
            $startItem = ($currentPage - 1) * $perPage + 1;
            $endItem = $total;
        } elseif ($lastPage < $perPage) {
            $startItem = 1;
            $endItem = $total;
        }

        if ($search !== null) {
            $xhtml = "<label>Hiển thị <span>$startItem-$endItem</span> của <span>$total</span> 
            Kết quả - Tìm kiếm Tên SP = '{$search}'</label>";
        } elseif ($search_price !== null) {
            $xhtml = "<label>Hiển thị <span>$startItem-$endItem</span> của <span>$total</span>
            Kết quả - Tìm kiếm theo Giá từ {$search_price['min']}.000 <u>đ</u> đến {$search_price['max']}.000 <u>đ</u></label>";
        } else {
            $xhtml = "<label>Hiển thị <span>$startItem-$endItem</span> của <span>$total</span> Kết quả</label>";
        }

        return $xhtml;
    }

    public static function showItemCart($price, $class, $money='yes')
    {
        if ($money == 'yes') $price = self::format_price($price, 'vietnamese dong');
        $xhtml = '<span class="badge badge-'.$class.'">'.$price.'</span>';        
        return $xhtml;
    }

}
