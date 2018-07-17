<?php 

include("../../../function/connection.php");
include("../../../function/helper.php");


if(isset($_POST['submit'])){
	$nama = $_POST['nama'];
	$icon = $_POST['icon'];

	$query = mysqli_query($conn,"INSERT INTO kategori VALUES ('','$nama','$icon')");

	if($query){
		header("location:".BASE_URL."admin/index.php?category&notif=success");
	}
}



 ?>