<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/config.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/env-loader.php';

    function validate_signup_input($name, $email, $password) {
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

    function send_verification_mail($to, $username, $token) {
        $to = 'krkr728@gmail.com';
        $subject = 'camagru 인증 메일';

        $verificationLink = "https://camagru.owel.dev/view/include/verify.php?username=$username&token=$token";
        $message = "회원 가입을 확인하려면 다음 링크를 클릭하십시오: $verificationLink";

        $headers = 'From: mailer_ulee@naver.com' . "\r\n" .
                'Reply-To: no-reply@naver.com' . "\r\n";

        if (!mail($to, $subject, $message, $headers)) {
            echo "Email sending failed.";
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['form-name'] === 'signup-form') {
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        if (validate_signup_input($name, $email, $password)) {
            $db_servername = getenv('DB_SERVER_NAME');
            $db_username = getenv('DB_USER_NAME');
            $db_password = getenv('DB_PASSWORD');
            $dbname = getenv('DB_DBNAME');
            
            $conn = new mysqli($db_servername, $db_username, $db_password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: ".$conn->connect_error);
            }
            $stmt = $conn->prepare("INSERT INTO user (name, email, password, need_verification) VALUES (?, ?, ?, ?)");

            $token = bin2hex(random_bytes(32)); // 64자리의 무작위 문자열을 생성합니다.
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            
            $stmt->bind_param("ssss", $name, $email, $hashed_password, $token);
            if ($stmt->execute()) {
                send_verification_mail($email, $name, $token);
                header("Location: /?message="."회원 가입이 완료되었습니다!.");
            } else {
                header("Location: /?message="."회원 가입에 실패했습니다:");
            }
            $stmt->close();
            $conn->close();
        } else {
            header("Location: /?message="."입력값이 유효하지 않습니다.");
        }
    }
?>

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <input type="hidden" name="form-name" value="signup-form">
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