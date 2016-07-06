<?php


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');
Route::get('home', 'WelcomeController@index');

//Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

// post link section ;
Route::get('link','LinkController@get_link');
Route::post('linkreg','LinkController@save_link');

// comment section;
Route::get('comment/{id}','commentController@get_comment');
Route::post('post_comment','commentController@save_comment');

Route::get('guest_comment/{id}',['middleware'=> 'auth','uses'=>'commentController@get_guestComment']);



// vote section;

Route::get('voting/{datastring}','VotingController@voting');


Route::get('test/','test@index');



//ajax testing
Route::get('test/ajaxtest', function() {
  return View::make('ajaxtest');
});
//Route::post('ajaxtest/{postdata}', 'AjaxTest@test');
Route::post('ajaxtest', 'AjaxTest@test');


// for comment ;binding interface with implementation;
Route::resource('comments','CommentController');
//App::bind('App\Repositories\CommentRepository','App\Repositories\CommentRepositoryInterface');


// //for group authentication
// Route::group(['middleware' => [auth]], function())
// {
// 	Route::get('link','LinkController@get_link');
// 	Route::post('linkreg','LinkController@save_link');
// 	Route::get('guest_comment/{id}','CommentController@get_guestComment');
// }



