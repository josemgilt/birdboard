<?php

//use Illuminate\Support\Facades\Route;
use App\Models;

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
    return view('welcome');
});


Route::get_browser('/projects', function ()
{
    $projects = App\Models\Project::all();


    return view('projects.index', compact('projects'));

})




Route::post('/projects', function (){

    // validate

    //persist

    App\Models\Project::create(request(['title', 'description']));


});