<article>
    <div class="meta">
        <ol class="breadcrumb">
          <?php 

            $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            $id_artikel = isset($_GET['detail']) ? $_GET['detail'] : false;
            $query = mysqli_query($conn,"SELECT artikel.*,kategori.nama FROM artikel JOIN kategori WHERE artikel.kategori_id = kategori.id_kategori
                                          AND id_artikel = $id_artikel;
                                        ");
            $row = mysqli_fetch_assoc($query);

           ?>
          <li><a href="<?php echo BASE_URL; ?>">Home</a></li>
          <li><a href="<?php echo BASE_URL.'index.php?category='.$row['kategori_id']; ?>"><?php echo $row['nama']; ?></a></li>
          <li class="active"><?php echo $row['judul']; ?></li>
        </ol>
        <div class="social-button">
          <!-- Untuk Facebook -->
          <a href="http://www.facebook.com/sharer.php?u=<?php echo $_SERVER['REQUEST_URI']; ?>" target="_blank">
              <img src="<?php echo BASE_URL; ?>images/social/facebook.png" alt="facebook" width="30px" />
          </a>
          
          <!-- Untuk Google+ -->
          <a href="https://plus.google.com/share?url=<?php echo $_SERVER['REQUEST_URI']; ?>" target="_blank">
              <img src="<?php echo BASE_URL; ?>images/social/google-plus.png" alt="google-plus" width="30px" />
          </a>
          
          <!-- Untuk Twitter -->
          <a href="https://twitter.com/share?url=<?php echo $_SERVER['REQUEST_URI']; ?>" target="_blank">
              <img src="<?php echo BASE_URL; ?>images/social/twitter.png" alt="twitter" width="30px" />
          </a>
        </div>
    </div>
    <h1><?php echo $row['judul']; ?></h1>
    <img src="<?php echo BASE_URL; ?>images/<?php echo $row['gambar']; ?>" class="img-responsive btn-block">
    <p><?php echo $row['deskripsi']; ?></p>

    <div class="pagination" id="tag">
      <a class="btn btn-xs btn-default" href="index.php?tag">php</a> 
      <a class="btn btn-xs btn-default" href="index.php?tag">html</a> 
      <a class="btn btn-xs btn-default" href="index.php?tag">css</a>
    </div>


  
    <!-- Komentar -->
    <div class="panel panel-default">
      <div class="panel-heading">
        <?php 

          $queryKomentar = mysqli_query($conn,"SELECT * FROM komentar WHERE status = 1 AND artikel_id = $id_artikel ");
          $totalKomentar = mysqli_num_rows($queryKomentar);

         ?>
        <h3 class="panel-title"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> <?php echo $totalKomentar; ?> Komentar</h3>
      </div>
      <div class="panel-body">
        <ul class="list-group">
          <?php 

            $queryKomentar = mysqli_query($conn,"SELECT * FROM komentar WHERE status = 1 AND artikel_id = $id_artikel ");
            while($rowKomentar = mysqli_fetch_assoc($queryKomentar)){

          ?>
          <li class="list-group-item">
            <strong><?php echo $rowKomentar['user'] ?></strong>: <?php echo $rowKomentar['reply'] ?>
          </li>

          <?php 

            }

           ?>
        </ul>
      </div>
    </div>

    <!-- Form Komentar -->
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Komentar</h3>
      </div>
      <div class="panel-body">
        <form class="form-horizontal" method="POST" action="<?php echo BASE_URL.'includes/detail_komentar_proccess.php'; ?>">
          <div class="form-group">
            <label for="inputNama3" class="col-sm-2 control-label">Nama</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="user" id="inputNama3" required="required">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPesan3"  class="col-sm-2 control-label">Pesan</label>
            <div class="col-sm-10">
              <textarea class="form-control" name="reply" rows="3" required="required"></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-10 col-md-offset-2">
              <div class="g-recaptcha" data-sitekey="6LfKB2cUAAAAAAoh18m-HBnYmjgwRkWQabNKYeTF"></div>
            </div>
          </div>
            <input type="hidden" name="artikel_id" value="<?php echo $id_artikel; ?>">
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button name="submit" type="submit" class="btn btn-default">Kirim</button>
            </div>
          </div>
        </form>
        <?php 

            $notif = isset($_GET['comment']) ? $_GET['comment'] : false;

            if( $notif == "success"){
                echo "<div id='comment-success' class='alert alert-success alert-dismissable'>
                        <button aria-hidden='true' data-dismiss='alert' class='close' type='button'>&times;</button>
                        Terimakasih, komentar anda sedang di moderasi
                    </div>";
            }else if($notif == "failed") {
                echo "<div id='comment-failed' class='alert alert-danger alert-dismissable'>
                        <button aria-hidden='true' data-dismiss='alert' class='close' type='button'>&times;</button>
                        Komentar gagal, silahkan cek kembali !
                    </div>";
            }


         ?>
      </div>
    </div>
</article>



