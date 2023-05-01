<?php require_once $_SERVER['DOCUMENT_ROOT'].'/config.php';?>

<div class="logo">
    <a href="#" class="logo-image"></a>
</div>
<div class="camera">
    <a href="#" class="camera-logo"></a>
</div> 
<div class="user-profile">
    <div class="welcome-message"></div>
    <a href="#" class="user-profile-icon"></a>
    <div class="auth-options" style="display: none">
        <div class="logged-in" style="display: none">
            <div class="auth-options-profile">프로필</div>
            <div class="auth-options-logout">로그아웃</div>
        </div>
        <div class="logged-out" style="display: none">
            <div class="auth-options-signup">회원가입</div>
            <div class="auth-options-signin">로그인</div>
        </div>
    </div> 
</div>

<script type="module" src="<?php echo JS_PATH;?>header.js"></script>
