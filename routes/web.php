<?php
/*
 * @Author: 贾二小
 * @Date: 2022-06-28 22:36:21
 * @LastEditTime: 2022-07-24 22:20:31
 * @LastEditors: 贾二小
 * @FilePath: /laravel-api/routes/web.php
 */

use App\Models\Menu;
use App\Models\User;
use App\Notifications\EmailValidateCodeNotification;
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

Route::get('/', function () {


    $query = Menu::query();

    $query = $query->where('pid', 0);

    $query = $query->with(['children']);

    return $query->get();
});

Route::get('test', function () {
    return (new EmailValidateCodeNotification())->toMail(User::factory()->make());
});
