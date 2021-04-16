<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;

$prefixNews  = config('zvn.url.prefix_news');

Route::get('', [ 'as' => 'HomeController', 'uses' => 'News\HomeController@' . 'index' ]);

Route::group(['prefix' => $prefixNews, 'namespace' => 'News'], function () {

    // ============================== HOMEPAGE ==============================
    $controllerName = 'home';
    if ($controllerName == 'home') {
        $prefix         = '';

        Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
            $controller = ucfirst($controllerName)  . 'Controller@';
            Route::get('/',                             [ 'as' => $controllerName,                  'uses' => $controller . 'index' ]);
            Route::get('/not-found',                    [ 'as' => $controllerName. '/not-found',                  'uses' => $controller . 'notFound' ]);
        });
    }

    // ====================== ARTICLE ========================
    $prefix         = 'bai-viet';
    $controllerName = 'article';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';

        Route::get('/list-blog.html',  
        [ 'as' => $controllerName . '/index', 'uses' => $controller . 'index' ]);

         Route::get('{article_slug}.html',
         [ 'as' => $controllerName . '/detail', 'uses' => $controller . 'detail' ])
         ->where('article_slug', '[0-9a-zA-Z_-]+');

        Route::post('list-blog.html',
            [ 'as' => $controllerName . '/postComment', 'uses' => $controller . 'postComment' ])
            ->where('article_slug', '[0-9a-zA-Z_-]+');

        /* Route::get('/blog.html',
        [ 'as' => $controllerName . '/detail', 'uses' => $controller . 'detail' ]);*/

    });

    // ============================== 06. RSS ==============================
    $prefix         = 'tin-tuc-online';
    $controllerName = 'rss';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/',       ['as' => $controllerName.'/index',     'uses' => $controller . 'index']);
        Route::get('/get-gold', ['as' => $controllerName.'/get-gold',     'uses' => $controller . 'getGold']);
        Route::get('/get-coin', ['as' => $controllerName.'/get-coin',     'uses' => $controller . 'getCoin']);
    });

    // ============================== 06. RSS ==============================
    $prefix         = 'tuyen-dung';
    $controllerName = 'recruitment';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';

        Route::get('/', [
            'as' => $controllerName.'/index',
            'uses' => $controller . 'index'
        ]);
        
        Route::get('{recruitment_slug}.html', [
            'as' => $controllerName . '/detail', 
            'uses' => $controller . 'detail' 
        ])->where('recruitment_slug', '[0-9a-zA-Z_-]+');

    });    

    // ============================== 06. FAQ ==============================
    $prefix         = 'cau-hoi-thuong-gap';
    $controllerName = 'faq';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';

        Route::get('/', ['as' => $controllerName. '/index',     'uses' => $controller . 'index']);
    });    


    // ====================== Category page ========================
    $controllerName = 'category';
    if ($controllerName == 'category') {
        $prefix         = '';

        Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
            $controller = ucfirst($controllerName)  . 'Controller@';

            Route::get('/{category_slug}/search', [ 'as' => $controllerName . '/search', 'uses' => $controller . 'search' ]);
            Route::get('{category_slug}.html', [ 'as' => $controllerName . '/index', 'uses' => $controller . 'index' ]);
            Route::get('/{category_slug}/tags={tag_name}', [ 'as' => $controllerName . '/tags', 'uses' => $controller . 'tags' ]);
            Route::get('/{category_slug}/brand={brand_name}', [ 'as' => $controllerName . '/brand', 'uses' => $controller . 'brand' ]);
        });
    }
    
    // ====================== Product page ========================
    $prefix         = 'food';
    $controllerName = 'product';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';

        Route::get('{product_slug}-food-{product_id}.html',
        [ 'as' => $controllerName . '/index', 'uses' => $controller . 'index' ])
        ->where('product_slug', '[0-9a-zA-Z_-]+');

        Route::get('modal-image/{product_id}', 
        ['as' => $controllerName . '/modal', 'uses' => $controller . 'get_image_modal'])->where('id', '[0-9]+');

        Route::get('addToCart/{product_id}-{quantity}-{price}-{total_price}-{attribute_id}-{attribute_value}', 
        ['as' => $controllerName . '/addToCart', 'uses' => $controller . 'addToCart'])->where('id', '[0-9]+');
        Route::get('{coupon_name?}/{total_price?}', 
        ['as' => $controllerName . '/coupon', 'uses' => $controller . 'coupon']);

    });
    

    // ============================== NOTIFY ==============================
    $prefix         = '';
    $controllerName = 'notify';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/no-permission',                             [ 'as' => $controllerName . '/noPermission',                  'uses' => $controller . 'noPermission' ]);
    });

    // ====================== LOGIN ========================
    // news69/login
    $prefix         = '';
    $controllerName = 'auth';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/login',        ['as' => $controllerName.'/login',      'uses' => $controller . 'login'])->middleware('check.login');;
        Route::post('/postLogin',   ['as' => $controllerName.'/postLogin',  'uses' => $controller . 'postLogin']);

        // ====================== LOGOUT ========================
        Route::get('/logout',       ['as' => $controllerName.'/logout',     'uses' => $controller . 'logout']);
    });

    // // ============================== CONTACT ============================== //
    $prefix         = 'lien-he';
    $controllerName = 'contact';
    Route::group(['prefix' => $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName) . 'Controller@';
        // Route::get('/', [ 'as' => $controllerName . '/index', 'uses' => $controller . 'index' ]);
        Route::get('/', [ 'as' => $controllerName . '/web', 'uses' => $controller . 'index' ]);

        Route::post('/post-contact',                 [ 'as' => $controllerName . '/post_contact',                  'uses' => $controller . 'postContact' ]);
        Route::get('/thank-you.html',                 [ 'as' => $controllerName . '/thankyou',                  'uses' => $controller . 'thankyou' ]);
    });

    // ====================== ABOUT US ========================
    $prefix         = 'gioi-thieu';
    $controllerName = 'about';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';

        Route::get('/',[ 'as' => $controllerName . '/web', 'uses' => $controller . 'index' ]);
    });

    // ====================== POLICY - USE ========================
    $prefix         = 'chinh-sach';
    $controllerName = 'policy';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';

        Route::get('/dieu-khoan-su-dung.html',[ 'as' => $controllerName . '/use', 'uses' => $controller . 'use' ]);
        Route::get('/chinh-sach-doi-hang.html',[ 'as' => $controllerName . '/exchange', 'uses' => $controller . 'exchange' ]);
        Route::get('/huong-dan-mua-hang.html',[ 'as' => $controllerName . '/shopping', 'uses' => $controller . 'shopping' ]);
        Route::get('quan-diem-kinh-doanh.html',[ 'as' => $controllerName . '/business', 'uses' => $controller . 'business' ]);
    });

    // ============================== COMMENT ==============================
    $prefix         = 'comment';
    $controllerName = 'comment';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::post('addComment/{product_id}',      [ 'as' => $controllerName . '/addCommentProduct',  'uses' => $controller . 'addComment'])
        // ->where('product_id', '[0-9]+');
        ;
    });
    
    // ============================== CART ==============================
    $prefix         = 'cart';
    $controllerName = 'cart';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName) . 'Controller@';

        Route:: get('/', ['as' => $controllerName . 'Front', 'uses' => $controller . 'index' ]);
        Route:: post('/post-order',     ['as' => $controllerName . '/order',    'uses' => $controller . 'postOrder' ]);
        Route:: get('/thank-you.html',  ['as' => $controllerName . '/thankyou', 'uses' => $controller . 'thankyou' ]);

    });

    // ============================== CART ==============================
    $prefix         = 'checkout';
    $controllerName = 'checkout';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName) . 'Controller@';

        Route::get('/', [ 'as' => $controllerName, 'uses' => $controller . 'index' ]);
    });

    // ============================== 07. LIBRARY - IMAGE ==============================
    $prefix         = 'thu-vien/hinh-anh';
    $controllerName = 'gallery';
    Route::group(['prefix' => $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName) . 'Controller@';
        
        Route::get('/', [ 'as' => $controllerName . '/web', 'uses' => $controller . 'index' ]);
    });
    
    // ============================== 07. LIBRARY - YOUTUBE - CLIPS ==============================
    $prefix         = 'thu-vien/video';
    $controllerName = 'youtube';
    Route::group(['prefix' => $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName) . 'Controller@';
        
        Route::get('/', [ 'as' => $controllerName . '/web', 'uses' => $controller . 'index' ]);
    });

});

