<?php
namespace app\models;
use core\lib\Model;

/**
 * Created by PhpStorm.
 * User: tanmillet
 * Date: 2017/1/8
 * Time: 21:10
 */
class TestModel extends Model
{
    public $table = 'test';

    public function lists()
    {
        $this->select($this->table , '*');
    }


}