<?php 


session_start();
unset($_SESSION['id_user']);
unset($_SESSION['username']);
session_destroy();
include("../function/helper.php");
header("location:".BASE_URL);


 ?>