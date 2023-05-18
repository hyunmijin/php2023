<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    if(isset($_GET['blogID'])){
        $blogID = $_GET['blogID'];
    } else {
        Header("Location: shareBoard.php");
    }

    $blogSql = "SELECT * FROM blog WHERE blogID = '$blogID'";
    $blogResult = $connect -> query($blogSql);
    $blogInfo = $blogResult -> fetch_array(MYSQLI_ASSOC);

    $sql = "UPDATE blog SET blogView = blogView + 1 WHERE blogID = {$blogID}";
    $connect -> query($sql);
?>

<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>공유 게시글 보기</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../html/assets/css/style.css">
    <!-- SCRIPT -->
    <script defer src="../html/assets/js/common.js"></script>

    <style>
        #board__header {
            width: 100%;
            display: flex;
            width: 100%;
            max-width: 480px;
            margin: 0 auto;
            justify-content: space-between;
            font-size: 25px;
        }

        #board__header .active a {
            padding: 5px 30px;
            background-color: #F06171;
            color: #fff;
            border-radius: 10px;
            /* padding:  0px 40px; */

        }

        .notice__inner {
            margin: 0 auto;
            width: 1270px;
        }

        .notice__title h1 {
            font-size: 30px;
            text-align: center;
        }

        .intro__inner h2 {
            font-size: 30px;
            text-align: center;
            margin-bottom: 50px;
        }

        .board__title {
            margin-bottom: 30px;
        }

        /* .btn__inner {
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .btn__inner img {
            display: block;
            padding-top: 6px;
            width: 50px;
            height: 50px;
        } */
    </style>
</head>

<body class="white">
    <div id="skip">
        <a href="#header">헤더 영역 바로가기</a>
        <a href="#main">컨텐츠 영역 바로가기</a>
        <a href="#footer">푸터 영역 바로가기</a>
    </div>
    <!-- //skip -->


    <main id="main" class=" mt80">
        <?php include "../include/abbHeader.php" ?>

    <!-- //header -->
    <div id="board__header" class="mt100">
            <div><a href="trendsBoard.php">뷰티트렌드</a></div> <!-- news-->
            <div class="active"><a href="../shareBoard/shareBoard.php">공유게시판</a></div> <!-- share-->
            <div><a href="../notice/boardNotice.php">공지사항</a></div> <!-- notice-->
            <div><a href="FAQ.php">FAQ</a></div> <!-- faq-->
        </div>
    <!-- board__header -->

    
        <div class="notice__inner mt100">
            <div class="intro__inner center">
                <h2>공유 게시판</h2>
            </div>
            <!-- intro__text -->

            <div class="shareboard__inner">
                <div class="shareboard">
                    <div class="shareboard__view">
                        <div class="img">
                            <img src="/web2023-PHP/php/assets/blog/<?=$blogInfo['blogImgFile']?>">
                        </div>
                        <div class="text">
                            <div class="profile">
                                <div class="sec1">
                                    <img src="../html/assets/img/shareboard-profile.png" alt="프로필사진">
                                    <p><?= $blogInfo['blogAuthor']?></p>
                                </div>
                                <div class="sec2">
                                    <p><?=date('Y-m-d', $blogInfo['blogRegTime'])?></p>
                                </div>
                            </div>
                            <div class="title">
                                <h2><?=$blogInfo['blogTitle']?></h2>
                            </div>
                            <div class="desc">
                                <p><?=$blogInfo['blogContents']?></p>
                            </div>
                        </div>
                    </div>
                    <div class="view__num">
                        <div class="num">
                            <h3>조회수<span><?=$blogInfo['blogView']?></span></h3>
                            <h4>좋아요 💜 <span> 10명이 좋아합니다</span> </h4>
                        </div>
                        <div class="edit">
                            <a href="">수정  /</a>
                            <a href="">삭제</a>
                        </div>
                    </div>

    

                    <div class="shareboard_list">
                        <div class="list">
                            <a href="#">
                                <img src="../html/assets/img/shareboardview2.png" alt="이전게시물1">
                            </a>
                            <a href="#">
                                <img src="../html/assets/img/shareboardview3.png" alt="이전게시물2">
                            </a>
                            <a href="#">
                                <img src="../html/assets/img/shareboardview4.png" alt="이전게시물3">
                            </a>
                            <a href="#">
                                <img src="../html/assets/img/shareboardview5.png" alt="이전게시물4">
                            </a>
                            <a href="#">
                                <img src="../html/assets/img/shareboardview6.png" alt="이전게시물5">
                            </a>
                            <a href="#">
                                <img src="../html/assets/img/shareboardview7.png" alt="이전게시물6">
                            </a>
                        </div>
                        <div class="btn">
                            <a href="shareBoard.php" class="btnStyle6">목록보기</a>
                        </div>
                    </div>
                    <div class="shareboard_comment">
                        <h4>댓글</h4>
                        <div class="view abbStyle abbStyle2">
                            <img src="../html/assets/img/shareboard-profile2.png" alt="">
                            <div class="text">
                                <h6>닉네임</h6>
                                <p>저도 한번 써봐야겠네요 넘 좋아보여요~!</p>
                            </div>
                            <div class="edit">
                                <a href="">수정  /</a>
                                <a href="">삭제</a>
                            </div>
                        </div>
                        <div class="white">
                            <div class="text">
                                <form>
                                    <textarea name="boardcomment" id="boardcomment" rows="40"
                                        class="inputStyle3 board__contents" placeholder="댓글을 입력하세요"></textarea>
                                </form>
                            </div>
                            <div class="end">
                                <label>
                                    <input type="checkbox" name="agree">
                                    비밀글
                                </label>
                                <a href="board.html" class="btnStyle6">등록하기 </a>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </main>
    <!-- main -->

    <?php include "../include/footer.php" ?>

    <!-- //footer -->
</body>

</html>