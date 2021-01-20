<?php
    session_start();
    if (isset($_SESSION["id"])) $id = $_SESSION["id"];
    else $id = "";
    if (isset($_SESSION["nickname"])) $nickname = $_SESSION["nickname"];
    else $nickname = "";
?>

<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="index.php">
        <img src="../IC.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
        Quick Set Up
    </a>
    <?php
        if(!$id){
    ?>            
        <form class="form-inline">
            <a href="signin_form.php" class="btn btn-primary btn-lg active" aria-current="page">로그인</a>
            <a href="signup_form.php" class="btn btn-light btn-lg active" aria-current="page">회원가입</a>
        </form>
    <?php
        } else {
            $logged = $nickname."(".$id.")님 반갑습니다!"
    ?>
        <form class="form-inline">
            <h4><?=$logged?></h4>
            <a href="signout.php" class="btn btn-light btn-lg active" aria-current="page">로그아웃</a>
            <a href="member_modify_form.php" class="btn btn-light btn-lg active" aria-current="page">정보 수정</a>
        </form>
    <?php
        }
    ?>
</nav>