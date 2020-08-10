<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\facade\Route;

Route::get('think', function () {
    return 'hello,ThinkPHP6!';
});

Route::get('hello/:name', 'index/hello');


//Route::rule('admin/:controller/:action', 'admin.:controller/:action');

/*
Route::rule('tid/:tid',"/portal/Lists");
Route::get('aid/:aid',"portal/Article");
*/

Route::rule('tid/[:tid]','\app\portal\controller\Lists@index','GET');
Route::rule('aid/[:aid]','\app\portal\controller\Article@index','GET');
Route::rule('add/:tid','\app\portal\controller\Post@add','GET|POST');
Route::rule('edit/:aid','\app\portal\controller\Post@edit','GET|POST');

Route::rule('uid/:uid','\app\member\controller\index@index','GET');