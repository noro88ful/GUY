<?php

use Illuminate\Support\Facades\Route;

// Auth::routes();

Route::get('admin/login', [App\Http\Controllers\AdminController::class, 'login'])->name('login');

Route::group(['prefix' => 'admin', 'middleware' => 'usercheck'], function () {
	Route::get('/', [App\Http\Controllers\AdminController::class, 'login']);
	Route::get('/home', [App\Http\Controllers\AdminController::class, 'home']);
	Route::get('/adm_logout', [App\Http\Controllers\AdminController::class, 'adm_logout'])->name('adm_logout');
	Route::get('/adm_slider', [App\Http\Controllers\AdminController::class, 'adm_slider'])->name('adm_slider');
	Route::get('/adm_library', [App\Http\Controllers\AdminController::class, 'adm_library'])->name('adm_library');
	Route::get('/adm_library_2', [App\Http\Controllers\AdminController::class, 'adm_library_2'])->name('adm_library_2');
	Route::get('/adm_works', [App\Http\Controllers\AdminController::class, 'adm_works'])->name('adm_works');
	Route::get('/adm_services', [App\Http\Controllers\AdminController::class, 'adm_services'])->name('adm_services');
	Route::get('/adm_about', [App\Http\Controllers\AdminController::class, 'adm_about'])->name('adm_about');
	Route::get('/adm_view', [App\Http\Controllers\AdminController::class, 'adm_view'])->name('adm_view');
	Route::get('/adm_contacts', [App\Http\Controllers\AdminController::class, 'adm_contacts'])->name('adm_contacts');
	Route::get('/adm_contacts_top', [App\Http\Controllers\AdminController::class, 'adm_contacts_top'])->name('adm_contacts_top');
	Route::get('/adm_user', [App\Http\Controllers\AdminController::class, 'adm_user'])->name('adm_user');
	Route::get('/adm_audio', [App\Http\Controllers\AdminController::class, 'adm_audio'])->name('adm_audio');
	Route::get('/adm_footer', [App\Http\Controllers\AdminController::class, 'adm_footer'])->name('adm_footer');
	Route::get('/adm_gallery', [App\Http\Controllers\AdminController::class, 'adm_gallery'])->name('adm_gallery');
	Route::get('/adm_home_1', [App\Http\Controllers\AdminController::class, 'adm_home_1'])->name('adm_home_1');
	Route::get('/adm_home_2', [App\Http\Controllers\AdminController::class, 'adm_home_2'])->name('adm_home_2');
	Route::get('/adm_info', [App\Http\Controllers\AdminController::class, 'adm_info'])->name('adm_info');
	Route::get('/adm_social', [App\Http\Controllers\AdminController::class, 'adm_social'])->name('adm_social');
	Route::get('/adm_galleries_images/{id}', [App\Http\Controllers\AdminController::class, 'adm_galleries_images'])->name('adm_galleries_images');
});

Route::get('/',[App\Http\Controllers\IndexController::class, 'showindex']);
Route::get('/index',[App\Http\Controllers\IndexController::class, 'showindex']);
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'login'])->middleware('admincheck');
Route::get('/about_me',[App\Http\Controllers\ShowController::class, 'showabout']);
Route::get('/contact_1',[App\Http\Controllers\ShowController::class, 'showcontact']);
Route::get('/library',[App\Http\Controllers\ShowController::class, 'showlibrary']);
Route::get('/my_works',[App\Http\Controllers\ShowController::class, 'showworks']);
Route::get('/view/{id}',[App\Http\Controllers\ShowController::class, 'showview']);


// Route::post('/login',[App\Http\Controllers\RegController::class, 'postlogin']);
// Route::post('/signup',[App\Http\Controllers\RegController::class, 'postsignup']);
// Route::post('/signup-profile',[App\Http\Controllers\RegController::class, 'postsignup_profile']);
Route::post('/edititems',[App\Http\Controllers\AdminController::class, 'edititems']);
Route::post('/deleteitem',[App\Http\Controllers\AdminController::class, 'deleteitem']);
Route::post('/sendlogin',[App\Http\Controllers\AdminController::class, 'sendlogin']);
// Route::post('/acceptforum',[App\Http\Controllers\AdminController::class, 'acceptforum']);
// Route::post('/declareforum',[App\Http\Controllers\AdminController::class, 'declareforum']);
Route::post('/add_table_field',[App\Http\Controllers\AdminController::class, 'add_table_field']);
// Route::post('/search_some',[App\Http\Controllers\SearchController::class, 'search_some']);
// Route::post('/contactmessage',[App\Http\Controllers\MailController::class, 'contactmessage']);
// Route::post('/searchblog',[App\Http\Controllers\SearchController::class, 'searchblog']);
// Route::post('/sendfeed',[App\Http\Controllers\IndexController::class, 'sendfeed']);
Route::post('/add_gallery',[App\Http\Controllers\AdminController::class, 'add_gallery']);
// Route::post('/ordertour',[App\Http\Controllers\AdminController::class, 'ordertour']);
// Route::post('/messageguest',[App\Http\Controllers\AdminController::class, 'messageguest']);
// Route::post('/subscribesite',[App\Http\Controllers\AdminController::class, 'subscribesite']);