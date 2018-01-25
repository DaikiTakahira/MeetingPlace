<?php
/**
* いいね！機能に関する処理を記述
*/
class niceModel extends common{
  public function niceCreate($memberId = "",$noteId = ""){
    $sql = "INSERT INTO nice(memberId,noteId) VALUES(?,?)";
    $stmt = parent::$pdoIns -> prepare($sql);
    $stmt -> execute(array($memberId,$noteId));
  }
  public function niceDelete($memberId = "",$noteId = ""){
    $sql = "DELETE FROM nice WHERE memberId = ? AND noteId = ?";
    $stmt = parent::$pdoIns -> prepare($sql);
    $stmt -> execute(array($memberId,$noteId));
  }
}