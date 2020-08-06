<?php
/**
 * menu.php
 * ${THROWS_DOC}
 * @author An Yang
 * @time 2020/8/6 15:36
 */

return [
    'member' => [
        'name' => "会员管理",
        'icon' => '&#xe6b8;',
        'data' => [
            [
                'name' => '会员列表',
                'url' => url("/admin/member/index")
            ],
        ]
    ],
    'order'=>[
        'name' => '订单管理',
        'icon' => '&#xe723;',
        'data' =>[]
    ],
    'cate'=>[
        'name' => '分类管理',
        'icon' => '&#xe723;',
        'data' => []
    ],
    'setting' => [
        'name' => '系统管理',
        'icon' =>'&#xe6ce;',
        'data' => [

        ]
    ]

];