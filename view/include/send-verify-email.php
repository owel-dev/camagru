<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/config.php';

function send_verification_mail($to, $username, $token) {
    $to = 'krkr728@gmail.com';
    $subject = 'camagru 인증 메일';

    $verificationLink = MAIL_VERIFY_PAGE_PATH."?username=$username&token=$token";
    $message = "회원 가입을 확인하려면 다음 링크를 클릭하십시오: $verificationLink";

    $headers = 'From: '.MAIL_SENDER."\r\n" .
            'Reply-To: no-reply@naver.com' . "\r\n";

    if (!mail($to, $subject, $message, $headers)) {
        echo "Email sending failed.";
    }
}
?>