<?php
namespace app\ctrls;

use app\models\MUser;
use core\lib\Config;
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

    /**
     * @author: promise tan
     */
    public function index()
    {
        $model = new  MUser();
        $lists = $model->lists();
        $this->assign('users', $lists);
        $this->display('users');
    }

    /**
     * @author: promise tan
     */
    public function setOne()
    {
        $model = new MUser();
        $data = [
            'name' => post('username', 'default', 'string'),
            'age' => post('age', 0, 'int'),
            'created_at' => date('Y-m-d H:i:s', time()),
        ];
        $rst = $model->addOne($data);

        echo ($rst)
            ?
            json_encode([
                'status' => true,
                'message' => '操作成功！'
            ])
            :
            json_encode([
                'status' => false,
                'message' => '操作失败！'
            ]);
    }

    /**
     * @author: promise tan
     */
    public function upOne()
    {
        $user = new MUser();
        $data = [
            'name' => post('username', 'dename', 'string'),
            'age' => post('age', 18, 'int'),
            'updated_at' => date('Y-m-d H:i:s', time())
        ];
        $where = [
            'id' => post('id', 0, 'int')
        ];

        //判断是否有数据
        $u = $user->selOne('*', $where);
        if (is_bool($u) && $u === false) {
            echo json_encode([
                'status' => false,
                'message' => '操作失败！不存在此用户！'
            ]);
            exit(400);
        }
        $rst = $user->upOne($data, $where);

        echo ($rst)
            ?
            json_encode([
                'status' => true,
                'message' => '操作成功！'
            ])
            :
            json_encode([
                'status' => false,
                'message' => '操作失败！'
            ]);
    }

    /**
     * @author: promise tan
     */
    public function delOne()
    {
        $user = new MUser();
        $where = [
            'id' => get('id', 0, 'int')
        ];

        //判断是否有数据
        $u = $user->selOne('*', $where);
        if (is_bool($u) && $u === false) {
            echo json_encode([
                'status' => false,
                'message' => '操作失败！不存在此用户！'
            ]);
            exit(400);
        }

        $rst = $user->delOne($where);
        echo ($rst)
            ?
            json_encode([
                'status' => true,
                'message' => '操作成功！'
            ])
            :
            json_encode([
                'status' => false,
                'message' => '操作失败！'
            ]);
    }
}