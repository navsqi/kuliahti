<!DOCTYPE html>
<html>
<?php 
    define("BASEPATH", TRUE);
    include("include/head.php"); 
    include("../function/connection.php");
    include("../function/helper.php");
?>
<body>
    <div id="wrapper">
        <?php include("include/header.php") ?>
        <div id="page-wrapper">
            <?php
            if (isset($_GET["category"])) include("page/blog/category.php");
            else if (isset($_GET["category_edit"])) include("page/blog/category.php");
            else if (isset($_GET["post"])) include("page/blog/post.php");
            else if (isset($_GET["comment"])) include("page/blog/comment.php");
            else if (isset($_GET["user"])) include("page/user/index.php");
            else if (isset($_GET["administrator"])) include("page/administrator/index.php");
            else include("page/home/index.php");
            ?>
        </div>
    </div>
    <?php include("include/footer.php") ?>
</body>
</html>
