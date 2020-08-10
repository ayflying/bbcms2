<?php
declare (strict_types = 1);

namespace app\portal\controller;

use app\BaseController;

class Index extends BaseController
{
    public function index()
    {
        return '您好！这是一个[portal]示例应用';
    }
}
