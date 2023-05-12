<?php
use Illuminate\Support\Facades\Route;
$namespace = 'App\Http\Controllers';

Route::get('/','Auth\LoginController@index')->name('index');
/*----------------------------------------------------------------------------------------------------------------------------
| ADMIN LOGIN
|----------------------------------------------------------------------------------------------------------------------------*/
    Route::get('/login/admin','Auth\LoginController@showAdminLoginForm')->name('admin.login');
    Route::get('/login/admin/forget-password','FrontendController@showAdminForgetPasswordForm')->name('admin.forget.password');
    Route::get('/login/admin/reset-password/{user}/{token}','FrontendController@showAdminResetPasswordForm')->name('admin.reset.password');
    Route::post('/login/admin/reset-password','FrontendController@AdminResetPassword')->name('admin.reset.password.change');
    Route::post('/login/admin/forget-password','FrontendController@sendAdminForgetPasswordMail');
    Route::get('/logout/admin','Admin\AdminDashboardController@adminLogout')->name('admin.logout');
    Route::post('/login/admin','Auth\LoginController@adminLogin');


Route::prefix('admin-home')->middleware(['setlang:backend','adminglobalVariable'])->group(function () {
    // Product Routes
    require_once __DIR__ . '/product.php';

    /*----------------------------------------------------------------------------------------------------------------------------
    | MEDIA UPLOAD ROUTE
    |----------------------------------------------------------------------------------------------------------------------------*/
    Route::controller(MediaUploadController::class)->prefix('media-upload')->group(function () {
        Route::post('/alt', 'alt_change_upload_media_file')->name('admin.upload.media.file.alt.change');
        Route::get('/page', 'all_upload_media_images_for_page')->name('admin.upload.media.images.page');
        Route::post('/delete', 'delete_upload_media_file')->name('admin.upload.media.file.delete');
    });


    /*----------------------------------------------------------------------------------------------------------------------------
   | ADMIN DASHBOARD ROUTES
   |----------------------------------------------------------------------------------------------------------------------------*/
    Route::controller(Admin\AdminDashboardController::class)->group(function () {
        //admin Profile
        Route::get('/settings', 'admin_settings')->name('admin.profile.settings');
        Route::get('/profile-update', 'admin_profile')->name('admin.profile.update');
        Route::post('/profile-update', 'admin_profile_update');
        Route::get('/password-change', 'admin_password')->name('admin.password.change');
        Route::post('/password-change', 'admin_password_chagne');
        //admin index
        Route::get('/', 'adminIndex')->name('admin.home');
        Route::get('/dark-mode-toggle', 'dark_mode_toggle')->name('admin.dark.mode.toggle');

        //navbar settings
        Route::get('/navbar-settings', "navbar_settings")->name('admin.navbar.settings');
        Route::post('/navbar-settings', "update_navbar_settings");

        //navbar settings
        Route::get('/navbar-settings', "navbar_settings")->name('admin.navbar.settings');

    });

    /*----------------------------------------------------------------------------------------------------------------------------
    | ADMIN USER ROLE MANAGE
    |----------------------------------------------------------------------------------------------------------------------------*/
    Route::controller(Admin\People\AdminRoleManageController::class)->prefix('admin')->group(function () {
        Route::get('/new-user', 'new_user')->name('admin.new.user');
        Route::post('/new-user', 'new_user_add');
        Route::get('/user-edit/{id}', 'user_edit')->name('admin.user.edit');
        Route::post('/user-update', 'user_update')->name('admin.user.update');
        Route::post('/user-password-change', 'user_password_change')->name('admin.user.password.change');
        Route::post('/delete-user/{id}', 'new_user_delete')->name('admin.delete.user');
        Route::get('/all', 'all_user')->name('admin.all.user');
        /*----------------------------
            ALL ADMIN ROLE ROUTES
        -----------------------------*/
        Route::get('/role', 'all_admin_role')->name('admin.all.admin.role');
        Route::get('/role/new', 'new_admin_role_index')->name('admin.role.new');
        Route::post('/role/new', 'store_new_admin_role');
        Route::get('/role/edit/{id}', 'edit_admin_role')->name('admin.user.role.edit');
        Route::post('/role/update', 'update_admin_role')->name('admin.user.role.update');
        Route::post('/role/delete/{id}', 'delete_admin_role')->name('admin.user.role.delete');
    });

        /*----------------------------------------------------------------------------------------------------------------------------
         |CUSTOMER MANAGE
        |----------------------------------------------------------------------------------------------------------------------------*/
        Route::controller(Admin\People\CustomerController::class)->prefix('customer')->group(function () {
            Route::get('/all', 'index')->name('admin.customer');
            Route::get('/new', 'add')->name('admin.customer.new');
            Route::get('/edit/{id}', 'edit')->name('admin.customer.edit');
            Route::post('/store', 'store')->name('admin.customer.store');
            Route::post('/update/{id}', 'update')->name('admin.customer.update');
            Route::post('/delete/{id}', 'delete')->name('admin.customer.delete');
            Route::post('/bulk-action', 'bulk_action')->name('admin.customer.bulk.action');
        });


        /*----------------------------------------------------------------------------------------------------------------------------
        |SUPPLIER MANAGE
        |----------------------------------------------------------------------------------------------------------------------------*/
            Route::controller(Admin\People\SupplierController::class)->prefix('supplier')->group(function () {
                Route::get('/all', 'index')->name('admin.supplier');
                Route::get('/new', 'add')->name('admin.supplier.new');
                Route::get('/edit/{id}', 'edit')->name('admin.supplier.edit');
                Route::post('/store', 'store')->name('admin.supplier.store');
                Route::post('/update/{id}', 'update')->name('admin.supplier.update');
                Route::post('/delete/{id}', 'delete')->name('admin.supplier.delete');
                Route::post('/bulk-action', 'bulk_action')->name('admin.supplier.bulk.action');
            });


        /*----------------------------------------------------------------------------------------------------------------------------
        |COUNTRY MANAGE
        |----------------------------------------------------------------------------------------------------------------------------*/
        Route::controller(Admin\Others\CountryController::class)->prefix('country')->group(function () {
            Route::get('/all', 'index')->name('admin.country');
            Route::post('/all', 'store');
            Route::post('/update', 'update')->name('admin.country.update');
            Route::post('/delete/{id}', 'delete')->name('admin.country.delete');
            Route::post('/bulk-action', 'bulk_action')->name('admin.country.bulk.action');
        });

        /*----------------------------------------------------------------------------------------------------------------------------
        |COLOR MANAGE
        |----------------------------------------------------------------------------------------------------------------------------*/
        Route::controller(Admin\Others\ColorController::class)->prefix('color')->group(function () {
            Route::get('/all', 'index')->name('admin.color');
            Route::post('/all', 'store');
            Route::post('/update', 'update')->name('admin.color.update');
            Route::post('/delete/{id}', 'delete')->name('admin.color.delete');
            Route::post('/bulk-action', 'bulk_action')->name('admin.color.bulk.action');
        });

        /*----------------------------------------------------------------------------------------------------------------------------
        |SIZE MANAGE
        |----------------------------------------------------------------------------------------------------------------------------*/
            Route::controller(Admin\Others\SizeController::class)->prefix('size')->group(function () {
                Route::get('/all', 'index')->name('admin.size');
                Route::post('/all', 'store');
                Route::post('/update', 'update')->name('admin.size.update');
                Route::post('/delete/{id}', 'delete')->name('admin.size.delete');
                Route::post('/bulk-action', 'bulk_action')->name('admin.size.bulk.action');
            });

        /*----------------------------------------------------------------------------------------------------------------------------
        |UNIT MANAGE
        |----------------------------------------------------------------------------------------------------------------------------*/
            Route::controller(Admin\Others\UnitController::class)->prefix('unit')->group(function () {
                Route::get('/all', 'index')->name('admin.unit');
                Route::post('/all', 'store');
                Route::post('/update', 'update')->name('admin.unit.update');
                Route::post('/delete/{id}', 'delete')->name('admin.unit.delete');
                Route::post('/bulk-action', 'bulk_action')->name('admin.unit.bulk.action');
            });

        /*----------------------------------------------------------------------------------------------------------------------------
        |COUPON MANAGE
        |----------------------------------------------------------------------------------------------------------------------------*/
            Route::controller(Admin\Product\ProductCouponController::class)->prefix('coupon')->group(function () {
                Route::get('/all', 'index')->name('admin.coupon');
                Route::post('/all', 'store');
                Route::post('/update', 'update')->name('admin.coupon.update');
                Route::post('/delete/{id}', 'delete')->name('admin.coupon.delete');
                Route::post('/bulk-action', 'bulk_action')->name('admin.coupon.bulk.action');
            });


        /*----------------------------------------------------------------------------------------------------------------------------
        |PRODUCT MANAGE
        |----------------------------------------------------------------------------------------------------------------------------*/
            Route::controller(Admin\Product\ProductController::class)->prefix('product')->group(function () {
                Route::get('/list', 'index')->name('admin.product');
                Route::get('/create', 'create')->name('admin.product.create');
                Route::post('/store', 'store')->name('admin.product.store');
                Route::get('/edit/{id}', 'edit')->name('admin.product.edit');
                Route::put('/update/{id}', 'update')->name('admin.product.update');
                Route::post('/clone', 'clone')->name('admin.product.clone');
                Route::post('/delete/{id}', 'delete')->name('admin.product.delete');
                Route::post('/bulk-action', 'bulk_action')->name('admin.product.bulk.action');

                //Ajax Routes
                Route::get('/get-subcategory-by-category-ajax', 'get_subcategory_by_category_ajax')->name('admin.product.get.subcategory.ajax');
                Route::get('/get-product-code-ajax', 'get_product_code_by_ajax')->name('admin.product.get.product.code.ajax');

                //Trash Product Routes
                Route::get('/trash-list', 'trash_product_list')->name('admin.product.trash');
                Route::get('/trash-restore/{id}', 'trash_product_restore')->name('admin.product.trash.restore');
                Route::post('/trash-delete/{id}', 'trash_product_delete')->name('admin.product.trash.delete');
                Route::post('/trash-bulk-delete', 'trash_product_bulk_action')->name('admin.product.trash.bulk.action');

            });



    /*----------------------------------------------------------------------------------------------------------------------------
     | POS ROUTE
    |----------------------------------------------------------------------------------------------------------------------------*/
    Route::controller(Admin\Pos\PosController::class)->prefix('pos')->group(function () {
        Route::get('/', 'index')->name('admin.pos');
        Route::get('/get-misc-contents-by-ajax', 'get_misc_contents_by_ajax')->name('admin.pos.get.misc.contents.by.ajax');
        Route::get('/get-products-by-misc-contents-ajax', 'get_products_by_misc_contents_ajax')->name('admin.pos.get.products.by.misc.contents.ajax');
        Route::get('/fetch-cart-data', 'fetch_all_cart_data')->name('admin.product.fetch.all.cart.data');
        Route::post('/add-to-cart', 'product_add_to_cart_pos')->name('admin.product.add.to.cart.pos');
        Route::post('/add-to-cart-plus-minus', 'product_add_to_cart_pos_plus_minus')->name('admin.product.add.to.cart.pos.plus.minus');
        Route::post('/cart-item-delete', 'product_pos_item_delete')->name('admin.product.cart.pos.item.delete');
        Route::post('/cart-discount-store', 'product_pos_discount_store')->name('admin.product.cart.pos.discount.store');
        Route::post('/cart-coupon-discount-store', 'coupon_discount_store')->name('admin.cart.pos.coupon.discount.store');
        Route::post('/cart-vat-tax-store', 'vat_tax_store')->name('admin.product.cart.pos.vat.tax.store');
        Route::post('/cart-shipping-store', 'shipping_store')->name('admin.product.cart.pos.shipping.store');
        Route::post('/cart-payable-store', 'payable_store')->name('admin.product.cart.pos.payable.store');
        Route::get('/cart-grand-total', 'cart_grand_total_calculation')->name('admin.product.cart.pos.grand.total');
        Route::post('/cart-customer-store', 'cart_customer_store')->name('admin.customer.ajax.store');
        Route::post('/order-store', 'cart_order_store')->name('admin.cart.order.store');


        //Payment Ipn Routes
        Route::get('/mollie-ipn', 'mollie_ipn')->name('admin.order.mollie.ipn');
    });


    /*----------------------------------------------------------------------------------------------------------------------------
     | PAYMENT ROUTE
    |----------------------------------------------------------------------------------------------------------------------------*/
    Route::controller(Admin\Payment\PaymentLogController::class)->prefix('payment')->group(function () {
        Route::post('/order-store', 'cart_order_store')->name('admin.cart.order.store');

        //Payment Ipn Routes
        Route::get('/mollie-ipn', 'mollie_ipn')->name('admin.order.mollie.ipn');
        Route::get('/paytm-ipn', 'paytm_ipn')->name('admin.order.paytm.ipn');
        Route::get('/stripe-ipn', 'stripe_ipn')->name('admin.order.stripe.ipn');
        Route::get('/midtrans-ipn', 'midtrans_ipn')->name('admin.order.midtrans.ipn');
        Route::post('/cashfree-ipn', 'cashfree_ipn')->name('admin.order.cashfree.ipn');

        //Ssl Commerz
        Route::post('sslcommerz/success','ssl_commerz_success')->name('admin.order.ssl.payment.success');
        Route::post('sslcommerz/failure','ssl_commerz_failed')->name('admin.order.ssl.payment.failed');
        Route::post('sslcommerz/cancel','cancel')->name('cancel');
        Route::post('sslcommerz/ipn','ssl_ipn')->name('payment.ipn');
    });


    /*----------------------------------------------------------------------------------------------------------------------------
|PRODUCT MANAGE
|----------------------------------------------------------------------------------------------------------------------------*/
    Route::controller(Admin\Order\OrderManageController::class)->prefix('order')->group(function () {
        Route::get('/list', 'index')->name('admin.order');
        Route::get('/view/{id}', 'view')->name('admin.order.view');
        Route::get('/price/{id}', 'print')->name('admin.order.print');
        Route::post('/change-status', 'change_status')->name('admin.order.change.status');
        Route::post('/delete/{id}', 'delete')->name('admin.order.delete');
        Route::post('/bulk-action', 'bulk_action')->name('admin.order.bulk.action');
    });


        /*----------------------------------------------------------------------------------------------------------------------------
        | GENERAL SETTINGS MANAGE
        |----------------------------------------------------------------------------------------------------------------------------*/
        Route::controller(Admin\GeneralSettingsController::class)->prefix('general-settings')->group(function () {
            //general settings
            Route::get('/site-identity', 'site_identity')->name('admin.general.site.identity');
            Route::post('/site-identity', 'update_site_identity');

            Route::get('/basic-settings', 'basic_settings')->name('admin.general.basic.settings');
            Route::post('/basic-settings', 'update_basic_settings');

            Route::get('/company-settings', 'company_settings')->name('admin.general.company.settings');
            Route::post('/company-settings', 'update_company_settings');

            Route::get('/email-template', 'email_template_settings')->name('admin.general.email.template');
            Route::post('/email-template', 'update_email_template_settings');

            Route::get('/cache-settings', 'cache_settings')->name('admin.general.cache.settings');
            Route::post('/cache-settings', 'update_cache_settings');

            //smtp settings
            Route::get('/smtp-settings', 'smtp_settings')->name('admin.general.smtp.settings');
            Route::post('/smtp-settings', 'update_smtp_settings');
            Route::post('/smtp-settings/test', 'test_smtp_settings')->name('admin.general.smtp.settings.test');
            //payment gateway
            Route::get('/payment-settings', 'payment_settings')->name('admin.general.payment.settings');
            Route::post('/payment-settings', 'update_payment_settings');

            //Upgrade Database
            Route::get('/database-upgrade', 'database_upgrade')->name('admin.general.database.upgrade');
            Route::post('/database-upgrade', 'database_upgrade_post');

        });

        //language
        Route::group(['prefix' => 'languages', 'namespace' => 'Admin'], function () {
            Route::get('/', 'LanguageController@index')->name('admin.languages');
            Route::get('/words/frontend/{id}', 'LanguageController@frontend_edit_words')->name('admin.languages.words.frontend');
            Route::get('/words/backend/{id}', 'LanguageController@backend_edit_words')->name('admin.languages.words.backend');
            Route::post('/words/update/{id}', 'LanguageController@update_words')->name('admin.languages.words.update');
            Route::post('/new', 'LanguageController@store')->name('admin.languages.new');
            Route::post('/update', 'LanguageController@update')->name('admin.languages.update');
            Route::post('/delete/{id}', 'LanguageController@delete')->name('admin.languages.delete');
            Route::post('/default/{id}', 'LanguageController@make_default')->name('admin.languages.default');
            Route::post('/clone', 'LanguageController@clone_languages')->name('admin.languages.clone');
            Route::post('/add-new-string', 'LanguageController@add_new_string')->name('admin.languages.add.string');
            Route::post('/languages/regenerate-source-text', 'LanguageController@regenerate_source_text')->name('admin.languages.regenerate.source.texts');
        });


/*----------------------------------------------------------------------------------------------------------------------------
| Notification ROUTES
|----------------------------------------------------------------------------------------------------------------------------*/
    Route::group(['prefix' => 'notification', 'namespace' => 'Admin'], function () {
        Route::get('/all', 'NotificationController@index')->name('admin.notification');
        Route::get('/view/{id}', 'NotificationController@view')->name('admin.notification.view');
        Route::post('/delete/{id}', 'NotificationController@delete')->name('admin.notification.delete');
        Route::post('/bulk-action', 'NotificationController@bulk_action')->name('admin.notification.bulk.action');
    });


}); //End admin-home
    /*-----------------------------------------------------------------------
        ADMIN MEDIA UPLOAD BUTTON, KEEP IT SEPARATED FOR DEMO PURPOSE
    -----------------------------------------------------------------------*/
    Route::group(['middleware' => ['setlang:backend', 'auth:admin'], 'prefix' => 'admin-home', 'namespace' => 'Admin'], function () {
        Route::post('/all', 'MediaUploadController@all_upload_media_file')->name('admin.upload.media.file.all');
        Route::post('/', 'MediaUploadController@upload_media_file')->name('admin.upload.media.file');
        Route::post('/chart', 'AdminDashboardController@get_chart_data')->name('admin.home.chat.data');
        Route::post('/chart/day', 'AdminDashboardController@get_chart_by_date_data')->name('admin.home.chat.data.by.day');
    });


