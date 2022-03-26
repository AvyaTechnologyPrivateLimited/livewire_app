<?php


use App\Http\Livewire\Task\Tasks;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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
    $role = Role::create(['name' => 'Admin']);
    $role->syncPermissions(['task-list', 'task-edit', 'task-create', 'task-delete']);
    die;
    $role = Role::find(1);
    $role->syncPermissions('task-list');

    die;
    $role = Role::find(1);
    $user = \App\Models\User::find(1);

    $permissions = Permission::pluck('id','id')->all();
    $role->syncPermissions($permissions);

    $user->assignRole([1]);

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