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

/*Main Site Routes*/
Route::get("/hello", function(){
    return "hello";
});
Route::get('/', 'FrontendController@index')->name("home");
Route::get('about', 'FrontendController@about')->name("about");
Route::get('services', 'FrontendController@services')->name("services");
Route::get('gallery', 'FrontendController@gallery')->name("gallery");
Route::get('contact', 'FrontendController@contact')->name("contact");
Route::post('contact', 'FrontendController@contact_post')->name("contact_post");
Route::get('select', 'RideController@select')->name("select");
Route::post('paynow', 'RideController@paynow')->name("paynow");
Route::post('redirect', 'RideController@redirectToPaymentGateway')->name("redirect");
Route::post('return', 'RideController@return')->name("return");
Route::post('notify', 'RideController@notify')->name("notify");
/*End of Main Site Routes*/


/*Admin Auth Routes*/

Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
//Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
Route::post('/login/admin', 'Auth\LoginController@adminLogin')->name('login.admin');
//Route::post('/register/admin', 'Auth\RegisterController@createAdmin');

/*End Admin Auth Routes*/

/*Driver Auth Routes*/

Route::get('/login/driver', 'Auth\LoginController@showDriverLoginForm');
Route::get('/register/driver', 'Auth\RegisterController@showDriverRegisterForm');
Route::post('/login/driver', 'Auth\LoginController@driverLogin')->name('login.driver');
Route::post('/register/driver', 'Auth\RegisterController@createDriver')->name('register.driver');

/*End Driver Auth Routes*/

/*Admin Panel Routes*/

Route::middleware("admin")->namespace("Admin")->prefix("admin")->name("admin.")->group(function(){
    Route::get("dashboard", "AdminController@dashboard")->name("dashboard");
    Route::get("read_before_you_book", "AdminController@read_before_you_book_get")->name('read_before_get');
    Route::post("read_before_you_book/{id}", "AdminController@read_before_you_book_post")->name('read_before_post');

    /*Admin Media Routes*/
    Route::resource('media','AdminMediaController');
    Route::post('media/multiDestroy','AdminMediaController@multiDestroy');
    /*End Admin Media Routes*/

    /*Admin Trip Categories Routes*/
    Route::resource("categories", "AdminTripCategoryController");
    /*End Admin Trip Categories Routes*/

    /*Admin Trips Routes*/
    Route::resource("trips", "AdminTripController");
    /*End Admin Trips Routes*/

    /*Admin Round Trips Routes*/
    Route::resource("round_trips", "AdminRoundTripController");
    /*End Admin Round Trips Routes*/

    /*Admin Drivers Routes*/
    Route::get("drivers/unapproved", "AdminDriverController@unapproved")->name("drivers.unapproved");
    Route::get("drivers/in_active", "AdminDriverController@in_active")->name("drivers.in_active");
    Route::get("drivers/{id}/history", "AdminDriverController@history")->name("driver.history");
    Route::resource("drivers", "AdminDriverController");
    /*End Admin Round Trips Routes*/

    /*Admin Ride Routes*/
    Route::get("rides/bid/{id}/select", "AdminRideController@select")->name("rides.bid.select");
    Route::get("rides/bid/{id}/change", "AdminRideController@change")->name("rides.bid.change");
    Route::get("rides/approved", "AdminRideController@approved")->name("rides.approved");
    Route::get("rides/started", "AdminRideController@started")->name("rides.started");
    Route::get("rides/ended", "AdminRideController@ended")->name("rides.ended");
    Route::get("rides/search", "AdminRideController@search")->name("rides.search");
    Route::resource("rides", "AdminRideController");
    /*End Admin Ride Routes*/
});
/*End of Admin Panel Routes*/

/*Driver Panel Routes*/

Route::middleware("driver")->namespace("Driver")->prefix("driver")->name("driver.")->group(function() {
    Route::get("dashboard", "DriverController@dashboard")->name("dashboard");

    /*Driver Vehicle Routes*/
    Route::get("vehicle/manage", "DriverVehicleController@manage")->name("vehicle.manage");
    Route::resource("vehicle", "DriverVehicleController");
    /*End Driver Vehicle Routes*/
    /*Driver Ride Routes*/
    Route::get("rides/apply/{id}", "DriverRideController@apply")->name("rides.apply");
    Route::get("rides/withdraw/{id}", "DriverRideController@withdraw")->name("rides.withdraw");
    Route::get("rides/pending", "DriverRideController@pending")->name("rides.pending");
    Route::get("rides/approved", "DriverRideController@approved")->name("rides.approved");
    Route::get("rides/started", "DriverRideController@started")->name("rides.started");
    Route::get("rides/ended", "DriverRideController@ended")->name("rides.ended");
    Route::get("rides/history", "DriverRideController@history")->name("rides.history");
    Route::get("rides/start/{id}", "DriverRideController@start")->name("rides.start");
    Route::get("rides/end/{id}", "DriverRideController@end")->name("rides.end");
    Route::get("rides/search", "DriverRideController@search")->name("rides.search");
    Route::resource("rides", "DriverRideController");
    /*End Driver Ride Routes*/
});

Auth::routes();