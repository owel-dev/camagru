<?php include '../config.php';?>

<!DOCTYPE html>
<html>
    <head>
        <title>profile</title>
        <link rel="stylesheet" href="<?php echo CSS_PATH;?>reset.css" />
        <link rel="stylesheet" href="<?php echo CSS_PATH;?>modal-signup.css" />
        <link rel="stylesheet" href="<?php echo CSS_PATH;?>header.css" />
        <link rel="stylesheet" href="<?php echo CSS_PATH;?>user-profile.css" />
    </head>
    <body>
        <header>
            <?php include INCLUDE_PATH . 'header.php'; ?>
        </header>
        <main>
            <?php include INCLUDE_PATH . 'modal-signup.php';  ?>
            <div class="contents">
                <div class="profile-form">
                    <form action="">
                        <label>User Name</label>
                        <input type="text">

                        <label>Email</label>
                        <input type="text">

                        <label>Password</label>
                        <input type="text">

                        <button type="submit">제출</button>
                    </form>
                </div>
            </div>
        </main>
    </body>
</html>
