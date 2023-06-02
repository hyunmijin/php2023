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
                <source srcset="../html/assets/img/intro04.png, ../html/assets/img/intro04@2x.png 2x, ../html/assets/img/intro04@3x.png 3x"/>
                <img src="../html/assets/img/intro04.png" alt="소개이미지">
            </picture>
            <p class="intro__text">
                개발하면서 겪은 문제들과 해결 방법, 새로운 기술과 도구들,
                그리고 개발자로서 성장하기 위한 팁들을 공유하고 있습니다.
                제 블로그를 통해 많은 개발자들이 함께 성장할 수 있는 지식과
                정보를 공유하고자 노력하고 있습니다.
            </p>
        </div>
<?php
    $sql = "SELECT * FROM blog WHERE blogDElete = 0 AND blogCategory = 'javascript' ORDER BY blogID DESC";
    $result = $connect -> query($sql);
?>
        <div class="blog__wrap bmStyle">
            <a href="../blog/blogCate.php?category=javascript"><h2>Javascript Topic</h2></a>
            <div class="cards__inner col line1">
                <?php foreach($result as $blog){ ?>
                <div class="card">
                    <figure class="card__img">
                        <a href="../blog/blogView.php?blogID=<?=$blog['blogID']?>">
                            <img src="../assets/blog/<?=$blog['blogImgFile']?>" alt="<?=$blog['blogTitle']?>">
                        </a>
                    </figure>
                    <div class="card__title"> 
                        <h3><?=$blog['blogTitle']?></h3>
                        <p><?=$blog['blogContents']?></p>
                    </div>
                    <div class="card__info">
                        <a href="#" class="more">더보기</a>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>

<?php
    $sql = "SELECT * FROM blog WHERE blogDElete = 0 AND blogCategory = 'jquery' ORDER BY blogID DESC";
    $result = $connect -> query($sql);
?>

        <div class="blog__wrap bmStyle">
            <a href="../blog/blogCate.php?category=jquery"><h2>jquery Topic</h2></a>
            <div class="cards__inner col2 line2">
            <?php foreach($result as $blog){ ?>
                <div class="card">
                    <figure class="card__img">
                        <a href="../blog/blogView.php?blogID=<?=$blog['blogID']?>">
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

<?php
    $sql = "SELECT * FROM blog WHERE blogDElete = 0 AND blogCategory = 'react' ORDER BY blogID DESC";
    $result = $connect -> query($sql);
?>
        <div class="blog__wrap bmStyle">
                <a href="../blog/blogCate.php?category=react"><h2>react Topic</h2></a>
                <div class="cards__inner col3 line3">
                    <div class="card">
                        <figure class="card__img">
                            <a href="../blog/blogView.php?blogID=<?=$blog['blogID']?>">
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
                    
                </div>
            </div>
    </main>

    <!-- //main -->

    <?php include "../include/footer.php" ?>
    <!-- //footer -->
</body>
</html>