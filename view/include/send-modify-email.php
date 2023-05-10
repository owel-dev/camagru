<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/config.php';

function send_modification_mail($username, $token) {
    $to = 'krkr728@gmail.com';
    $subject = 'camagru 인증 메일';

    $verificationLink = MAIL_MODIFY_PAGE_PATH."?username=$username&token=$token";
    $message = "비밀번호를 변경하려면 다음 링크를 클릭하십시오: $verificationLink";

    $headers = 'From: '.MAIL_SENDER."\r\n" .
            'Reply-To: no-reply@naver.com' . "\r\n";

    if (!mail($to, $subject, $message, $headers)) {
        echo "Email sending failed.";
    }
}
?>