<?php
use \yii\helpers\Url;
use \yii\helpers\Html;
use \yii\widgets\LinkPager;
?>




<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        .dix{
            margin-top:20px;
            border:1px solid grey;
            width: 1000px;
            height: 40px;
        }
        .a{
            float: right;
        }
    </style>
    <script src="/js/jquery-3.2.1.min.js"></script>
    <script>
        $(document).ready(function(){
           $("#add").click(function(){
              var title=$("#title").val();
              $.post("<?= Url::to(['add']) ?>",{title:title},function(r){
                  console.log(r);
                    if(r.error){
                        alert("发布成功");
                        window.location.reload()
                    }else{
                        alert("发布失败");
                    }
              },"json")
           })
        })
    </script>
</head>
<body>
<form action="<?= Url::to(['add']) ?>" method="post" onsubmit="return false">
    留言: <textarea name="title" id="title" cols="30" rows="10">

    </textarea>
    <input type="button" value="发布" id="add">
</form>


    <?php  foreach ($data as $v) { ?>
        <div class="dix" > <?=Html::encode($v['title']) ?> <a class="a" href="<?=Url::to(['delete','id'=>$v['id']])  ?>">删除</a></div>

    <?php    } ?>


<?= LinkPager::widget(['pagination' => $pagination]) ?>

</body>
</html>