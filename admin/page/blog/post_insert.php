<?php 

include("../../../function/connection.php");
include("../../../function/helper.php");


if(isset($_POST['submit'])){
	$id_kategori = $_POST['id_kategori'];
	$judul = $_POST['judul'];
	$deskripsi = $_POST['deskripsi'];
	$tanggal = date("Y-m-d H:i:s");
	$status = $_POST['status'];
	$slug = slugify($judul);
	$gambar = "";

	if(!empty($_FILES['gambar']['name'])){
		$uploadStatus = true;
		$dir = $_SERVER['DOCUMENT_ROOT']."/kuliahti/images/";
		$gambar = $_FILES['gambar']['name'];
		$split = explode(".", $gambar);
		$gambar = sha1(random_string(3).date("ymdhis")).".".$split[1];
		$imageFileType = strtolower(pathinfo($gambar,PATHINFO_EXTENSION));

		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" && $imageFileType != "" ) {
		    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadStatus = false;
		}
				
		if($uploadStatus){
			move_uploaded_file($_FILES['gambar']['tmp_name'],$dir.$gambar);
			
		}
	}

	$query = mysqli_query($conn,"INSERT INTO artikel VALUES ('','$id_kategori','$judul','$deskripsi','$gambar','$tanggal','$slug','$status')");

	if($query){
		header("location:".BASE_URL."admin/index.php?post&notif=success");
	}else {
		echo mysqli_error($conn);
	}

}



 ?>