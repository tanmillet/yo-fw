<?php
/**
 * Created by PhpStorm.
 * User: tanmillet
 * Date: 2017/1/7
 * Time: 14:49
 */

namespace core\lib;


class Model extends \PDO
{
    public function __construct()
    {
        $dsn = 'mysql:host=localhost;dbname=yodiy';
        $username='root';
        $passwd = '';
      try{
          parent::__construct($dsn, $username, $passwd);
      }catch (\PDOException $e){
          var_dump($e->getMessage());
      }
    }
}