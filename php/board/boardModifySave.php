<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    $boardID = $_POST['boardID'];
    $boardTitle = $_POST['boardTitle'];
    $boardContents = $_POST['boardContents'];
    $boardPass = $_POST['boardPass'];

    // echo $boardID, $boardTitle, $boardContents, $boardPass;

    $boardTitle = $connect -> real_escape_string($boardTitle); 
    $boardContents = $connect -> real_escape_string($boardContents);
    $boardPass = $connect -> real_escape_string($boardPass);
    $memberID = $_SESSION['memberID'];

    $sql = "SELECT * FROM members WHERE memberID = {$memberID}";
    $result = $connect -> query($sql);

    if($result){
        $info = $result -> fetch_array((MYSQLI_ASSOC));

        if($info['memberID'] == $memberID && $info['youPass'] == $boardPass){
            $sql = "UPDATE board SET boardTitle = '{$boardTitle}', boardContents = '{$boardContents}' WHERE boardID = '{$boardID}'";
            $connect -> query($sql);
        } else {
            echo "<script>alert('비밀번호가 틀렸습니다. 확인해주세요')</script>";
        }
    } else {
        echo "<script>alert('관리자 에러입니다. 문의주세요.')</script>";
    }

    // echo $memberID;

    // echo $boardID, $boardTitle, $boardContents;
?>

<script>
    location.href = "board.php";
</script>