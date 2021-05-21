<?php

use App\Http\Controllers\ProjectInvitationsController;
use App\Http\Controllers\ProjectTasksController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectsController;

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

Route::group(['middleware' => 'auth'], function(){
    Route::get('/projects',[ProjectsController::class, 'index'])->name('projects');
    Route::get('/projects/create',[ProjectsController::class, 'create'])->name('create');
    Route::get('/projects/{project}',[ProjectsController::class, 'show']);
    Route::get('/projects/{project}/edit',[ProjectsController::class, 'edit']);
    Route::patch('/projects/{project}', [ProjectsController::class, 'update']);
    Route::delete('/projects/{project}', [ProjectsController::class, 'destroy']);
    Route::post('/projects/{project}/tasks', [ProjectTasksController::class, 'store']);
    Route::post('/projects/{project}/invitations', [ProjectInvitationsController::class, 'store']);
    Route::post('/projects',[ProjectsController::class, 'store']);
    Route::patch('/projects/{project}/tasks/{task}',[ProjectTasksController::class, 'update']);

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


