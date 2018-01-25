<?php
require_once("../Controller/noteListController.php");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>投稿一覧画面</title>
    <link rel="stylesheet" href="https://getbootstrap.com/dist/css/bootstrap.min.css">
    <link href="http://getbootstrap.com/docs/4.0/examples/narrow-jumbotron/narrow-jumbotron.css" rel="stylesheet">
  </head>
  <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
  crossorigin="anonymous"></script>
  <script type="text/javascript">
  //ボタンが押されたらajaxでいいね情報送信
    $(function(){
      $('[name=nice]').click(
        function(){
          $("span", this).toggle();
          $.post('../Controller/noteListController.php',{
            niceCreate: $(this).val()
          });
          // niceGet($(this).val());
        });
    });
    // function niceGet(noteId){
    //   $.post('../Controller/noteListController.php',{
    //         niceGet: noteId
    //   },function(data){
    //     $("[name="+data+"]").html(data);
    //   });
    // }
  </script>
  <body>
    <div class="container">
    <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills float-right">
            <li class="nav-item">
              <a class="nav-link" href="../noteCreate/">投稿</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../profile/?memberId=<? echo $memberId ?>">プロフィール</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../notice/?memberId=<? echo $memberId ?>">通知[<? echo $countNotice; ?>]</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="../Model/logoutModel.php">ログアウト<span class="sr-only">(current)</span></a>
            </li>
          </ul>
        </nav>
        <h3 class="text-muted">MeetingPlace</h3>
      </div>
      <h1>投稿一覧画面</h1>
      <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover table-condensed" cellspacing="0" cellpadding="0">
        <form action="" method="POST">
          <input type="submit" name="myList" class="btn btn-primary" value="自分のみ">
          <input type="submit" name="All" class="btn btn-success" value="全て">
          <thead>
            <td>名前</td><td>投稿内容</td><td>時間</td><td colspan="2">いいね！</td>
          </thead>
          <?php echo $outputValue; ?>
       </table>
      </div>
      <a href="../noteCreate/">投稿</a>
    </div>
  </body>
</html>