<?php
require_once("../Controller/messageController.php");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>メッセージ画面</title>
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
      <h1>メッセージ画面</h1>
      <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover table-condensed" cellspacing="0" cellpadding="0">
          <thead>
            <td>名前</td><td>内容</td><td>時間</td><td>既読</td>
          </thead>
          <?php echo $outputValue; ?>
       </table>
          <a href="../messageCreate/?memberId=<? echo $memberId ?>" class="btn btn-primary">投稿</a>
      </div>
      <a class="read" href="../profile/?memberId=<? echo $memberId ?>">戻る</a>
    </div>
  </div>
  </body>
</html>