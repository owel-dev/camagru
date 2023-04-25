<?php include '/config.php';?>

<div class="signup-modal">
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <label>Name</label>
        <input type="text" name="name" required pattern="<?php echo NAME_VALIDATION;?>" 
            title="이름은 5자 이상 20자 이하, 영대소문자 혹은 숫자만 가능합니다">

        <label>Email</label>
        <input type="text" name="email" required pattern="<?php echo EMAIL_VALIDATION;?>" 
            title="올바른 이메일 형식을 입력해주세요">

        <label>Password</label>
        <input type="password" name="password" required pattern="<?php echo PASSWORD_VALIDATION;?>" 
            title="대문자, 소문자, 숫자가 각 1글자 이상 포함되어야 하며, 8글자 이상 20글자 이하여야 합니다.">

        <button type="submit">제출</button>
    </form>
</div>