<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    // echo "<pre>";
    // var_dump($_SESSION);
    // echo "</pre>"
    //아이디 값이 없을 때 ??
    if(isset($_GET['blogID'])){
        $blogID = $_GET['blogID'];
    } else {
        Header("Location: blog.php");
    }

    // $blogID = $_GET ['blogID'];

    $blogSql = "SELECT * FROM blog WHERE blogID = '$blogID'";
    $blogResult = $connect -> query($blogSql);
    $blogInfo = $blogResult -> fetch_array(MYSQLI_ASSOC);

    // echo "<pre>";
    // var_dump($blogInfo);
    // echo "</pre>";
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>블로그</title>

    <?php include "../include/head.php" ?>
</head>
<body class="gray">

    <?php include "../include/skip.php" ?>
    <!-- //skip -->

    <?php include "../include/header.php" ?>
    <!-- //header -->
    
    <main id="main" class="container">
        <div class="bolg__title" style="background-image:url(../assets/blog/<?=$blogInfo['blogImgFile']?>)">
            <span class="cate"><?=$blogInfo['blogCategory']?></span>
            <h2 class="title"><?=$blogInfo['blogTitle']?></h2>
            <div class="info">
                <span class="author"><?=$blogInfo['blogAuthor']?></span>
                <span class="date"><?=date('Y-m-d', $blogInfo['blogRegTime'])?></span>
                <div class="modify">
                    <a href="#">수정</a>
                    <a href="#">삭제</a>
                </div>
            </div>
        </div>
        <!-- bolg__title -->
        <div class="bolg__inner">
            <div class="left mt145">
                <div class="blog__contents">
                    <h3><?=$blogInfo['blogTitle']?></h3>
                    <?=$blogInfo['blogContents']?>
                </div>
            </div>
            <div class="right">
                <div class="blog__aside">
                    <?php include "../include/blogTitle.php" ?>

                    <?php include "../include/blogCate.php" ?>

                    <?php include "../include/blogLatest.php" ?>

                    <?php include "../include/blogPopular.php" ?>

                    <?php include "../include/blogComment.php" ?>

                </div>
            </div>
        </div>
        <!-- bolg__inner -->

        <div class="blog__article">
            <h3>관련글</h3>
            <div class="blog__wrap">
                <?php include "../include/blogArticle.php" ?>
            </div>
            <div></div>
            <div></div>
            <div></div>
        </div>
        <!-- blog__article -->

        <div class="bolg__comment">
            <h3>댓글쓰기</h3>
            <div>

            </div>
        </div>
        <!-- bolg__comment -->

        <!-- 
            <div calss="innder__inner"></div> 각 페이지 소개 배너
            <div calss="join__inner"></div> 회원가입 페이지
            <div calss="login__inner"></div> 로그인 페이지
            <div calss="board__inner"></div> 게시판 페이지
            <div class="bolg__inner"></div> 블로그 메인


            <div class="sliders__inner"></div>
            <div class="banners__inner"></div>
            <div class="cards__inner"></div>
            <div class="images__inner"></div>
            <div class="ads__inner"></div>
            <div class="texts__inner"></div>
            <div class="login__inner"></div> 
            <div class="join__inner"></div>
        -->
    </main>
    
    <?php include "../include/footer.php" ?>
    <!-- //footer -->
</body>
</html>