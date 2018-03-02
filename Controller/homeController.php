<?php
session_start();
//必要なファイルの呼び出し
require_once("../../Model/commonModel.php");
require_once("../../Model/homeModel.php");
require_once("../../Model/validatorModel.php");

//エラー関数初期化
$errors = array();
//オブジェクト生成
$homeOBJ = new homeModel();
$validatorOBJ = new validatorModel();
//ボタンが押された時の処理
if(isset($_POST['BtnSend'])){
  //エラーチェック
  $password = htmlspecialchars($_POST['password']);
  $memberId = htmlspecialchars($_POST['memberId']);
  $validatorOBJ -> passwordhash($password,$errors);
  //エラーがなければ
  if (count($errors) === 0){
    //ログイン処理
    $homeOBJ -> login($memberId,$password,$errors);
  }
}