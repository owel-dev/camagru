<div class="logo">
    <a href="#" class="logo-image"></a>
</div>
<div class="camera">
    <a href="#" class="camera-logo"></a>
</div>
<div class="user-profile">
    <?php 
        $user = $_COOKIE["user-name"];
        if ($user)
            echo "<div>".$user.'님 환영합니다!'."</div>";
    ?>    
    <a href="#" class="user-profile-icon"></a>
    <div class="auth-options">
    <?php 
        $user = $_COOKIE["user-name"];
        if ($user) {
            echo '<div class="auth-options-profile">'."프로필".'</div>';
            echo '<div class="button-logout" onclick="logout()">'."로그아웃".'</div>';
        } else {
            echo '<div class="auth-options-signup">'."회원가입".'</div>';
            echo '<div class="auth-options-signin">'."로그인".'</div>';
        }
    ?>   
    </div> 
</div>
