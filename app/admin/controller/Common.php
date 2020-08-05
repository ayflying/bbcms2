<?php
declare (strict_types=1);

namespace app\admin\controller;

use app\BaseController;
use think\App;
use think\facade\Cache;
use think\facade\Cookie;

class Common extends BaseController
{

    public function __construct(App $app)
    {
        parent::__construct($app);


        $uid = $this->getUid();
        if(empty($uid)){
            $this->error();

        }

    }


    /**
     * 获取用户uid
     * @param string $guid
     * @return int
     * @author An Yang
     * @time 2020/8/6 0:06
     */
    public function getUid(string $guid = ""): int
    {

        $guid = $guid ?? Cookie::get('guid');
        if (empty($guid)) {
            return 0;
        }

        $uid = Cache::get("guid:" . $guid) ?? 0;
        return $uid;
    }

}
