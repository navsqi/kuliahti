<?php 

	include("../function/connection.php");
    include("../function/helper.php");

    if(isset($_POST['submit_login'])){

    	$username = $_POST['username'];
    	$password = md5($_POST['password']);
    	$query = mysqli_query($conn,"SELECT * FROM user WHERE username = '$username' AND password = '$password'");

    	if(mysqli_num_rows($query) > 0){
    		session_start();
    		$row = mysqli_fetch_assoc($query);
    		$_SESSION['id_user'] = $row['id_user'];
    		$_SESSION['username'] = $row['username'];

    		header("location:".BASE_URL."admin/index.php");
    	}else {
    		header("location:".BASE_URL."admin/login.php?notif=failed");
    	}



    }
    



 ?>