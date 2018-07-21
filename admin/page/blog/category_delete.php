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
	$id_kategori = $_GET['id_kategori'];
	$nama = $_POST['nama'];
	$icon = $_POST['icon'];

	$query = mysqli_query($conn,"DELETE FROM kategori WHERE id_kategori = $id_kategori");

	header("location:".BASE_URL."admin/index.php?category&notif=deleted");
}


 ?>