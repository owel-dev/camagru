<?php
define("ROOT_PATH", "/var/www/camagru");

define("INCLUDE_PATH", ROOT_PATH . "/view/include/");
define("CSS_PATH", "/public/css/");
define("JS_PATH", "/public/js/");
define("VIEW_PATH", "/view/");
define("IMAGE_PATH", "/public/image/");
define("PHP_FEAT_PATH", "/php-feature/");

define("NAME_VALIDATION", "^[a-zA-Z0-9]{3,20}$");
define("EMAIL_VALIDATION", "^[^@\s]+@[^@\s]+\.[^@\s]+$");
define("PASSWORD_VALIDATION", "^(?=.*[a-zA-Z])(?=.*\d).{8,20}$");
define("MAIL_VERIFY_PAGE_PATH", "https://camagru.owel.dev/view/include/verify.php");
define("MAIL_MODIFY_PAGE_PATH", "https://camagru.owel.dev/view/include/password-modify.php");
define("MAIL_SENDER", "mailer_ulee@naver.com");
?>
