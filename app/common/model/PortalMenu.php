<?php
declare (strict_types=1);

namespace app\common\model;

use think\Model;

/**
 * @mixin \think\Model
 */
class PortalMenu extends Model
{


    public static function add(string $name,int $pid=0)
    {
        $data =[
            'name' => $name,
            'pid' => $pid,

        ];
        $db = self::create($data);
        return $db;
    }


}
