<?php
session_start();
if(!isset($_SESSION['mail'])){
  //SESSIONがなければTOP画面に弾く
  header("Location: ../");
  exit();
}else{
  $mail = htmlspecialchars($_SESSION['mail']);
}
//必要なファイルの呼び出し
require_once("../Model/commonModel.php");
require_once("../Model/registrationFormModel.php");
require_once("../Model/validatorModel.php");

//エラー関数初期化
$errors = array();
//オブジェクト生成
$registrationFormOBJ = new registrationFormModel();
$validatorOBJ = new validatorModel();
//selectbox生成
$departmentCreate = $registrationFormOBJ -> departmentSelect();
//ボタンが押された時の処理
if(isset($_POST['BtnSend'])){
  $password = htmlspecialchars($_POST['password']);
  $memberId = htmlspecialchars($_POST['memberId']);
  $name = htmlspecialchars($_POST['name']);
  $departmentId = $_POST['department'];
  //エラーチェック
  $validatorOBJ -> passwordhash($password,$errors);
  $validatorOBJ -> membercheck($memberId,$errors);
  $registrationFormOBJ -> memberIdCheck($memberId,$mail,$errors);
  $registrationFormOBJ -> nameCheck($name,$errors);
  //エラーがなければ
  if (count($errors) === 0){
    //登録
    $registrationFormOBJ -> registrationMember($memberId,$password,$departmentId,$mail,$name);
    $_SESSION = array();
    header("Location: ../home/");
    exit();
  }
}