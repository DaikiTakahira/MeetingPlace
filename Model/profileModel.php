<?
/**
* プロフィールに関する処理を記述
*/
class profileModel extends common{
  public function profileSelect($memberId = ""){
    $sql = "SELECT * FROM member NATURAL JOIN department WHERE memberId = ?";
    $stmt = parent::$pdoIns -> prepare($sql);
    $stmt -> execute(array($memberId));
    $row = $stmt -> fetch(PDO::FETCH_ASSOC);
    return $row;
  }
  public function profileUpdate($memberId = "",$appeal = ""){
    $sql = "UPDATE member SET appeal = ? WHERE memberId = ?";
    $stmt = parent::$pdoIns -> prepare($sql);
    $stmt -> execute(array($appeal,$memberId));
  }
  public function nameGet($memberId = ""){
    $sql = "SELECT name FROM member WHERE memberId = ?";
    $stmt = parent::$pdoIns -> prepare($sql);
    $stmt -> execute(array($memberId));
    $row = $stmt -> fetch(PDO::FETCH_ASSOC);
    $returnValue = $row['name'];
    return $returnValue;
  }
}