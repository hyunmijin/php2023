<?php
    $sql = "SELECT * FROM blog WHERE blogDelete = 0 ORDER BY blogID DESC LIMIT 4";
    $result2 = $connect -> query($sql);
?>
<div class="cards__inner col4 line0">
    <?php foreach($result2 as $blog2){ ?>
        <div class="card">
            <figure class="card__img">
            <a href="blogView.php?blogID=<?=$blog2['blogID']?>"><img src="../assets/blog/<?=$blog2['blogImgFile']?>" alt="<?=$blog2['blogTitle']?>"></a>
            </figure>
            <div class="card__title">
                <h3><?=$blog2['blogTitle']?></h3>
                <p><?=$blog2['blogContents']?></p>
            </div>
            <div class="card__info">
                <span class="author"><?=$blog2['blogAuthor']?></span>
                <span class="three-line"><?=date('Y-m-d', $blog2['blogRegTime'])?></span>
            </div>
        </div>
    <?php } ?>