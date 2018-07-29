<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <?php 

        $detail = isset($_GET['detail']) ? $_GET['detail'] : false;
        if($detail){
            $query = mysqli_query($conn,"SELECT judul FROM artikel WHERE id_artikel = $detail");
            $getTitle = mysqli_fetch_array($query);
        }

     ?>
    <title><?php echo ($detail) ? $getTitle[0]." | " : false ; ?>Kuliah TI</title>
    <link rel="shortcut icon" href="<?php echo BASE_URL; ?>images/favicon.ico">

    <!-- Bootstrap -->
    <link href="<?php echo BASE_URL; ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>css/custom.css" rel="stylesheet">

    <script src="<?php echo BASE_URL; ?>admin/ckeditor/ckeditor.js"></script>
    <link href="<?php echo BASE_URL; ?>admin/ckeditor/plugins/codesnippet/lib/highlight/styles/default.css" rel="stylesheet">
    <script src="<?php echo BASE_URL; ?>admin/ckeditor/plugins/codesnippet/lib/highlight/highlight.pack.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
