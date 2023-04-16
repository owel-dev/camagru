<?php
    $servername = "localhost";
    $username = "camagru";
    $password = "Zxcasdqwe12#";
    $dbname = "camagru_db";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM test";
    $result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hello Camagru</title>
    <link rel="stylesheet" href="index.css"/>
</head>
<body>
<header>
    <div class="logo">
        <a href="#">
            <div class="logo-image"></div>
        </a>
    </div>
    <div class="user-profile">
        <a href="#">
            <div class="user-profile-icon"></div>
        </a>
    </div>
</header>
<main>
    <div class="contents">
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="content-1">
                <div class="content-image">
                    <a href="#">
                        <img src="public/content-image.webp"/>
                    </a>
                </div>
                <div class="info">
                    <p><?php echo $row['name']; ?></p>
                    <p><?php echo $row['date']; ?></p>
                </div>
            </div>
        <?php } ?>
    </div>
</main>
<?php
mysqli_close($conn);
?>
</body>
</html>
