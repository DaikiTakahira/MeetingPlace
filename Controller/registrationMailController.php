<?php
//必要なファイルの呼び出し
require_once("../../Model/commonModel.php");
require_once("../../Model/registrationMailModel.php");
require_once("../../Model/validatorModel.php");

//エラー関数初期化
$errors = array();
//オブジェクト生成
$registrationMailOBJ = new registrationMailModel();
$validatorOBJ = new validatorModel();
//ボタンが押された時の処理
if(isset($_POST['BtnSend'])){
  //エラーチェック
  $mail = htmlspecialchars($_POST['mail']);
  $validatorOBJ -> mailcheck($mail,$errors);
  //code生成
  $code = $validatorOBJ -> getCode();
  //エラーがなければ
  if (count($errors) === 0){
    //仮登録
    $registrationMailOBJ -> registrationMail($code,$mail);
    //メール送信
    $registrationMailOBJ -> mailsend($code,$mail);
  }
}

