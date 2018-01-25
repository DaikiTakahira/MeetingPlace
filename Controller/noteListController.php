<?php
session_start();
if (!isset($_SESSION['memberId'])){
  header("Location: ../");
}
//必要なファイルの呼び出し
require_once("../Model/commonModel.php");
require_once("../Model/noteModel.php");
require_once("../Model/niceModel.php");
require_once("../Model/messageModel.php");

//エラー関数初期化
$errors = array();
//オブジェクト生成
$noteOBJ = new noteModel();
$memberId = $_SESSION['memberId'];
$niceOBJ = new niceModel();
$messageOBJ = new messageModel();

//未読メッセージ件数取得
$countNotice = $messageOBJ -> messageNotice($memberId);
//自分のみ表示ボタン
if (isset($_POST['myList'])) {
  $outputValue = $noteOBJ -> myList($memberId);
}else{
  $outputValue = $noteOBJ -> noteList();
}
//全て表示ボタン
if (isset($_POST['All'])) {
  $outputValue = $noteOBJ -> noteList();
}
//削除ボタン
if (isset($_POST['delete'])){
  $noteOBJ -> deleteNote($_POST['delete']);
}
//いいね！ボタン
if (isset($_POST['niceCreate'])) {
  $niceOBJ -> niceCreate($memberId,$_POST['niceCreate']);
}
//いいね！取り消しボタン
if (isset($_POST['niceDelete'])) {
  $niceOBJ -> niceDelete($memberId,$_POST['noteDelete']);
}
//いいね！取得
// if(isset($_POST['niceGet'])){
//   echo $noteListOBJ -> niceGet($_POST['niceGet']);
// }