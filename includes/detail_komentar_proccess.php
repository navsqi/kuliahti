<?php 

include "../function/connection.php"; 
include "../function/helper.php"; 

$site_key   = '6LfKB2cUAAAAAAoh18m-HBnYmjgwRkWQabNKYeTF'; // Diisi dengan site_key API Google reCapthca yang sobat miliki
$secret_key = '6LfKB2cUAAAAADpVAwNAqpwjOE2o7o6Dj5on4Xvo'; // Diisi dengan secret_key API Google reCapthca yang sobat miliki
$ip         = $_SERVER['REMOTE_ADDR']; // get IP user
$artikel_id = $_POST['artikel_id'];

if (isset($_POST['submit']))
{
    if(isset($_POST['g-recaptcha-response']))
    {
        $api_url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . $secret_key . '&response='.$_POST['g-recaptcha-response'].'&remoteip='.$ip;
        $response = file_get_contents($api_url);
        $data = json_decode($response, true);

        if($data['success'])
        {	
        	// jika response success
            $success = true;
            $user    = $_POST['user'];
            $reply   = $_POST['reply'];
            $tanggal = date('Y-m-d');
            
            $query   = mysqli_query($conn,"INSERT INTO komentar VALUE ('','$artikel_id','$user','$reply','$tanggal',0)");

			if($query){
				header("location:".BASE_URL."index.php?detail=".$artikel_id."&comment=success#comment-success");
			}else {
				echo "gagal : ".mysqli_error($conn);
			}
        }
        else
        {
        	// jika response gagal
            $success = false;
            header("location:".BASE_URL."index.php?detail=".$artikel_id."&comment=failed#comment-success");
        }
    }
    else
    {
    	// jika tidak ada response / gagal
        $success = false;
        header("location:".BASE_URL."index.php?detail=".$artikel_id."&comment=failed#comment-success");
    }
}

 ?>