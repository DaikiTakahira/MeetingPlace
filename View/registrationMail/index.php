<?php
require_once("../../Controller/registrationMailController.php");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>新規登録画面</title>
    <link rel="stylesheet" href="https://getbootstrap.com/dist/css/bootstrap.min.css">
    <link href="http://getbootstrap.com/docs/4.0/examples/narrow-jumbotron/narrow-jumbotron.css" rel="stylesheet">
    </head>
    <body>
    <div class="container">
      <div class="header clearfix">
          <nav>
            <ul class="nav nav-pills float-right">
              <li class="nav-item">
                <a class="nav-link active" href="../../">ホーム<span class="sr-only">(current)</span></a>
              </li>
            </ul>
          </nav>
          <h3 class="text-muted">MeetingPlace</h3>
        </div>
      <div class="jumbotron">
        <h1 class="display-3">メール登録画面</h1>
        <?php if (count($errors) === 0): ?>
          <form action="" method="post">
            <p class="lead">メールアドレス：<input type="text" name="mail" size="50"></p>
            <input type="submit" name="BtnSend" class="btn btn-lg btn-success" value="登録する">
            <p><a href="../mailcodeCheck/" class="lead">確認コード取得済み</a></p>
          </form>
        <?php elseif(count($errors) > 0): ?>
        <?php foreach($errors as $value){ echo "<p class='lead'>".$value."</p>"; }?>
          <input type="button" value="戻る" class="btn btn-primary" onClick="history.back()">
        <?php endif; ?>
      </div>
    </div>
  </body>
</html>