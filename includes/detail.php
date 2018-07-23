<article>
    <div class="meta">
        <ol class="breadcrumb">
          <?php 

            $id_artikel = isset($_GET['detail']) ? $_GET['detail'] : false;
            $query = mysqli_query($conn,"SELECT artikel.*,kategori.nama FROM artikel JOIN kategori WHERE artikel.kategori_id = kategori.id_kategori
                                          AND id_artikel = $id_artikel;
                                        ");
            $row = mysqli_fetch_assoc($query);

           ?>
          <li><a href="#">Home</a></li>
          <li><a href="#"><?php echo $row['nama']; ?></a></li>
          <li class="active"><?php echo $row['judul']; ?></li>
        </ol>
        <div class="social-button">
          <!-- Untuk Facebook -->
          <a href="http://www.facebook.com/sharer.php?u=<?php echo $_SERVER['REQUEST_URI']; ?>" target="_blank">
              <img src="images/social/facebook.png" alt="facebook" width="30px" />
          </a>
          
          <!-- Untuk Google+ -->
          <a href="https://plus.google.com/share?url=<?php echo $_SERVER['REQUEST_URI']; ?>" target="_blank">
              <img src="images/social/google-plus.png" alt="google-plus" width="30px" />
          </a>
          
          <!-- Untuk Twitter -->
          <a href="https://twitter.com/share?url=<?php echo $_SERVER['REQUEST_URI']; ?>" target="_blank">
              <img src="images/social/twitter.png" alt="twitter" width="30px" />
          </a>
        </div>
    </div>
    <h1><?php echo $row['judul']; ?></h1>
    <img src="images/<?php echo $row['gambar']; ?>" class="img-responsive btn-block">
    <p><?php echo $row['deskripsi']; ?></p>

    <div class="pagination" id="tag">
      <a class="btn btn-xs btn-default" href="index.php?tag">php</a> 
      <a class="btn btn-xs btn-default" href="index.php?tag">html</a> 
      <a class="btn btn-xs btn-default" href="index.php?tag">css</a>
    </div>


  
    <!-- Komentar -->
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> 12 Komentar</h3>
      </div>
      <div class="panel-body">
        <ul class="list-group">
          <li class="list-group-item">
            <strong>Alissa</strong>: Many desktop publishing packages and web page editors now use.
          </li>
          <li class="list-group-item">
            <strong>Chelsea</strong>: All the Lorem Ipsum generators on the Internet tend to repeat predefined.
          </li>
          <li class="list-group-item">
            <strong>Nagita</strong>: It uses a dictionary of over 200 Latin words, combined with.
          </li>
          <li class="list-group-item">
            <strong>Ariel</strong>: The generated Lorem Ipsum is therefore always free from repetition.
          </li>
          <li class="list-group-item">
            <strong>Marsha</strong>: The standard chunk of Lorem Ipsum used since the 1500s is reproduced below. It uses a dictionary of over 200 Latin words, combined with.
          </li>
        </ul>
      </div>
    </div>

    <!-- Form Komentar -->
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Komentar</h3>
      </div>
      <div class="panel-body">
        <form class="form-horizontal">
          <div class="form-group">
            <label for="inputNama3" class="col-sm-2 control-label">Nama</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputNama3">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPesan3" class="col-sm-2 control-label">Pesan</label>
            <div class="col-sm-10">
              <textarea class="form-control" rows="3"></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-default">Kirim</button>
            </div>
          </div>
        </form>
      </div>
    </div>
</article>
