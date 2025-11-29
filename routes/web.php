<?php

// use App\Http\Controllers\CategoriController;

use App\Http\Controllers\GetWbbmController;
use App\Http\Controllers\PostWbbmController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('wbbm.input_kategori');
});

// Route::get('/wbbm/create', [PostWbbmController::class, 'createWbbm'])->name("wbbm-create");

Route::get('/wbbm/create', [PostWbbmController::class, 'createWbbm'])->name("wbbm-create");
Route::post('/postcategories', [PostWbbmController::class, 'storeCategories'])->name("categories-store");
Route::post('/postSubcategories', [PostWbbmController::class, 'storeSubCategories'])->name("subcategories-store");
Route::post('/postItems', [PostWbbmController::class, 'storeItem'])->name("items-store");
Route::post('/postDocumentItems', [PostWbbmController::class, 'storeItemDocument'])->name("documentItem-store");


Route::get('/wbbm/monitor', [GetWbbmController::class, 'monitorWbbm'])->name("wbbm-monitor");
// Route::post('/student/school', [StudentController::class, 'store'])->name("student-school-store");
// Route::delete('/student/delete/{id}', [StudentController::class, 'destroy'])->name("student-delete");
// Route::get('/student/edit/{id}', [StudentController::class, 'edit'])->name("student-edit");
// Route::put('/student/update/{id}', [StudentController::class, 'update'])->name("student-update");
