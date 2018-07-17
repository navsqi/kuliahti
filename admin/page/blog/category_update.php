<?php 

include("../../../function/connection.php");
include("../../../function/helper.php");


if(isset($_POST['submit'])){
	$id_kategori = $_POST['id_kategori'];
	$nama = $_POST['nama'];
	$icon = $_POST['icon'];

	$query = mysqli_query($conn,"UPDATE kategori SET nama = '$nama', 
								icon = '$icon' WHERE id_kategori = $id_kategori	");

	if($query){
		header("location:".BASE_URL."admin/index.php?category&notif=updated");
	}
}



 ?>