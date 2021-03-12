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

Route::get('/', function () {
    return view('index');
});
Route::get('/index-2.html', function () {
    return view('index-2');
});
Route::get('/projects-website.html', function () {
    return view('projects-website');
});
Route::get('/projects-mobile-app.html', function () {
    return view('projects-mobile-app');
});
Route::get('/page-inner-about.html', function () {
    return view('page-inner-about');
});
Route::get('/page-inner-contact.html', function () {
    return view('page-inner-contact');
});
Route::get('/page-inner-contacts-1.html', function () {
    return view('page-inner-contacts-1');
});
Route::get('/project-details-1-casalova.html', function () {
    return view('project-details-1-casalova');
});
Route::get('/project-details-2-compliance.ai.html', function () {
    return view('project-details-2-compliance');
});
Route::get('/project-details-3-fishtripr.html', function () {
    return view('project-details-3-fishtripr');
});
Route::get('/project-details-5-fsastore.html', function () {
    return view('project-details-5-fsastore');
});
Route::get('/project-details-6-flaneur.html', function () {
    return view('project-details-6-flaneur');
});
Route::get('/project-details-7-mociun.html', function () {
    return view('project-details-7-mociun');
});
Route::get('/project-details-8-unyte.html', function () {
    return view('project-details-8-unyte');
});
Route::get('/project-details-9-seniorly.html', function () {
    return view('project-details-9-seniorly');
});
Route::get('/project-details-10-storyfire.html', function () {
    return view('project-details-10-storyfire');
});
Route::get('/project-details-11-fitnation.html', function () {
    return view('project-details-11-fitnation');
});
Route::get('/project-details-12-striketec.html', function () {
    return view('project-details-12-striketec');
});
Route::get('/projects-back-end.html', function () {
    return view('projects-back-end');
});
Route::get('/projects-ecommerce.html', function () {
    return view('projects-ecommerce');
});
Route::get('/projects-front-end.html', function () {
    return view('projects-front-end');
});
