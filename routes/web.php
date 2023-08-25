<?php

use App\Http\Controllers\CrudController;
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

Route::get("/", [CrudController::class, "index"])->name("crud.index");
//ADD NEW CLIENT
Route::post("/registrar-cliente", [CrudController::class, "create"])->name("crud.create");
//MODIFY CLIENT
Route::post("/modificar-cliente", [CrudController::class, "update"])->name("crud.update");
//DELETE CLIENT
Route::get("/eliminar-cliente-{id}", [CrudController::class, "delete"])->name("crud.delete");
