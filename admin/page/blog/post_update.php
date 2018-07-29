<?php 

include("../../../function/connection.php");
include("../../../function/helper.php");


if(isset($_POST['submit'])){
	$id_artikel = $_POST['id_artikel'];
	$id_kategori = $_POST['id_kategori'];
	$judul = $_POST['judul'];
	$deskripsi = addslashes($_POST['deskripsi']);
	$tanggal = date("Y-m-d H:i:s");
	$status = $_POST['status'];
	$slug = slugify($judul);
	$gambar = $_POST['nama_gambar'];

	$uploadStatus = false;


	echo $deskripsi;

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
			$selectGambar = mysqli_query($conn,"SELECT gambar FROM artikel WHERE id_artikel = $id_artikel");
			$rowGambar = mysqli_fetch_assoc($selectGambar);
			if(file_exists($dir.$rowGambar['gambar'])){
				unlink($dir.$rowGambar['gambar']);
			}
			move_uploaded_file($_FILES['gambar']['tmp_name'],$dir.$gambar);
			
		}
	}

	$query = mysqli_query($conn,"UPDATE artikel SET  kategori_id = '$id_kategori',
								judul = '$judul',
								deskripsi = '$deskripsi',
								gambar = '$gambar',
								tanggal = '$tanggal',
								slug = '$slug',
								status = '$status' WHERE id_artikel = $id_artikel");

	if($query){
		header("location:".BASE_URL."admin/index.php?post&notif=updated");
	}else {
		echo mysqli_error($conn);
	}

}



 ?>