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
require_once("../Model/profileModel.php");
require_once("../Model/validatorModel.php");


//エラーメッセージ初期化
$errors = array();
//オブジェクト生成
$messageOBJ = new messageModel();
$profileOBJ = new profileModel();
$validatorOBJ = new validatorModel();

//メッセージ既読
$messageOBJ -> messageRead($memberId,$_SESSION['memberId']);
//メッセージ取得
$outputValue = $messageOBJ -> messageGet($_SESSION['memberId'],$memberId);
//名前取得
$name = $profileOBJ -> nameGet($memberId);

if (isset($_POST['BtnSend'])) {
  $content = htmlspecialchars($_POST['content']);
  $validatorOBJ -> contentCheck($_POST['content'],$errors);
  //エラーがなければ
  if (count($errors) === 0){
    //送信
    $messageOBJ -> messageCreate($_SESSION['memberId'],$memberId,$_POST['content']);
  }
}
