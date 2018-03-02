<?php
require_once("../../Controller/noteCreateController.php");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>投稿画面</title>
    <link rel="stylesheet" href="https://getbootstrap.com/dist/css/bootstrap.min.css">
    <link href="http://getbootstrap.com/docs/4.0/examples/narrow-jumbotron/narrow-jumbotron.css" rel="stylesheet">
  </head>
  <body>
  <div class="container">
    <h1>投稿画面</h1>
    <?php if (count($errors) === 0): ?>
      <form action="" method="post">
      <div class="form-group">
        <p class="lead">学籍番号：<?php echo $_SESSION['memberId']; ?></p>
      </div>
      <div class="form-group">
        <p class="lead">投稿内容：<textarea name="content" class="form-control"></textarea></p>
      </div>
        <input type="submit" class="btn btn-primary" name="BtnSend" value="投稿">
      </form>
    <?php elseif(count($errors) > 0): ?>
    <?php foreach($errors as $value){ echo "<p>".$value."</p>"; }?>
    <?php endif; ?>
    <a href="../noteList/">戻る</a>
  </div>
  </body>
</html>