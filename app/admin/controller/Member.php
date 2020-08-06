<?php
declare (strict_types=1);

namespace app\admin\controller;

use app\model\MemberUser;
use think\facade\View;

class Member extends Base
{

    public function index()
    {
        $list = MemberUser::order("uid", "desc")->paginate(50);
        return View::fetch("/member-list", ['list' => $list]);
    }
}
