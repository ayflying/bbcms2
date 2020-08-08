<?php
declare (strict_types=1);

namespace app\admin\controller;

use app\common\model\MemberUser;
use think\facade\Cookie;
use think\facade\View;
use think\Request;


class Login
{
    public function index()
    {

        return View::fetch('/login');

    }

    public function login(Request $request)
    {

        $username = $request->post('username');
        $passwrod = $request->post('password');
        $db = MemberUser::login($username, $passwrod);
        if (empty($db)) {
            return json(['status' => -1, "msg" => "登陆失败"]);
        } else {
            Cookie::set("uid",$db['uid']);
            Cookie::set("guid",$db['guid']);
            return json($db);
        }

    }

}
