<?php

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

/*
|--------------------------------------------------------------------------
| Public Route
|--------------------------------------------------------------------------
|
| You can list public API for any user in here. These routes are not guarded
| by any authentication system. In other words, any user can access it directly.
| Remember not to list anything of importance, use authenticate route instead.
*/

Route::get('/', 'LandingController')->name('landing');
Route::resource('books', 'User\BookController')->only('index', 'show');

/*
|--------------------------------------------------------------------------
| Unauthenticated Route
|--------------------------------------------------------------------------
|
| You can list public API for any user in here. These routes are meant
| to be used for guests and are not guarded by any authentication system.
| Remember not to list anything of importance, use authenticate route instead.
*/

Route::middleware('guest')->group(function () {
    Route::resources([
        'login' => 'Auth\LoginController',
        'register' => 'Auth\RegisterController',
    ], ['only' => ['index', 'store']]);
});

/*
|--------------------------------------------------------------------------
| Authenticated Route
|--------------------------------------------------------------------------
|
| In here you can list any route for authenticated user. These routes
| are meant to be used privately since the access is exclusive to authenticated
| user who had obtained their sanctum token from login API!
*/

Route::middleware('auth')->group(function () {
    Route::post('logout', 'Auth\LogoutController')->name('logout');
    Route::get('histories', 'User\HistoryController')->name('history');
    Route::post('borrow/{id}', 'User\BorrowController')->name('borrow');
    Route::resource('loans', 'User\LoanController')->only('index', 'destroy');
    Route::resource('profile', 'User\ProfileController')->only('index', 'create', 'store');

    Route::middleware('role:admin')->as('admin.')->group(function () {
        Route::get('dashboard', 'Admin\DashboardController')->name('dashboard');

        Route::prefix('main')->group(function () {
            Route::resources([
                'books' => 'Admin\BookController',
                'authors' => 'Admin\AuthorController',
                'categories' => 'Admin\CategoryController',
                'publishers' => 'Admin\PublisherController',
                'borrow' => 'Admin\BorrowController',
                'history' => 'Admin\HistoryController',
            ]);
        });

        Route::prefix('admin')->group(function () {
            Route::resources([
                'users' => 'Admin\UserController',
                'roles' => 'Admin\RoleController',
                'permissions' => 'Admin\PermissionController',
                'application' => 'Admin\ApplicationController',
            ]);
        });

        Route::prefix('audit')->group(function () {
            Route::resources([
                'auth' => 'Admin\AuthController',
                'model' => 'Admin\ModelController',
                'query' => 'Admin\QueryController',
                'system' => 'Admin\SystemController',
            ], ['only' => ['index', 'show']]);
        });
    });
});
