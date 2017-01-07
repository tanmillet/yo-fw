<?php
/**
 * Created by PhpStorm.
 * User: tanmillet
 * Date: 2017/1/7
 * Time: 15:42
 */

namespace core\lib;


/**
 * Class Log
 * @package core\lib
 */
class Log
{
    /**
     * @var
     */
    static public $class;

    /**
     * @throws \Exception
     */
    static public function init()
     {
         $file = ucfirst(Config::get('DIRVE' , 'log'));
         $calss = '\core\lib\dirve\\' . $file; //注意点 TODO
         self::$class = new $calss();
     }

    /**
     * @param $messgae
     * @param string $fileName
     */
    static public function log($messgae , $fileName = 'log')
    {
            self::$class->log($messgae , $fileName);
    }
}