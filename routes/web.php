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

// ============================== BACKEND ========================
Route::name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])
        ->name('dashboard');

    // Authentication
    Route::name('auth.')->prefix('auth')->group(function () {
        Route::get('/login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'showLoginForm'])
            ->name('login');
        Route::post('/login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'login']);
        Route::post('/logout', [App\Http\Controllers\Admin\Auth\LoginController::class, 'logout'])
            ->name('logout');
        Route::get('/register', [App\Http\Controllers\Admin\Auth\RegisterController::class, 'showRegisterForm'])
            ->name('register');
        Route::post('/register', [App\Http\Controllers\Admin\Auth\RegisterController::class, 'register']);
    });

    // Category
    Route::get('/categories', [App\Http\Controllers\Admin\CategoryController::class, 'index'])
        ->name('categories.index')
        ->middleware('can:category-view');
    Route::get('/categories/create', [App\Http\Controllers\Admin\CategoryController::class, 'create'])
        ->name('categories.create')
        ->middleware('can:category-add');
    Route::post('/categories', [App\Http\Controllers\Admin\CategoryController::class, 'store'])
        ->name('categories.store');
    Route::get('/categories/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'show'])
        ->name('categories.show');
    Route::get('/categories/{id}/edit', [App\Http\Controllers\Admin\CategoryController::class, 'edit'])
        ->name('categories.edit')
        ->middleware('can:category-edit');
    Route::put('/categories/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'update'])
        ->name('categories.update');
    Route::delete('/categories/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy'])
        ->name('categories.destroy')
        ->middleware('can:category-delete');
    Route::get('/categories-with-deleted', [App\Http\Controllers\Admin\CategoryController::class, 'indexWithDeleted'])
        ->name('categories.indexWithDeleted');
    Route::post('/categories-force-delete/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'forceDelete'])
        ->name('categories.forceDelete');
    Route::get('/categories-restore/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'restore'])
        ->name('categories.restore');

    // Brand
    Route::get('/brands', [App\Http\Controllers\Admin\BrandController::class, 'index'])
        ->name('brands.index')
        ->middleware('can:brand-view');
    Route::get('/brands/create', [App\Http\Controllers\Admin\BrandController::class, 'create'])
        ->name('brands.create')
        ->middleware('can:brand-add');
    Route::post('/brands', [App\Http\Controllers\Admin\BrandController::class, 'store'])
        ->name('brands.store');
    Route::get('/brands/{id}', [App\Http\Controllers\Admin\BrandController::class, 'show'])
        ->name('brands.show');
    Route::get('/brands/{id}/edit', [App\Http\Controllers\Admin\BrandController::class, 'edit'])
        ->name('brands.edit')
        ->middleware('can:brand-edit');
    Route::put('/brands/{id}', [App\Http\Controllers\Admin\BrandController::class, 'update'])
        ->name('brands.update');
    Route::delete('/brands/{id}', [App\Http\Controllers\Admin\BrandController::class, 'destroy'])
        ->name('brands.destroy')
        ->middleware('can:brand-delete');
    Route::get('/brands-with-deleted', [App\Http\Controllers\Admin\BrandController::class, 'indexWithDeleted'])
        ->name('brands.indexWithDeleted');
    Route::post('/brands-force-delete/{id}', [App\Http\Controllers\Admin\BrandController::class, 'forceDelete'])
        ->name('brands.forceDelete');
    Route::get('/brands-restore/{id}', [App\Http\Controllers\Admin\BrandController::class, 'restore'])
        ->name('brands.restore');

    // Product
    Route::get('/products', [App\Http\Controllers\Admin\ProductController::class, 'index'])
        ->name('products.index')
        ->middleware('can:product-view');
    Route::get('/products/create', [App\Http\Controllers\Admin\ProductController::class, 'create'])
        ->name('products.create')
        ->middleware('can:product-add');
    Route::post('/products', [App\Http\Controllers\Admin\ProductController::class, 'store'])
        ->name('products.store');
    Route::get('/products/{id}', [App\Http\Controllers\Admin\ProductController::class, 'show'])
        ->name('products.show');
    Route::get('/products/{id}/edit', [App\Http\Controllers\Admin\ProductController::class, 'edit'])
        ->name('products.edit')
        ->middleware('can:product-edit');
    Route::put('/products/{id}', [App\Http\Controllers\Admin\ProductController::class, 'update'])
        ->name('products.update');
    Route::delete('/products/{id}', [App\Http\Controllers\Admin\ProductController::class, 'destroy'])
        ->name('products.destroy')
        ->middleware('can:product-delete');

    // Post
    Route::get('/posts', [App\Http\Controllers\Admin\PostController::class, 'index'])
        ->name('posts.index')
        ->middleware('can:post-view');
    Route::post('/posts/search', [App\Http\Controllers\Admin\PostController::class, 'index'])
        ->name('posts.search')
        ->middleware('can:post-view');
    Route::get('/posts/create', [App\Http\Controllers\Admin\PostController::class, 'create'])
        ->name('posts.create')
        ->middleware('can:post-add');
    Route::post('/posts', [App\Http\Controllers\Admin\PostController::class, 'store'])
        ->name('posts.store');
    Route::get('/posts/{id}', [App\Http\Controllers\Admin\PostController::class, 'show'])
        ->name('posts.show');
    Route::get('/posts/{id}/edit', [App\Http\Controllers\Admin\PostController::class, 'edit'])
        ->name('posts.edit')
        ->middleware('can:post-edit,id');
    Route::put('/posts/{id}', [App\Http\Controllers\Admin\PostController::class, 'update'])
        ->name('posts.update');
    Route::delete('/posts/{id}', [App\Http\Controllers\Admin\PostController::class, 'destroy'])
        ->name('posts.destroy')
        ->middleware('can:post-delete,id');
    Route::get('/posts-with-deleted', [App\Http\Controllers\Admin\PostController::class, 'indexWithDeleted'])
        ->name('posts.indexWithDeleted');
    Route::post('/posts-force-delete/{id}', [App\Http\Controllers\Admin\PostController::class, 'forceDelete'])
        ->name('posts.forceDelete');
    Route::get('/posts-restore/{id}', [App\Http\Controllers\Admin\PostController::class, 'restore'])
        ->name('posts.restore');
    Route::get('/posts-export-excel', [App\Http\Controllers\Admin\PostController::class, 'excelExport'])
        ->name('posts.excelExport');

    // User
    Route::get('/users', [App\Http\Controllers\Admin\UserController::class, 'index'])
        ->name('users.index')
        ->middleware('can:user-view');
    Route::post('/users/search', [App\Http\Controllers\Admin\UserController::class, 'index'])
        ->name('users.search')
        ->middleware('can:user-view');
    Route::get('/users/create', [App\Http\Controllers\Admin\UserController::class, 'create'])
        ->name('users.create')
        ->middleware('can:user-add');
    Route::post('/users', [App\Http\Controllers\Admin\UserController::class, 'store'])
        ->name('users.store');
    Route::get('/users/{id}', [App\Http\Controllers\Admin\UserController::class, 'show'])
        ->name('users.show');
    Route::get('/users/{id}/edit', [App\Http\Controllers\Admin\UserController::class, 'edit'])
        ->name('users.edit')
        ->middleware('can:user-edit,id');
    Route::put('/users/{id}', [App\Http\Controllers\Admin\UserController::class, 'update'])
        ->name('users.update');
    Route::delete('/users/{id}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])
        ->name('users.destroy')
        ->middleware('can:user-delete,id');
    Route::get('/users-with-deleted', [App\Http\Controllers\Admin\UserController::class, 'indexWithDeleted'])
        ->name('users.indexWithDeleted');
    Route::post('/users-force-delete/{id}', [App\Http\Controllers\Admin\UserController::class, 'forceDelete'])
        ->name('users.forceDelete');
    Route::get('/users-restore/{id}', [App\Http\Controllers\Admin\UserController::class, 'restore'])
        ->name('users.restore');
    /* Test WORD download */
    Route::get('/users/{id}', [App\Http\Controllers\Admin\UserController::class, 'word'])
        ->name('users.word');

    // Admin
//    Route::resource('admins', App\Http\Controllers\Admin\AdminController::class);
    Route::get('/admins', [App\Http\Controllers\Admin\AdminController::class, 'index'])
        ->name('admins.index')
        ->middleware('can:admin-view');
    Route::get('/admins/create', [App\Http\Controllers\Admin\AdminController::class, 'create'])
        ->name('admins.create')
        ->middleware('can:admin-add');
    Route::post('/admins', [App\Http\Controllers\Admin\AdminController::class, 'store'])
        ->name('admins.store');
    Route::get('/admins/{id}', [App\Http\Controllers\Admin\AdminController::class, 'show'])
        ->name('admins.show');
    Route::get('/admins/{id}/edit', [App\Http\Controllers\Admin\AdminController::class, 'edit'])
        ->name('admins.edit')
        ->middleware('can:admin-edit');
    Route::put('/admins/{id}', [App\Http\Controllers\Admin\AdminController::class, 'update'])
        ->name('admins.update');
    Route::delete('/admins/{id}', [App\Http\Controllers\Admin\AdminController::class, 'destroy'])
        ->name('admins.destroy')
        ->middleware('can:admin-delete');
    Route::get('/admins-edit-permission/{id}', [App\Http\Controllers\Admin\AdminController::class, 'editPermission'])
        ->name('admins.editPermission');
    Route::post('/admins-update-permission', [App\Http\Controllers\Admin\AdminController::class, 'updatePermission'])
        ->name('admins.updatePermission');
    Route::get('/admins-with-deleted', [App\Http\Controllers\Admin\AdminController::class, 'indexWithDeleted'])
        ->name('admins.indexWithDeleted');
    Route::post('/admins-force-delete/{id}', [App\Http\Controllers\Admin\AdminController::class, 'forceDelete'])
        ->name('admins.forceDelete');
    Route::get('/admins-restore/{id}', [App\Http\Controllers\Admin\AdminController::class, 'restore'])
        ->name('admins.restore');
    Route::get('/admins-edit-role/{id}', [App\Http\Controllers\Admin\AdminController::class, 'editRole'])
        ->name('admins.editRole');
    Route::post('/admins-update-role', [App\Http\Controllers\Admin\AdminController::class, 'updateRole'])
        ->name('admins.updateRole');

    // Role
    Route::resource('roles', App\Http\Controllers\Admin\RoleController::class);
    Route::get('/roles-with-deleted', [App\Http\Controllers\Admin\RoleController::class, 'indexWithDeleted'])
        ->name('roles.indexWithDeleted');
    Route::post('/roles-force-delete/{id}', [App\Http\Controllers\Admin\RoleController::class, 'forceDelete'])
        ->name('roles.forceDelete');
    Route::get('/roles-restore/{id}', [App\Http\Controllers\Admin\RoleController::class, 'restore'])
        ->name('roles.restore');
    Route::get('/roles-edit-permission/{id}', [App\Http\Controllers\Admin\RoleController::class, 'editPermission'])
        ->name('roles.editPermission');
    Route::post('/roles-update-permission', [App\Http\Controllers\Admin\RoleController::class, 'updatePermission'])
        ->name('roles.updatePermission');

    // Permission
    Route::resource('permissions', App\Http\Controllers\Admin\PermissionController::class);
    Route::get('/permissions-with-deleted', [App\Http\Controllers\Admin\PermissionController::class, 'indexWithDeleted'])
        ->name('permissions.indexWithDeleted');
    Route::post('/permissions-force-delete/{id}', [App\Http\Controllers\Admin\PermissionController::class, 'forceDelete'])
        ->name('permissions.forceDelete');
    Route::get('/permissions-restore/{id}', [App\Http\Controllers\Admin\PermissionController::class, 'restore'])
        ->name('permissions.restore');

    // Calendar
    Route::get('/calendars/getEvent', [App\Http\Controllers\Admin\CalendarController::class, 'getEvent'])->name('calendars.getEvent');
    Route::post('/calendars/createEvent', [App\Http\Controllers\Admin\CalendarController::class, 'createEvent'])->name('calendars.createEvent');
    Route::post('/calendars/deleteEvent', [App\Http\Controllers\Admin\CalendarController::class, 'deleteEvent'])->name('calendars.deleteEvent');

});
// ============================== END BACKEND ========================




// ============================== FRONTEND ========================
Route::get('/', [App\Http\Controllers\PageController::class, 'index'])->name('home');
Route::namespace('Auth')->group(function () {
    Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])
        ->name('login');
    Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
    Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])
        ->name('logout');
    Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegisterForm'])
        ->name('register');
    Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);
});

// Contact
Route::get('/contact', [App\Http\Controllers\PageController::class, 'showContact'])->name('contact');

// Products
Route::get('/products', [App\Http\Controllers\PageController::class, 'indexProduct'])->name('products.index');

// Product Detail
Route::get('/product-detail', [App\Http\Controllers\PageController::class, 'productDetail'])->name('product-detail');

// Wishlist
Route::get('/wishlists', [App\Http\Controllers\PageController::class, 'indexWishlist'])->name('wishlists.index');

// Cart
Route::get('/carts', [App\Http\Controllers\PageController::class, 'indexCart'])->name('carts.index');

// Checkout
Route::get('/checkouts', [App\Http\Controllers\PageController::class, 'indexCheckout'])->name('checkouts.index');

// https://unisharp.github.io/laravel-filemanager/installation(REVIEW AGAIN)
//Route::group(['prefix' => 'filemanager', 'middleware' => ['web', 'auth']], function () {
//    \UniSharp\LaravelFilemanager\Lfm::routes();
//});
Route::group(['prefix' => 'filemanager'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
// ============================== END FRONTEND ========================


// ============================== TEST LARAVEL ========================
Route::get('/test-laravel/indexLaravelTest', [\App\Http\Controllers\TestController::class, 'indexLaravelTest']);
Route::get('/test-laravel/indexLaravelProject', [\App\Http\Controllers\TestController::class, 'indexLaravelProject']);
Route::get('/test1', [\App\Http\Controllers\TestController::class, 'test1']);
Route::get('/test2', [\App\Http\Controllers\TestController::class, 'test2']);


// ============================== END TEST LARAVEL ========================




// ============================== TEST JS ========================
/* Get holding event */
Route::get('/test-js/index', [App\Http\Controllers\TestJSController::class, 'index']);

/* Get holding event */
Route::get('/test-js/index1', [App\Http\Controllers\TestJSController::class, 'index1']);

/* Click event */
Route::get('/test-js/index2', [App\Http\Controllers\TestJSController::class, 'index2']);

/* dblclick event */
Route::get('/test-js/index3', [App\Http\Controllers\TestJSController::class, 'index3']);

/* Tag Input 1*/
Route::get('/test-js/index4', [App\Http\Controllers\TestJSController::class, 'index4']);

/* Tag Input 2 */
Route::get('/test-js/index5', [App\Http\Controllers\TestJSController::class, 'index5']);

/* Tag Input 3 */
Route::get('/test-js/index6', [App\Http\Controllers\TestJSController::class, 'index6']);

/*  */
Route::get('/test-js/index7', [App\Http\Controllers\TestJSController::class, 'index7']);

/* Drag & Drop 1 */
Route::get('/test-js/index8', [App\Http\Controllers\TestJSController::class, 'index8']);

/* Drag & Drop 2 */
Route::get('/test-js/index9', [App\Http\Controllers\TestJSController::class, 'index9']);

/*  */
Route::get('/test-js/index10', [App\Http\Controllers\TestJSController::class, 'index10']);

/*  */
Route::get('/test-js/index11', [App\Http\Controllers\TestJSController::class, 'index11']);

/*  */
Route::get('/test-js/index12', [App\Http\Controllers\TestJSController::class, 'index12']);

/*  */
Route::get('/test-js/index13', [App\Http\Controllers\TestJSController::class, 'index13']);

/*  */
Route::get('/test-js/index14', [App\Http\Controllers\TestJSController::class, 'index14']);

/*  */
Route::get('/test-js/index15', [App\Http\Controllers\TestJSController::class, 'index15']);

/*  */
Route::get('/test-js/index16', [App\Http\Controllers\TestJSController::class, 'index16']);

/*  */
Route::get('/test-js/index17', [App\Http\Controllers\TestJSController::class, 'index17']);

/*  */
Route::get('/test-js/index18', [App\Http\Controllers\TestJSController::class, 'index18']);

/*  */
Route::get('/test-js/index19', [App\Http\Controllers\TestJSController::class, 'index19']);

/*  */
Route::get('/test-js/index20', [App\Http\Controllers\TestJSController::class, 'index20']);
// ============================== END TEST JS ========================
