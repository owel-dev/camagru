<?php require_once $_SERVER['DOCUMENT_ROOT'].'/config.php';?>

<!DOCTYPE html>
<html>
    <head>
        <title>photo-post</title>
        <link rel="stylesheet" href="<?php echo CSS_PATH;?>header.css" />
        <link rel="stylesheet" href="<?php echo CSS_PATH;?>board.css" />
        <link rel="stylesheet" href="<?php echo CSS_PATH;?>reset.css" />
        <link rel="stylesheet" href="<?php echo CSS_PATH;?>modal-signup.css" />
        <link rel="stylesheet" href="<?php echo CSS_PATH;?>header.css" />
        <link rel="stylesheet" href="<?php echo CSS_PATH;?>photo-post.css" />
    </head>
    <body>
        <header>
            <?php require_once INCLUDE_PATH . 'header.php'; ?>
            
        </header>
        <main>
            <?php require_once INCLUDE_PATH . 'modal-signup.php';  ?>
            <div class="contents">
                <div class="image"></div>
                <div class="description">
                    <div class="title">제목</div>
                    <div class="text">이 사진의 내용입니다.</div> 
                    <div class="created-time">2021-12-12</div>
                </div>
                <div class="comments">
                    <div class="comment">
                        <div class="user-name">
                            ulee
                        </div>
                        <div class="created-time">
                            2021-12-13
                        </div>
                        <div class="user-comment">
                            사진 멋지네요!
                        </div>    
                    </div>
                </div>
            </div>
        </main>
        <script src="<?php echo JS_PATH;?>modal-signup.js"></script>
    </body>
</html>
