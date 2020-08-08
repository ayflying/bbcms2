<?php
declare (strict_types=1);

namespace app\common\model;

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
        if (empty(!$db)) {
            $db->update_ip = request()->ip();
            $db->save();
        }


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

        $db = self::where("email", 'like', $email)->find();
        if (!empty($db)) {
            return $db;
        }
        $data = [
            'email' => $email,
            'password' => md5($password),
            'create_ip' => request()->ip(),
            'update_ip' => request()->ip(),
            'status' => 1,
        ];
        $db = self::create($data);
        return $db;
    }


}
