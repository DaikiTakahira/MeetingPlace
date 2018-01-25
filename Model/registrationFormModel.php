<?php
/**
* 本登録に関する処理を記述
*/
class registrationFormModel extends common{
  //登録関数
  public function registrationMember($memberId = "",$password = "",$departmentId = "",$mail = "",$name = ""){
    $sql = "INSERT INTO member(memberId,password,departmentId,mail,name) VALUES(?,?,?,?,?)";
    $stmt = parent::$pdoIns -> prepare($sql);
    $stmt -> execute(array($memberId,$password,$departmentId,$mail,$name));
  }
  public function memberIdCheck($memberId = "",$mail = "",&$errors = array()){
    $sql = "SELECT * FROM member WHERE memberId = ? OR mail = ?";
    $stmt = parent::$pdoIns -> prepare($sql);
    $stmt -> execute(array($memberId,$mail));
    $row = $stmt -> fetch(PDO::FETCH_ASSOC);
    if($row['memberId'] == $memberId){
      $errors['memberId'] = 'すでに学籍番号が登録されています。';
    }else if($row['mail']){
      $errors['mail'] = 'すでにメールアドレスが登録されています。';
    }
  }
  public function nameCheck($name = "",&$errors = array()){
    //名前入力判定
    if ($name == '') {
      $errors['name'] = '名前が入力されていません。';
    }
  }
  public function departmentSelect(){
    //セレクトボックス生成
    $sql = "SELECT * FROM department";
    $stmt = parent::$pdoIns -> prepare($sql);
    $stmt -> execute();

    $departmentCreate = "<select name ='department'>";

    while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
      $departmentCreate.= "<option value='".$row['departmentId']."'>".$row['departmentName']."</option>";
    }
    $departmentCreate.= "</select>";
    return $departmentCreate;
  }
}