<?php
declare (strict_types = 1);

namespace app\common\model;

use think\Model;

/**
 * @mixin \think\Model
 */
class MemberGroup extends Model
{
    protected $pk = 'gid';
}
