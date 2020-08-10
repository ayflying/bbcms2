<?php
declare (strict_types = 1);

namespace app\common\model;

use think\Model;

/**
 * @mixin \think\Model
 */
class MemberUserProfile extends Model
{
    protected $pk = 'uid';
}
