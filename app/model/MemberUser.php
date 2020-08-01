<?php
declare (strict_types=1);

namespace app\model;

use think\Model;

/**
 * @mixin \think\Model
 */
class MemberUser extends Model
{
    protected $pk = 'uid';

    public static function login($username, $password)
    {
        $where = [
            ['email|username', "like", $username],
            ['password', "like", md5($password)],
        ];
        $db = self::where($where)->field('uid,username,guid,gid,email,mobile,level,status')->cache(true,7200)->find();
        return $db;
    }

}
