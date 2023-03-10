<?php
declare (strict_types=1);

namespace app;

use think\App;
use think\exception\ValidateException;
use think\facade\Config;
use think\facade\View;
use think\Validate;

/**
 * 控制器基础类
 */
abstract class BaseController
{
    /**
     * Request实例
     * @var \think\Request
     */
    protected $request;

    /**
     * 应用实例
     * @var \think\App
     */
    protected $app;

    /**
     * 是否批量验证
     * @var bool
     */
    protected $batchValidate = false;

    /**
     * 控制器中间件
     * @var array
     */
    protected $middleware = [];

    /**
     * 构造方法
     * @access public
     * @param App $app 应用对象
     */
    public function __construct(App $app)
    {
        $this->app = $app;
        $this->request = $this->app->request;

        // 控制器初始化
        $this->initialize();
    }

    // 初始化
    protected function initialize()
    {
    }

    /**
     * 验证数据
     * @access protected
     * @param array $data 数据
     * @param string|array $validate 验证器名或者验证规则数组
     * @param array $message 提示信息
     * @param bool $batch 是否批量验证
     * @return array|string|true
     * @throws ValidateException
     */
    protected function validate(array $data, $validate, array $message = [], bool $batch = false)
    {
        if (is_array($validate)) {
            $v = new Validate();
            $v->rule($validate);
        } else {
            if (strpos($validate, '.')) {
                // 支持场景
                list($validate, $scene) = explode('.', $validate);
            }
            $class = false !== strpos($validate, '\\') ? $validate : $this->app->parseClass('validate', $validate);
            $v = new $class();
            if (!empty($scene)) {
                $v->scene($scene);
            }
        }

        $v->message($message);

        // 是否批量验证
        if ($batch || $this->batchValidate) {
            $v->batch(true);
        }

        return $v->failException(true)->check($data);
    }

    /**
     * 跳转页面
     * @param string $msg
     * @param string|null $url
     * @param int $time
     * @return string
     * @author An Yang
     * @time 2020/8/6 9:44
     */
    public function success(string $msg, string $url = "", int $time = 3): string
    {
        $data = [
            'msg' => $msg,
            'url' => $url ?? request()->header('referer'),
            'time' => $time,
        ];
        return View::fetch('/jump/success', $data);

    }

    /**
     * 错误跳转页面
     * @param string $msg
     * @param string $url
     * @param int $time
     * @return string
     * @author An Yang
     * @time 2020/8/6 9:44
     */
    public function error(string $msg, string $url = "", int $time = 3): string
    {
        $data = [
            'msg' => $msg,
            'url' => $url ?? request()->header('referer'),
            'time' => $time,
        ];
        return View::fetch('/jump/error', $data);
    }

    protected function assign($name, $value = null)
    {
        return View::assign($name, $value);
    }

    /**
     * 模板引擎输出
     * @param string $template
     * @param array $vars
     * @return string
     * @author An Yang
     * @time 2020/7/24 14:50
     */
    protected function fetch(string $template = '', array $vars = [])
    {
        $path = "view/bilibili";
        $file = $path . $template;


        $config = [
            'view_dir_name' => $path,
            'tpl_replace_string' => [
                '__TPL__' => "/static/" . $path,
                '__TP__' => "/static/" . $path,
            ],
        ];
        Config::set($config, "view");
        return View::fetch($template, $vars);
    }

}
