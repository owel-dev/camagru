<?php include '../config.php';?>

<!DOCTYPE html>
<html>
    <head>
        <title>index page</title>
        <link rel="stylesheet" href="<?php echo CSS_PATH;?>reset.css" />
        <link rel="stylesheet" href="<?php echo CSS_PATH;?>modal-signup.css" />
        <link rel="stylesheet" href="<?php echo CSS_PATH;?>header.css" />
        <link rel="stylesheet" href="<?php echo CSS_PATH;?>index.css" />
    </head>
    <body>
        <header>
            <?php include COMPONENT_PATH . 'header.php'; ?>
        </header>
        <main>
            <?php include COMPONENT_PATH . 'modal-signup.php';  ?>
            <div class="contents">
                <div class="content">
                    <div class="content-image">
                        <a href="#">
                            <img src="<?php echo IMAGE_PATH;?>content-image.webp" />
                        </a>
                    </div>
                    <div class="info">
                        <p>ulee</p>
                        <p>2022-12-12</p>
                    </div>
                </div>
            </div>
        </main>
        <script src="<?php echo JS_PATH;?>modal-signup.js"></script>
    </body>
</html>
