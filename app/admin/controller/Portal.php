<?php
declare (strict_types=1);

namespace app\admin\controller;

use app\model\PortalMenu;
use think\facade\View;
use think\Request;

class Portal
{

    public function menu()
    {

        return View::fetch('/portal/menu');
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
