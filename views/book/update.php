<?php
use \yii\helpers\Url;
use \yii\helpers\Html;
?>
<form action="<?=Url::to(['update']) ?>" method="post">
    <p><input type="hidden" name="id" value="<?=Html::encode($data['id']) ?>"></p>

    <p>姓名:<input type="text" name="name" value="<?=Html::encode($data['name']) ?>"></p>
    <p>价格:<input type="text" name="price" value="<?=Html::encode($data['price']) ?>"></p>
    <p>分类:<input type="radio" name="category" value="吃" checked="<?php if(Html::encode($data['category']=='吃')){echo "checked" ;} ?>">吃
        <input type="radio" name="category" value="喝" checked="<?php if(Html::encode($data['category']=='喝')){echo "checked" ;} ?>">喝
        <input type="radio" name="category" value="玩" checked="<?php if(Html::encode($data['category']=='玩')){echo "checked" ;} ?>">玩
    </p>
    <p><input type="submit" value="编辑"></p>

</form>












