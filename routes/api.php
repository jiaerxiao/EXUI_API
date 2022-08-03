<?php
/*
 * @Author: 贾二小
 * @Date: 2022-06-28 22:36:21
 * @LastEditTime: 2022-07-24 22:33:24
 * @LastEditors: 贾二小
 * @FilePath: /laravel-api/routes/api.php
 */

use App\Http\Controllers\CodeController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RegistrController;
use App\Http\Controllers\RoleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::get('/', function () {
    return config('system');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('registr', RegistrController::class);
Route::post('login', LoginController::class);
Route::get('logout', LogoutController::class);
Route::post('account/forget-password', ForgetPasswordController::class);

Route::post('code/send', [CodeController::class, 'send']);
Route::post('code/not_exist_user', [CodeController::class, 'notExistUser']);
Route::post('code/exist_user', [CodeController::class, 'existUser']);
Route::post('code/user/{type}', [CodeController::class, 'user']);

Route::apiResource('permission', PermissionController::class);
Route::apiResource('role', RoleController::class);
Route::apiResource('config', ConfigController::class);
Route::get('menu/tree', [MenuController::class, 'tree']);
Route::apiResource('menu', MenuController::class);
