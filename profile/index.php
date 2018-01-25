<?php
require_once("../Controller/profileController.php");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>プロフィール画面</title>
    <link rel="stylesheet" href="https://getbootstrap.com/dist/css/bootstrap.min.css">
    <link href="http://getbootstrap.com/docs/4.0/examples/narrow-jumbotron/narrow-jumbotron.css" rel="stylesheet">
  </head>
  <body>
  <div class="container">
    <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills float-right">
          <?php if($loginId != $memberId): ?>
            <li class="nav-item">
              <a class="nav-link active" href="../message/?memberId=<? echo $memberId ?>">メッセージ[<? echo $countNotice ?>] <span class="sr-only">(current)</span></a>
            </li>
          <?php endif; ?>
            <li class="nav-item">
              <a class="nav-link" href="../follow/?memberId=<? echo $memberId ?>">フォロー:<? echo $follow; ?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../follower/?memberId=<? echo $memberId ?>">フォロワー:<? echo $follower; ?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="../Model/logoutModel.php">ログアウト<span class="sr-only">(current)</span></a>
            </li>
          </ul>
        </nav>
        <h3 class="text-muted">MeetingPlace</h3>
    </div>
    <div class="jumbotron">
      <h1 class="display-3">プロフィール画面</h1>
        <p class="lead">学籍番号：<? echo $profile['memberId']; ?></p>
        <p class="lead">名前：<? echo $profile['name']; ?></p>
        <p class="lead">メールアドレス：<? echo $profile['mail']; ?></p>
        <p class="lead">学科:<? echo $profile['departmentName']; ?></p>
        <form action="" method="post">
          <p class="lead">自己紹介</p><textarea name="appeal" rows="3" cols="50"><? echo $profile['appeal'];?></textarea><br>
          <?php if($loginId == $memberId): ?>
            <input type="submit" name="BtnSend" class="btn btn-lg btn-success" value="変更">
          <?php else: ?>
            <input type="submit" name="follow" class="btn btn-lg btn-success" value="フォロー">
          <?php endif; ?>
        </form>
        <a class="lead" href="../noteList/">戻る</a>
    </div>
  </div>
  </body>
</html>