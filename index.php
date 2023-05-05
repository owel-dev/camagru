<?php require_once $_SERVER['DOCUMENT_ROOT'].'/config.php';?>
<?php 
    $message = '';
    if (isset($_GET['message']))
        $message = $_GET['message'];
?>

<!DOCTYPE html>
<html>
    <head>
        <title>index page</title>
        <link rel="stylesheet" href="<?php echo CSS_PATH;?>reset.css" />
        <link rel="stylesheet" href="<?php echo CSS_PATH;?>modal.css" />
        <link rel="stylesheet" href="<?php echo CSS_PATH;?>header.css" />
        <link rel="stylesheet" href="<?php echo CSS_PATH;?>index.css" />
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
        <script src="<?php echo JS_PATH;?>modal.js"></script>
        <script src="<?php echo JS_PATH;?>header.js"></script>
        <script>
            var resultMessage = '<?php echo $message; ?>';
            if (resultMessage) {
                alert(resultMessage);
                
                const url = new URL(window.location.href);
                url.searchParams.delete('message');
                window.history.replaceState(null, '', url);
            }
        </script>
    </body>
</html>