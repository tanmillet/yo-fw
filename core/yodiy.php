<?php
namespace core;
use core\lib\Log;
use core\lib\Route;

/**
 * Created by PhpStorm.
 * User: tanmillet
 * Date: 2017/1/7
 * Time: 11:30
 */

class yodiy{

    public static $classMap = [];
    public $assigns = [];

    static public function run()
    {
        Log::init(); //启动日志文件
        Log::log('adsfasf');
        $route = new Route();
        $className = ucfirst($route->ctrl);
        $action = $route->action;
        $ctrlFile = APP. '/ctrl/' . $className . 'Ctrl.php';
        $ctrlClass = '\\' . MODULE . '\ctrl\\'. $className . 'Ctrl';
        if(is_file($ctrlFile)){
            include  $ctrlFile;
            $ctrl = new $ctrlClass();
            $ctrl->$action();
        }else {
            throw  new  \Exception('no such file' . $ctrlFile);
        }
    }

    static public function load($class)
    {
        if(isset($classMap[$class])){
            return true;
        }
        $class = str_replace('\\' , '/' , $class);
        $file = YODIY . '/' . $class . '.php';
        if(is_file($file)){
            include$file;
            self::$classMap[$class] = $class;
        }else {
            return false;
        }
    }

    public function assign($name , $value)
    {
        $this->assigns[$name] = $value;
    }

    public function display($file)
    {
        $viewFile = APP . '/views/' . $file;
        if(is_file($viewFile)){
            extract($this->assigns);
            include  $viewFile;
        } else {
            throw new \Exception('no found such view file path:' . $viewFile);
        }
        
    }
}
