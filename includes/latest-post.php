<?php 

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 5;
$offset = ($page - 1) * $limit;
// SEARCH
$search = isset($_GET['search']) ? "AND judul LIKE '%".$_GET['search']."%' " : false;
$category = isset($_GET['category']) ? "AND kategori_id = ".$_GET['category'] : false;
// PAGINATION
$query = mysqli_query($conn,"SELECT * FROM artikel WHERE status = 1 $search $category
                                ");
$total_data = mysqli_num_rows($query);
$total_pages = ceil($total_data/$limit);
$total_number = 2;
$start_number = ($page > $total_number) ? $page - $total_number : 1;
$end_number = ($page < ($total_pages - $total_pages)) ? $page + $total_number : $total_pages;


 ?>

<article>
  <?php  
    // QUERY
    $query = mysqli_query($conn,"SELECT artikel.*,kategori.nama FROM artikel JOIN kategori WHERE artikel.kategori_id = kategori.id_kategori
                                  AND status = 1 $search $category ORDER BY id_artikel DESC LIMIT $limit OFFSET $offset 
                                ");
    while($row = mysqli_fetch_assoc($query)){

   ?>
  <div class="row latest-post">
    <div class="col-md-3">
      <img src="<?php echo BASE_URL."images/".$row['gambar']; ?>" class="img-responsive btn-block">
    </div>
    <div class="col-md-9">
      <h2><a href="<?php echo BASE_URL.$row['id_artikel'].'/'.$row['slug'].'.html'; ?>"><?php echo $row['judul']; ?></a></h2>
      <div class="meta"><a href="<?php echo BASE_URL.'category/'.$row['kategori_id'].'/'.slugify($row['nama']).'.html'; ?>"><span class="glyphicon glyphicon-headphones" aria-hidden="true"></span> <?php echo $row['nama']; ?></a> - <?php echo tanggal_indonesia($row['tanggal']); ?></div>
      <p><?php echo substr(strip_tags($row['deskripsi']), 0,130)."..."; ?></p>
    </div>
  </div>
  <?php } ?>
</article>
<nav class="text-center">
  <ul class="pagination">
    <li>
      <a href="<?php echo BASE_URL.'index.php?page=1'; ?>" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <?php
      
      for($start_number ; $start_number <= $end_number ; $start_number++){
          $active = false;
          if($page == $start_number){
            $active = "class='active'";
          }
          echo "<li $active><a href='".BASE_URL."index.php?page=$start_number'>$start_number</a></li>";
      }


    ?>
      <li>
        <a href="<?php echo BASE_URL."index.php?page=$total_pages"; ?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>