<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

use App\User;
use Illuminate\Support\Facades\Auth;








/**
 * open Routes
 */
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/ac/confirm/{code}', 'ProfileController@ActivateAccount');
/*Route::get('/ac/confirm/{code}',''});*/

/**
 * Auth Routes
 */
Route::group(['middleware' => 'auth'], function (){

    /**
     * Admin Routes Here
     */
    Route::group(['middleware' => 'admin'], function (){
        Route::get('/home', 'HomeController@index');

        Route::group(['prefix' => 'category'], function (){
            Route::get('/', 'CategoryController@index');
            Route::get('/new', 'CategoryController@indexNew');
            Route::post('/new', 'CategoryController@Create');
            Route::post('/delete', 'CategoryController@DelCategory');
        });

        Route::group(['prefix' => 'users'], function () {
            Route::get('/', 'Users\UsersController@Index');
            Route::get('/new', 'Users\UsersController@NewIndex');
            Route::post('/new', 'Users\UsersController@Create');
            Route::post('/delete', 'Users\UsersController@DeleteUser');
            Route::post('/pass-rest', 'Users\UsersController@ResetPassword');
        });

        Route::group(['prefix' => 'settings'], function (){
            Route::get('/', 'SettingsController@index');
            Route::post('/update', 'SettingsController@update');
        });

        Route::get('/price/{id}', 'article\ArticleController@ReturnPrice');



    });




    Route::group(['prefix' => 'article'], function (){
        Route::get('/my', 'article\ArticleController@ArticlesInfo');
        Route::get('/view/{article_id}', 'article\ArticleController@ArticleShow');
        Route::get('/', 'article\ArticleController@index');
        Route::get('/get', 'article\ArticleController@GetArticles');
        Route::get('/compose', 'article\ArticleController@IndexComposer');
        Route::post('/compose/store', 'article\ArticleController@Store');
        Route::get('/updater/{article_id}', 'article\ArticleController@IndexUpdator');
        Route::post('/updater/{article_id}', 'article\ArticleController@Update');
        Route::post('/delete', 'article\ArticleController@DeleteArticle');
        Route::post('/approved', 'article\ArticleController@ApprovedThisArticle');
        Route::post('/used', 'article\ArticleController@UsedThisArticle');
    });





    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', 'ProfileController@index');
        Route::post('/avatar/set', 'ProfileController@SetAvatar');
        Route::post('/password/set', 'ProfileController@ChangePassword');
        Route::post('/delete', 'ProfileController@DeleteUser');
        Route::post('/notifications/set', 'ProfileController@SetEmailNotification');
    });

    Route::group(['prefix' => 'notification'], function () {
        Route::get('/read-all', 'NotificationController@CheckReadAllNotifications');
    });




});




Auth::routes();