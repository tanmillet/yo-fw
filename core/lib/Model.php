<?php
/**
 * Created by PhpStorm.
 * User: tanmillet
 * Date: 2017/1/7
 * Time: 14:49
 */

namespace core\lib;


//class Model extends \PDO
//{
//    public function __construct()
//    {
//      try{
//          $database = Config::all('database');
//          parent::__construct($database['DSN'] , $database['USERNAME'] , $database['PASSWORD']);
//      }catch (\PDOException $e){
//          var_dump($e->getMessage());
//      }
//    }
//}
class Model extends \medoo
{
    public function __construct()
    {
        try{
            $database = Config::all('database');
//            parent::__construct($database['DSN'] , $database['USERNAME'] , $database['PASSWORD']);
            parent::__construct($database);
        }catch (\PDOException $e){
            var_dump($e->getMessage());
        }
    }
}