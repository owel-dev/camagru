<?php
    session_start();
?>

<div class="logo">
    <a href="#" class="logo-image"></a>
</div>
<div class="camera">
    <a href="#" class="camera-logo"></a>
</div> 
<div class="user-profile">
    <?php if (isset($_SESSION['username'])): ?>
        <div class="welcome-message">
            <?php echo $_SESSION['username'].' 님 환영합니다!'; ?>
        </div>
    <?php endif; ?>
    <a href="#" class="user-profile-icon"></a>
    <div class="user-profile-toggle" style="display: none;"></div>
</div>