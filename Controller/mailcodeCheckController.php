<?php
session_start();
//必要なファイルの呼び出し
require_once("../Model/commonModel.php");
require_once("../Model/mailcodeCheckModel.php");

//エラー関数初期化
$errors = array();
//オブジェクト生成
$mailcodeCheckOBJ = new mailcodeCheckModel();
//ボタンが押された時の処理
if(isset($_POST['BtnSend'])){
  $mail = htmlspecialchars($_POST['mail']);
  $code = htmlspecialchars($_POST['code']);
  //mailが登録されているか
  $mailcodeCheckOBJ -> mailaccountCheck($mail,$errors);
  //エラーがなければ
  if (count($errors) === 0){
  //確認コード照会
    $mailcodeCheckOBJ -> mailcodeCheck($mail,$code,$errors);
  }
}