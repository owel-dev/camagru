<?php
    session_start();
    
    require_once $_SERVER['DOCUMENT_ROOT'].'/config.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/env-loader.php';

    function validate_sign_input($name, $password) {
        if (!preg_match("/^.{1,20}$/", $name)) {
            return false;
        }

        if (!preg_match("/^.{1,20}$/", $password)) {
            return false;
        }

        return true;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['form-name'] === 'signin-form') {
        $username = trim($_POST['name']);
        $password = trim($_POST['password']);

        if (validate_sign_input($username, $password)) {
            
            $db_servername = getenv('DB_SERVER_NAME');
            $db_username = getenv('DB_USER_NAME');
            $db_password = getenv('DB_PASSWORD');
            $dbname = getenv('DB_DBNAME');
            
            $conn = new mysqli($db_servername, $db_username, $db_password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: ".$conn->connect_error);
            }

            $stmt = $conn->prepare("select password from user where name=?");
            $stmt->bind_param("s", $username);
            
            if (!$stmt->execute()) {
                header("Location: /?message="."로그인이 실패했습니다.");
            } else {
                $stmt->bind_result($stored_password);
                $stmt->fetch();
                if (password_verify($password, $stored_password)) {
                    $_SESSION['username'] = $username;
                    header("Location: /");
                } else {
                    header("Location: /?message="."비밀번호가 일치하지 않습니다."); 
                }
            }
            $stmt->close();
            $conn->close();
        } else {
            header("Location: /?message="."입력값이 유효하지 않습니다.");
        }
    }
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <input type="hidden" name="form-name" value="signin-form">
    <label>Name</label>
    <input type="text" name="name" required pattern=".{1,20}"
        title="이름은 20자 이하입니다.">

    <label>Password</label>
    <input type="password" name="password" required pattern=".{1,20}"
        title="패스워드는 20자 이하입니다.">

    <button type="submit">제출</button>
</form>
