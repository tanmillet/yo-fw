<?php

namespace core\lib\dirve;
use core\lib\Config;

/**
 * Created by PhpStorm.
 * User: tanmillet
 * Date: 2017/1/7
 * Time: 16:00
 */
class Log
{

    /**
     * @var
     */
    protected $path;

    /**
     * Log constructor.
     */
    public function __construct()
    {
        $options = Config::get('OPTION' , 'log');
       $this->path =$options['PATH'];
    }

    /**
     * TODO 注意文件权限
     * @param $message
     * @param string $fileName
     * @return mixed
     */
    public function log($message , $fileName = 'log'){

        $writePath = $this->path .  date('Ymd H');

        if(! is_dir($writePath)){
            mkdir($writePath, '0777' , true);
        }

        return file_put_contents($writePath . '/' . $fileName . '.log' , json_encode(date('Y-m-d H:i:s') . $message) . PHP_EOL , FILE_APPEND);
    }
}