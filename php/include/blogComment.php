<div class="cate">
    <h4>최신 댓글</h4>
    <ul>
        <?php
            $blogcomment = "SELECT * FROM blogComment WHERE commentDelete = 0 ORDER BY blogID DESC LIMIT 4";
            $blogcommentResult = $connect -> query($blogcomment);



            // echo "<pre>";
            // var_dump($blogNewResult);
            // echo "</pre>";

            foreach($blogcommentResult as $blogcomment){ ?>
                <li>
                    <a href="blogView.php?blogID=<?=$blogcomment['blogID']?>">
                        <span><?=$blogcomment['commentMsg']?></span>
                    </a>
                </li>
            <?php }
        ?>
    </ul>
</div>