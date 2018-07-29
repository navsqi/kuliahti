<?php 

include("../../../function/connection.php");
include("../../../function/helper.php");


if(isset($_POST['submit'])){
	$id_komentar = $_POST['id_komentar'];
	$user        = $_POST['user'];
	$post        = $_POST['post'];
	$reply       = $_POST['reply'];
	$status      = $_POST['status'];
	$id_artikel  = $_POST['post'];

	$query = mysqli_query($conn,"UPDATE komentar SET artikel_id = '$id_artikel', user = '$user', 
								 reply = '$reply', status = $status WHERE id_komentar = $id_komentar");

	if($query){
		header("location:".BASE_URL."admin/index.php?comment&notif=updated");
	}else {
		echo mysqli_error($conn);
	}
}



 ?>