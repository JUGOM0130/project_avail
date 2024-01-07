<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\IdeaNotesController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\TaskController;
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
    return view('common.index');
});

Route::prefix('/task')->group(function () {
    Route::get('/', [TaskController::class, 'index'])->name("task.index");
    Route::get('/create/{contact_id?}', [TaskController::class, 'create'])->name("task.create");
    Route::post('/store', [TaskController::class, 'store'])->name("task.store");
    Route::get('/show/{id}', [TaskController::class, 'show'])->name('task.show');
    Route::delete('/destroy/{id}', [TaskController::class, 'destroy'])->name('task.destroy');
    Route::put('/update', [TaskController::class, 'update'])->name('task.update');
    Route::get('/edit/{id}', [TaskController::class, 'edit'])->name('task.edit');
});

Route::prefix('/mail')->group(function () {
    Route::post('/send', [MailController::class, 'contactNotification'])->name('contactNotification');
});

/**認証機能追加 */
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth']], function () {
    Route::resource('/contact', ContactsController::class);

    Route::prefix('/contact')->group(function () {
        Route::get('/', [ContactController::class, 'index'])->name("contact.index");
        Route::get('/create', [ContactController::class, 'create'])->name("contact.create");
        Route::post('/store', [ContactController::class, 'store'])->name("contact.store");
        Route::get('/show/{id}', [ContactController::class, 'show'])->name('contact.show');
        Route::delete('/destroy/{id}', [ContactController::class, 'destroy'])->name('contact.destroy');
        Route::put('/update', [ContactController::class, 'update'])->name('contact.update');
        Route::get('/edit/{id}', [ContactController::class, 'edit'])->name('contact.edit');
    });

    /*Route::prefix('/ideanotes')->group(function () {
    Route::get('/', [IdeaNotesController::class, 'index'])->name("ideanotes.index");
    Route::get('/create/{id}', [IdeaNotesController::class, 'create'])->name("ideanotes.create");
    Route::post('/store', [IdeaNotesController::class, 'store'])->name("ideanotes.store");
    Route::get('/show/{id}', [IdeaNotesController::class, 'show'])->name('ideanotes.show');
    Route::delete('/destroy/{id}', [IdeaNotesController::class, 'destroy'])->name('ideanotes.destroy');
    Route::put('/update', [IdeaNotesController::class, 'update'])->name('ideanotes.update');
    Route::get('/edit/{id}', [IdeaNotesController::class, 'edit'])->name('ideanotes.edit');
    });*/
    Route::resource('ideanotes', IdeaNotesController::class);
});