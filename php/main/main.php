<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    echo "<pre>";
    var_dump($_SESSION);
    echo "</pre>"
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP 블로그 만들기..</title>

    <?php include "../include/head.php" ?>
</head>
<body class="gray">

    <?php include "../include/skip.php" ?>
    <!-- //skip -->

    <?php include "../include/header.php" ?>
    <!-- //header -->

    <main id="main" class="container">
        <div class="intro__inner bmStyle">
            <picture class="intro__images">
                <source srcset="../assets/img/intro01.png, ../assets/img/intro01@2x.png 2x, ../assets/img/intro01@3x.png 3x"/>
                <img src="../assets/img/intro01.png" alt="소개이미지">
            </picture>
            <p class="intro__text">
                개발하면서 겪은 문제들과 해결 방법, 새로운 기술과 도구들,
                그리고 개발자로서 성장하기 위한 팁들을 공유하고 있습니다.
                제 블로그를 통해 많은 개발자들이 함께 성장할 수 있는 지식과
                정보를 공유하고자 노력하고 있습니다.
            </p>
        </div>
    </main>
    <!-- //main -->

    <?php include "../include/footer.php" ?>
    <!-- //footer -->
</body>
</html>