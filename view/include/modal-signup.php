<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/config.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/env.php';

    function validate_input($name, $email, $password) {
        if (!preg_match("/^[a-zA-Z0-9]{3,20}$/", $name)) {
            return false;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        if (!preg_match("/^(?=.*[a-zA-Z])(?=.*\d).{8,20}$/", $password)) {
            return false;
        }

        return true;
    }

    $result_message = "";
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        if (validate_input($name, $email, $password)) {
            
            $db_servername = DB_SERVER_NAME;
            $db_username = DB_USER_NAME;
            $db_password = DB_PASSWORD;
            $dbname = DB_DBNAME;
            
            $conn = new mysqli($db_servername, $db_username, $db_password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: ".$conn->connect_error);
            }

            $stmt = $conn->prepare("INSERT INTO user (name, email, password) VALUES (?, ?, ?)");
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            
            $stmt->bind_param("sss", $name, $email, $hashed_password);
            if ($stmt->execute()) {
                $result_message = "회원 가입이 완료되었습니다!";
            } else {
                $result_message = "회원 가입에 실패했습니다:".$conn->error;
            }

            $stmt->close();
            $conn->close();
        } else {
            $result_message = "입력값이 유효하지 않습니다.";
        }
    }
?>

<div class="signup-modal">
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <label>Name</label>
        <input type="text" name="name" required pattern="<?php echo NAME_VALIDATION;?>" 
            title="이름은 5자 이상 20자 이하, 영대소문자 혹은 숫자만 가능합니다">

        <label>Email</label>
        <input type="text" name="email" required pattern="<?php echo EMAIL_VALIDATION;?>" 
            title="올바른 이메일 형식을 입력해주세요">

        <label>Password</label>
        <input type="password" name="password" required pattern="<?php echo PASSWORD_VALIDATION;?>" 
            title="대문자, 소문자, 숫자가 각 1글자 이상 포함되어야 하며, 8글자 이상 20글자 이하여야 합니다.">

        <button type="submit">제출</button>
    </form>
</div>