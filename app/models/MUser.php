<?php
/**
 * Created by PhpStorm.
 * User: Promise tan
 * Date: 2017/1/9
 * Time: 10:40
 */

namespace app\models;

/**
 * Class MUser
 * Author: promise tan
 * @package app\models
 */
/**
 * Class MUser
 * Author: promise tan
 * @package app\models
 */
/**
 * Class MUser
 * Author: promise tan
 * @package app\models
 */
class MUser extends MBase
{
    /**
     * author: promise tan
     * Date: ${DATE}
     * @var string
     */
    public $table = 'users';

    /**
     * @author: promise tan
     * @return array
     */
    public function lists()
    {
        return $this->select($this->table, '*');
    }

    /**
     * @author: promise tan
     * @param $data
     * @return array|mixed
     */
    public function addOne($data)
    {
        return $this->insert($this->table, $data);
    }

    /**
     * @author: promise tan
     * @param $data
     * @param $where
     * @return bool|int
     */
    public function upOne($data, $where)
    {
        return $this->update($this->table, $data, $where);
    }

    /**
     * @author: promise tan
     * @param $where
     */
    public function delOne($where)
    {
        return $this->delete($this->table, $where);
    }

    /**
     * @author: promise tan
     * @param $columns
     * @param $where
     * @return bool|mixed
     */
    public function selOne($columns, $where)
    {
        return $this->get($this->table, $columns, $where);
    }
}