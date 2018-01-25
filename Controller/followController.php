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
require_once("../Model/followModel.php");

//オブジェクト生成
$followOBJ = new followModel();

//フォロー一覧取得
$outputValue = $followOBJ -> followGet($memberId);
//フォロワー一覧取得
$follower = $followOBJ ->followerGet($memberId);