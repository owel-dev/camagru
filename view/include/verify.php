<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/config.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/env-loader.php';

$db_servername = getenv('DB_SERVER_NAME');
$db_name = getenv('DB_USER_NAME');
$db_password = getenv('DB_PASSWORD');
$dbname = getenv('DB_DBNAME');

$query_name = $_GET['username'];
$query_name2 = $_GET['username'];
$query_token = $_GET['token'];

$conn = new mysqli($db_servername, $db_name, $db_password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: ".$conn->connect_error);
}

$stmt = $conn->prepare("SELECT need_verification FROM user WHERE username=?");
$stmt->bind_param("s", $query_name);

$conn2 = new mysqli($db_servername, $db_name, $db_password, $dbname);

if ($stmt->execute()) {
    $stmt->bind_result($stored_token);
    $stmt->fetch();

    if ($query_token === $stored_token){
        $stmt2 = $conn2->prepare("UPDATE user SET need_verification = 0 WHERE username=?");
        $stmt2->bind_param("s", $query_name2);

        if ($stmt2->execute()) {
            header("Location: /?message="."이메일 인증이 완료되었습니다!");
        } else {
            header("Location: /?message="."Update query 실패.");
        }
    } else {
        header("Location: /?message="."토큰 값이 일치하지 않습니다.");
    }
} else {
    header("Location: /?message="."Select query 실패.");
}

?>

