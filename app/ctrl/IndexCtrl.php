<?php
namespace app\ctrl;
use core\lib\Model;
use core\yodiy;

/**
 * Created by PhpStorm.
 * User: tanmillet
 * Date: 2017/1/7
 * Time: 12:20
 */
class IndexCtrl extends yodiy
{

    public function index()
    {
        echo 'is index indexcrtl';

        $model = new  Model();
        $sql  = 'SELECT * FROM test';
        $rst = $model->query($sql);

        p($rst->fetchAll());
    }

    public function view()
    {
        $data = 'Hi yoDiy';
        $this->assign('data' , $data);
        $this->display('index.yodiy.php');
    }
}