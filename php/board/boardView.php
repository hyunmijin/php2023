<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    // include "../connect/sessionCheck.php";
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시판</title>

    <?php include "../include/head.php" ?>
</head>
<body class="gray">

    <?php include "../include/skip.php" ?>
    <!-- //skip -->

    <?php include "../include/header.php" ?>
    <!-- //header -->

    <main id="main" class="container">
        <div class="intro__inner center">
                <picture class="intro__images small">
                    <source srcset="../html/assets/img/board.png, ../assets/img/join01@2x.png 2x, ../assets/img/join01@3x.png 3x"/>
                    <img src="../html/assets/img/board.png" alt="소개이미지">
                </picture>
                <h2>게시글 보기</h2>
                <p class="intro__text">
                    웹디자이너, 웹퍼블리셔, 프론트앤드 개발자를 위한 게시판입니다.<br>
                        관련된 문의사항은 여기서 확인하세요!
                </p>
        </div>
        <!-- //intro__inner -->
        
        <div class="board__inner">
            <div class="bord__view">
                <table>
                    <colgroup>
                    <col style="width: 20%;">
                    <col style="width: 80%;">
                    </colgroup>
                    <tbody>
                        <!-- <tr>
                            <th>제목</th>
                            <td>게시판 제목입니다.</td>
                        </tr>
                        <tr>
                            <th>등록자</th>
                            <td>히얼미</td>
                        </tr>
                        <tr>
                            <th>등록일</th>
                            <td>2023.03.03</td>
                        </tr>
                        <tr>
                            <th>조회수</th>
                            <td>93</td>
                        </tr>
                        <tr>
                            <th>내용</th>
                            <td></td>
                        </tr> -->
<?php
    if(isset($_GET['boardID'])) {
        $boardID = $_GET['boardID'];
        //보드뷰
        $sql = "UPDATE board SET boardView = boardView + 1 WHERE boardID = {$boardID}";
        $connect -> query($sql);
        // echo $boardID;
        $sql = "SELECT b.boardContents, b.boardTitle, m.youName, b.regTime, b.boardView FROM board b JOIN members m ON(m.memberID = b.memberID) WHERE b.boardID = {$boardID}";
        $result = $connect -> query($sql);
        if($result){
            $info = $result -> fetch_array(MYSQLI_ASSOC);
            echo "<tr><th>제목</th><td>".$info['boardTitle']."</td></tr>";
            echo "<tr><th>등록자</th><td>".$info['youName']."</td></tr>";
            echo "<tr><th>등록일</th><td>".date('Y-m-d', $info['regTime'])."</td></tr>";
            echo "<tr><th>조회수</th><td>".$info['boardView']."</td></tr>";
            echo "<tr><th>내용</th><td>".$info['boardContents']."</td></tr>";
        } else {
            echo "<tr><td colspan='4'>게시글이 없습니다.</td></tr>";
        }
    }
    // // boardID 값이 존재하는지 확인
    // if(isset($_GET['boardID'])) {

    //     //보드 뷰 +1
    //     $sql = "UPDATE borad SET boardView = boardView + 1 WHERE boardID = {$boardID}";
    //     $connect -> query($sql);

    //     // boardID 값이 정수형으로 변환 가능한지 확인
    //     $boardID = intval($_GET['boardID']);
        
    //     // 정수형으로 변환된 boardID 값이 0 이상인지 확인
    //     if($boardID > 0) {
    //         // 올바른 boardID 값인 경우에만 SQL 쿼리 실행
    //         $sql = "SELECT b.boardContents, b.boardTitle, m.youName, b.regTime, b.boardView FROM board b JOIN members m ON(m.memberID = b.memberID) WHERE b.boardID = {$boardID}";
    //         $result = $connect->query($sql);

    //         if($result) {
    //             $info = $result->fetch_array(MYSQLI_ASSOC);

    //             echo "<tr><th>제목</th><td>".$info['boardTitle']."</td></tr>";
    //             echo "<tr><th>등록자</th><td>".$info['youName']."</td></tr>";
    //             echo "<tr><th>등록일</th><td>".date('Y-m-d', $info['regTime'])."</td></tr>";
    //             echo "<tr><th>조회수</th><td>".$info['boardView']."</td></tr>";
    //             echo "<tr><th>내용</th><td>".$info['boardContents']."</td></tr>";
    //         } else {
    //             echo "<tr><td colspan='4'>게시글이 없습니다.</td></tr>";
    //         }
    //     } else {
    //         echo "<tr><td colspan='4'>잘못된 게시글 ID입니다.</td></tr>";
    //     }
    // } else {
    //     echo "<tr><td colspan='4'>게시글 ID가 전달되지 않았습니다.</td></tr>";
    // }
?>
                    </tbody>
                </table>
            </div>
            <div class="board__btn mb100">
                <a href="boardModify.php?boardID=<?=$_GET['boardID']?>" class="btnStyle3">수정하기</a>
                <!-- <a href="boardRemove.php?boardID=<?=$_GET['boardID']?>" class="btnStyle3" onclick="confirm('정말 삭제할거니?', '')">삭제하기</a> -->
                <a href="boardRemove.php?boardID=<?=($_GET['boardID'])?>" class="btnStyle3" onclick="return confirm('정말 삭제할거니?')">삭제하기</a>
                <a href="board.php" class="btnStyle3">목록보기</a>
            </div>
        </div> 
    </main>
    <!-- //main -->
    
    <?php include "../include/footer.php" ?>
    <!-- //footer -->
</body>
</html>