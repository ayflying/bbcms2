<?php
declare (strict_types=1);

namespace app\admin\controller;

use app\model\PortalMenu;
use think\facade\View;
use think\Request;

class Portal
{

    public function menu(Request $request)
    {
        if ($request->isPost()) {
            $name = $request->post('name');
            $pid = $request->post('pid') ?? 0;
            $db = PortalMenu::add($name, $pid);
            return $db;
        } else {
            $list = PortalMenu::order("pid")->select();
            return View::fetch('/portal/menu',['list'=>$list]);
        }
    }

    public function menu_add(Request $request)
    {
        if ($request->isPost()) {
            $name = $request->post('name');
            $pid = $request->post('pid') ?? 0;
            $db = PortalMenu::add($name, $pid);
            return $db;
        } else {
            return View::fetch("/portal/menu-add");
        }

    }

}
