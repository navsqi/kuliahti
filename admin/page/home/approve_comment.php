<?php 

include("../../../function/helper.php");
include("../../../function/connection.php");

$source = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : false;
if(!$source){
	echo "<script>
				
				document.location = '".BASE_URL."';

		</script>
	";
}else {
	$id_komentar = $_GET['id_komentar'];
	$query       = mysqli_query($conn,"UPDATE komentar SET status = 1 WHERE id_komentar = $id_komentar");

	if($query){
		header("location:".BASE_URL."admin/index.php?notif=comment_approved");
	}else {
		echo mysqli_error($conn);
	}
}


 ?>