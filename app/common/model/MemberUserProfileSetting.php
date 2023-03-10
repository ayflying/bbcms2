<?php
declare (strict_types = 1);

namespace app\common\model;

use think\Model;

/**
 * @mixin \think\Model
 */
class MemberUserProfileSetting extends Model
{
    protected $pk = 'uid';
}
