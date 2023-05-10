<?php
session_start();

require_once $_SERVER['DOCUMENT_ROOT'].'/env-loader.php';

if (isset($_SESSION['username'])) {
    $db_servername = getenv('DB_SERVER_NAME');
    $db_username = getenv('DB_USER_NAME');
    $db_password = getenv('DB_PASSWORD');
    $dbname = getenv('DB_DBNAME');

    $username = $_SESSION['username'];

    $conn = new mysqli($db_servername, $db_username, $db_password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: ".$conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT username, email, need_verification FROM user WHERE username=?");
    $stmt->bind_param("s", $username);

    if ($stmt->execute()) {
        $stmt->bind_result($stored_username, $stored_email, $stored_need_verification);
        $stmt->fetch();
        if ($stored_need_verification) {
            header("Location: /view/need-verify.php");
        }
    } else {
        header("Location: /?message="."DB조회가 실패했습니다, 관리자에게 문의 해주세요.");
    }
    $stmt->close();
    $conn->close();
    
} else {
    header("Location: /?message="."페이지 접근 권한이 없습니다!");
}
?>