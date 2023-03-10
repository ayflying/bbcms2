<?php
declare (strict_types = 1);

namespace app\index\controller;

use app\BaseController;
use think\facade\View;

class Index extends BaseController
{
    public function index()
    {
        return $this->fetch("/index");
    }
}
