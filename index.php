<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用入口文件

// 检测PHP环境
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG',True);

//定义系统文件符号
define('DS', DIRECTORY_SEPARATOR);

// 站点目录
define('ROOT_PATH', dirname(__FILE__));

//系统时间
define('SYSTEM_TIME',time());

//系统毫秒时间
define('SYSTEM_MICROTIME',get_microtime(3));

//来源页面
define('HTTP_REFERER', isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '');

// 定义应用目录
define('APP_PATH','./Application/');

define('__APP__', '');

// 引入ThinkPHP入口文件
require './ThinkPHP/ThinkPHP.php';

// 亲^_^ 后面不需要任何代码了 就是如此简单

//系统毫秒时间,保留小数点后n位
function get_microtime($n){
    $microtime = microtime();
    list($xiaoshu,$zhengshu) = explode(' ',$microtime);
    $xiaoshu = substr($xiaoshu,strpos($xiaoshu,'.')+1,$n);
    $mt =  floatval($zhengshu.'.'.$xiaoshu);
    return $mt;
}

function pr($val)
{
    echo '<pre>';
    print_r($val);
    exit();
}

function ww($val)
{
    $file = 'log_' . date('Ymd') . '.log';
    $fp = fopen($file, "a+");
    fwrite($fp, date("Y-m-d H:i:s") . "\n");
    ob_start();
    print_r($val);
    fwrite($fp, ob_get_contents() . "\n");
    ob_end_clean();
    fclose($fp);
}