<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

//________________________________________


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {


    Route::get('/', 'MainController@index')->name('home');
    Route::get('/about', 'MainController@about')->name('about');
    Route::get('/contacts', 'MainController@contacts')->name('contacts');

    Route::get('/order-tour', 'MainController@order_tour')->name('order');
    Route::post('/order-tour', 'ToursController@order_tour')->name('order.send');

    Route::get('/packages', 'MainController@our_packages')->name('packages');
    Route::get('/plan-your-package', 'MainController@plan_package')->name('plan.package');
    Route::post('/plan-your-package', 'ToursController@plan_package')->name('plan.send');

    Route::get('/about-armenia', 'MainController@blog')->name('blog');
    Route::get('/about-armenia/blog-{id}', 'MainController@showBlog')->name('blog.show');


    Route::post('/contacts', 'ContactsController@send')->name('contacts.send');
    Route::get('/tour/{id}', 'ToursController@show')->name('tour.show');


    // Admin Part
    Route::group(
        [
            'middleware' => 'auth',
            'prefix' => 'admin'
        ], function () {

        Route::get('/', 'Admin\AdminController@index')->name('admin.index');

        Route::get('/tours', 'Admin\ToursController@getTours')->name('admin.tours.show');
        Route::get('/add-tour', 'Admin\ToursController@addTour')->name('admin.tours.add');
        Route::post('/add-tour', 'Admin\ToursController@saveTour')->name('admin.tours.save');
        Route::get('/edit-tour/{id}', 'Admin\ToursController@editTour')->name('admin.tours.edit');
        Route::post('/edit-tour/{id}', 'Admin\ToursController@updateTour')->name('admin.tours.update');
        Route::post('/delete-tour/{id}', 'Admin\ToursController@deleteTour')->name('admin.tours.delete');

        Route::get('/packages', 'Admin\PackagesController@getPackages')->name('admin.packages.show');
        Route::get('/add-package', 'Admin\PackagesController@addPackage')->name('admin.packages.add');
        Route::post('/add-package', 'Admin\PackagesController@savePackage')->name('admin.packages.save');
        Route::get('/edit-package/{id}', 'Admin\PackagesController@editPackage')->name('admin.packages.edit');
        Route::post('/edit-package/{id}', 'Admin\PackagesController@updatePackage')->name('admin.packages.update');
        Route::post('/delete-package/{id}', 'Admin\PackagesController@deletePackage')->name('admin.packages.delete');

        Route::get('/blogs', 'Admin\BlogsController@getBlogs')->name('admin.blogs.show');
        Route::get('/add-blog', 'Admin\BlogsController@addBlog')->name('admin.blogs.add');
        Route::post('/add-blog', 'Admin\BlogsController@saveBlog')->name('admin.blogs.save');
        Route::get('/edit-blog/{id}', 'Admin\BlogsController@editBlog')->name('admin.blogs.edit');
        Route::post('/edit-blog/{id}', 'Admin\BlogsController@updateBlog')->name('admin.blogs.update');
        Route::post('/delete-blog/{id}', 'Admin\BlogsController@deleteBlog')->name('admin.blogs.delete');

        Route::get('/messages', 'Admin\MessagesController@getMessages')->name('admin.messages');
        Route::get('/messages/{id}', 'Admin\MessagesController@showMessage')->name('admin.messages.show');

        Route::get('/orders', 'Admin\MessagesController@getOrders')->name('admin.orders');
        Route::get('/orders/{id}', 'Admin\MessagesController@showOrder')->name('admin.orders.show');

        Route::get('/plans', 'Admin\MessagesController@getPlans')->name('admin.plans');
        Route::get('/plans/{id}', 'Admin\MessagesController@showPlan')->name('admin.plans.show');

        // images
        Route::get('/slider', 'Admin\SettingsController@showSliders')->name('admin.slider');
        Route::post('/slider', 'Admin\SettingsController@updateSlider')->name('admin.slider.update');
        Route::delete('/delete-slider', 'Admin\SettingsController@deleteSlider')->name('admin.slider.delete');
        Route::get('/add-slider', 'Admin\SettingsController@addSlider')->name('admin.slider.add');
        Route::post('/add-slider', 'Admin\SettingsController@saveSlider')->name('admin.slider.save');

        Route::get('/contact', 'Admin\SettingsController@showContact')->name('admin.contact');
        Route::post('/contact', 'Admin\SettingsController@saveContact')->name('admin.contact.save');


    });

    Auth::routes();
    Auth::routes([
        'register' => false, // Registration Routes...
        'reset' => false, // Password Reset Routes...
        'verify' => false, // Email Verification Routes...
    ]);
});
