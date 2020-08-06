<?php
declare (strict_types=1);

namespace app\admin\controller;

use think\facade\Config;
use think\facade\View;

class Index extends Base
{

    public function index()
    {

        View::assign('menu',Config::get('menu'));
        return View::fetch("/index");
    }

    public function welcome()
    {

        return View::fetch("/welcome");
    }
}
