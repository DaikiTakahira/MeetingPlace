<?php
/**
* mail確認コードに関する処理を記述
*/
class mailcodeCheckModel extends common{
  //mail登録確認
  public function mailaccountCheck($mail = "",&$errors = array()){
    $sql = "SELECT mail FROM premember WHERE mail = ? AND flag =0";
    $stmt = parent::$pdoIns -> prepare($sql);
    $stmt -> execute(array($mail));
    $row = $stmt -> fetch(PDO::FETCH_ASSOC);
    if (!$row) {
      $errors['mail'] = '有効なメールアドレスが見つかりませんでした。もう一度メール登録からお願いします。';
    }
  }
  //確認コード照会
  public function mailcodeCheck($mail = "",$code = "",&$errors = array()){
    $sql = "SELECT mail FROM premember WHERE code = ? AND mail = ? AND flag =0";
    $stmt = parent::$pdoIns -> prepare($sql);
    $stmt -> execute(array($code,$mail));
    $row = $stmt -> fetch(PDO::FETCH_ASSOC);
    if ($row) {
      $_SESSION['mail'] = $mail;
      self::mailcodeOut($mail,$code);
      header("Location: ../registrationForm/");
      exit();
    }else{
      $errors['code'] = '確認コードが違います。もう一度ご確認ください。';
    }
  }
  //確認コード無効化
  private function mailcodeOut($mail = "",$code = ""){
    $sql = "UPDATE premember SET flag = 1 WHERE code = ? AND mail = ? AND flag =0";
    $stmt = parent::$pdoIns -> prepare($sql);
    $result = $stmt -> execute(array($code,$mail));
  }
}