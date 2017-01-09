<?php
/**
 * Created by PhpStorm.
 * User: tanmillet
 * Date: 2017/1/7
 * Time: 11:52
 */

namespace core\lib;

/**
 * Class Route
 * Author: promise tan
 * @package core\lib
 */
class Route
{
    /**
     * author: promise tan
     * Date: ${DATE}
     * @var string
     */
    public $ctrl = 'index';
    /**
     * author: promise tan
     * Date: ${DATE}
     * @var string
     */
    public $action = 'index';

    /**
     * @author: promise tan
     * Route constructor.
     */
    public function __construct()
    {
        if(isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != '/'){
            $path = $_SERVER['REQUEST_URI'];
            $pathArr = explode('/' , trim($path , '/'));
            if(isset($pathArr[0])){
                $this->ctrl = $pathArr[0];
            }
            unset($pathArr[0]);
            if(isset($pathArr[1])){
                $this->action = $pathArr[1];
                unset($pathArr[1]);
            }
            $count = count($pathArr) + 2;
            $i = 2;
            while ($i < $count) {
                if(isset($pathArr[$i + 1])) {
                    $_GET[$pathArr[$i]] = $pathArr[$i+1];
                }
                $i += 2;
            }
        }
    }

}