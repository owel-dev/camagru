<?php require_once $_SERVER['DOCUMENT_ROOT'].'/config.php';?>

<form action="">
    <img src="<?php echo IMAGE_PATH;?>content-image.jpeg">

    <label>제목</label>
    <input type="text">

    <label>내용</label>
    <input type="text">
    <div class="button-wrapper">
        <button class="upload-button" type="submit">업로드</button>
        <button class="cancel-button">취소</button>
    </div>
</form>