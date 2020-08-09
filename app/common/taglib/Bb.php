<?php

namespace app\common\taglib;


use app\common\model\SystemSettings;
use think\facade\View;
use think\template\TagLib;

class Bb extends TagLib
{

    /**
     * 定义标签列表
     * @var array[]
     */
    protected $tags = [
        // 标签定义： attr 属性列表 close 是否闭合（0 或者1 默认1） alias 标签别名 level 嵌套层次
        'close' => ['attr' => 'time,format', 'close' => 0], //闭合标签，默认为不闭合
        'open' => ['attr' => 'name,type', 'close' => 1],
        'setting' => ['attr' => 'name', 'close' => 0],
        'menu' => ['attr' => 'pid', 'close' => 1],

    ];

    /**
     * 获取网站栏目
     * @param $tag
     * @param $content
     * @return string
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     * @author An Yang
     * @time 2020/8/9 21:26
     */
    public function tagMenu($tag, $content)
    {
        $pid = $tag['pid'] ?? 0;
        //$list = PortalMenu::where('pid', '=', $pid)->field("name")->select();
        //View::assign('list',$list);

        $parse = '<?php ';
        $parse .= '$__LIST__ = app\common\model\PortalMenu::where("pid", ' . $pid . ')->cache(600)->select();';
        $parse .= ' ?>';
        $parse .= '{foreach $__LIST__  as $key => $item}';
        $parse .= $content;
        $parse .= '{/foreach}';

        return $parse;
    }


    /**
     * 读取系统配置标签
     * @param $tag
     * @return string
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     * @author An Yang
     * @time 2020/8/9 20:43
     */
    public function tagSetting($tag)
    {
        $name = $tag['name'];
        $setting = SystemSettings::cache()->find($name);
        $value = $setting['value'] ?? "";

        $parse = '<?php ';
        $parse .= 'echo "' . $value . '";';
        $parse .= ' ?>';
        return $parse;
    }

}