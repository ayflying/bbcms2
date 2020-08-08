<?php
declare (strict_types=1);

namespace app\admin\controller;

use app\common\model\MemberUser;
use app\Request;
use think\facade\View;

class Member extends Base
{

    public function index()
    {
        $list = MemberUser::order("uid", "desc")->paginate(50);
        return View::fetch("/member-list", ['list' => $list]);
    }

    public function member_add(Request $request)
    {
        if ($request->isPost()) {
            $post = $request->post(['email', 'password', 'gid', 'username']);
            $db = MemberUser::signUp($post['email'], $post['password']);
            return $db;
        } else {
            return View::fetch("/member-add");
        }


    }
}
