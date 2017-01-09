<?php
/**
 * Created by PhpStorm.
 * User: promise - tan
 * Date: 2017/1/7
 * Time: 10:45
 */

//定义入口文件
//1：定义常量
//2：加载函数
//3：启动框架

define('YODIY'  , realpath(''));
define('CORE' , YODIY . '/core');
define('APP' , YODIY . '/app');
define('MODULE' , 'app');

//设置debug 是否开启
define('DEBUG' , true);

//启动第三方插件 composer 管理
include 'vendor/autoload.php';

// 第三方插件 {查看更加直观的错误日志信息}
if(DEBUG) {
    $whoops = new \Whoops\Run();
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler());
    $whoops->register();
}
(DEBUG) ? ini_set('display_error' ,  'On') : ini_set('display_error' ,  'Off') ;

//帮助方法进行加载
include CORE. '/com/function.php';

//项目初始化app yodiy 进行加载
include CORE. '/yodiy.php';

//注册延迟加载方法
spl_autoload_register('\core\yodiy::load');

//启动项目
\core\yodiy::run();