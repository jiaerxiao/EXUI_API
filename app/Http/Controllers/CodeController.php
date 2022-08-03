<?php
/*
 * @Author: 贾二小
 * @Date: 2022-07-17 23:45:54
 * @LastEditTime: 2022-07-17 23:50:49
 * @LastEditors: 贾二小
 * @FilePath: /laravel-api/app/Http/Controllers/CodeController.php
 */

namespace App\Http\Controllers;

use App\Http\Requests\CodeExistUserRequest;
use App\Http\Requests\CodeNotExistUserRequest;
use App\Http\Requests\CodeRequest;
use App\Services\CodeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CodeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->only(['user']);
    }

    public function send(CodeRequest $request)
    {
        app('code')->send($request->account);
        return $this->success('验证码发送成功');
    }

    public function user(string $type)
    {
        app('code')->send(Auth::user()[$type == 'email' ? 'email' : 'mobile']);
        return $this->success('验证码发送成功');
    }

    /**
     * 不存在的用户发送验证码
     */
    public function notExistUser(CodeNotExistUserRequest $request)
    {
        app('code')->send($request->account);
        return $this->success('验证码发送成功');
    }

    public function existUser(CodeExistUserRequest $request)
    {
        app('code')->send($request->account);
        return $this->success('验证码发送成功');
    }
}
