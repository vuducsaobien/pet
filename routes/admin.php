<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
$prefixAdmin = config('zvn.url.prefix_admin');
Route::group(['prefix' => $prefixAdmin, 'namespace' => 'Admin', 'middleware' => ['permission.admin']], function () {
    // ============================== DASHBOARD ==============================
    $prefix         = 'dashboard';
    $controllerName = 'dashboard';
    $routes[$controllerName] = [];
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/',                             [ 'as' => $controllerName,                  'uses' => $controller . 'index' ]);
    });

    // ============================== SLIDER ==============================
    $prefix         = 'slider';
    $controllerName = 'slider';

    $routes[$controllerName] = ['form', 'save', 'delete', 'status'];
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/',                             [ 'as' => $controllerName,                  'uses' => $controller . 'index' ]);
        Route::get('form/{id?}',                    [ 'as' => $controllerName . '/form',        'uses' => $controller . 'form'])->where('id', '[0-9]+');
        Route::post('save',                         [ 'as' => $controllerName . '/save',        'uses' => $controller . 'save']);
        Route::get('delete/{id}',                   [ 'as' => $controllerName . '/delete',      'uses' => $controller . 'delete'])->where('id', '[0-9]+');
        Route::get('change-status-{status}/{id}',   [ 'as' => $controllerName . '/status',      'uses' => $controller . 'status'])->where('id', '[0-9]+');
    });

    // ============================== TESTIMONIAL ==============================
    $prefix         = 'testimonial';
    $controllerName = 'testimonial';

    $routes[$controllerName] = ['save', 'delete', 'status'];
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/',                             [ 'as' => $controllerName,                  'uses' => $controller . 'index' ]);
        Route::get('form/{id?}',                    [ 'as' => $controllerName . '/form',        'uses' => $controller . 'form'])->where('id', '[0-9]+');
        Route::post('save',                         [ 'as' => $controllerName . '/save',        'uses' => $controller . 'save']);
        Route::get('delete/{id?}',                   [ 'as' => $controllerName . '/delete',      'uses' => $controller . 'delete'])->where('id', '[0-9]+');
        Route::get('change-status-{status?}/{id?}',   [ 'as' => $controllerName . '/status',      'uses' => $controller . 'status'])->where('id', '[0-9]+');
    });

    // ============================== COMMENT ==============================
    $prefix         = 'comment';
    $controllerName = 'comment';

    $routes[$controllerName] = ['form', 'save', 'delete', 'status'];
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/',                             [ 'as' => $controllerName,                  'uses' => $controller . 'index' ]);
        Route::get('form/{id?}',                    [ 'as' => $controllerName . '/form',        'uses' => $controller . 'form'])->where('id', '[0-9]+');
        Route::post('save',                         [ 'as' => $controllerName . '/save',        'uses' => $controller . 'save']);
        Route::get('delete/{id}',                   [ 'as' => $controllerName . '/delete',      'uses' => $controller . 'delete'])->where('id', '[0-9]+');
        Route::get('change-status-{status}/{id}',   [ 'as' => $controllerName . '/status',      'uses' => $controller . 'status'])->where('id', '[0-9]+');
    });

    // ============================== CommentArticle ==============================
    $prefix         = 'commentArticle';
    $controllerName = 'commentArticle';

    $routes[$controllerName] = ['form', 'save', 'delete', 'status', 'move', 'isHome', 'display', 'ordering'];
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/',                             [ 'as' => $controllerName,                  'uses' => $controller . 'index' ]);
        Route::get('form/{id?}',                    [ 'as' => $controllerName . '/form',        'uses' => $controller . 'form'])->where('id', '[0-9]+');
        Route::post('save',                         [ 'as' => $controllerName . '/save',        'uses' => $controller . 'save']);
        Route::get('delete/{id}',                   [ 'as' => $controllerName . '/delete',      'uses' => $controller . 'delete'])->where('id', '[0-9]+');
        Route::get('change-status-{status}/{id}',       [ 'as' => $controllerName . '/status',      'uses' => $controller . 'status'])->where('id', '[0-9]+');
        Route::get('move-{type}/{id}', $controller . 'move')->name("$controllerName/move")->where('id', '[0-9]+');
        Route::get('change-is-home-{isHome}/{id}',      [ 'as' => $controllerName . '/isHome',      'uses' => $controller . 'isHome'])->where('id', '[0-9]+');
        Route::get('change-display-{display}/{id}',     [ 'as' => $controllerName . '/display',     'uses' => $controller . 'display']);
        Route::get('change-ordering-{ordering}/{id}',   [ 'as' => $controllerName . '/ordering',     'uses' => $controller . 'ordering']);
    });

    // ============================== PAYMENT ==============================
    $prefix         = 'payment';
    $controllerName = 'payment';

    $routes[$controllerName] = [$controllerName, 'form', 'save', 'delete', 'status'];
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/',                             [ 'as' => $controllerName,                  'uses' => $controller . 'index' ]);
        Route::get('form/{id?}',                    [ 'as' => $controllerName . '/form',        'uses' => $controller . 'form'])->where('id', '[0-9]+');
        Route::post('save',                         [ 'as' => $controllerName . '/save',        'uses' => $controller . 'save']);
        Route::get('delete/{id}',                   [ 'as' => $controllerName . '/delete',      'uses' => $controller . 'delete'])->where('id', '[0-9]+');
        Route::get('change-status-{status}/{id}',   [ 'as' => $controllerName . '/status',      'uses' => $controller . 'status'])->where('id', '[0-9]+');
    });

    // ============================== TEAM ==============================
    $prefix         = 'team';
    $controllerName = 'team';

    $routes[$controllerName] = ['form', 'save', 'delete', 'status'];
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/',                             [ 'as' => $controllerName,                  'uses' => $controller . 'index' ]);
        Route::get('form/{id?}',                    [ 'as' => $controllerName . '/form',        'uses' => $controller . 'form'])->where('id', '[0-9]+');
        Route::post('save',                         [ 'as' => $controllerName . '/save',        'uses' => $controller . 'save']);
        Route::get('delete/{id}',                   [ 'as' => $controllerName . '/delete',      'uses' => $controller . 'delete'])->where('id', '[0-9]+');
        Route::get('change-status-{status}/{id}',   [ 'as' => $controllerName . '/status',      'uses' => $controller . 'status'])->where('id', '[0-9]+');
    });

    // ============================== SHIPPING ==============================
    $prefix         = 'shipping';
    $controllerName = 'shipping';

    $routes[$controllerName] = ['form', 'save', 'delete', 'status'];
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/',                             [ 'as' => $controllerName,                  'uses' => $controller . 'index' ]);
        Route::get('form/{id?}',                    [ 'as' => $controllerName . '/form',        'uses' => $controller . 'form'])->where('id', '[0-9]+');
        Route::post('save',                         [ 'as' => $controllerName . '/save',        'uses' => $controller . 'save']);
        Route::get('delete/{id}',                   [ 'as' => $controllerName . '/delete',      'uses' => $controller . 'delete'])->where('id', '[0-9]+');
        Route::get('change-status-{status}/{id}',   [ 'as' => $controllerName . '/status',      'uses' => $controller . 'status'])->where('id', '[0-9]+');
    });
    
    // ============================== CUSTOMER ==============================
    $prefix         = 'customer';
    $controllerName = 'customer';

    $routes[$controllerName] = ['form', 'save', 'delete', 'status'];
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/',                             [ 'as' => $controllerName,                  'uses' => $controller . 'index' ]);
        Route::get('form/{id?}',                    [ 'as' => $controllerName . '/form',        'uses' => $controller . 'form'])->where('id', '[0-9]+');
        Route::post('save',                         [ 'as' => $controllerName . '/save',        'uses' => $controller . 'save']);
        Route::get('delete/{id}',                   [ 'as' => $controllerName . '/delete',      'uses' => $controller . 'delete'])->where('id', '[0-9]+');
        Route::get('change-status-{status}/{id}',   [ 'as' => $controllerName . '/status',      'uses' => $controller . 'status'])->where('id', '[0-9]+');
    });

    // ============================== CART ==============================
    $prefix         = 'cart';
    $controllerName = 'cart';

    $routes[$controllerName] = ['form', 'save', 'delete', 'status', 'view'];
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/',                             [ 'as' => $controllerName,                  'uses' => $controller . 'index' ]);
        Route::get('form/{id?}',                    [ 'as' => $controllerName . '/form',        'uses' => $controller . 'form'])->where('id', '[0-9]+');
        Route::post('save',                         [ 'as' => $controllerName . '/save',        'uses' => $controller . 'save']);
        Route::get('delete/{id}',                   [ 'as' => $controllerName . '/delete',      'uses' => $controller . 'delete'])->where('id', '[0-9]+');
        Route::get('view/{id}',                   [ 'as' => $controllerName . '/view',      'uses' => $controller . 'view'])->where('id', '[0-9]+');
        Route::get('change-status-{status}/{id}',   [ 'as' => $controllerName . '/status',      'uses' => $controller . 'status'])->where('id', '[0-9]+');
    });

    // ============================== DISCOUNT ==============================
    $prefix         = 'discount';
    $controllerName = 'discount';

    $routes[$controllerName] = ['form', 'save', 'delete', 'status'];
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/',                             [ 'as' => $controllerName,                  'uses' => $controller . 'index' ]);
        Route::get('form/{id?}',                    [ 'as' => $controllerName . '/form',        'uses' => $controller . 'form'])->where('id', '[0-9]+');
        Route::post('save',                         [ 'as' => $controllerName . '/save',        'uses' => $controller . 'save']);
        Route::get('delete/{id}',                   [ 'as' => $controllerName . '/delete',      'uses' => $controller . 'delete'])->where('id', '[0-9]+');
        Route::get('change-status-{status}/{id}',   [ 'as' => $controllerName . '/status',      'uses' => $controller . 'status'])->where('id', '[0-9]+');
    });

    // ============================== CATEGORY ==============================
    $prefix         = 'category';
    $controllerName = 'category';

    $routes[$controllerName] = ['form', 'save', 'delete', 'status', 'isHome', 'display', 'ordering', 'move'];
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/',                                 [ 'as' => $controllerName,                  'uses' => $controller . 'index' ]);
        Route::get('form/{id?}',                        [ 'as' => $controllerName . '/form',        'uses' => $controller . 'form'])->where('id', '[0-9]+');
        Route::post('save',                             [ 'as' => $controllerName . '/save',        'uses' => $controller . 'save']);
        Route::get('delete/{id}',                       [ 'as' => $controllerName . '/delete',      'uses' => $controller . 'delete'])->where('id', '[0-9]+');
        Route::get('change-status-{status}/{id}',       [ 'as' => $controllerName . '/status',      'uses' => $controller . 'status'])->where('id', '[0-9]+');
        Route::get('change-is-home-{isHome}/{id}',      [ 'as' => $controllerName . '/isHome',      'uses' => $controller . 'isHome'])->where('id', '[0-9]+');
        Route::get('change-display-{display}/{id}',     [ 'as' => $controllerName . '/display',     'uses' => $controller . 'display']);
        Route::get('change-ordering-{ordering}/{id}',   [ 'as' => $controllerName . '/ordering',     'uses' => $controller . 'ordering']);
        Route::get('move-{type}/{id}', $controller . 'move')->name("$controllerName/move")->where('id', '[0-9]+');
    });

    // ============================== ARTICLE ==============================
    $prefix         = 'article';
    $controllerName = 'article';

    $routes[$controllerName] = ['form', 'save', 'delete', 'status', 'type', 'change-category', 'sendMailToSubcribe'];
    Route::group(['prefix' =>  $prefix], function () use($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/',                                 [ 'as' => $controllerName,                  'uses' => $controller . 'index' ]);
        Route::get('form/{id?}',                        [ 'as' => $controllerName . '/form',        'uses' => $controller . 'form'])->where('id', '[0-9]+');
        Route::post('save',                             [ 'as' => $controllerName . '/save',        'uses' => $controller . 'save']);
        Route::get('delete/{id}',                       [ 'as' => $controllerName . '/delete',      'uses' => $controller . 'delete'])->where('id', '[0-9]+');
        Route::get('change-status-{status}/{id}',       [ 'as' => $controllerName . '/status',      'uses' => $controller . 'status']);
        Route::get('change-type-{type}/{id}',           [ 'as' => $controllerName . '/type',        'uses' => $controller . 'type']);
        Route::get('change-category-{category_id}/{id}', [ 'as' => $controllerName . '/change-category', 'uses' => $controller . 'changeCategory']);
        Route::get('send-email-article-{article_id}',   [ 'as' => $controllerName . '/sendMailToSubcribe', 'uses' => $controller . 'sendMailToSubcribe']);
    });

    // ============================== RECRUITMENT ==============================
    $prefix         = 'recruitment';
    $controllerName = 'recruitment';

    $routes[$controllerName] = ['form', 'save', 'delete', 'status', 'ordering'];
    Route::group(['prefix' =>  $prefix], function () use($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/',                                 [ 'as' => $controllerName,                  'uses' => $controller . 'index' ]);
        Route::get('form/{id?}',                        [ 'as' => $controllerName . '/form',        'uses' => $controller . 'form'])->where('id', '[0-9]+');
        Route::post('save',                             [ 'as' => $controllerName . '/save',        'uses' => $controller . 'save']);
        Route::get('delete/{id}',                       [ 'as' => $controllerName . '/delete',      'uses' => $controller . 'delete'])->where('id', '[0-9]+');
        Route::get('change-status-{status}/{id}',       [ 'as' => $controllerName . '/status',      'uses' => $controller . 'status']);
        Route::get('change-ordering-{ordering}/{id}',   [ 'as' => $controllerName . '/ordering',     'uses' => $controller . 'ordering']);
    });

    // ============================== FAQ ==============================
    $prefix         = 'faq';
    $controllerName = 'faq';

    $routes[$controllerName] = ['form', 'save', 'delete', 'status', 'ordering'];
    Route::group(['prefix' =>  $prefix], function () use($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/',                                 [ 'as' => $controllerName,                  'uses' => $controller . 'index' ]);
        Route::get('form/{id?}',                        [ 'as' => $controllerName . '/form',        'uses' => $controller . 'form'])->where('id', '[0-9]+');
        Route::post('save',                             [ 'as' => $controllerName . '/save',        'uses' => $controller . 'save']);
        Route::get('delete/{id}',                       [ 'as' => $controllerName . '/delete',      'uses' => $controller . 'delete'])->where('id', '[0-9]+');
        Route::get('change-status-{status}/{id}',       [ 'as' => $controllerName . '/status',      'uses' => $controller . 'status']);
        Route::get('change-ordering-{ordering}/{id}',   [ 'as' => $controllerName . '/ordering',     'uses' => $controller . 'ordering']);
    });
    
        // ============================== USER ==============================
    $prefix         = 'user';
    $controllerName = 'user';

    $routes[$controllerName] = [
        'form', 'save', 'delete', 'status', 'change-password', 'change-level', 'level', 
        'change-logged-password', 'post-change-logged-password'
    ];
    Route::group(['prefix' =>  $prefix], function () use($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/',                                 [ 'as' => $controllerName,                  'uses' => $controller . 'index' ]);
        Route::get('form/{id?}',                        [ 'as' => $controllerName . '/form',        'uses' => $controller . 'form'])->where('id', '[0-9]+');
        Route::post('save',                             [ 'as' => $controllerName . '/save',        'uses' => $controller . 'save']);
        Route::get('delete/{id}',                       [ 'as' => $controllerName . '/delete',      'uses' => $controller . 'delete'])->where('id', '[0-9]+');
        Route::get('change-status-{status}/{id}',       [ 'as' => $controllerName . '/status',      'uses' => $controller . 'status']);
        Route::post('change-password',                  [ 'as' => $controllerName . '/change-password',        'uses' => $controller . 'changePassword']);
        Route::post('change-level',                     [ 'as' => $controllerName . '/change-level',        'uses' => $controller . 'changeLevel']);
        Route::get('change-level-{level}/{id}',         [ 'as' => $controllerName . '/level',      'uses' => $controller . 'level']);
        Route::get('change-logged-password',            ['as' => "$controllerName/change-logged-password",      'uses' => $controller . 'changeLoggedPassword']);
        Route::post('post-change-logged-password',      ['as' => "$controllerName/post-change-logged-password", 'uses' => $controller . 'postChangeLoggedPassword']);
    });


    // ============================== MENU ============================== //
    $prefix         = 'menu';
    $controllerName = 'menu';

    $routes[$controllerName] = ['form', 'save', 'delete', 'status', 'ordering', 'type_menu', 'type_link', 'link'];
    Route::group(['prefix' => $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName) . 'Controller@';
        Route::get('/',                                 ['as' => $controllerName,                   'uses' => $controller . 'index']);
        Route::get('form/{id?}',                        ['as' => $controllerName . '/form',         'uses' => $controller . 'form'])->where('id', '[0-9]+');
        Route::post('save',                             ['as' => $controllerName . '/save',         'uses' => $controller . 'save']);
        Route::get('delete/{id}',                       ['as' => $controllerName . '/delete',       'uses' => $controller . 'delete'])->where('id', '[0-9]+');
        Route::get('change-status-{status}/{id}',       ['as' => $controllerName . '/status',       'uses' => $controller . 'status'])->where('id', '[0-9]+');
        Route::get('change-ordering-{ordering}/{id}',   ['as' => $controllerName . '/ordering',     'uses' => $controller . 'ordering'])->where('id', '[0-9]+');
        Route::get('change-type-menu-{type_menu}/{id}', ['as' => $controllerName . '/type_menu',    'uses' => $controller . 'typeMenu'])->where('id', '[0-9]+');
        Route::get('change-type-link-{type_link}/{id}', ['as' => $controllerName . '/type_link',    'uses' => $controller . 'typeLink'])->where('id', '[0-9]+');
        Route::get('change-link-{link}/{id}', ['as' => $controllerName . '/link',    'uses' => $controller . 'link'])->where(['id'=> '[0-9]+']);
    });

    // ============================== RSS ============================== //
    $prefix         = 'rss';
    $controllerName = 'rss';

    $routes[$controllerName] = ['form', 'save', 'delete', 'status', 'ordering'];
    Route::group(['prefix' => $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName) . 'Controller@';
        Route::get('/',                                 [ 'as' => $controllerName,                  'uses' => $controller . 'index' ]);
        Route::get('form/{id?}',                        [ 'as' => $controllerName . '/form',        'uses' => $controller . 'form'])->where('id', '[0-9]+');
        Route::post('save',                             [ 'as' => $controllerName . '/save',        'uses' => $controller . 'save']);
        Route::get('delete/{id}',                       [ 'as' => $controllerName . '/delete',      'uses' => $controller . 'delete'])->where('id', '[0-9]+');
        Route::get('change-status-{status}/{id}',       [ 'as' => $controllerName . '/status',      'uses' => $controller . 'status'])->where('id', '[0-9]+');
        Route::get('change-ordering-{ordering}/{id}',   [ 'as' => $controllerName . '/ordering',     'uses' => $controller . 'ordering']);
    });

    // ============================== GALLERY ============================== //
    $prefix         = 'gallery';
    $controllerName = 'gallery';

    $routes[$controllerName] = [];
    Route::group(['prefix' => $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName) . 'Controller@';
        Route::get('/',                                 [ 'as' => $controllerName,                  'uses' => $controller . 'index' ]);
    });

    // ============================== YOUTUBE PLAYLIST ============================== //
    $prefix         = 'youtube';
    $controllerName = 'youtube';

    $routes[$controllerName] = ['save'];
    Route::group(['prefix' => $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName) . 'Controller@';
        Route::get('/',                                 [ 'as' => $controllerName,                  'uses' => $controller . 'index' ]);
        Route::post('save',                             [ 'as' => $controllerName . '/save',        'uses' => $controller . 'save']);
    });

    // ============================== SETTING ============================== //
    $prefix         = 'setting';
    $controllerName = 'setting';

    $routes[$controllerName] = [
        'general_setting', 'social_setting', 'share_setting', 'email_account_setting',
        'email_bcc_setting', 'policy_setting'
    ];
    Route::group(['prefix' => $prefix], function () use ($controllerName){
        $controller = ucfirst($controllerName).'Controller@';
        Route::get('/',                         [ 'as' => $controllerName,                              'uses' => $controller . 'index' ]);
        Route::post('/general-setting',         [ 'as' => $controllerName . '/general_setting',         'uses' => $controller . 'general' ]);
        Route::post('/social-setting',          [ 'as' => $controllerName . '/social_setting',          'uses' => $controller . 'social' ]);
        Route::post('/share-setting',          [ 'as' => $controllerName . '/share_setting',          'uses' => $controller . 'share' ]);
        Route::post('/email-account-setting',   [ 'as' => $controllerName . '/email_account_setting',   'uses' => $controller . 'emailAccount' ]);
        Route::post('/email-bcc-setting',       [ 'as' => $controllerName . '/email_bcc_setting',       'uses' => $controller . 'emailBcc' ]);
        Route::post('/policy-setting',          [ 'as' => $controllerName . '/policy_setting',          'uses' => $controller . 'policy' ]);
    });

    // ============================== CONTACT ============================== //
    $prefix         = 'contact';
    $controllerName = 'contact';

    $routes[$controllerName] = ['status'];
    Route::group(['prefix' => $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName) . 'Controller@';
        Route::get('/',                                 [ 'as' => $controllerName,                  'uses' => $controller . 'index' ]);
        Route::get('change-status-{status}/{id}',       [ 'as' => $controllerName . '/status',      'uses' => $controller . 'status'])->where('id', '[0-9]+');
    });

    // ============================== SUBCRIBE ============================== //
    $prefix         = 'subcribe';
    $controllerName = 'subcribe';

    $routes[$controllerName] = ['delete', 'status'];
    Route::group(['prefix' => $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName) . 'Controller@';
        Route::get('/',                                 [ 'as' => $controllerName,                  'uses' => $controller . 'index' ]);
        Route::get('change-status-{status}/{id}',       [ 'as' => $controllerName . '/status',      'uses' => $controller . 'status'])->where('id', '[0-9]+');
        Route::get('delete/{id}',                       ['as' => $controllerName . '/delete',       'uses' => $controller . 'delete'])->where('id', '[0-9]+');
    });    

    // ============================== CONTACT ============================== //
    $prefix = 'logs';
    Route::group(['prefix' => $prefix], function () {
        Route::get('/', function () {
            $controllerName='';
            return view('admin.pages.logs.index',compact('controllerName'));
        })->name('logs');
    });
    /*================================= ATTRIBUTE =============================*/

    $prefix         = 'attribute';
    $controllerName = 'attribute';

    $routes[$controllerName] = ['form', 'save', 'delete', 'status', 'ordering'];
    Route::group(['prefix' => $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName) . 'Controller@';
        Route::get('/',                                 ['as' => $controllerName,                   'uses' => $controller . 'index']);
        Route::get('form/{id?}',                        ['as' => $controllerName . '/form',         'uses' => $controller . 'form'])->where('id', '[0-9]+');
        Route::post('save',                             ['as' => $controllerName . '/save',         'uses' => $controller . 'save']);
        Route::get('delete/{id}',                       ['as' => $controllerName . '/delete',       'uses' => $controller . 'delete'])->where('id', '[0-9]+');
        Route::get('change-status-{id}/{status}',       ['as' => $controllerName . '/status',       'uses' => $controller . 'status'])->where('id', '[0-9]+');
        Route::get('change-ordering-{ordering}/{id}',   ['as' => $controllerName . '/ordering',     'uses' => $controller . 'ordering'])->where('id', '[0-9]+');

    });

    /*================================= PRODUCT =============================*/
    $prefix         = 'product';
    $controllerName = 'product';

    $routes[$controllerName] = [
        'form', 'save', 'delete', 'status', 'get-image', 'image', 'ordering', 'change-category', 
        'change-info', 'change-category-edit', 'change-price', 'change-attribute', 'change-dropzone'
    ];
    Route::group(['prefix' => $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName) . 'Controller@';
        Route::get('/',                                 ['as' => $controllerName,                   'uses' => $controller . 'index']);
        Route::get('form/{id?}',                        ['as' => $controllerName . '/form',         'uses' => $controller . 'form'])->where('id', '[0-9]+');
        Route::post('save',                             ['as' => $controllerName . '/save',         'uses' => $controller . 'save']);
        Route::get('delete/{id}',                       ['as' => $controllerName . '/delete',       'uses' => $controller . 'delete'])->where('id', '[0-9]+');
        Route::get('change-status-{status}/{id}',       ['as' => $controllerName . '/status',       'uses' => $controller . 'status'])->where('id', '[0-9]+');
        Route::get('image/{id}',                             ['as' => $controllerName . '/get-image',         'uses' => $controller . 'getImage']);
        Route::post('image',                             ['as' => $controllerName . '/image',         'uses' => $controller . 'image']);
        Route::get('change-ordering-{ordering}/{id}',   ['as' => $controllerName . '/ordering',     'uses' => $controller . 'ordering'])->where('id', '[0-9]+');
        Route::get('change-category-{category_id}/{id}', [ 'as' => $controllerName . '/change-category', 'uses' => $controller . 'changeCategory']);
        //route for edit product
        Route::post('change-info', [ 'as' => $controllerName . '/change-info', 'uses' => $controller . 'changeInfo']);
        Route::post('change-category', [ 'as' => $controllerName . '/change-category-edit', 'uses' => $controller . 'changeInfo']);
        Route::post('change-price', [ 'as' => $controllerName . '/change-price', 'uses' => $controller . 'changeInfo']);
        Route::post('change-attribute', [ 'as' => $controllerName . '/change-attribute', 'uses' => $controller . 'changeAttribute']);
        Route::post('change-dropzone', [ 'as' => $controllerName . '/change-dropzone', 'uses' => $controller . 'changeInfo']);
    });

    /*================================= multi language =============================*/
    Route::get('/language/{locale}', function ($locale) {
        if (! in_array($locale, ['en', 'es', 'vi'])) {
            abort(400);
        }
        session(['language' => $locale]);
        return redirect()->back();
    })->name('language');

    foreach ($routes as $key => $value) {
        foreach ($value as $keyC => $valueC) {
            $routes[$key][$keyC] = $key . '/' . $valueC;
        }
        array_push($routes[$key], $key);
    }
    // echo '<pre style="color:red";>$routes === '; print_r($routes);echo '</pre>';
    // echo '<h3>Die is Called </h3>';die;

});