<?php
    include '../env.php';
    
    $servername = DB_SERVER_NAME;
    $username = DB_USER_NAME;
    $password = DB_PASSWORD;
    $dbname = DB_DBNAME;

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("INSERT INTO user (name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $password);

    if ($stmt->execute()) {
        echo "회원 가입이 완료되었습니다!";
    } else {
        echo "회원 가입에 실패했습니다: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
?>