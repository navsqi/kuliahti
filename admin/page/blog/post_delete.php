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
	$id_artikel = $_GET['id_artikel'];

	$queryArtikel = mysqli_query($conn,"SELECT gambar FROM artikel WHERE id_artikel = $id_artikel");
	$getArtikel   = mysqli_fetch_assoc($queryArtikel);
	$file         = $_SERVER['DOCUMENT_ROOT']."/kuliahti/images/".$getArtikel['gambar'];
	
	if(file_exists($file)){
		unlink($file);
	}

	$query = mysqli_query($conn,"DELETE FROM artikel WHERE id_artikel = $id_artikel");



	header("location:".BASE_URL."admin/index.php?post&notif=deleted");
}


 ?>