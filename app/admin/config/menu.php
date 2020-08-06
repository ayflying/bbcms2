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
            'list' => [
                'name' => '会员列表',
                'url' => url("/admin/member/index")
            ],
        ]
    ],
    'order' => [
        'name' => '订单管理',
        'icon' => '&#xe723;',
        'data' => []
    ],
    'portal' => [
        'name' => '门户管理',
        'icon' => '&#xe723;',
        'data' => [
            'menu' => [
                'name' => '菜单管理',
                'url' => url("/admin/portal/menu")
            ]
        ]
    ],
    'setting' => [
        'name' => '系统管理',
        'icon' => '&#xe6ce;',
        'data' => [

        ]
    ]

];