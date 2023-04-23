<?php include '/config.php';?>

<div class="signup-modal">
    <form action="<?php echo PHP_FEAT_PATH;?>signup.php" method="post">
        <label>Name</label>
        <input type="text" name="name">

        <label>Email</label>
        <input type="text" name="email">

        <label>Password</label>
        <input type="password" name="password">

        <button type="submit">제출</button>
    </form>
</div>