<?php

use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Auth\SocialLoginController;
use App\Http\Controllers\ModeController;
use App\Http\Controllers\User\DataController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\ServiceController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HomeController;


// These routes require no user to be logged in
Route::group(['middleware' => 'guest'], function (){

    //Authentication routes
    Auth::routes();

    //Socialite Routes
    Route::get('login/{provider}', [SocialLoginController::class, 'login'])->name('social.login');
    Route::get('login/{provider}/callback', [SocialLoginController::class, 'login']);

});

//Basic Routes
Route::get('/',[HomeController::class, 'index'])->name('home');
Route::get('/profile_public',[HomeController::class, 'profile_public'])->name('profile_public');
Route::get('/limelancer_pro',[HomeController::class, 'limelancer_pro'])->name('limelancer_pro');
Route::get('/analytics',[HomeController::class, 'analytics'])->name('analytics');
Route::get('/buyer_requests',[HomeController::class, 'buyer_requests'])->name('buyer_requests');

// Service details
Route::get('/service/{gig_slug}', [ServiceController::class, 'userServiceDetails'])->name('service_details');

//Route groups for admin
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function (){

    Route::get('/dashboard',[DashboardController::class, 'dashboard'])->name('dashboard');
    Route::resource('users', 'UsersController');
    Route::resource('roles', 'RoleController');
    Route::resource('categories', 'CategoryController');
    Route::resource('users', 'UsersController');

    Route::get('subcategory/get_by_category', [SubCategoryController::class, 'get_by_category'])->name('subcategory.get_by_category');
    Route::resource('subcategories' , 'SubCategoryController');

    Route::get('view_proposals', [App\Http\Controllers\Admin\ServiceController::class, 'index'])->name('proposals');
	
	

});
Route::group(['as' => 'user.', 'middleware' => ['auth']], function (){
    // Route groups for users

    Route::post('/switch', [ModeController::class, 'switch'])->name('switch');

    Route::group(['prefix' => 'seller'], function (){

        //Profile
        Route::get('/profile',[ProfileController::class, 'profileHome'])->name('profile');

        Route::post('/user_language', [ProfileController::class, 'userLanguages'])->name('language_store');
        Route::post('/user_skills', [ProfileController::class, 'userSkillSave'])->name('skills_store');
        Route::post('/education-store', [ProfileController::class, 'userEducationSave'])->name('education');
        Route::put('/user-image-update', [ProfileController::class, 'userAvatarUpdate'])->name('avatar_update');

        Route::get('/user_skill_delete/{id}', [ProfileController::class, 'userSkillDelete'])->name('skill_delete');
        Route::get('/user_lang_delete/{id}', [ProfileController::class, 'userLanguageDelete'])->name('lang_delete');
        Route::get('/education_delete/{id}', [ProfileController::class, 'userEducationDestroy'])->name('education_delete');
        Route::patch('/user_biodescription_update/{user}', [ProfileController::class, 'updateUserBioDescription'])->name('update_bio_description');


        Route::get('/settings',[ProfileController::class, 'profileSettings'])->name('profile_settings');
        Route::post('/settings', [ProfileController::class, 'userProfileUpdate'])->name('setting_update');

        Route::group(['prefix' => 'services'], function(){

            //Services Overview
            Route::get('gigs_overview',[ServiceController::class, 'index'])->name('create_gig');
            Route::post('gigs_overview',[ServiceController::class, 'store'])->name('store_gig');

            Route::get('gigs_overview/{service_id}', [ServiceController::class, 'index'])->name('overview_edit');

            // Services Pricing
            Route::get('gigs_pricing', [ServiceController::class, 'userServicePricing'])->name('pricing');
            Route::post('gigs_pricing', [ServiceController::class, 'userServicePricingSave'])->name('pricing_store');
            Route::get('gigs_pricing/{service_id}', [ServiceController::class, 'userServicePricing'])->name('pricing_edit');

            // Service description
            Route::get('gigs_description', [ServiceController::class, 'userServiceDescription'])->name('description');
            Route::post('gigs_description', [ServiceController::class, 'userServiceDescriptionSave'])->name('description_store');
            Route::get('gigs_description/{service_id}', [ServiceController::class, 'userServiceDescription'])->name('description_edit');

            // Services Requirement
            Route::get('gigs_requirement', [ServiceController::class, 'userServiceRequirement'])->name('requirement');
            Route::post('gigs_requirement', [ServiceController::class, 'userServiceRequirementSave'])->name('requirement_store');
            Route::get('gigs_requirement/{service_id}', [ServiceController::class, 'userServiceRequirement'])->name('requirement_edit');
			Route::get('req_remove/{req_id}', [ServiceController::class, 'userServiceDelete'])->name('req_remove');	
			
            // Service Gallery

            Route::get('gigs_gallery', [ServiceController::class, 'userServiceGallery'])->name('gallery');
            Route::post('gigs_gallery', [ServiceController::class, 'userServiceGallerySave'])->name('gallery_store');
            Route::get('gigs_gallery/{service_id}', [ServiceController::class, 'userServiceGallery'])->name('gallery_edit');
            Route::post('service_gallery_image', [ServiceController::class, 'userGalleryUpload'])->name('service_gallery');

            //Service Publish
            Route::get('gigs_publish', [ServiceController::class, 'userServicePublish'])->name('publish');
            Route::get('gigs_publish/{service_id}', [ServiceController::class, 'userServicePublish'])->name('publish_edit');
            
			Route::post('gigs_publish', [ServiceController::class, 'userServicePublishSave'])->name('publish_gig');

            // Services List
            Route::get('manage_gigs',[ServiceController::class, 'manageGigs'])->name('manage_gigs');
			
			//Service Paused
			Route::get('gigs_paused/{service_id}', [ServiceController::class, 'userServicePaused'])->name('gigs_paused');
			
			//gallery remove
			Route::get('galary_remove/{service_id}', [ServiceController::class, 'userGalleryRemove'])->name('galary_remove');
        });

        //Orders
        Route::get('/orders',[OrderController::class, 'orders'])->name('orders');

        //Earnings
        Route::get('/earnings',[ProfileController::class, 'earnings'])->name('earnings');

        Route::get('/tags', [ServiceController::class, 'tagsList'])->name('tags');

    });

    Route::group(['prefix' => 'buyer'], function (){
        Route::get('/services', [ProfileController::class, 'profile_buying'])->name('services');

        // Service details
        Route::get('/service/{gig_slug}', [ServiceController::class, 'userServiceDetails'])->name('service_details');
        Route::get('/orders', [OrderController::class, 'getBuyersOrders'])->name('buyers.orders');
        Route::post('/service/order', [OrderController::class, 'buyerPlacedOrder'])->name('order.placed');

    });

    Route::get('/{user}', [ProfileController::class, 'profile_public'])->name('public_mode');

});

//Services By subcategory
Route::get('/services/{sub_c_slug}', [DataController::class, 'getServiceBySubCategory'])->name('servicebysubcategory');

//Route::post('/logout', [DataController::class, 'getLogout'])->name('logout');

Route::post('logout', 'Auth\LoginController@logout')->name('logout');








