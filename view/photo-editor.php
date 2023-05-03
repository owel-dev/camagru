<?php require_once $_SERVER['DOCUMENT_ROOT'].'/config.php';?>

<!DOCTYPE html>
<html>
    <head>
        <title>photo-editor</title>
        <link rel="stylesheet" href="<?php echo CSS_PATH;?>reset.css" />
        <link rel="stylesheet" href="<?php echo CSS_PATH;?>header.css" />
        <link rel="stylesheet" href="<?php echo CSS_PATH;?>modal.css" />
        <link rel="stylesheet" href="<?php echo CSS_PATH;?>photo-editor.css" />
    </head>
    <body>
        <header>
        <?php include INCLUDE_PATH . 'header.php'; ?>
        </header>
        <main>
            <div class="modal" style="display: none;">
                <div class="modal-div"></div>
            </div>
            <div class="contents">
                <div class="main-section">
                    <div class="album">
                        <div class="album-image">
                            <button id="modal-photo-upload" class="photo-upload-button" onclick="handleModal(event)">업로드</button>
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
        <script src="<?php echo JS_PATH;?>modal.js"></script>
    </body>
</html>
