<?php

use Illuminate\Support\Facades\Route;

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

//email test
use App\Mail\WelcomeMail; 
Route::get('/email',function(){
return new WelcomeMail();
});

Route::get('/email/send',function(){
    Mail::to('johnydanxin@gmail.com')->send(new WelcomeMail());
    //return new WelcomeMail();
    });
    



Route::get('/', function () {
    return view('App.app');
});

Auth::routes();

//subscribers
Route::get('/subscribers','SubscriberController@store');


//Athentication
Route::namespace('Admin')->prefix('auth')->group(function(){
    Route::get('init','AppController@init');
    
    Route::post('login','AppController@login');
    Route::post('register','AppController@register');
    Route::post('logout','AppController@logout');

    //password resets
    Route::post('forgot/password','Auth\ForgotPasswordController@SendsPasswordResetEmails');
    Route::post('password/reset','Auth\ResetPasswordController@reset');

    //Sign In with Socialite
    Route::get('login/github','AppController@github');
    Route::get('login/github/redirect','AppController@githubredirect');
});

//Products
Route::get('/products','ProductsController@store');
Route::get('/displayapps','ProductsController@index');
Route::post('/editapps/{id}','ProductsController@update');
Route::get('/editapp/{id}','ProductsController@show');
Route::get('/deleteapp/{id}','ProductsController@destroy');
Route::get('/services','ProductsController@services');
Route::get('/versions','ProductsController@versions');
Route::get('/setversion/{appid}/{versionid}/{versionimage}','ProductsController@setversion');
Route::get('/setservice/{versionid}/{serviceid}','ProductsController@setservice');
Route::get('/buyapp/{app}','ProductsController@buyapp');

//Customers
Route::post('/customer','CustomersController@store');


//web pages
Route::get('/createpage','PagesController@store');

//paypal
Route::get('payment', 'CheckoutController@payment');
Route::get('cancel', 'CheckoutController@cancel')->name('cancel');
Route::get('success', 'CheckoutController@success')->name('success');

Route::get('/paypal', function(){
    //return view('App/paypal');
});
//stripe
Route::get('stripe', 'CheckoutController@stripe')->name('stripe');
Route::post('stripep', 'CheckoutController@stripepayment')->name('stripep');

//posts
Route::get('/posts','PostController@index');
Route::get('/assigncategory/{postid}/{categoryid}','PostController@assignCategory');
Route::get('/assigntype/{postid}/{typeid}','PostController@assignType');
Route::get('/latest','PostController@latest');
Route::post('/editpost/{id}','PostController@update');
Route::post('/createpost','PostController@store'); //create post
Route::get('/displaypost/{id}','PostController@show');
Route::get('/post_type','PostController@Type');
Route::get('/category_post','PostController@Category');

//shopping cart
Route::get('/shopcart','ProductController@index');
Route::get('/customer_application/{app_id}/{version_id}','ProductsController@buyerApp');

//Web Pages
Route::get('/Updatepage','PagesController@update');
Route::get('/page/{id}','PagesController@page');







