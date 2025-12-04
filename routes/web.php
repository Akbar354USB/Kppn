<?php

// use App\Http\Controllers\CategoriController;

use App\Http\Controllers\GetWbbmController;
use App\Http\Controllers\GuestBookController;
use App\Http\Controllers\PostWbbmController;
use App\Models\Categories;
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
Route::get('/wbbm/data-pencapaian', [GetWbbmController::class, 'dataCapaian'])->name("wbbm-data");
Route::post('/upload', [GetWbbmController::class, 'storeDok'])->name('upload.store');
Route::delete('/category/delete/{id}', [GetWbbmController::class, 'destroyCategory'])->name("category-delete");
Route::delete('/subcategory/delete/{id}', [GetWbbmController::class, 'destroySubCategory'])->name("subcategory-delete");
Route::delete('/item/delete/{id}', [GetWbbmController::class, 'destroyItem'])->name("item-delete");
Route::delete('/document/delete/{id}', [GetWbbmController::class, 'destroyDocument'])->name("document-delete");
Route::get('/wbbm/cek-progress', [GetWbbmController::class, 'tesProgress'])->name("wbbm-tes-progres");
Route::get('/kategori/{id}/progress', function ($id) {
    $kategori = Categories::with('sub_categories.items.item_documents.upload')->findOrFail($id);

    return response()->json([
        'progress' => $kategori->progress()
    ]);
});




// Route::get('/guest-book/create', [GuestBookController::class, 'create'])->name("guest-book-create");


Route::get('/guest_book/index', [GuestBookController::class, 'index'])->name('guest_book_index');
Route::get('/guest_book/create', [GuestBookController::class, 'create'])->name('guest_book_create');
Route::post('/guest_book', [GuestBookController::class, 'store'])->name('guest_book_store');
Route::get('/guest_book/{id}/edit', [GuestBookController::class, 'edit'])->name('guest_book_edit');
Route::put('/guest_book/{id}', [GuestBookController::class, 'update'])->name('guest_book_update');
Route::delete('/guest_book/{id}', [GuestBookController::class, 'destroy'])->name('guest_book_destroy');
Route::get('/guest-book/print/pdf', [GuestBookController::class, 'printPdf'])
    ->name('guest_book_print_pdf');




// Route::post('/student/school', [StudentController::class, 'store'])->name("student-school-store");
// Route::delete('/student/delete/{id}', [StudentController::class, 'destroy'])->name("student-delete");
// Route::get('/student/edit/{id}', [StudentController::class, 'edit'])->name("student-edit");
// Route::put('/student/update/{id}', [StudentController::class, 'update'])->name("student-update");
