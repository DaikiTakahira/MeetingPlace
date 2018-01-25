<?php
/**
* フォロー機能に関する処理を記述
*/
class followModel extends common{
  public function followCreate($memberId = "",$followId = ""){
    $sql = "INSERT INTO follow(memberId,followId) VALUES(?,?)";
    $stmt = parent::$pdoIns -> prepare($sql);
    $stmt -> execute(array($memberId,$followId));
  }
  public function niceDelete($memberId = "",$followId = ""){
    $sql = "DELETE FROM follow WHERE memberId = ? AND followId = ?";
    $stmt = parent::$pdoIns -> prepare($sql);
    $stmt -> execute(array($memberId,$followId));
  }
  public function followGet($memberId = ""){
    $sql = "SELECT member.memberId,name,departmentName FROM (follow JOIN member ON member.memberId = follow.followId ) JOIN department ON member.departmentId = department.departmentId WHERE follow.memberId = ?";
    $stmt = parent::$pdoIns -> prepare($sql);
    $stmt -> execute(array($memberId));
    $returnValue = "";
    while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
      $returnValue.= "<tr><td><a href='../profile/?memberId=".$row['memberId']."'>".$row['name']."</td><td>".$row['departmentName']."</td></tr>";
    }
    return $returnValue;
  }
  public function followerGet($memberId = ""){
    $sql = "SELECT member.memberId,name,departmentName FROM (follow JOIN member ON member.memberId = follow.memberId ) JOIN department ON member.departmentId = department.departmentId WHERE follow.followId = ?";
    $stmt = parent::$pdoIns -> prepare($sql);
    $stmt -> execute(array($memberId));
    $returnValue = "";
    while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
      $returnValue.= "<tr><td><a href='../profile/?memberId=".$row['memberId']."'>".$row['name']."</td><td>".$row['departmentName']."</td></tr>";
    }
    return $returnValue;
  }
  public function followCount($memberId = ""){
    $sql = "SELECT COUNT(memberId) FROM follow WHERE memberId = ?";
    $stmt = parent::$pdoIns -> prepare($sql);
    $stmt -> execute(array($memberId));
    $returnValue = "";
    $row = $stmt -> fetch(PDO::FETCH_ASSOC);
    $returnValue = $row['COUNT(memberId)'];
    return $returnValue;
  }
  public function followerCount($memberId = ""){
    $sql = "SELECT COUNT(followId) FROM follow WHERE followId = ?";
    $stmt = parent::$pdoIns -> prepare($sql);
    $stmt -> execute(array($memberId));
    $returnValue = "";
    $row = $stmt -> fetch(PDO::FETCH_ASSOC);
    $returnValue = $row['COUNT(followId)'];
    return $returnValue;
  }
}