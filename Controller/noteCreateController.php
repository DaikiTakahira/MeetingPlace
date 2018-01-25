<?php
session_start();
if (!isset($_SESSION['memberId'])){
  header("Location: ../");
}
//必要なファイルの呼び出し
require_once("../Model/commonModel.php");
require_once("../Model/noteModel.php");
require_once("../Model/validatorModel.php");

//エラー関数初期化
$errors = array();
//オブジェクト生成
$noteOBJ = new noteModel();
$validatorOBJ = new validatorModel();
//ボタンが押された時の処理
if(isset($_POST['BtnSend'])){
  $memberId = $_SESSION['memberId'];
  $content = htmlspecialchars($_POST['content']);
  $validatorOBJ -> contentCheck($content,$errors);
  //エラーがなければ
  if (count($errors) === 0){
    //投稿
    $noteOBJ -> noteCreate($memberId,$content);
  }
}
