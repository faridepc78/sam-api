<?php

use App\Http\Controllers\Api\V1\Admin\Category\CategoryController;
use App\Http\Controllers\Api\V1\Admin\Clerk\ClerkController;
use App\Http\Controllers\Api\V1\Admin\Cost\CostController;
use App\Http\Controllers\Api\V1\Admin\Fee\FeeController;
use App\Http\Controllers\Api\V1\Admin\Order\OrderController;
use App\Http\Controllers\Api\V1\Admin\Permission\PermissionController;
use App\Http\Controllers\Api\V1\Admin\Repair\RepairController;
use App\Http\Controllers\Api\V1\Admin\Report\ReportController;
use App\Http\Controllers\Api\V1\Admin\Role\RoleController;
use App\Http\Controllers\Api\V1\Admin\Salary\SalaryController;
use App\Http\Controllers\Api\V1\Admin\Space\SpaceController;
use App\Http\Controllers\Api\V1\Admin\User\UserController;
use App\Http\Controllers\Api\V1\Admin\WarehouseEntrance\WarehouseEntranceController;
use App\Http\Controllers\Api\V1\Admin\WarehouseExit\WarehouseExitController;
use App\Http\Controllers\Api\V1\Auth\AuthController;
use Illuminate\Support\Facades\Route;

/*START AUTH*/

Route::group(['prefix' => 'v1/auth',
    'as' => 'api.v1.auth.',
    'middleware' => ['throttle:50,1']], function () {

    Route::post('login',
        [AuthController::class, 'login'])
        ->name('login');

    Route::post('logout',
        [AuthController::class, 'logout'])
        ->name('logout')
        ->middleware('auth:sanctum');

});

/*END AUTH*/

/*START ADMIN*/

Route::group(['prefix' => 'v1/admin',
    'as' => 'api.v1.admin.',
    'middleware' => ['throttle:50,1',
        'auth:sanctum']], function () {

    Route::apiResource('permissions',
        PermissionController::class)
        ->only('index');

    Route::apiResource('roles',
        RoleController::class);

    Route::apiResource('users',
        UserController::class);

    Route::apiResource('spaces',
        SpaceController::class);

    Route::apiResource('orders',
        OrderController::class);

    Route::apiResource('reports',
        ReportController::class)
        ->only('index');

    Route::apiResource('clerks',
        ClerkController::class);

    Route::apiResource('salaries',
        SalaryController::class);

    Route::apiResource('fees',
        FeeController::class);

    Route::apiResource('categories',
        CategoryController::class);

    Route::apiResource('warehouse_entrances',
        WarehouseEntranceController::class);

    Route::apiResource('warehouse_exits',
        WarehouseExitController::class);

    Route::apiResource('repairs',
        RepairController::class);

    Route::apiResource('costs',
        CostController::class);

});

/*END ADMIN*/
