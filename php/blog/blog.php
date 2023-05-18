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
    <title>블로그</title>

    <?php include "../include/head.php" ?>
</head>
<body class="gray">

    <?php include "../include/skip.php" ?>
    <!-- //skip -->

    <?php include "../include/header.php" ?>
    <!-- //header -->
    
    <main id="main" class="container">
        <div class="bolg__search">
            <h2>개발자 블로그 입니다.</h2>
            <p>개발자 관련된 글입니다.</p>
            <div class="search">
                <form action="" name="#" method="POST">
                    <legend class="blind">블로그 검색</legend>
                    <input type="search" class="inputStyle2" name="searchKeyword" aria-label="검색" placeholder="검색어를 입력하세요!">
                    <button type="submit" class="btnStyle4 ml20">검색하기</button>
                    <?php if(isset($_SESSION['memberID'])){ ?>
                        <div class="mt20"><a href="blogWrite.php" class="btnStyle4 white">글쓰기</a></div>
                    <?php } ?>
                </form>
            </div>
        </div>
        <div class="bolg__inner btStyle">
            <div class="left">
                <div class="blog__wrap">
                    <h2>All Posts</h2>
                    <div class="cards__inner col3 line3">
                        <!-- <div class="card">
                            <figure class="card__img">
                                <source
                                srcset=".../html/assets/img/Frame 12.jpg, ../html/assets/img/Frame 12.jpg 2x, ../html/assets/img/Frame 12.jpg 3x" />
                            <img src="../html/assets/img/Frame 12.jpg" alt="소개이미지">
                            </figure>
                            <div class="card__title"> 
                                <h3>지속적인 학습과 개발</h3>
                                <p>IT 산업은 빠르게 변화하고 발전하고 있습니다. 새로운 기술과 도구들이 출시되는 속도는 더더욱 빨라지고 있기 때문에, 개발자로서 적극적인 학습과 개발이 필수적입니다. </p>
                            </div>
                            <div class="card__info">
                                <span class="author">jin</span>
                                <span class="date">2023.04.03</span>
                            </div>
                        </div> -->
<?php
    $sql = "SELECT * FROM blog WHERE blogDElete = 0 ORDER BY blogID DESC";
    $result = $connect -> query($sql);
?>
    <?php foreach($result as $blog){ ?>
        <div class="card">
            <figure class="card__img">
                <a href="blogView.php?blogID=<?=$blog['blogID']?>">
                    <img src="../assets/blog/<?=$blog['blogImgFile']?>" alt="<?=$blog['blogTitle']?>">
                </a>
            </figure>
            <div class="card__title"> 
                <h3><?=$blog['blogTitle']?></h3>
                <p><?=$blog['blogContents']?></p>
            </div>
            <div class="card__info">
                <span class="author"><?=$blog['blogAuthor']?></span>
                <span class="date"><?=date('Y-m-d', $blog['blogRegTime'])?></span>
            </div>
        </div>
    <?php } ?>

                    </div>
                </div>
            </div>
            <div class="right">
                <div class="blog__aside">
                    <div class="intro">
                        <picture class="img">
                            <source
                                srcset="../html/assets/img/join1.jpg, ../html/assets/img/join1.jpg 2x, ../html/assets/img/join1.jpg 3x" />
                            <img src="../html/assets/img/join1.jpg" alt="소개이미지">
                        </picture>
                        <p class="text">개발자로서 성장하기 위한 팁들을 공유하고 있습니다.
                        </p>
                    </div>
                    <div class="cate">
                        <h4>카테고리</h4>
                    </div>
                    <div class="cate">
                        <h4>최신 글</h4>
                    </div>
                    <div class="cate">
                        <h4>인기글</h4>
                    </div>
                    <div class="cate">
                        <h4>최신 댓글</h4>
                    </div>
                </div>
            </div>
        </div>

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
    <!-- //main -->
    
    <?php include "../include/footer.php" ?>
    <!-- //footer -->
</body>
</html>