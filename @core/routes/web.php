<?php

use Illuminate\Support\Facades\Route;


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
    /*----------------------------------------------------------------------------------------------------------------------------
     | CAUSES ROUTES
     |----------------------------------------------------------------------------------------------------------------------------*/
    Route::group(['prefix' => 'donations', 'namespace' => 'Admin' ], function () {

        Route::get('/', 'CausesController@all_donation')->name('admin.donations.all');
        Route::get('/pending', 'CausesController@all_pending_donation')->name('admin.donations.pending.all');
        Route::get('/new', 'CausesController@new_donation')->name('admin.donations.new');
        Route::post('/new', 'CausesController@store_donation');
        Route::get('/edit/{id}', 'CausesController@edit_donation')->name('admin.donations.edit');
        Route::get('/donors/{id}', 'CausesController@donated_donors')->name('admin.donations.donors');
        Route::post('/update', 'CausesController@update_donation')->name('admin.donations.update');
        Route::post('/delete/{id}', 'CausesController@delete_donation')->name('admin.donations.delete');
        Route::post('/clone', 'CausesController@clone_donation')->name('admin.donations.clone');
        Route::post('/bulk-action', 'CausesController@bulk_action')->name('admin.donations.bulk.action');
        Route::post('/reminder', 'CausesController@donation_reminder')->name('admin.donation.reminder');
        Route::post('/approve', 'CausesController@donation_approve')->name('admin.donation.approve');
        Route::post('/change-status', 'CausesController@change_status')->name('admin.donation.change.status');

        //donation page settings
        Route::get('/settings', 'CausesController@settings')->name('admin.donations.settings');
        Route::post('/settings', 'CausesController@update_settings');

        //donation single page variant
        Route::get('/single-page-variant', 'CausesController@single_variant')->name('admin.donations.single.page.variant');
        Route::post('/single-page-variant', 'CausesController@update_single_variant');

        //report generate
        Route::get('/report', 'CausesController@donation_report')->name('admin.donations.report');

        //donation payment logs
        Route::get('/payment-logs', 'CausesController@donation_payment_logs')->name('admin.donations.payment.logs');
        Route::post('/payment-logs/delete/{id}', 'CausesController@delete_donation_payment_logs')->name('admin.donations.payment.delete');
        Route::post('/payment-logs/approve/{id}', 'CausesController@approve_donation_payment')->name('admin.donations.payment.approve');
        Route::post('/payment-logs/bulk-action', 'CausesController@donation_payment_logs_bulk_action')->name('admin.donations.payment.bulk.action');

        /*----------------------------------------------------------------------------------------------------------------------------
         | CAUSES CATEGORY ROUTES
         |----------------------------------------------------------------------------------------------------------------------------*/
        Route::group(['prefix' => 'category'], function () {
            //donation category
            Route::get('/', 'CausesCategoryController@all_donation_category')->name('admin.donations.category.all');
            Route::post('/new', 'CausesCategoryController@store_donation_category')->name('admin.donations.category.new');
            Route::post('/update', 'CausesCategoryController@update_donation_category')->name('admin.donations.category.update');
            Route::post('/delete/{id}', 'CausesCategoryController@delete_donation_category')->name('admin.donations.category.delete');
            Route::post('/lang', 'CausesCategoryController@Category_by_language_slug')->name('admin.donations.category.by.lang');
            Route::post('/bulk-action', 'CausesCategoryController@bulk_action')->name('admin.donations.category.bulk.action');

        });

    });



  /*----------------------------------------------------------------------------------------------------------------------------
  | MEDIA UPLOAD ROUTE
  |----------------------------------------------------------------------------------------------------------------------------*/
    Route::group(['prefix'=>'media-upload','namespace'=>'Admin'],function () {
        Route::post('/alt', 'MediaUploadController@alt_change_upload_media_file')->name('admin.upload.media.file.alt.change');
        Route::get('/page', 'MediaUploadController@all_upload_media_images_for_page')->name('admin.upload.media.images.page');
        Route::post('/delete', 'MediaUploadController@delete_upload_media_file')->name('admin.upload.media.file.delete');
    });


    /*----------------------------------------------------------------------------------------------------------------------------
   | ADMIN DASHBOARD ROUTES
   |----------------------------------------------------------------------------------------------------------------------------*/
    Route::group(['namespace'=>'Admin'],function () {
        //admin Profile
        Route::get('/settings', 'AdminDashboardController@admin_settings')->name('admin.profile.settings');
        Route::get('/profile-update', 'AdminDashboardController@admin_profile')->name('admin.profile.update');
        Route::post('/profile-update', 'AdminDashboardController@admin_profile_update');
        Route::get('/password-change', 'AdminDashboardController@admin_password')->name('admin.password.change');
        Route::post('/password-change', 'AdminDashboardController@admin_password_chagne');
        //admin index
        Route::get('/', 'AdminDashboardController@adminIndex')->name('admin.home');
        Route::get('/dark-mode-toggle', 'AdminDashboardController@dark_mode_toggle')->name('admin.dark.mode.toggle'); 

        //navbar settings
        Route::get('/navbar-settings', "AdminDashboardController@navbar_settings")->name('admin.navbar.settings');
        Route::post('/navbar-settings', "AdminDashboardController@update_navbar_settings");

        //navbar settings
        Route::get('/navbar-settings', "AdminDashboardController@navbar_settings")->name('admin.navbar.settings');

    });

    /*----------------------------------------------------------------------------------------------------------------------------
    | ADMIN USER ROLE MANAGE
    |----------------------------------------------------------------------------------------------------------------------------*/
    Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
        Route::get('/new-user','AdminRoleManageController@new_user')->name('admin.new.user');
        Route::post('/new-user','AdminRoleManageController@new_user_add');
        Route::get('/user-edit/{id}','AdminRoleManageController@user_edit')->name('admin.user.edit');
        Route::post('/user-update','AdminRoleManageController@user_update')->name('admin.user.update');
        Route::post('/user-password-change','AdminRoleManageController@user_password_change')->name('admin.user.password.change');
        Route::post('/delete-user/{id}','AdminRoleManageController@new_user_delete')->name('admin.delete.user');
        Route::get('/all','AdminRoleManageController@all_user')->name('admin.all.user');
        /*----------------------------
            ALL ADMIN ROLE ROUTES
        -----------------------------*/
        Route::get('/role','AdminRoleManageController@all_admin_role')->name('admin.all.admin.role');
        Route::get('/role/new','AdminRoleManageController@new_admin_role_index')->name('admin.role.new');
        Route::post('/role/new','AdminRoleManageController@store_new_admin_role');
        Route::get('/role/edit/{id}','AdminRoleManageController@edit_admin_role')->name('admin.user.role.edit');
        Route::post('/role/update','AdminRoleManageController@update_admin_role')->name('admin.user.role.update');
        Route::post('/role/delete/{id}','AdminRoleManageController@delete_admin_role')->name('admin.user.role.delete');
    });

    /*----------------------------------------------------------------------------------------------------------------------------
    |FRONTEND USER MANAGE
    |----------------------------------------------------------------------------------------------------------------------------*/
    Route::group(['prefix' => 'frontend', 'namespace' => 'Admin'], function () {
        Route::get('/new-user', 'FrontendUserManageController@new_user')->name('admin.frontend.new.user');
        Route::post('/new-user', 'FrontendUserManageController@new_user_add');
        Route::post('/user-update', 'FrontendUserManageController@user_update')->name('admin.frontend.user.update');
        Route::post('/user-password-chnage', 'FrontendUserManageController@user_password_change')->name('admin.frontend.user.password.change');
        Route::post('/delete-user/{id}', 'FrontendUserManageController@new_user_delete')->name('admin.frontend.delete.user');
        Route::get('/all-user', 'FrontendUserManageController@all_user')->name('admin.all.frontend.user');
        Route::get('/user/tax/{id}', 'FrontendUserManageController@user_tax_view')->name('admin.frontend.user.tax.information');
        Route::post('/all-user/bulk-action', 'FrontendUserManageController@bulk_action')->name('admin.all.frontend.user.bulk.action');
        Route::post('/all-user/email-status', 'FrontendUserManageController@email_status')->name('admin.all.frontend.user.email.status');
        Route::post('/all-user/campaign-permission', 'FrontendUserManageController@campaign_permission')->name('admin.frontend.user.campaign.permission');
    });

    /*----------------------------------------------------------------------------------------------------------------------------
    |NEWSLETTER PAGE MANAGE
    |----------------------------------------------------------------------------------------------------------------------------*/
    Route::group(['prefix' => 'newsletter', 'namespace' => 'Admin'], function () {
        //newsletter
        Route::get('/', 'NewsletterController@index')->name('admin.newsletter');
        Route::post('/delete/{id}', 'NewsletterController@delete')->name('admin.newsletter.delete');
        Route::post('/single', 'NewsletterController@send_mail')->name('admin.newsletter.single.mail');
        Route::get('/all', 'NewsletterController@send_mail_all_index')->name('admin.newsletter.mail');
        Route::post('/all', 'NewsletterController@send_mail_all');
        Route::post('/new', 'NewsletterController@add_new_sub')->name('admin.newsletter.new.add');
        Route::post('/bulk-action', 'NewsletterController@bulk_action')->name('admin.newsletter.bulk.action');
        Route::post('/newsletter/verify-mail-send','NewsletterController@verify_mail_send')->name('admin.newsletter.verify.mail.send');
        Route::get('/newsletter/unsubscribe/{id}','NewsletterController@newsletter_unsubscribe')->name('user.newsletter.unsubscribe');
    });


  /*----------------------------------------------------------------------------------------------------------------------------
  | TESTIMONIAL  ROUTES
  |----------------------------------------------------------------------------------------------------------------------------*/
    Route::group(['prefix' => 'testimonial', 'namespace' => 'Admin'], function () {
        Route::get('/all','TestimonialController@index')->name('admin.testimonial');
        Route::post('/all','TestimonialController@store');
        Route::post('/clone','TestimonialController@clone')->name('admin.testimonial.clone');
        Route::post('/update','TestimonialController@update')->name('admin.testimonial.update');
        Route::post('/delete/{id}','TestimonialController@delete')->name('admin.testimonial.delete');
        Route::post('/bulk-action','TestimonialController@bulk_action')->name('admin.testimonial.bulk.action');
    });


/*----------------------------------------------------------------------------------------------------------------------------
| Notification ROUTES
|----------------------------------------------------------------------------------------------------------------------------*/
    Route::group(['prefix'=>'notification','namespace'=>'Admin'],function (){
        Route::get('/all','NotificationController@index')->name('admin.notification');
        Route::get('/view/{id}','NotificationController@view')->name('admin.notification.view');
        Route::post('/delete/{id}','NotificationController@delete')->name('admin.notification.delete');
        Route::post('/bulk-action','NotificationController@bulk_action')->name('admin.notification.bulk.action');
    });



    /*----------------------------------------------------------------------------------------------------------------------------
    | GENERAL SETTINGS MANAGE
    |----------------------------------------------------------------------------------------------------------------------------*/
    Route::group(['prefix'=>'general-settings','namespace'=>'Admin'],function () {
        //general settings
        Route::get('/site-identity', 'GeneralSettingsController@site_identity')->name('admin.general.site.identity');
        Route::post('/site-identity', 'GeneralSettingsController@update_site_identity');

        Route::get('/basic-settings', 'GeneralSettingsController@basic_settings')->name('admin.general.basic.settings');
        Route::post('/basic-settings', 'GeneralSettingsController@update_basic_settings');

        Route::get('/seo-settings', 'GeneralSettingsController@seo_settings')->name('admin.general.seo.settings');
        Route::post('/seo-settings', 'GeneralSettingsController@update_seo_settings');

        Route::get('/email-template', 'GeneralSettingsController@email_template_settings')->name('admin.general.email.template');
        Route::post('/email-template', 'GeneralSettingsController@update_email_template_settings');

        Route::get('/cache-settings', 'GeneralSettingsController@cache_settings')->name('admin.general.cache.settings');
        Route::post('/cache-settings', 'GeneralSettingsController@update_cache_settings');

        //smtp settings
        Route::get('/smtp-settings', 'GeneralSettingsController@smtp_settings')->name('admin.general.smtp.settings');
        Route::post('/smtp-settings', 'GeneralSettingsController@update_smtp_settings');
        Route::post('/smtp-settings/test', 'GeneralSettingsController@test_smtp_settings')->name('admin.general.smtp.settings.test');
        //payment gateway
        Route::get('/payment-settings', 'GeneralSettingsController@payment_settings')->name('admin.general.payment.settings');
        Route::post('/payment-settings', 'GeneralSettingsController@update_payment_settings');

        //Upgrade Database
        Route::get('/database-upgrade', 'GeneralSettingsController@database_upgrade')->name('admin.general.database.upgrade');
        Route::post('/database-upgrade', 'GeneralSettingsController@database_upgrade_post');


    });

    //language
    Route::group(['prefix'=>'languages','namespace'=>'Admin'],function () {
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
        Route::post('/languages/regenerate-source-text','LanguageController@regenerate_source_text')->name('admin.languages.regenerate.source.texts');
    });

}); //End admin-home
/*-----------------------------------------------------------------------
    ADMIN MEDIA UPLOAD BUTTON, KEEP IT SEPARATED FOR DEMO PURPOSE
-----------------------------------------------------------------------*/
Route::group(['middleware' => ['setlang:backend','auth:admin'],'prefix' => 'admin-home','namespace'=>'Admin'],function (){
    Route::post('/all', 'MediaUploadController@all_upload_media_file')->name('admin.upload.media.file.all');
    Route::post('/', 'MediaUploadController@upload_media_file')->name('admin.upload.media.file');
    Route::post('/chart', 'AdminDashboardController@get_chart_data')->name('admin.home.chat.data');
    Route::post('/chart/day', 'AdminDashboardController@get_chart_by_date_data')->name('admin.home.chat.data.by.day');
});

