<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/config.php';

require_once INCLUDE_PATH.'pre-auth.php';;
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
            <?php require_once INCLUDE_PATH.'header.php'; ?>
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
