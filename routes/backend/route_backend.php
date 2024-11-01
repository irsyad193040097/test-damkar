<?php

//role
Route::group(['prefix'=>'role'], function(){
    Route::get('/', [App\Http\Controllers\Backend\Authentication\RoleController::class, 'index'])->middleware('auth');
    Route::get('/datatables', [App\Http\Controllers\Backend\Authentication\RoleController::class, 'datatables'])->middleware('auth');
    Route::get('/create', [App\Http\Controllers\Backend\Authentication\RoleController::class, 'create'])->middleware('auth');
    Route::post('/store', [App\Http\Controllers\Backend\Authentication\RoleController::class, 'store'])->middleware('auth');
    Route::get('/edit/{id}', [App\Http\Controllers\Backend\Authentication\RoleController::class, 'edit'])->middleware('auth');
    Route::post('/update/{id}', [App\Http\Controllers\Backend\Authentication\RoleController::class, 'update'])->middleware('auth');
    Route::post('/delete', [App\Http\Controllers\Backend\Authentication\RoleController::class, 'delete'])->middleware('auth');

    Route::get('/add_permissions/{id}', [App\Http\Controllers\Backend\Authentication\RoleController::class, 'createPermissions'])->middleware('auth');
    Route::post('/add_permissions/{id}', [App\Http\Controllers\Backend\Authentication\RoleController::class, 'addPermissions'])->middleware('auth');
});

//permission
Route::group(['prefix'=>'permission'], function(){
    Route::get('/', [App\Http\Controllers\Backend\Authentication\PermissionController::class, 'index'])->middleware('auth');
    Route::get('/datatables', [App\Http\Controllers\Backend\Authentication\PermissionController::class, 'datatables'])->middleware('auth');
    Route::get('/create', [App\Http\Controllers\Backend\Authentication\PermissionController::class, 'create'])->middleware('auth');
    Route::post('/store', [App\Http\Controllers\Backend\Authentication\PermissionController::class, 'store'])->middleware('auth');
    Route::get('/edit/{id}', [App\Http\Controllers\Backend\Authentication\PermissionController::class, 'edit'])->middleware('auth');
    Route::post('/update/{id}', [App\Http\Controllers\Backend\Authentication\PermissionController::class, 'update'])->middleware('auth');
    Route::post('/delete', [App\Http\Controllers\Backend\Authentication\PermissionController::class, 'delete'])->middleware('auth');
});

//user
Route::group(['prefix'=>'user'], function(){
    Route::get('/', [App\Http\Controllers\Backend\Authentication\UserController::class, 'index'])->name('user')->middleware('auth');
    Route::get('/datatables', [App\Http\Controllers\Backend\Authentication\UserController::class, 'datatables'])->name('user.datatables')->middleware('auth');
    Route::get('/create', [App\Http\Controllers\Backend\Authentication\UserController::class, 'create'])->name('user.create')->middleware('auth');
    Route::post('/store', [App\Http\Controllers\Backend\Authentication\UserController::class, 'store'])->name('user.store')->middleware('auth');
    Route::get('/edit/{id}', [App\Http\Controllers\Backend\Authentication\UserController::class, 'edit'])->name('user.edit')->middleware('auth');
    Route::post('/update/{id}', [App\Http\Controllers\Backend\Authentication\UserController::class, 'update'])->name('user.update')->middleware('auth');
    Route::post('/delete', [App\Http\Controllers\Backend\Authentication\UserController::class, 'delete'])->name('user.delete')->middleware('auth');

    Route::get('/add_roles/{id}', [App\Http\Controllers\Backend\Authentication\UserController::class, 'createRoles'])->name('user.add_role')->middleware('auth');
    Route::post('/add_roles/{id}', [App\Http\Controllers\Backend\Authentication\UserController::class, 'addRoles'])->name('user.store_role')->middleware('auth');
});

Route::group(['prefix'=>'admin'], function() {
    //post
    Route::get('/category', [App\Http\Controllers\Backend\CategoryController::class, 'index'])->name('category')->middleware('auth');
    Route::get('/category/datatables', [App\Http\Controllers\Backend\CategoryController::class, 'datatables'])->name('category.datatables')->middleware('auth');
    Route::get('/category/create', [App\Http\Controllers\Backend\CategoryController::class, 'create'])->name('category.create')->middleware('auth');
    Route::post('/category/store', [App\Http\Controllers\Backend\CategoryController::class, 'store'])->name('category.store')->middleware('auth');
    Route::get('/category/edit/{id}', [App\Http\Controllers\Backend\CategoryController::class, 'edit'])->name('category.edit')->middleware('auth');
    Route::get('/category/show/{id}', [App\Http\Controllers\Backend\CategoryController::class, 'show'])->name('category.show')->middleware('auth');
    Route::post('/category/update/{id}', [App\Http\Controllers\Backend\CategoryController::class, 'update'])->name('category.update')->middleware('auth');
    Route::post('/category/delete/{id}', [App\Http\Controllers\Backend\CategoryController::class, 'destroy'])->name('category.delete')->middleware('auth');

    //post
    Route::get('/post', [App\Http\Controllers\Backend\PostController::class, 'index'])->name('post')->middleware('auth');
    Route::get('/post/datatables', [App\Http\Controllers\Backend\PostController::class, 'datatables'])->name('post.datatables')->middleware('auth');
    Route::get('/post/create', [App\Http\Controllers\Backend\PostController::class, 'create'])->name('post.create')->middleware('auth');
    Route::post('/post/store', [App\Http\Controllers\Backend\PostController::class, 'store'])->name('post.store')->middleware('auth');
    Route::get('/post/edit/{id}', [App\Http\Controllers\Backend\PostController::class, 'edit'])->name('post.edit')->middleware('auth');
    Route::get('/post/show/{id}', [App\Http\Controllers\Backend\PostController::class, 'show'])->name('post.show')->middleware('auth');
    Route::post('/post/update/{id}', [App\Http\Controllers\Backend\PostController::class, 'update'])->name('post.update')->middleware('auth');
    Route::post('/post/delete/{id}', [App\Http\Controllers\Backend\PostController::class, 'destroy'])->name('post.delete')->middleware('auth');

    //gallery
    Route::get('/gallery', [App\Http\Controllers\Backend\GalleryController::class, 'index'])->name('gallery.index')->middleware('auth');
    Route::get('/gallery/datatables', [App\Http\Controllers\Backend\GalleryController::class, 'datatables'])->name('gallery.datatables')->middleware('auth');
    Route::get('/gallery/create', [App\Http\Controllers\Backend\GalleryController::class, 'create'])->name('gallery.create')->middleware('auth');
    Route::post('/gallery/store', [App\Http\Controllers\Backend\GalleryController::class, 'store'])->name('gallery.store')->middleware('auth');
    Route::get('/gallery/edit/{id}', [App\Http\Controllers\Backend\GalleryController::class, 'edit'])->name('gallery.edit')->middleware('auth');
    Route::post('/gallery/update/{id}', [App\Http\Controllers\Backend\GalleryController::class, 'update'])->name('gallery.update')->middleware('auth');
    Route::get('/gallery/show/{id}', [App\Http\Controllers\Backend\GalleryController::class, 'show'])->name('gallery.show')->middleware('auth');
    Route::post('/gallery/delete/{id}', [App\Http\Controllers\Backend\GalleryController::class, 'destroy'])->name('gallery.delete')->middleware('auth');

    //page
    Route::get('/page', [App\Http\Controllers\Backend\PageController::class, 'index'])->name('page.index')->middleware('auth');
    Route::post('/page/save_nested', [App\Http\Controllers\Backend\PageController::class, 'saveNestedPage'])->name('page.save_nested')->middleware('auth');
    Route::post('/page/create', [App\Http\Controllers\Backend\PageController::class, 'createPage'])->name('page.create')->middleware('auth');
    Route::get('/page/edit/{id}', [App\Http\Controllers\Backend\PageController::class, 'edit'])->name('page.edit')->middleware('auth');
    Route::post('/page/update/{id}', [App\Http\Controllers\Backend\PageController::class, 'update'])->name('page.update')->middleware('auth');
    Route::get('/page/destroy/{id}', [App\Http\Controllers\Backend\PageController::class, 'destroy'])->name('page.delete')->middleware('auth');

    //contact message
    Route::get('/message', [App\Http\Controllers\Backend\ContactController::class, 'index'])->name('contactMessage.index')->middleware('auth');
    Route::get('/message/datatables', [App\Http\Controllers\Backend\ContactController::class, 'datatables'])->name('contactMessage.datatables')->middleware('auth');
    Route::get('/message/show/{id}', [App\Http\Controllers\Backend\ContactController::class, 'show'])->name('contactMessage.show')->middleware('auth');

    //setting
    Route::get('/setting/{id}', [App\Http\Controllers\Backend\SettingController::class, 'settingForm'])->name('setting.form');
    Route::post('/setting/{id}', [App\Http\Controllers\Backend\SettingController::class, 'settingStore'])->name('setting.store');

    // sliders
    Route::group(['prefix' => '/sliders', 'middleware'=>'auth'], function () {
        Route::get('/', [App\Http\Controllers\Backend\SlidersController::class, 'index'])->name('sliders.index');
        Route::get('/datatables', [App\Http\Controllers\Backend\SlidersController::class, 'datatables'])->name('sliders.datatables');
        Route::get('/create', [App\Http\Controllers\Backend\SlidersController::class, 'create'])->name('sliders.create');
        Route::post('/store', [App\Http\Controllers\Backend\SlidersController::class, 'store'])->name('sliders.store');
        Route::get('/edit/{id}', [App\Http\Controllers\Backend\SlidersController::class, 'edit'])->name('sliders.edit');
        Route::post('/update/{id}', [App\Http\Controllers\Backend\SlidersController::class, 'update'])->name('sliders.update');
        Route::post('/delete/{id}', [App\Http\Controllers\Backend\SlidersController::class, 'destroy'])->name('sliders.delete');
    });

    // pengumuman
    Route::group(['prefix' => '/pengumuman', 'middleware'=>'auth'], function () {
        Route::get('/', [App\Http\Controllers\Backend\PengumumanController::class, 'index'])->name('pengumuman.index');
        Route::get('/datatables', [App\Http\Controllers\Backend\PengumumanController::class, 'datatables'])->name('pengumuman.datatables');
        Route::get('/create', [App\Http\Controllers\Backend\PengumumanController::class, 'create'])->name('pengumuman.create');
        Route::post('/store', [App\Http\Controllers\Backend\PengumumanController::class, 'store'])->name('pengumuman.store');
        Route::get('/edit/{id}', [App\Http\Controllers\Backend\PengumumanController::class, 'edit'])->name('pengumuman.edit');
        Route::post('/update/{id}', [App\Http\Controllers\Backend\PengumumanController::class, 'update'])->name('pengumuman.update');
        Route::post('/delete/{id}', [App\Http\Controllers\Backend\PengumumanController::class, 'destroy'])->name('pengumuman.delete');
    });
});

Route::post('/upload', [App\Http\Controllers\TinymceController::class, 'upload'])->middleware('auth');