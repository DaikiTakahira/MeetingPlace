<?php
require_once("../Controller/followController.php");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>フォロワー画面</title>
    <link rel="stylesheet" href="https://getbootstrap.com/dist/css/bootstrap.min.css">
    <link href="http://getbootstrap.com/docs/4.0/examples/narrow-jumbotron/narrow-jumbotron.css" rel="stylesheet">
  </head>
  <body>
  <div class="container">
    <div class="header clearfix">
        <!-- <nav>
          <ul class="nav nav-pills float-right">
            <li class="nav-item">
              <h3 class=".nav-item"></h3>
            </li>
            <li class="nav-item">
              <h3 class=".nav-item"></h3>
            </li>
          </ul>
        </nav> -->
        <h3 class="text-muted">MeetingPlace</h3>
    </div>
      <h1>フォロワー一覧画面</h1>
      <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover table-condensed" cellspacing="0" cellpadding="0">
          <thead>
            <td>名前</td><td>学系</td>
          </thead>
          <?php echo $follower; ?>
       </table>
      </div>
      <a class="lead" href="../noteList/">戻る</a>
    </div>
  </div>
  </body>
</html>