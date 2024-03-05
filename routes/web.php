<?php

use App\Livewire\Categories\CategoriesComponent;
use App\Livewire\Consumption\ConsumptionComponent;
use App\Livewire\Department\DepartmentComponent;
use App\Livewire\Products\ProductsComponent;
use App\Livewire\Replenishment\ReplenishmentComponent;
use App\Livewire\Roles\RolesComponent;
use App\Livewire\Suppliers\SupplierComponent;
use App\Livewire\Unit\UnitComponent;
use App\Livewire\User\UserComponent;
use App\Livewire\UserRoles\UserRolesComponent;
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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    
    Route::prefix('categories')->as('categories.')->controller(CategoriesComponent::class)->group(function(){

        Route::get('index' , CategoriesComponent::class)->name('index');
        Route::get('new' , 'new')->name('new');
        Route::post('create' , 'create')->name('create');
        Route::get('edit/{id}' , 'edit')->name('edit');
        Route::put('update' , 'update')->name('update');

    });

    Route::prefix('department')->as('department.')->controller(DepartmentComponent::class)->group(function(){

        Route::get('index' , DepartmentComponent::class)->name('index');
        Route::get('new' , 'new')->name('new');
        Route::post('create' , 'create')->name('create');
        Route::get('edit/{id}' , 'edit')->name('edit');
        Route::put('update' , 'update')->name('update');

    });

    Route::prefix('supplier')->as('supplier.')->controller(SupplierComponent::class)->group(function(){

        Route::get('index' , SupplierComponent::class)->name('index');
        Route::get('new' , 'new')->name('new');
        Route::post('create' , 'create')->name('create');
        Route::get('edit/{id}' , 'edit')->name('edit');
        Route::put('update' , 'update')->name('update');

    });
    
    Route::prefix('products')->as('products.')->controller(ProductsComponent::class)->group(function(){

        Route::get('index' , ProductsComponent::class)->name('index');
        Route::get('new' , 'new')->name('new');
        Route::post('create' , 'create')->name('create');
        Route::get('edit/{id}' , 'edit')->name('edit');
        Route::put('update' , 'update')->name('update');

    });

    Route::get('Consumption/index' , ConsumptionComponent::class)->name('consumption.index');
    Route::get('Replenishment/index' , ReplenishmentComponent::class)->name('replenishment.index');

    Route::prefix('User')->as('user.')->controller(UserComponent::class)->group(function(){

        Route::get('index' , UserComponent::class)->name('index');
        Route::get('new' , 'new')->name('new');
        Route::post('create' , 'create')->name('create');
        Route::get('edit/{id}' , 'edit')->name('edit');
        Route::put('update' , 'update')->name('update');

    });

    Route::prefix('Unit')->as('unit.')->controller(UnitComponent::class)->group(function(){
        Route::get('index', UnitComponent::class)->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store','store')->name('store');
        Route::get('edit/{id}' , 'edit')->name('edit');
        Route::put('update' , 'update')->name('update');
        Route::put('destroy' , 'destroy')->name('destroy');
    });

    Route::get('/generate-password', [UserComponent::class, 'generatePassword'])->name('generate.password');
    Route::get('Roles/index' , RolesComponent::class)->name('roles.index');
    Route::get('User_roles/index/{id}' , UserRolesComponent::class)->name('user_roles.index');

});
