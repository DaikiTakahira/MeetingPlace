<?php
/**
* 共通で使用するデータベース接続関数を定義
*/
class common{
  //共通で使用できる変数を宣言
  protected static $pdoIns;
//コンストラクタ
  public function __construct(){
    self::$pdoIns = self::dbconnect();
  }
//mysql接続メソッド
  private function dbconnect(){
    $user = "root";
    $password = "root";
    $dsn = "mysql:dbname=MeetingPlace;host=localhost;charset=utf8";
    $pdoIns = new pdo($dsn,$user,$password);
    return $pdoIns;
  }
}