<?php 

    session_start();

    $id_user = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : false;
    $username =  isset($_SESSION['username']) ? $_SESSION['username'] : false;

    if($id_user){
        include("../function/helper.php");
        header("location:".BASE_URL."admin/index.php");
    }


 ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CMS DUMET Blog v1.0</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="css/sb-admin.css" rel="stylesheet" />
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="login_proccess.php">
                            <fieldset>
                            
                                <?php 
                                    if(isset($_GET['notif']) == "failed"){
                                ?>
                                    <div class="alert alert-danger alert-dismissable">
                                        <button aria-hiden="true" data-dismiss="alert" class="close" type="button">&times;</button>
                                         Username atau Password Anda Salah. Silakan hubungi Administrator.
                                    </div>
                                <?php
                                    }

                                 ?>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="text" autofocus="autofocus" />
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="" />
                                </div>
                                <input type="submit" name="submit_login" value="Login" class="btn btn-lg btn-success btn-block"/>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/sb-admin.js"></script>
</body>
</html>