<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\CommentController;

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

//Welcome Page
Route::get('/',[FeedbackController::class, 'showUsersFeedback'])->name('welcome');

//View Comments
Route::post('/comments/{id}', [CommentController::class, 'justComment'])->name('justComments');

//User Registration Routes
Route::get('/users/register', function () {
    return view('registration');
})->name('sign_up');
Route::post('/users/register',[UserController::class, 'userRegister'])->name('userRegister');

//User Login Routes
Route::get('/users/login', function () {
    return view('userLogin');
})->name('UserLogin');
Route::post('/users/login',[UserController::class, 'userLogin'])->name('login');


//Middleware for authentication of Users
Route::middleware(['checkToken'])->group(function () {
    // User Dashboard Routes
    Route::get('/users/dashboard', [FeedbackController::class, 'UsersFeedback'])->name('usersMain');

    // User logout
    Route::post('/users/logout', [UserController::class, 'logout'])->name('userLogout');

    // User add feedback Routes
    Route::get('/users/feedback', function () {
        return view('feedbackForm');
    })->name('giveFeedback');

    Route::post('/users/feedback', [FeedbackController::class, 'addFeedback'])->name('saveFeedback');

    // User View and add Comments route
    Route::post('users/comments/{id}', [CommentController::class, 'viewComment'])->name('viewComments');
    Route::post('users/comments', [CommentController::class, 'addComment'])->name('addComments');

    // User Vote Route
    Route::post('users/vote/{id}', [FeedbackController::class, 'voteFeedback'])->name('voteFeedback');
});

//Admin Login
Route::get('/admin/login', function () {
    return view('adminLogin');
})->name('AdminLogin');
Route::post('/admin/login',[AdminController::class, 'adminLogin'])->name('adminLogin');


//Middleware for authentication of Users
Route::middleware(['checkAdminToken'])->group(function () {
    // Admin Dashboard
    Route::get('/admin/dashboard', function () {
        return view('adminDashboard');
    })->name('adDashboard');

    // Admin show and delete users Route
    Route::get('/admin/users', [AdminController::class, 'showUser'])->name('users');
    Route::delete('/admin/users/{id}', [AdminController::class, 'deleteUser'])->name('deleteUser');

    // Admin logout
    Route::post('/admin/logout', [AdminController::class, 'adminLogout'])->name('adminLogout');

    // Feedback Routes
    Route::get('/users/feedbacks', [FeedbackController::class, 'showFeedback'])->name('viewFeedback');

    // Comments
    Route::post('admin/comments/{id}', [CommentController::class, 'adminViewComment'])->name('adminViewComments');
    Route::post('admin/comments/disable/{id}', [CommentController::class, 'disableComment'])->name('disableComments');
});
