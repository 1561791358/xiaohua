<?php
namespace app\models;

use yii\db\ActiveRecord;

class Uuu extends ActiveRecord{
    public function checkLog($data){
        if(empty($data['name'])|| empty($data['pwd'])){
            echo "同户名和密码不能为空";
            return false;
        }else{
            $user=self::findOne([
                'name'=>$data['name']
            ]);
        //var_dump($user);die;
            if($user){
                if($user['pwd']==md5($data['pwd'])){
                    $session=\Yii::$app->session;
                    $session->get('admin',$user);
                    return true;
                }else{
                    echo "密码不正确";
                    return false;
                }
            }else{
                echo '用户名不存在';
                return false;
            }
        }
    }
}
