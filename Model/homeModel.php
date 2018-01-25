<?php
/**
* ログインページに関する処理を記述
*/
class homeModel extends common{
 //ログイン処理
  public function login($memberId = "",$password = "",&$errors = array()){
    //入力されたユーザーID検索
    $sql = "SELECT * FROM member WHERE memberid = ?";
    $stmt = parent::$pdoIns -> prepare($sql);
    $stmt -> execute(array($memberId));
    $row = $stmt -> fetch(PDO::FETCH_ASSOC);
    //ユーザーがあるか判定
    if ($row) {
      //パスワード判定
      if ($row['password'] != $password) {
        $errors['passwordError'] = "パスワードが違います。";
      }else{
        $fullname = $row['name'];
        //セッション情報格納
        $_SESSION['memberId'] = $memberId;
        header("Location: ../noteList/");
      }
    }else{
      $errors['memberIdNULL'] = "ユーザーが見つかりませんでした。";
    }
  }
  //ログアウト処理
  public function logout(){
    //セッション開始
    session_start();
    //セッション変数を全て削除
    $_SESSION = array();
    //セッションクッキーを削除
    if ($_COOKIE['PHPSESSID']) {
      setcookie("PHPSESSID",'',time()-1800,'/');
    }
    //セッションの登録データを削除
    session_destroy();
    print "ログアウト完了";
  }
}