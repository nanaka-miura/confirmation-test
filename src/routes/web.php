<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Models\Contact;
use App\Actions\Fortify\CreateNewUser;
use Illuminate\Http\Request;



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

Route::get('/', [ContactController::class,'index'])->name('contacts.index');
Route::post('/confirm', [ContactController::class,'confirm']);
Route::post('/confirm/contact', [ContactController::class,'store']);
Route::middleware('auth')->group(function () {
    Route::get('/admin',[AdminController::class,'index']);
});
Route::delete('/contacts/delete',[AdminController::class,'destroy']);
Route::get('/admin/search',[AdminController::class,'search']);
Route::get('/admin/export', [ContactController::class, 'export'])->name('admin.export');
Route::post('/register', function (Request $request) {
    $user = CreateNewUser::create($request->all());
    return redirect('/login')->with('success', '登録が完了しました。ログインしてください。');
});