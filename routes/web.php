<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CMSController;


// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', [CMSController::class, 'index'])->name('home');
Route::get('/blog/{id}', [CMSController::class, 'getBlog'])->name('blog.show');

Route::get('/about', [CMSController::class, 'about'])->name('about');
Route::get('/test', [CMSController::class, 'test'])->name('test');

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('email-sent', [AuthController::class, 'sendEmail'])->name('sentEmail');



Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

// Route::post('/blog/{blogId}/comment', [CommentController::class, 'store'])->name('comments.store');
Route::post('blog/{blogId}/comment', [CommentController::class, 'store'])->name('comments.store');

Route::post('comments', [CommentController::class, 'store'])->name('comments.store');
Route::delete('/comment/{commentId}', [CommentController::class, 'destroy'])->name('comments.destroy');
Route::get('/comment/{commentId}/edit', [CommentController::class, 'edit'])->name('comments.edit');
Route::put('/comment/{commentId}', [CommentController::class, 'update'])->name('comments.update');

Route::resource('blogs', BlogController::class)->middleware('auth');
Route::resource('users', UserController::class)->middleware('auth');

Route::post('/upload-image', [ImageUploadController::class, 'upload'])->name('upload.image');





