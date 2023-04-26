<?php require_once $_SERVER['DOCUMENT_ROOT'].'/config.php';?>


<!DOCTYPE html>
<html>
    <head>
        <title>index page</title>
        <link rel="stylesheet" href="<?php echo CSS_PATH;?>reset.css" />
        <link rel="stylesheet" href="<?php echo CSS_PATH;?>modal-signup.css" />
        <link rel="stylesheet" href="<?php echo CSS_PATH;?>modal-signin.css" />
        <link rel="stylesheet" href="<?php echo CSS_PATH;?>header.css" />
        <link rel="stylesheet" href="<?php echo CSS_PATH;?>index.css" />
    </head>
    <body>
        <header>
            <?php include INCLUDE_PATH.'header.php'; ?>
        </header>
        <main>
            <?php include INCLUDE_PATH.'modal-signup.php';  ?>
            <?php include INCLUDE_PATH.'modal-signin.php';  ?>
            <div class="contents">
                <div class="content">
                    <div class="content-image">
                        <a href="#">
                            <img src="<?php echo IMAGE_PATH;?>content-image.jpeg" />
                        </a>
                    </div>
                    <div class="info">
                        <p>ulee</p>
                        <p>2022-12-12</p>
                    </div>
                </div>
            </div>
        </main>
        <script src="<?php echo JS_PATH;?>user-profile.js"></script>
        <script>
            const resultMessage = '<?php echo $result_message; ?>';
            if (resultMessage) {
                alert(resultMessage);
            }
            
        </script>
    </body>
</html>