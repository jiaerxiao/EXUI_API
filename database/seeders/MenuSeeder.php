<?php
/*
 * @Author: 贾二小
 * @Date: 2022-07-24 20:29:16
 * @LastEditTime: 2022-08-13 15:24:47
 * @LastEditors: 贾二小
 * @FilePath: /exuiApi/database/seeders/MenuSeeder.php
 */

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Menu::create(['pid' => 0, 'name' => 'home', 'path' => '/', 'redirect' => '/home', 'meta' => ['title' => '首页', 'icon' => 'Avatar']]);
        Menu::create(['pid' => 0, 'name' => 'abort', 'path' => '/abort',  'component' => '', 'meta' => ['title' => '关于', 'icon' => 'DataAnalysis']]);
        Menu::create(['pid' => 1, 'name' => 'home', 'path' => '/home',  'component' => '', 'meta' => ['title' => '控制台', 'icon' => 'Chicken']]);
    }
}
