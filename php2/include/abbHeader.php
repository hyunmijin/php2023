<header id="header">
    <div class="header__inner">
        <div class="kategorie">
            <div class="kategorie__menu">
                <img src="../html/assets/img/kategorie.png" alt="">
            </div>
            <ul>
                <li><a href="#">기초</a></li>
                <li><a href="#">마스크팩</a></li>
                <li><a href="#">선케어</a></li>
                <li><a href="#">클렌징</a></li>
                <li><a href="#">메이크업</a></li>
                <li><a href="#">헤어</a></li>
                <li><a href="#">바디</a></li>
                <li><a href="../shareBoard/shareBoard.php">커뮤니티</a></li>
            </ul>
        </div>
        <div class="logo">
            <h1>
                <a href="#"></a>
            </h1>
        </div>
        <div class="user">
            <a href="#">
                <img src="../html/assets/img/user.png" alt="">
            </a>
            <ul>
            <?php
                if (isset($_SESSION['memberID'])) {
            ?>
                <li><a href="../myinfo/myInfoModifyinfo.php">마이페이지</a></li>
                <li><a href="../login/logout.php">로그아웃</a></li>
            <?php
            } else {
            ?>
                <li><a href="../myinfo/myInfoModifyinfo.php">마이페이지</a></li>
                <li><a href="../login/login.php">로그인</a></li>
            <?php
            }
            ?>
            </ul>
        </div>
    </div>
</header>
<!-- //header -->