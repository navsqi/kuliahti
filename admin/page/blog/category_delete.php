<?php 

include("../../../function/helper.php");

$source = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : false;
if($source == false OR $source != BASE_URL."admin/index.php?category"){
	echo "<script>
				
				document.location = '".BASE_URL."';

		</script>
	";
}else {
	echo $_SERVER['HTTP_REFERER'];
}


 ?>