<?php

namespace app\controllers;

use app\models\Books;

use yii\helpers\Url;
use yii\web\Controller;


class BookController extends Controller
{
   /* public function actionIndex()
    {
        $data=\Yii::$app->db->createCommand(['select * from `books`'])->queryAll();
        return $this->render('index',['data'=>$data]);
    }*/




   public function actionIndex()
    {
        $data=Books::find()->all();
        return $this->render('index',[
            'data'=>$data
        ]);
    }

    public function actionAdd()
    {
        return $this->render('add');
    }
    public function actionAddsave()
    {
        $book = new Books();
        $book->name=\Yii::$app->request->post('name');
        $book->price=\Yii::$app->request->post('price');
        $book->category=\Yii::$app->request->post('category');
        $book->create_time=time();
        $book->update_time=time();
       if($book->insert($book)){
           $this->redirect(array('index'));
       }else{
           $this->redirect(array('add'));
       }
    }
    public function actionDelete(){
        $id=\Yii::$app->request->get('id');
        $model=Books::findOne($id);
        if($model->delete()){
            $this->redirect(Url::to(['index']));
        }else{
            echo "删除失败";
        }
    }
    public function actionUpdate(){
        $request=\Yii::$app->request;
        $id=$request->get('id');
        if($request->isGet){
            $data=Books::findOne($id);
            return $this->render('update',['data'=>$data]);
        }else if($request->isPost){
            $data=Books::findOne($request->post('id'));
            $data->name=$request->post('name');
            $data->price=$request->post('price');
            $data->category=$request->post('category');
            $data->update_time=time();
            if($data->save()){
                $this->redirect(array('index'));
            }else{
                echo "修改失败";
            }
        }
    }


}
