<?php
/*
 * @Author: 贾二小
 * @Date: 2022-07-16 17:40:45
 * @LastEditTime: 2022-07-23 15:25:01
 * @LastEditors: 贾二小
 * @FilePath: /laravel-api/app/Http/Controllers/LoginController.php
 */

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request)
    {

        $user = User::where(filter_var(request('account'), FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile', $request->account)->first();
        return [
            'user' => new UserResource($user),
            'token' => $user->createToken('auth')->plainTextToken
        ];
    }
}
