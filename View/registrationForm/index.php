<?php
require_once("../../Controller/registrationFormController.php");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>アカウント登録画面</title>
    <link rel="stylesheet" href="https://getbootstrap.com/dist/css/bootstrap.min.css">
    <link href="http://getbootstrap.com/docs/4.0/examples/narrow-jumbotron/narrow-jumbotron.css" rel="stylesheet">
  </head>
  <body>
    <div class="jumbotron">
      <h1 class="display-3">アカウント登録画面</h1>
      <?php if (count($errors) === 0): ?>
        <form action="" method="post">
          <p class="lead">学籍番号：<input type="text" name="memberId" maxlength="8"></p>
          <p class="lead">パスワード：<input type="password" name="password" maxlength="8"></p>
          <p class="lead">名前：<input type="text" name="name"></p>
          <p class="lead">メールアドレス：<?php echo $mail ?></p>
          <p class="lead">学科:<?= $departmentCreate; ?></p>
          <input type="submit" name="BtnSend" class="btn btn-lg btn-success" value="登録する">
        </form>
      <?php elseif(count($errors) > 0): ?>
      <?php foreach($errors as $value){ echo "<p>".$value."</p>"; }?>
      <input type="button" value="戻る" class="btn btn-lg btn-primary" onClick="history.back()">
      <?php endif; ?>
    </div>
  </body>
</html>