<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToDoListController;


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

Route::get('/todo', [ToDoListController::class, 'index']);

Route::get('/grouptodo', [ToDoListController::class, 'groupindex']);

Route::get('/create', [ToDoListController::class, 'create']);

Route::get('/creategrouptodo', [ToDoListController::class, 'creategroup']);

Route::post('/store', [ToDoListController::class, 'store']);

Route::get('/{id}/edit', [ToDoListController::class, 'edit']);

Route::get('/{id}/editgroup', [ToDoListController::class, 'editgroup']);

Route::patch('/update', [ToDoListController::class, 'update']);

Route::get('/{id}/completed', [ToDoListController::class, 'completed']);

Route::get('/{id}/completedgroup', [ToDoListController::class, 'completedgroup']);

Route::get('/{id}/delete', [ToDoListController::class, 'destroy']);

Route::get('/{id}/deletegroup', [ToDoListController::class, 'destroygroup']);

//Route::get('/{id}/showgroup', [ToDoListController::class, 'showgroup']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
