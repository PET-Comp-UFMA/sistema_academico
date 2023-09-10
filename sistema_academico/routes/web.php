<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ManagerSchoolsController;
use App\Http\Controllers\ManagerTeachersController;
use App\Http\Controllers\ManagerStudentsController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\School\InsertSchoolsController;
use App\Http\Controllers\School\DeleteSchoolsController;
use App\Http\Controllers\School\EditSchoolsController;

use App\Http\Controllers\Teacher\InsertTeachersController;
use App\Http\Controllers\Teacher\DeleteTeachersController;
use App\Http\Controllers\Teacher\EditTeachersController;

use App\Http\Controllers\Student\InsertStudentsController;
use App\Http\Controllers\Student\DeleteStudentsController;
use App\Http\Controllers\Student\EditStudentsController;

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

$url_base = 'sistema_academico';

Route::get("$url_base/", function () {
    return view('home');
});

Route::get("$url_base/login", function () {
    return view('auth.login');
})->name('login');

Route::post("$url_base/login", [LoginController::class, 'authenticate']);
Route::post("$url_base/logout", 
    [LoginController::class, 'logout']
)->middleware('auth')->name('logout');

Route::get("$url_base/dashboard", 
    [DashboardController::class, 'test']
)->middleware('auth');

Route::middleware(['auth', 'admin'])->group(function () use ($url_base) {
    
    Route::get("$url_base/administrar-escolas", [ManagerSchoolsController::class, 'view'])->name('adm-escola');
    
    Route::get("$url_base/cadastrar-escola", [InsertSchoolsController::class, 'view']);
    Route::post("$url_base/cadastrar-escola", [InsertSchoolsController::class, 'store']);
    
    Route::get("$url_base/atualizar-escola/{id}", [EditSchoolsController::class, 'view']);
    Route::post("$url_base/atualizar-escola/{id}", [EditSchoolsController::class, 'edit']);
    
    Route::get("$url_base/excluir-escola/{id}", [DeleteSchoolsController::class, 'view']);
    Route::delete("$url_base/excluir-escola/{id}", [DeleteSchoolsController::class, 'edit']);
});

Route::middleware(['auth', 'admin'])->group(function () use ($url_base) {
    Route::get("$url_base/administrar-estudantes", [ManagerStudentsController::class, 'view'])->name('adm-estudante');
    
    Route::get("$url_base/cadastrar-estudante", [InsertStudentsController::class, 'view']);
    Route::post("$url_base/cadastrar-estudante", [InsertStudentsController::class, 'store']);
    
    Route::get("$url_base/atualizar-estudante/{id}", [EditStudentsController::class, 'view']);
    Route::post("$url_base/atualizar-estudante/{id}", [EditStudentsController::class, 'edit']);
    
    Route::get("$url_base/excluir-estudante/{id}", [DeleteStudentsController::class, 'view']);
    Route::delete("$url_base/excluir-estudante/{id}", [DeleteStudentsController::class, 'edit']);
});

Route::middleware(['auth', 'admin'])->group(function () use ($url_base) {
    Route::get("$url_base/administrar-professores", [ManagerTeachersController::class, 'view'])->name('adm-professor');

    Route::get("$url_base/cadastrar-professor", [InsertTeachersController::class, 'view']);
    Route::post("$url_base/cadastrar-professor", [InsertTeachersController::class, 'store']);
    
    Route::get("$url_base/atualizar-professor/{id}", [EditTeachersController::class, 'view']);
    Route::post("$url_base/atualizar-professor/{id}", [EditTeachersController::class, 'edit']);
    
    Route::get("$url_base/excluir-professor/{id}", [DeleteTeachersController::class, 'view']);
    Route::delete("$url_base/excluir-professor/{id}", [DeleteTeachersController::class, 'edit']);
});


