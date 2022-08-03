<?php
/*
 * @Author: 贾二小
 * @Date: 2022-07-17 22:22:36
 * @LastEditTime: 2022-07-17 22:23:00
 * @LastEditors: 贾二小
 * @FilePath: /laravel-api/app/Models/Role.php
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role as ModelsRole;

class Role extends ModelsRole
{
    use HasFactory;
    protected $with = ['permissions'];
}
