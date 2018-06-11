<?php
use \yii\helpers\Html;
use \yii\helpers\Url;
?>
<a href="<?=\yii\helpers\Url::to(['add'])?>">添加</a>
    <table border="1" cellspacing="0" width="900">
        <tr align="center">
            <td>id</td>
            <td>name</td>
            <td>price</td>
            <td>category</td>
            <td>create_time</td>
            <td>update_time</td>
            <td>操作</td>

        </tr>

        <?php foreach ($data as $v){?>
        <tr>
            <td><?=Html::encode($v['id'])?></td>
            <td><?=Html::encode($v['name'])?></td>
            <td><?=Html::encode($v['price'])?></td>
            <td><?=Html::encode($v['category'])?></td>
            <td><?=Html::encode(date('Y-m-d H:i:s',$v['create_time']))?></td>
            <td><?=Html::encode(date('Y-m-d H:i:s',$v['update_time']))?></td>
            <td><a href="<?=Url::to(['update','id'=>$v['id']])?>">编辑</a>
                <a href="<?=Url::to(['delete','id'=>$v['id']])?>">删除</a></td>
        </tr>
        <?php } ?>
    </table>

