<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/config.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/env-loader.php';
require_once './send-modify-email.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['form-name']) && $_GET['form-name'] === 'password-modify-form') {
    $username = trim($_GET['username']);
    $email = trim($_GET['email']);

    $db_servername = getenv('DB_SERVER_NAME');
    $db_username = getenv('DB_USER_NAME');
    $db_password = getenv('DB_PASSWORD');
    $dbname = getenv('DB_DBNAME');
    
    $conn = new mysqli($db_servername, $db_username, $db_password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: ".$conn->connect_error);
    }

    $stmt = $conn->prepare("select id from user where username=? and email=?");
    $stmt->bind_param("ss", $username, $email);

    if ($stmt->execute()) {
        if ($stmt->fetch()) {
            $token = bin2hex(random_bytes(32)); // 64자리의 무작위 문자열을 생성합니다.

            $conn2 = new mysqli($db_servername, $db_username, $db_password, $dbname);
            if ($conn2->connect_error) {
                die("Connection failed: ".$conn2->connect_error);
            }
            $a = null;
            $stmt2 = $conn2->prepare("update user set modify_token = ? where username = ?");
            $stmt2->bind_param("ss", $token, $username);
            if ($stmt2->execute()) {
                send_modification_mail($username, $token);
                header("Location: /?message="."비밀번호 재설정 메일이 전송되었습니다.");
            } else {
                header("Location: /?message="."insert DB 에러 - modal-password-modify");
            }
        } else {
            header("Location: /?message="."올바르지 않은 토큰입니다 - modal-password-modify");
        }
    } else {
        header("Location: /?message="."select DB 에러 - modal-password-modify");
    }
}

?>

<form id="form-password-find" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
    <h2>비밀번호 재설정</h2> <br/>
    <input type="hidden" name="form-name" value="password-modify-form">
    <label>Username</label>
    <input type="text" name="username">

    <label>Email</label>
    <input type="text" name="email">

    <button type="submit">제출</button> 
</form>