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
    /**
     * author: promise tan
     * Date: ${DATE}
     * @var array
     */
    public static $classMap = [];
    /**
     * author: promise tan
     * Date: ${DATE}
     * @var array
     */
    public $assigns = [];

    /**
     * @author: promise tan
     * @throws \Exception
     */
    static public function run()
    {
        //启动日志文件
        Log::init();
        Log::log('YoDiy starting......' , 'yodiy-app');

        $route = new Route();
        $className = ucfirst($route->ctrl);
        $action = $route->action;
        $ctrlFile = APP. '/ctrls/' . $className . 'Ctrl.php';
        $ctrlClass = '\\' . MODULE . '\ctrls\\'. $className . 'Ctrl';
        if(is_file($ctrlFile)){
            include  $ctrlFile;
            $ctrl = new $ctrlClass();
            $ctrl->$action();
        }else {
            throw  new  \Exception('no such file' . $ctrlFile);
        }

        Log::log('YoDiy ending......' , 'yodiy-app');
    }

    /**
     *
     * @funtion 加载方法 自定义
     * @author: promise tan
     * @param $class
     * @return bool
     */
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

    /**
     *
     * @funtion 对mvc v层需要数据进行整合
     * @author: promise tan
     * @param $name
     * @param $value
     */
    public function assign($name , $value)
    {
        $this->assigns[$name] = $value;
    }

    /**
     * @funtion 对其页面信息显示
     * @author: promise tan
     * @param $file
     * @throws \Exception
     */
    public function display($file)
    {
        $viewFile = APP . '/views/' . $file . '.yodiy.php';
        if(is_file($viewFile)){
            // extract($this->assigns);
            // include  $viewFile;
            $loader = new \Twig_Loader_Filesystem(APP . '/views');
            $twig = new \Twig_Environment($loader, array(
                'cache' => YODIY . '/cache',
            ));
            echo $twig->render($file . '.yodiy.php' , $this->assigns);
        } else {
            throw new \Exception('no found such view file path:' . $viewFile);
        }
        
    }
}
