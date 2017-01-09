<?php
/**
 * Created by PhpStorm.
 * User: tanmillet
 * Date: 2017/1/7
 * Time: 15:10
 */

namespace core\lib;


/**
 * Class Config
 * Author: promise tan
 * @package core\lib
 */
class Config
{

    /**
     * author: promise tan
     * Date: ${DATE}
     * @var array
     */
    static public $confs = [];

    /**
     * @author: promise tan
     * @param $name
     * @param $file
     * @return mixed
     * @throws \Exception
     */
    static public function get($name , $file){
        if(isset(self::$confs[$file])){
            return self::$confs[$file][$name];
        } else {
            $path = YODIY . '/core/config/' . $file . '.php';
            if(is_file($path)) {
                $conf = include $path;
                if(isset($conf[$name])){
                    self::$confs[$file] = $conf;
                    return $conf[$name];
                } else {
                    throw new \Exception('no found such file conf1 ' . $path);
                }
            }else {
                throw new \Exception('no found such file conf2 ' . $path);
            }
        }
    }

    /**
     * @author: promise tan
     * @param $file
     * @return mixed
     * @throws \Exception
     */
    static public function all($file){
        if(isset(self::$confs[$file])){
            return self::$confs[$file];
        } else {
            $path = YODIY . '/core/config/' . $file . '.php';
            if(is_file($path)) {
                $conf = include $path;
                self::$confs[$file] = $conf;
                return $conf;
                } else {
                    throw new \Exception('no found such file conf1 ' . $path);
            }
        }
    }
}