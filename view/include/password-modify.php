<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/config.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/env-loader.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['username']) && isset($_GET['token'])) {
    $username = trim($_GET['username']);
    $token = trim($_GET['token']);

    $db_servername = getenv('DB_SERVER_NAME');
    $db_username = getenv('DB_USER_NAME');
    $db_password = getenv('DB_PASSWORD');
    $dbname = getenv('DB_DBNAME');

    $conn = new mysqli($db_servername, $db_username, $db_password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: ".$conn->connect_error);
    }

    $stmt = $conn->prepare("select modify_token from user where username=?");
    $stmt->bind_param("s", $username);

    if ($stmt->execute()) {
        $stmt->bind_result($stored_modify_token);
        if ($stmt->fetch()) {
            if ($token !== $stored_modify_token) {
                header("Location: /?message="."올바르지 않은 토큰입니다 - modal-password-modify");
            }
        } else {
            header("Location: /?message="."올바르지 않은 토큰입니다 - modal-password-modify");
        }
    } else {
        header("Location: /?message="."DB 에러 - modal-password-modify");
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['form-name'] === 'password-modify-form') {
    $db_servername = getenv('DB_SERVER_NAME');
    $db_username = getenv('DB_USER_NAME');
    $db_password = getenv('DB_PASSWORD');
    $dbname = getenv('DB_DBNAME');
    
    $conn = new mysqli($db_servername, $db_username, $db_password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: ".$conn->connect_error);
    }
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("update user set password = ?, modify_token = NULL where username=?");
    $stmt->bind_param("ss", $hashed_password, $username);
    if ($stmt->execute()) {
        header("Location: /?message="."비밀번호가 재설정 되었습니다.");
    } else {
        header("Location: /?message="."DB 에러 - password-modify");
    }
}
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" id="form-password-find" method="post">
    <h2>비밀번호 변경하기</h2>
    <br/>
    <input type="hidden" name="form-name" value="password-modify-form">
    <label>Username</label>
    <input type="text" name="username" required pattern=".{1,20}"
        title="이름은 20자 이하입니다.">

    <label>password</label>
    <input type="password" name="password" required pattern=".{1,20}"
        title="패스워드는 20자 이하입니다.">

    <button type="submit">제출</button> 

    <div></div>
</form>