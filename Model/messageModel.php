<?php
/**
* メッセージ機能に関する処理を記述
*/
class messageModel extends common{
  public function messageCreate($memberId = "",$partnerId = "",$content = ""){
    $sql = "INSERT INTO message(memberId,partnerId,content) VALUES(?,?,?)";
     $stmt = parent::$pdoIns ->prepare($sql);
    $stmt -> execute(array($memberId,$partnerId,$content));
  }
  public function messageGet($memberId = "",$partnerId = ""){
    $sql = "SELECT name,content,time,message.flag FROM message JOIN member ON message.memberId = member.memberId WHERE (message.memberId = ? AND partnerId = ?) OR member.memberId = ? AND partnerId = ? ORDER BY time DESC";
    $stmt = parent::$pdoIns -> prepare($sql);
    $stmt -> execute(array($memberId,$partnerId,$partnerId,$memberId));
    $returnValue = "";
    while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
      $returnValue.= "<tr><td>".$row['name']."</td><td>".$row['content']."</td><td>".$row['time']."</td><td>";
      if($row['flag'] == 1){
        $returnValue.= "既読";
      }else{
        $returnValue.= "未読";
      }
      $returnValue.= "</td></tr>";
    }
    return $returnValue;
  }
  // public function messageDerete(){

  // }
  public function messageRead($memberId = "",$partnerId = ""){
    $sql = "UPDATE message SET flag = 1 WHERE memberId = ? AND partnerId = ?";
    $stmt = parent::$pdoIns ->prepare($sql);
    $stmt -> execute(array($memberId,$partnerId));
  }
  //未読メッセージが何件あるか
  public function messageNotice($partnerId = ""){
    $sql = "SELECT COUNT(flag) FROM message WHERE partnerId = ? AND flag = 0";
    $stmt = parent::$pdoIns ->prepare($sql);
    $stmt -> execute(array($partnerId));
    $row = $stmt -> fetch(PDO::FETCH_ASSOC);
    $returnValue = $row['COUNT(flag)'];
    return $returnValue;
  }
  //未読メッセージの相手の一覧
  public function personalNotice($partnerId = ""){
    $sql = "SELECT member.memberId,name,COUNT(message.flag) FROM message JOIN member ON message.memberId = member.memberId WHERE partnerId = ? AND message.flag = 0 GROUP BY message.memberId";
    $stmt = parent::$pdoIns ->prepare($sql);
    $stmt -> execute(array($partnerId));
    $returnValue = "";
    while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
      $returnValue.= "<tr><td><a href='../profile/?memberId=".$row['memberId']."'>".$row['name']."</a></td><td>".$row['COUNT(message.flag)']."</td></tr>";
    }
    return $returnValue;
  }
}