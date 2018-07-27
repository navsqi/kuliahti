<?php 

include "../function/connection.php"; 
include "../function/helper.php"; 

if(isset($_POST['submit'])){
	$user = $_POST['user'];
	$reply = $_POST['reply'];
	$artikel_id = $_POST['artikel_id'];
	$tanggal = date('Y-m-d');

	$query = mysqli_query($conn,"INSERT INTO komentar VALUE ('','$artikel_id','$user','$reply','$tanggal',0)");

	if($query){
		 header("location:".BASE_URL."index.php?detail=".$artikel_id."&comment=success#comment-success");
	}else {
		echo "gagal : ".mysqli_error($conn);
	}
}




 ?>