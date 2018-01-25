<?php
/**
* 仮登録に関する処理を記述
*/
class registrationMailModel extends common{
 //mail仮登録用の関数
  public function registrationMail($code = "",$mail = ""){
    $now = new DateTime();
    $sql = "INSERT INTO premember(code,mail) VALUES(?,?)";
    $stmt = parent::$pdoIns -> prepare($sql);
    $result = $stmt -> execute(array($code,$mail));
  }
  public function mailsend($code = "",$mail = ""){
    //メールの宛先
    $mailTo = $mail;
    //Return-Pathに指定するメールアドレス
    $returnMail = 'st041500@m03';
    $name = "管理人";
    $mail = 'st041500@m03';
    $subject = "【Meeting Place】会員登録用URLのお知らせ";
    $body = <<< EOM
      確認コード:$code
      24時間以内にこのコードをMeetingPlaceの画面で入力してください。
EOM;
    mb_language('ja');
    mb_internal_encoding('UTF-8');
    //Fromヘッダーを作成
    $header = 'From: ' . mb_encode_mimeheader($name). ' <' . $mail. '>';
    if (mb_send_mail($mailTo, $subject, $body, $header, '-f'. $returnMail)) {
      echo "メールをお送りしました。24時間以内にメールに記載された確認コードを入力してください。";
    } else {
      echo "メールの送信に失敗しました。";
    }
  }
}