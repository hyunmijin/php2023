<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    $sql = "SELECT count(boardID) FROM board";
    $result = $connect -> query($sql);

    $boardTotalCount = $result -> fetch_array(MYSQLI_ASSOC);
    $boardTotalCount = $boardTotalCount['count(boardID)'];
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입 페이지</title>
    <style>
        .list__inner {
            width: calc(100% - 35vw);
            margin: 80px auto 0px auto;
            /* background-color: #fff; */
        }
        .list__inner > h2 {
            margin-bottom: 40px;
            font-size: 30px;
            font-weight: 700;
            text-align: center;
            color: #F06171;
        }
        .section__img {
            min-width: 1000px;
            margin-bottom: 80px;
        }
        .list {
            width: 100%;
            /* padding-bottom: 100px; */
            margin: 0 auto 0 auto;
            /* background-color: #fff; */
            display: flex;
            flex-wrap: wrap;
            box-sizing: border-box;
            
        }
        .list__img .img__box{
            /* border-radius: 15px;
            padding: 10px */
            cursor: pointer;
            background-size: cover;
            width: 100;        
        }
        .list__text {
            height: 170px;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
        }
        .list__name {
            display: flex;
            justify-content: space-between;
            align-items: end;
            margin-bottom: 35px;
            border-bottom: 1px solid #CCCCCC;
        }
        .list__name b {
            padding-left: 30px;
            position: relative;
            
        }
        .list__name b::before {
            position: absolute;
            content: '';
            background-image: url(../html/assets/img/shareboard-profile.png);
            background-position: 45% 25%;
            background-size: 150%;
            width: 25px;
            height: 25px;
            background-color: #999;
            top: -3px;
            left: 0px;
            border-radius: 50%;
        }
        .list__name small {

        }
        .list__text .title {
            width: 100%;
            font-size: 1.25em;
            font-weight: 700;
            margin-bottom: 20px;
            height: 30px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .list__text .content {
            font-weight: 300;
            font-size: 0.88em;
            height: 20px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .list__each {
            display: inline-block;
            width: 15vw;
            min-width: 251px;
            height: 400px;
            margin: 0px 0.5vw 250px 0.4vw;
            background-color: rgba(247, 151, 162, 0.07);
            /* border: 1px solid #F797A2; */
        }
        .list__img1 {background: url(../html/assets/img/community10.png) 30%; width: 100%; height: 100%;}
        .list__img2 {background: url(../html/assets/img/community11.png) 50%; width: 100%; height: 100%;}
        .list__img3 {background: url(../html/assets/img/community12.png) 40%; width: 100%; height: 100%;}
        .list__img4 {background: url(../html/assets/img/community13.png) 70%; width: 100%; height: 100%;}
        .list__img5 {background: url(../html/assets/img/community14.png) 30%; width: 100%; height: 100%;}
        .list__img6 {background: url(../html/assets/img/community15.png) 30%; width: 100%; height: 100%;}
        .list__img7 {background: url(../html/assets/img/community16.png) 30%; width: 100%; height: 100%;}
        .list__img8 {background: url(../html/assets/img/community17.png) 60%; width: 100%; height: 100%;}
        .list__img9 {background: url(../html/assets/img/community18.png) 40%; width: 100%; height: 100%;}
        .list__img10 {background: url(../html/assets/img/community19.png) 70%; width: 100%; height: 100%;}
        .list__img11 {background: url(../html/assets/img/community20.png) 80%; width: 100%; height: 100%;}
       
        .list:nth-last-child(1) {
            /* margin-bottom: 100px; */
        }
        
    </style>
    <!-- CSS -->
    <link rel="stylesheet" href="../html/assets/css/style.css">
    <!-- SCRIPT -->
    <script defer src="../html/assets/js/common.js"></script>
</head>
<body>
    <div id="board__header" class="mt100">
            <div><a href="trendsBoard.php">뷰티트렌드</a></div> <!-- news-->
            <div class="active"><a href="shareBoard.php">공유게시판</a></div> <!-- share-->
            <div><a href="../notice/boardNotice.php">공지사항</a></div> <!-- notice-->
            <div><a href="FAQ.php">FAQ</a></div> <!-- faq-->
        </div>
        <!-- board__header -->

        <div class="list__inner">
        <div class="section__img">
            <img src="../html/assets/img/boardimg_02.png" alt="">
        </div>
        <h2>공유 게시판</h2>
        <div class="list">
            <!-- list__each -->
            <div class="list__each">
                <a href="../shareBoard/ShareboardView.php"><div class="list__img1"></div></a> 
                <div class="list__text">
                    <div class="list__name">
                        <b>해린남편</b><small>5/11</small>
                    </div>
                    <!-- <h3 class="title">피부를 지키려면 학원 퇴근!</h3>
                    <p class="content">퇴근 시켜주세요. 집에서 공부 할게요...</p> -->
<?php
                        if(isset($_GET['page'])){
                            $page = (int) $_GET['page'];
                        } else {
                            $page = 1;
                        }
                    
                        $viewNum = 10;
                        $viewLimit = ($viewNum * $page) - $viewNum; 
                    
                        //   1~20 DESC LIMIT 0, 20 -> page1 (viewNum * 1) - viewNum
                        // 21~40 DESC LIMIT 20, 20 -> page2 (viewNum * 2) - viewNum
                        // 40~60 DESC LIMIT 40, 20 -> page3 (viewNum * 3) - viewNum
                        // 60~80 DESC LIMIT 60, 20 -> page4 (viewNum * 4) - viewNum
                    
                        $sql = "SELECT boardID, boardTitle, regTime FROM board ORDER BY boardID DESC LIMIT {$viewLimit}, {$viewNum}";
                        $result = $connect -> query($sql);

                        // $sql = "SELECT b.boardContents, b.boardTitle, m.youName, b.regTime, b.boardView FROM board b JOIN members2 m ON(m.memberID = b.memberID) WHERE b.boardID = {$boardID}";
                        // $result = $connect -> query($sql);
                    
                        
                        if($result){
                            $count = $result -> num_rows;
                    
                            if($count > 0){
                                for($i=0; $i<$count; $i++){
                                    $info = $result -> fetch_array(MYSQLI_ASSOC);
                    
                                    echo "<div class='list__each'><div class='list__img'></div><div class='list__text'><h3 class='title'>".$info['boardTitle']."</h3></div>";
                                    // echo " <p class='content'>".$info['boardTitle']."</p>";
                                    // echo "<h3 class='title'>피부를 지키려면 학원 퇴근!</h3>";
                                    // echo "<td>".$info['boardID']."</td>";
                                    // echo "<td><a href='boardView.php?boardID={$info['boardID']}'>".$info['boardTitle']."</td>";
                                    // echo "<td>".date('Y-m-d', $info['regTime'])."</td>";
                                    // echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='4'>게시글이 없습니다.</td></tr>";
                            }
                        }
?>
                </div>
            </div>
            <!-- //list__each -->
            
            <!-- list__each -->
            <div class="list__each">
                <div class="list__img2">
                </div>
                <div class="list__text">
                    <div class="list__name">
                        <b>해린남편</b><small>5/11</small>
                    </div>
                    <h3 class="title">피부를 지키려면 학원 퇴근...</h3>
                    <p class="content">퇴근 시켜주세요. 집에서 공부 할게요...</p>
                </div>
            </div>
            <!-- //list__each -->

            <!-- list__each -->
            <div class="list__each cleansing">
                <div class="list__img3">
                </div>
                <div class="list__text">
                    <div class="list__name">
                        <b>해린남편</b><small>5/11</small>
                    </div>
                    <h3 class="title">피부를 지키려면 학원 퇴근...</h3>
                    <p class="content">퇴근 시켜주세요. 집에서 공부 할게요...</p>
                </div>
            </div>
            <!-- //list__each -->

            <!-- list__each -->
            <div class="list__each">
                <div class="list__img4">
                </div>
                <div class="list__text">
                    <div class="list__name">
                        <b>해린남편</b><small>5/11</small>
                    </div>
                    <h3 class="title">피부를 지키려면 학원 퇴근...</h3>
                    <p class="content">퇴근 시켜주세요. 집에서 공부 할게요...</p>
                </div>
            </div>
            <!-- //list__each -->

            <!-- list__each -->
            <div class="list__each">
                <div class="list__img5">
                </div>
                <div class="list__text">
                    <div class="list__name">
                        <b>해린남편</b><small>5/11</small>
                    </div>
                    <h3 class="title">피부를 지키려면 학원 퇴근...</h3>
                    <p class="content">퇴근 시켜주세요. 집에서 공부 할게요...</p>
                </div>
            </div>
            <!-- //list__each -->

            <!-- list__each -->
            <div class="list__each">
                <div class="list__img6">
                </div>
                <div class="list__text">
                    <div class="list__name">
                        <b>해린남편</b><small>5/11</small>
                    </div>
                    <h3 class="title">피부를 지키려면 학원 퇴근...</h3>
                    <p class="content">퇴근 시켜주세요. 집에서 공부 할게요...</p>
                </div>
            </div>
            <!-- //list__each -->

            <!-- list__each -->
            <div class="list__each">
                <div class="list__img7">
                </div>
                <div class="list__text">
                    <div class="list__name">
                        <b>해린남편</b><small>5/11</small>
                    </div>
                    <h3 class="title">피부를 지키려면 학원 퇴근...</h3>
                    <p class="content">퇴근 시켜주세요. 집에서 공부 할게요...</p>
                </div>
            </div>
            <!-- //list__each -->

            <!-- list__each -->
            <div class="list__each">
                <div class="list__img8">
                </div>
                <div class="list__text">
                    <div class="list__name">
                        <b>해린남편</b><small>5/11</small>
                    </div>
                    <h3 class="title">피부를 지키려면 학원 퇴근...</h3>
                    <p class="content">퇴근 시켜주세요. 집에서 공부 할게요...</p>
                </div>
            </div>
            <!-- //list__each -->
            
            <!-- list__each -->
            <div class="list__each">
                <div class="list__img9">
                </div>
                <div class="list__text">
                    <div class="list__name">
                        <b>해린남편</b><small>5/11</small>
                    </div>
                    <h3 class="title">피부를 지키려면 학원 퇴근...</h3>
                    <p class="content">퇴근 시켜주세요. 집에서 공부 할게요...</p>
                </div>
            </div>
            <!-- //list__each -->

            <!-- list__each -->
            <div class="list__each">
                <div class="list__img10">
                </div>
                <div class="list__text">
                    <div class="list__name">
                        <b>해린남편</b><small>5/11</small>
                    </div>
                    <h3 class="title">피부를 지키려면 학원 퇴근...</h3>
                    <p class="content">퇴근 시켜주세요. 집에서 공부 할게요...</p>
                </div>
            </div>
            <!-- //list__each -->

            <!-- list__each -->
            <div class="list__each">
                <div class="list__img11">
                </div>
                <div class="list__text">
                    <div class="list__name">
                        <b>해린남편</b><small>5/11</small>
                    </div>
                    <h3 class="title">피부를 지키려면 학원 퇴근...</h3>
                    <p class="content">퇴근 시켜주세요. 집에서 공부 할게요...</p>
                </div>
            </div>
            <!-- //list__each -->


        </div>
    </div>
    <div class="notice__pages mb100">
        <ul>
            
            <li><a href="#"><</a></li>
            <li class="active"> <a  href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#">></a></li>
        
        </ul>
    </div>

    <!-- //skip -->
    <main id="main" class=" mt80">
        <?php include "../include/abbHeader.php" ?>


    </main>

<?php include "../include/footer.php" ?>
    
</body>
</html> 