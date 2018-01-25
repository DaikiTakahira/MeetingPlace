<?php
session_start();
if(!isset($_SESSION['memberId'])){
  //SESSIONがなければTOP画面に弾く
  header("Location: ../");
  exit();
}else{
  $loginId = $_SESSION['memberId'];
}
if ($_GET) {
  $memberId = $_GET['memberId'];
}else{
  $memberId = $loginId;
}
//必要なファイルの呼び出し
require_once("../Model/commonModel.php");
require_once("../Model/messageModel.php");

//オブジェクト生成
$messageOBJ = new messageModel();

//通知一覧取得
$outputValue = $messageOBJ -> personalNotice($memberId);