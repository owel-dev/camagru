<?php include '../config.php';?>

<!DOCTYPE html>
<html>
    <head>
        <title>photo-editor</title>
        <link rel="stylesheet" href="<?php echo CSS_PATH;?>reset.css" />
        <link rel="stylesheet" href="<?php echo CSS_PATH;?>modal-signup.css" />
        <link rel="stylesheet" href="<?php echo CSS_PATH;?>modal-photo-upload.css" />
        <link rel="stylesheet" href="<?php echo CSS_PATH;?>header.css" />
        <link rel="stylesheet" href="<?php echo CSS_PATH;?>photo-editor.css" />
    </head>
    <body>
        <header>
        <?php include INCLUDE_PATH . 'header.php'; ?>
        </header>
        <main>
            <?php include INCLUDE_PATH . 'modal-signup.php';  ?>
            <?php include INCLUDE_PATH . 'modal-photo-upload.php';  ?>
            <div class="contents">
                <div class="main-section">
                    <div class="album">
                        <div class="album-image">
                            <button class="photo-upload-button">업로드</button>
                        </div>
                    </div>
                    <div class="webcam-section">
                        <div class="webcam"></div>
                        <div class="buttons">
                            <button>웹캠 켜기</button>
                            <button>촬영</button>
                            <button>이미지 추가</button>
                        </div>
                    </div>
                </div>
                <div class="stickers"></div>
            </div>
        </main>
        <script src="<?php echo JS_PATH;?>modal-signup.js"></script>
        <script src="<?php echo JS_PATH;?>modal-photo-upload.js"></script>
    </body>
</html>
