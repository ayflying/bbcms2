<?php
declare (strict_types=1);

namespace app\common\model;

use think\Model;

/**
 * 文章模型
 * Class PortalArticle
 * @package app\common\model
 */
class PortalArticle extends Model
{
    protected $pk = 'aid';


    public function addonarticle()
    {
        return $this->hasOne(PortalAddonarticle::class, 'aid');
    }
}
