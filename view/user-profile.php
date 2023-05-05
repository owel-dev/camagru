<?php
session_start();

require_once $_SERVER['DOCUMENT_ROOT'].'/config.php';
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

    $stmt = $conn->prepare("SELECT username, email FROM user WHERE username=?");
    $stmt->bind_param("s", $username);

    if ($stmt->execute()) {
        $stmt->bind_result($stored_username, $stored_email);
        $stmt->fetch();
    } else {
        header("Location: /?message="."DB조회가 실패했습니다, 관리자에게 문의 해주세요.");
    }
    $stmt->close();
    $conn->close();
    
} else {
    header("Location: /?message="."페이지 접근 권한이 없습니다!");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>profile</title>
        <link rel="stylesheet" href="<?php echo CSS_PATH;?>reset.css" />
        <link rel="stylesheet" href="<?php echo CSS_PATH;?>modal.css" />
        <link rel="stylesheet" href="<?php echo CSS_PATH;?>header.css" />
        <link rel="stylesheet" href="<?php echo CSS_PATH;?>user-profile.css" />
    </head>
    <body>
        <header>
            <?php include INCLUDE_PATH.'header.php'; ?>
        </header>
        <main>
            <div class="modal" style="display: none;">
                <div class="modal-div"></div>
            </div>
            <div class="contents">
                <div class="profile-form">
                    <form action="">
                        <label>User Name</label>
                        <div><?php echo $stored_username?></div>

                        <label>Email</label>
                        <div><?php echo $stored_email?></div>

                        <button type="submit">제출</button>
                    </form>
                </div>
            </div>
        </main>
        <script src="<?php echo JS_PATH;?>modal.js"></script>
        <script src="<?php echo JS_PATH;?>header.js"></script>
    </body>
</html>
