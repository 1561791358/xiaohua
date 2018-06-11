<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/6/8
 * Time: 18:54
 */

namespace app\controllers;


use app\models\News;
use app\models\Uuu;
use yii\data\Pagination;
use yii\web\Controller;

class UuuController extends Controller
{
    public function actionLogin()
    {
        $request = \Yii::$app->request;
        if ($request->isGet) {
            return $this->render('login');
        } elseif ($request->isPost) {
            $model = new Uuu();
            if ($model->checkLog(\Yii::$app->request->post())) {
                return $this->redirect(array('news'), 301);
            }
        }
    }

    public function actionNews(){
        $query =News::find();
        $pagination = new Pagination([
            'defaultPageSize' => 2,
            'totalCount' => $query->count(),
        ]);

        $countries = $query->orderBy('id')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('news', [
            'data'=>$query->all(),
            'countries' => $countries,
            'pagination' => $pagination,
        ]);
    }

    public function actionAdd(){
        $request=\Yii::$app->request;
        //var_dump($request->post());die;
        $model=new News();
        $model->title=$request->post('title');
        $model->create_time=time();
        $model->update_time=time();
        if($data=$model->insert()){
            return json_encode([
                'error'=>1,
                'data'=>$model->title,
            ]);
        }else{
            return json_encode([
                'error'=>0,
            ]);
        }

    }
    public function actionDelete(){
       $request=\Yii::$app->request->get('id');
       $model=News::findOne($request);
       if($model->delete()){
          $this->redirect(array('news'));
       }else{
           echo "删除失败";
       }
    }








}