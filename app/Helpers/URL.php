<?php

namespace App\Helpers;
use Illuminate\Support\Str;

class URL
{
    
    public static function linkCategory($category)
    {
        return route('category/index', [
            'category_slug' => $category->slug,
        ]);
    }

    public static function linkCategoryArray($category)
    {
        return route('category/index', [
            'category_slug' => $category,
        ]);
    }


    public static function linkArticle($article)
    {
        return route('article/detail', [
            'article_slug' => $article->slug
        ]);

    }

    public static function linkProduct($product, $type='index')
    {
        switch ($type) {
            case 'index':
                $params = [
                    'product_slug' => $product['slug'],
                    'product_id'   => $product['id']
                ];
                break;
            case 'addToCart':
                $params = [
                    'product_id'      => 'product_id',
                    'quantity'        => 'quantity',
                    'price'           => 'price',
                    'total_price'     => 'total_price',
                    'attribute_id'    => 'attribute_id',
                    'attribute_value' => 'attribute_value',
                ];
                break;
        }
        return route("product/$type", $params);

    }
    
    public static function linkModal($product_id)
    {
        return route('product/modal', [
            'id'   => $product_id
        ]);

    }

}