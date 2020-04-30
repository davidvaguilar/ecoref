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

/*DB::listen(function($query){
    var_dump($query->sql);
});*/

/*Route::get('/', function () {
    return view('welcome');
});*/
 
Route::get('email', function(){
    return new App\Mail\LoginCredentials(App\User::first(), 'asd123');
});

Route::get('/', 'PagesController@home')->name('pages.home');
Route::get('nosotros', 'PagesController@about')->name('pages.about');
Route::get('archivo', 'PagesController@archive')->name('pages.archive');
Route::get('contacto', 'PagesController@contact')->name('pages.contact');
Route::get('blog/{post}', 'PostsController@show')->name('posts.show');
Route::get('categorias/{category}', 'CategoriesController@show')->name('categories.show');
Route::get('tags/{tag}', 'tagsController@show')->name('tags.show');


/*Route::get('/', function () {
    //$posts = App\Post::all();
    $posts = App\Post::latest('published_at')->get();   //Ordenar desendennte
    return view('welcome', compact('posts'));  // es igual []
    //return view('welcome')->with('posts', $posts);
});*/

//Route::get('/home', 'HomeController@index')->name('home');
//Route::get('admin', 'AdminController@index');
/*Route::get('home', function(){
    return view('admin.dashboard');
})->middleware('auth');*/


//Route::get('admin/posts', 'Admin\PostsController@index');
Route::group([
    'prefix' => 'admin', 
    'namespace' => 'Admin', 
    'middleware' => 'auth'], 
function(){

    Route::get('/', 'AdminController@index')->name('dashboard');

    Route::resource('posts', 'PostsController', ['as' => 'admin']);

    Route::resource('clients', 'ClientsController', ['as' => 'admin']);

    Route::resource('users', 'UsersController', ['as' => 'admin']);
    Route::resource('roles', 'RolesController', ['except' => 'show', 'as' => 'admin']);
    Route::resource('permissions', 'PermissionsController', ['only' => ['index', 'edit', 'update'], 'as' => 'admin']);

    Route::resource('materials', 'MaterialsController', ['as' => 'admin']);


    //Route::put('users/{user}/roles', 'UsersRolesController@update')->name('admin.users.roles.update');
    Route::middleware('role:Admin')
        ->put('users/{user}/roles', 'UsersRolesController@update')
        ->name('admin.users.roles.update');

    Route::middleware('role:Admin')
        ->put('users/{user}/permissions', 'UsersPermissionsController@update')
        ->name('admin.users.permissions.update');


    /*Route::get('posts', 'PostsController@index')->name('admin.posts.index'); lo mismo que arriba
    Route::get('posts/create', 'PostsController@create')->name('admin.posts.create');
    Route::post('posts', 'PostsController@store')->name('admin.posts.store');
    Route::get('posts/{post}', 'PostsController@edit')->name('admin.posts.edit');
    Route::put('posts/{post}', 'PostsController@update')->name('admin.posts.update');
    Route::delete('posts/{post}', 'PostsController@destroy')->name('admin.posts.destroy');*/

    Route::post('posts/{post}/photos', 'PhotosController@store')->name('admin.posts.photos.store');
    Route::post('posts/{post}/parameter', 'ParametersController@store')->name('admin.posts.parameter.store');
    
    //nuevo
    Route::put('parameters/{parameter}', 'ParametersController@update')->name('admin.parameters.update');

    Route::post('posts/{post}/signature', 'SignatureController@store')->name('admin.posts.signature.store');

    Route::get('posts/{post}/report', 'PostsController@report')->name('productos_pdf');

    Route::delete('photos/{photo}', 'PhotosController@destroy')->name('admin.photos.destroy');

});
//rutas de administracion

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');



