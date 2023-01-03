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
        | GENERAL SETTINGS MANAGE
        |----------------------------------------------------------------------------------------------------------------------------*/
        Route::controller(Admin\GeneralSettingsController::class)->prefix('general-settings')->group(function () {
            //general settings
            Route::get('/site-identity', 'site_identity')->name('admin.general.site.identity');
            Route::post('/site-identity', 'update_site_identity');

            Route::get('/basic-settings', 'basic_settings')->name('admin.general.basic.settings');
            Route::post('/basic-settings', 'update_basic_settings');

            Route::get('/seo-settings', 'seo_settings')->name('admin.general.seo.settings');
            Route::post('/seo-settings', 'update_seo_settings');

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


