<?php

use App\Http\Controllers\Admin\CausesController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\FrontendController;

Route::group(['prefix'=> 'v1' ],function(){

    Route::get("/get-currency-symbol",function (){
        $data = ["symbol" => site_currency_symbol()];
        return response()->success($data);
    });

       // Login Register Routes
        Route::post('/register',[UserController::class,'register']);
        Route::post('/login',[UserController::class,'login']);
        Route::post('social/login',[UserController::class,'socialLogin']);
        Route::post('/send-otp-in-mail',[UserController::class,'sendOTP']);
        Route::post('/reset-password',[UserController::class,'resetPassword']);
        Route::get("/country-list",[UserController::class,"country_list"]);


      //Frontend Routes
        Route::get("/slider",[FrontendController::class,"all_slider"]);
        Route::get("/campaign-details/{id}",[FrontendController::class,"donation_details"]);
        Route::get("/people-who-donated/{cause_id}",[FrontendController::class,"people_who_donated"]);
        Route::get("/related-campaigns/{cause_id}",[FrontendController::class,"related_campaigns"]);

        /* Donation */
        Route::group(['prefix' => 'donation'],function(){
            Route::get('/',[FrontendController::class,'multiple_donation_data']);
        });

  //=============================== USER DASHBOARD ROUTES =============================
     Route::group(['prefix' => 'user/','middleware' => 'auth:sanctum'],function (){
        Route::get('dashboard',[UserController::class,'dashboard']);
        Route::post('logout',[UserController::class,'logout']);
        Route::get('profile',[UserController::class,'profile']);
        Route::post('change-password',[UserController::class,'changePassword']);
        Route::post('update-profile',[UserController::class,'updateProfile']);

        //User Donations
        Route::group(['prefix' => 'donation'],function(){
            Route::get('/',[UserController::class,'user_donations']);
            Route::get('/followed-user',[UserController::class,'followed_user_campaigns']);
            Route::get('/reward-points',[UserController::class,'reward_points']);
        });

        //Support Tickets
        Route::group(['prefix' => 'support-tickets'],function(){
            Route::post('/',[UserController::class,'allTickets']);
            Route::post('/{id}',[UserController::class,'viewTickets']);
        });

        //Support Ticket Routes
        Route::get("/ticket",[UserController::class,"get_all_tickets"]);
        Route::get("/ticket/{id}",[UserController::class,"single_ticket"]);
        Route::get("/ticket/chat/{ticket_id}",[UserController::class,"fetch_support_chat"]);
        Route::post("/ticket/chat/send/{ticket_id}",[UserController::class,"send_support_chat"]);

        Route::post('ticket/message-send',[UserController::class,'sendMessage']);
        Route::post('/send-otp-in-mail/success',[UserController::class,'sendOTPSuccess']);
        Route::post('ticket/create',[UserController::class,'createTicket']);
        Route::get("/get-department",[UserController::class,"get_department"]);
        Route::post('payment-status-update',[ServiceController::class,'paymentStatusUpdate']);

        // Checkout routes
        Route::post("checkout",[CheckoutController::class,"checkout"]);
        // Update payment status
        Route::post("checkout/payment/update",[CheckoutController::class,"payment_status_update"]);
        // get all order list
        Route::get("order-list",[CheckoutController::class,"order_list"]);
    });

    /* category */
    Route::group(['prefix' => 'category'],function(){
        Route::get('/',[CategoryController::class,'allCategory']);
        Route::get('/{id}',[CategoryController::class,'singleCategory']);
    });

    /* sub category */
    Route::group(['prefix' => 'subcategory'],function(){
        Route::get('/',[SubCategoryController::class,'allSubCategory']);
        Route::get('/{id}',[SubCategoryController::class,'singleSubCategory']);
    });

    /* Attributes */
    Route::get('/attributes',[AttributesController::class,'index']);
    Route::get('/tags',[ProductController::class,"tags"]);


    Route::get("admin/payment-gateway-list",[SiteSettingsController::class,"payment_gateway_list"]);

    Route::get('checkout-calculate', [CheckoutController::class,"calculateCheckout"]);
});

Route::fallback(function(){
    return response()->json(['message' => 'Page Not Found.'], 404);
});

