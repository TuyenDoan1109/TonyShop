<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\Auth\LoginController;
use App\Http\Controllers\Api\v1\Auth\RegisterController;
use App\Http\Controllers\API\v1\CategoryController;
use App\Http\Controllers\API\v1\SubcategoryController;
use App\Http\Controllers\Api\v1\UserController;
use App\Http\Controllers\API\v1\BrandController;
use App\Http\Controllers\API\v1\ProductController;
use App\Http\Controllers\API\v1\PostController;
use App\Http\Controllers\API\v1\RoleController;
use App\Http\Controllers\API\v1\PermissionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::namespace('Api\v1')->prefix('v1')->group(function() {

    // ======================== PUBLIC ROUTE ==============================
    // Authentication
    Route::group(['prefix' => 'auth'], function () {
        Route::post('/register', [RegisterController::class, 'register']);
        Route::post('/login', [LoginController::class, 'login']);
    });

    /*
        GOOGLE
        email: doantuyen90@gmail.com
        Client ID: 834956478253-v3nr89i90j8evq6im8o2opq955bmfu2r.apps.googleusercontent.com
        Client secret: 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

     * */

    // Category
    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', [CategoryController::class, 'index']);
        Route::post('/', [CategoryController::class, 'store']);
        Route::get('/{id}', [CategoryController::class, 'show']);
        Route::put('/{id}', [CategoryController::class, 'update']);
        Route::delete('/{id}', [CategoryController::class, 'destroy']);
    });

    // Product
    Route::group(['prefix' => 'products'], function () {
        Route::get('/', [ProductController::class, 'index']);
        Route::post('/', [ProductController::class, 'store']);
        Route::get('/{id}', [ProductController::class, 'show']);
        Route::put('/{id}', [ProductController::class, 'update']);
        Route::delete('/{id}', [ProductController::class, 'destroy']);
    });

    // User
    Route::group(['prefix' => 'users'], function () {
        Route::get('/', [UserController::class, 'index']);
        Route::post('/', [UserController::class, 'store']);
        Route::get('/{id}', [UserController::class, 'show']);
        Route::put('/{id}', [UserController::class, 'update']);
        Route::delete('/{id}', [UserController::class, 'destroy']);
    });

    // ======================== END PUBLIC ROUTE ==============================




    // ============================== PROTECTED ROUTES =========================
    Route::group(['middleware' => ['auth:api']], function() {
        // Auth
        Route::group(['prefix' => 'auth'], function () {
            Route::post('/logout', [LoginController::class, 'logout']);
        });

        // Post
        Route::group(['prefix' => 'posts'], function () {
            Route::get('/', [PostController::class, 'index']);
            Route::post('/', [PostController::class, 'store']);
            Route::get('/{id}', [PostController::class, 'show']);
            Route::put('/{id}', [PostController::class, 'update']);
            Route::delete('/{id}', [PostController::class, 'destroy'])->middleware('can:post-delete,id');
        });

    });
    // ============================== END PROTECTED ROUTES =========================


});
