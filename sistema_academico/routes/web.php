<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ManagerSchoolsController;
use App\Http\Controllers\ManagerTeachersController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\School\InsertSchoolsController;
use App\Http\Controllers\School\DeleteSchoolsController;
use App\Http\Controllers\School\EditSchoolsController;

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
    return view('home');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/dashboard', 
    [DashboardController::class, 'test']
)->middleware('auth');


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/administrar-escolas', [ManagerSchoolsController::class, 'view'])->name('adm-escola');
    
    Route::get('/cadastrar-escola', [InsertSchoolsController::class, 'view']);
    Route::post('/cadastrar-escola', [InsertSchoolsController::class, 'store']);
    
    Route::get('/atualizar-escola/{id}', [EditSchoolsController::class, 'view']);
    Route::post('/atualizar-escola/{id}', [EditSchoolsController::class, 'edit']);
    
    Route::get('/excluir-escola/{id}', [DeleteSchoolsController::class, 'view']);
    Route::delete('/excluir-escola/{id}', [DeleteSchoolsController::class, 'edit']);
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/administrar-professores', [ManagerTeachersController::class, 'view']);

    Route::get('/cadastrar-professor', [InsertSchoolsController::class, 'view']);
    Route::post('/cadastrar-professor', [InsertSchoolsController::class, 'store']);
    
    Route::get('/atualizar-professor/{id}', [EditSchoolsController::class, 'view']);
    Route::post('/atualizar-professor/{id}', [EditSchoolsController::class, 'edit']);
    
    Route::get('/excluir-professor/{id}', [DeleteSchoolsController::class, 'view']);
    Route::delete('/excluir-professor/{id}', [DeleteSchoolsController::class, 'edit']);
});


