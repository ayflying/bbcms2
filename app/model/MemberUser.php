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
        $db = self::where($where)->field('uid,username,guid,gid,email,phone,status')->cache(true, 7200)->find();
        return $db;
    }


    /**
     * @param string $email
     * @param string $password
     * @return MemberUser|Model
     * @author An Yang
     * @time 2020/8/6 11:29
     */
    public static function signUp(string $email, string $password)
    {
        $data = [
            'email' => $email,
            'password' => $password,
        ];
        $db = self::create($data);
        return $db;
    }


}
