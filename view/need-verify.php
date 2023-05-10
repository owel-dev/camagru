<?php

session_start();

require_once $_SERVER['DOCUMENT_ROOT'].'/config.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/env-loader.php';

$db_servername = getenv('DB_SERVER_NAME');
$db_username = getenv('DB_USER_NAME');
$db_password = getenv('DB_PASSWORD');
$dbname = getenv('DB_DBNAME');

$conn = new mysqli($db_servername, $db_username, $db_password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: ".$conn->connect_error);
}

$username = $_SESSION['username'];

$stmt = $conn->prepare("select need_verification from user where username=?");
$stmt->bind_param("s", $username);

if ($stmt->execute()) {
    $stmt->bind_result($stored_need_verification);
    $stmt->fetch();

    if (!$stored_need_verification) {
        header("Location: /?message="."토큰 조회 성공.");
    }
} else {
    header("Location: /?message="."DB 조회 실패.");
}
?>

<h1>이메일 인증이 필요합니다!</h1>