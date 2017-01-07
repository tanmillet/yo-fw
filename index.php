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

define('DEBUG' , true);

include 'vendor/autoload.php';

$whoops = new \Whoops\Run();
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler());
$whoops->register();

(DEBUG) ? ini_set('display_error' ,  'On') : ini_set('display_error' ,  'Off') ;

dump($_SERVER);
include CORE. '/com/function.php';

include CORE. '/yodiy.php';

spl_autoload_register('\core\yodiy::load');

\core\yodiy::run();