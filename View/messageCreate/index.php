<?php
require_once("../../Controller/messageController.php");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>メッセージ投稿画面</title>
    <link rel="stylesheet" href="https://getbootstrap.com/dist/css/bootstrap.min.css">
    <link href="http://getbootstrap.com/docs/4.0/examples/narrow-jumbotron/narrow-jumbotron.css" rel="stylesheet">
  </head>
  <body>
  <div class="container">
    <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills float-right">
            <li class="nav-item">
              <h3 class=".nav-item"><? echo $name ?>さん</h3>
            </li>
          </ul>
        </nav>
        <h3 class="text-muted">MeetingPlace</h3>
    </div>
    <h1>メッセージ投稿画面</h1>
    <?php if (count($errors) === 0): ?>
      <form action="" method="post">
      <div class="form-group">
        <p class="lead">投稿内容：<textarea name="content" class="form-control"></textarea></p>
      </div>
        <input type="submit" class="btn btn-primary" name="BtnSend" value="送信">
      </form>
    <?php elseif(count($errors) > 0): ?>
    <?php foreach($errors as $value){ echo "<p>".$value."</p>"; }?>
    <?php endif; ?>
    <a class="read" href="../message/?memberId=<? echo $memberId ?>">戻る</a>
  </div>
  </body>
</html>