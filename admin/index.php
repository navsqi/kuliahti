<?php 
    
    date_default_timezone_set("Asia/Jakarta");
    include("../function/connection.php");
    include("../function/helper.php");

    session_start();

    $id_user = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : false;
    $username =  isset($_SESSION['username']) ? $_SESSION['username'] : false;

    if(!$id_user){
        header("location:".BASE_URL."admin/login.php");
    }

 ?>
<!DOCTYPE html>
<html>
<?php 
    include("include/head.php");   
?>
<body>
    <div id="wrapper">
        <?php include("include/header.php") ?>
        <div id="page-wrapper">
            <?php
            if (isset($_GET["category"])) include("page/blog/category.php");
            else if (isset($_GET["category_edit"])) include("page/blog/category.php");
            else if (isset($_GET["post"])) include("page/blog/post.php");
            else if (isset($_GET["post_edit"])) include("page/blog/post.php");
            else if (isset($_GET["comment"])) include("page/blog/comment.php");
            else if (isset($_GET["comment_edit"])) include("page/blog/comment.php");
            else if (isset($_GET["user"])) include("page/user/index.php");
            else if (isset($_GET["administrator"])) include("page/administrator/index.php");
            else include("page/home/index.php");
            ?>
        </div>
    </div>
    <?php include("include/footer.php") ?>
</body>
</html>
