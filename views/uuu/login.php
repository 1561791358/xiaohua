<?php
use yii\helpers\Url;

?>
<h1>登陆页面</h1>
<form action="<?=Url::to(['login'])?>" method="post">
    <p>姓名:<input type="text" name="name"></p>
    <p>密码:<input type="password" name="pwd"></p>
    <p><input type="submit" value="登陆"><input type="button" value="注册"></p>

</form>
