<?php
use yii\helpers\Url;

?>
<form action="<?=Url::to(['addsave'])?>" method="post">
    <p>姓名:<input type="text" name="name"></p>
    <p>价格:<input type="text" name="price"></p>
    <p>分类:<input type="radio" name="category" value="吃">吃
        <input type="radio" name="category" value="喝">喝
        <input type="radio" name="category" value="玩">玩
    </p>
    <p><input type="submit" value="提交"></p>

</form>
