<?php
use Illuminate\Support\Facades\Route;


/*----------------------------------------------------------------------------------------------------------------------------
 |PRODUCT CATEGORY ROUTES
|----------------------------------------------------------------------------------------------------------------------------*/
Route::controller(Admin\Product\ProductCategoryController::class)->prefix('product/category')->group(function () {
    Route::get('/all', 'index')->name('admin.product.category');
    Route::post('/all', 'store');
    Route::post('/update', 'update')->name('admin.product.category.update');
    Route::post('/delete/{id}', 'delete')->name('admin.product.category.delete');
    Route::post('/bulk-action', 'bulk_action')->name('admin.product.category.bulk.action');
});

/*----------------------------------------------------------------------------------------------------------------------------
 |PRODUCT SUBCATEGORY ROUTES
|----------------------------------------------------------------------------------------------------------------------------*/
Route::controller(Admin\Product\ProductSubcategoryController::class)->prefix('product/subcategory')->group(function () {
    Route::get('/all', 'index')->name('admin.product.subcategory');
    Route::post('/all', 'store');
    Route::post('/update', 'update')->name('admin.product.subcategory.update');
    Route::post('/delete/{id}', 'delete')->name('admin.product.subcategory.delete');
    Route::post('/bulk-action', 'bulk_action')->name('admin.product.subcategory.bulk.action');
});

/*----------------------------------------------------------------------------------------------------------------------------
 |PRODUCT BRAND ROUTES
|----------------------------------------------------------------------------------------------------------------------------*/
Route::controller(Admin\Product\ProductBrandController::class)->prefix('product/brand')->group(function () {
    Route::get('/all', 'index')->name('admin.product.brand');
    Route::post('/all', 'store');
    Route::post('/update', 'update')->name('admin.product.brand.update');
    Route::post('/delete/{id}', 'delete')->name('admin.product.brand.delete');
    Route::post('/bulk-action', 'bulk_action')->name('admin.product.brand.bulk.action');
});