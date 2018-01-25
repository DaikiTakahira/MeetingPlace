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
require_once("../Model/profileModel.php");
require_once("../Model/validatorModel.php");
require_once("../Model/followModel.php");
require_once("../Model/messageModel.php");

//エラー関数初期化
$errors = array();
//オブジェクト生成
$profileOBJ = new profileModel();
$validatorOBJ = new validatorModel();
$followOBJ = new followModel();
$messageOBJ = new messageModel();

//未読メッセージ件数取得
$countNotice = $messageOBJ -> messageNotice($_SESSION['memberId']);
//プロフィール内容取得
$profile = $profileOBJ -> profileSelect($memberId);
//フォロー数取得
$follow = $followOBJ -> followCount($memberId);
//フォロワー数取得
$follower = $followOBJ -> followerCount($memberId);
//ボタンが押された時の処理
if(isset($_POST['BtnSend'])){
  $appeal = htmlspecialchars($_POST['appeal']);
  //エラーがなければ
  if (count($errors) === 0){
    //更新
    $profileOBJ -> profileUpdate($memberId,$appeal);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
  }
}
//followボタンが押された時
if (isset($_POST['follow'])) {
  $followOBJ -> followCreate($loginId,$memberId);
}