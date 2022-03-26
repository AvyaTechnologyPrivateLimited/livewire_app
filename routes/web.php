<?php


use App\Http\Livewire\Task\Tasks;
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
    $role = \App\Models\Role::find(1);
    $user = \App\Models\User::find(1);
    $user->assignRole(1);

    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware'=>'auth'], function(){
    
    //protected routes
    Route::group(['prefix'=>'task', 'as'=>'task'], function(){
        Route::get('/', Tasks::class);
    });

});