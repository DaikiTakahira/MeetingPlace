<?php
/*
共通で使用するエラーチェックや関数などを記述
*/
class validatorModel{
  public function mailcheck($mail = "",&$errors = array()){
    //メール入力判定
    if ($mail == ''){
      $errors['mail'] = "メールが入力されていません。";
    }else{
      //mail形式チェック
      if(!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $mail)){
        $errors['mail_check'] = "メールアドレスの形式が正しくありません。";
      }
    }
  }
  public function membercheck($memberId = "",&$errors = array()){
    //memberId入力判定
    if ($memberId == '') {
      $errors['memberId'] = '学籍番号が入力されていません。';
    }
  }
  public function passwordhash(&$password = "",&$errors = array()){
    if ($password == '') {
      $errors['password'] = "パスワードが入力されていません。";
    }else{
      $password = md5($password);
    }
  }
  public function passwordcheck($password = "",$passcheck = "",&$errors = array()){
    if($password != $passcheck){
      $errors['passerror'] = "パスワードと確認パスワードが一致しません。";
    }
  }
  public function getCode(){
    $code = '';
    for ($i=0; $i < 4; $i++) {
      $code .= mt_rand(0,9);
    }
    return $code;
  }
  public function contentCheck(&$content = "",&$errors = array()){
    if($content == ""){
      $errors['content'] = '投稿内容が空だと投稿できません。';
    }else{
      nl2br($content);
    }
  }
}