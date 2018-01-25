<?php
/**
* 投稿一覧に関する処理を記述
*/
class noteModel extends common{
  public function noteList(){
    $sql = "SELECT memberId,name,noteId,content,time FROM member NATURAL JOIN note ORDER BY noteId DESC";
    $stmt = parent::$pdoIns ->prepare($sql);
    $stmt -> execute();

    $returnValue = "";
    while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
      $nice = self::niceGet($row['noteId']);
      $returnValue.= "<input type='hidden' name='member' value='".$row['memberId']."'><tr><td><a href='../profile/?memberId=".$row['memberId']."'>".$row['name']."</a></td><td>".$row['content']."</td><td>".$row['time']."</td><td></form><button name='nice' class='btn btn-primary btn-sm' value='".$row['noteId']."'><span >いいね！</span><span style='display: none;'>いいね済み</span></button></td><td>".$nice."</td></tr>";
    }
    return $returnValue;
  }
  public function myList($memberId = ""){
    $sql = "SELECT name,noteId,content,time FROM member NATURAL JOIN note WHERE memberId = ?";
    $stmt = parent::$pdoIns ->prepare($sql);
    $stmt -> execute(array($memberId));

    $returnValue = "";
    while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
      $returnValue.= "<tr><td>".$row['name']."</td><td>".$row['content']."</td><td>".$row['time']."</td><td><button type='submit' class='btn btn-danger' name='delete' value='".$row['noteId']."'>削除</button></td></tr>";
    }
    return $returnValue;
  }
  public function deleteNote($noteId = ""){
    $sql = "DELETE FROM note WHERE noteId = ?";
    $stmt = parent::$pdoIns ->prepare($sql);
    $stmt -> execute(array($noteId));
  }
  public function niceGet($noteId = ""){
    $sql = "SELECT COUNT(memberId) FROM nice WHERE noteId = ? GROUP BY noteId";
    $stmt = parent::$pdoIns ->prepare($sql);
    $stmt -> execute(array($noteId));
    $returnValue = "";
    while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
      $returnValue.= $row['COUNT(memberId)'];
    }
    return $returnValue;
  }
  public function noteCreate($memberId = "",$content = ""){
    $sql = "INSERT INTO note(memberId,content) VALUES(?,?)";
    $stmt = parent::$pdoIns ->prepare($sql);
    $stmt -> execute(array($memberId,$content));
  }
}