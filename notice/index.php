<?php
require_once("../Controller/noticeController.php");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>通知一覧画面</title>
    <link rel="stylesheet" href="https://getbootstrap.com/dist/css/bootstrap.min.css">
    <link href="http://getbootstrap.com/docs/4.0/examples/narrow-jumbotron/narrow-jumbotron.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
    <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills float-right">
           <li class="nav-item">
              <a class="nav-link" href="../noteList/">戻る</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="../Model/logoutModel.php">ログアウト<span class="sr-only">(current)</span></a>
            </li>
          </ul>
        </nav>
        <h3 class="text-muted">MeetingPlace</h3>
    </div>
      <h1>通知一覧画面</h1>
      <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover table-condensed" cellspacing="0" cellpadding="0">
          <thead>
            <td>名前</td><td>未読メッセージ数</td>
          </thead>
          <?php echo $outputValue; ?>
       </table>
      </div>
    </div>
  </body>
</html>