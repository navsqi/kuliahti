<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Blog &raquo; Post</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Input Data
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- NOTIFIKASI -->
                        <?php 
                            $notif = isset($_GET['notif']) ? $_GET['notif'] : false;
                            if( $notif == "success"){
                                echo "<div class='alert alert-success alert-dismissable'>
                                        <button aria-hidden='true' data-dismiss='alert' class='close' type='button'>&times;</button>
                                        Artikel berhasil di tambahkan
                                    </div>";
                            }else if($notif == "updated") {
                                echo "<div class='alert alert-success alert-dismissable'>
                                        <button aria-hidden='true' data-dismiss='alert' class='close' type='button'>&times;</button>
                                        Artikel berhasil di perbaharui
                                    </div>";
                            }else if($notif == "deleted") {
                                echo "<div class='alert alert-success alert-dismissable'>
                                        <button aria-hidden='true' data-dismiss='alert' class='close' type='button'>&times;</button>
                                        Artikel berhasil di hapus
                                    </div>";
                            }

                            // FORM EDIT
                            $post_edit = isset($_GET['post_edit']) ? $_GET['post_edit'] : false;
                            $queryUpdate = false;
                            $status = "";
                            $kategori = "";
                            if($post_edit) {
                                $id_artikel = $post_edit;
                                $queryUpdate = mysqli_query($conn,"SELECT * FROM artikel WHERE id_artikel = $id_artikel");
                                $rowUpdate = mysqli_fetch_assoc($queryUpdate);
                                $status = $rowUpdate['status'];
                                $kategori = $rowUpdate['kategori_id'];
                            }

                         ?>
                        <form role="form" action="<?php echo ($queryUpdate) ? BASE_URL."admin/page/blog/post_update.php" : BASE_URL."admin/page/blog/post_insert.php" ; ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control" name="id_kategori">
                                    <option value=""> - choose - </option>
                                <?php 
                                    // SELECT KATEGORI
                                    $queryKategori = mysqli_query($conn, "SELECT * FROM kategori");
                                    while($rowKategori = mysqli_fetch_assoc($queryKategori)){

                                 ?>
                                
                                <option value="<?php echo $rowKategori['id_kategori']; ?>" 
                                        <?php echo ($kategori == $rowKategori['id_kategori']) ? "selected=selected" : false; ?>
                                            > <?php echo $rowKategori['nama']; ?></option>
                
                                 <?php

                                    }

                                 ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Title</label>
                                <input class="form-control" type="text" name="judul" 
                                    <?php echo ($queryUpdate) ? "value='$rowUpdate[judul]'" : false; ?> >
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea id="ckeditor" class="form-control" rows="3" name="deskripsi">
                                    <?php echo ($queryUpdate) ? htmlspecialchars($rowUpdate['deskripsi']) : false; ?>
                                </textarea>
                                <script>
                                    CKEDITOR.replace('ckeditor');
                                </script>
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="gambar" />
                                <input type="hidden" name="nama_gambar" value="<?php echo $rowUpdate['gambar']; ?>">
                                <?php echo ($queryUpdate) ? "<img class='post-image' width='100' src='".BASE_URL."images/$rowUpdate[gambar]'/>" : false; ?> 
                            </div>
                            <div class="form-group">
                                <label style="display: block;">Status</label>
                                <input type="radio" name="status" value="1" <?php echo ($status == 1) ? "checked=checked" : false; ?>> On 
                                <input type="radio" name="status" value="0" <?php echo ($status == 0) ? "checked=checked" : false; ?>> Off  
                            </div>
                            <input type="hidden" name="id_artikel" value="<?php echo $rowUpdate['id_artikel'] ?>">
                            <button type="submit" name="submit" class="btn btn-success">Save</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="panel panel-default">
            <div class="panel-heading">
                List Data
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="datatables" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Title</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 

                                $query = mysqli_query($conn,"SELECT artikel.*,kategori.id_kategori,kategori.nama FROM artikel JOIN kategori ON artikel.kategori_id = kategori.id_kategori ORDER BY artikel.id_artikel DESC");
                                while($row = mysqli_fetch_assoc($query)){
                                    $status = ($row['status'] == 1) ? "On" : "Off";
                                    echo "<tr>
                                        <td>$row[nama]</td>
                                        <td>$row[judul]</td>
                                        <td>".tanggal_indonesia($row['tanggal'])."</td>
                                        <td>$status</td>
                                        <td class='center'><a href='index.php?post_edit=$row[id_artikel]' class='btn btn-primary btn-xs' type='button'>Update</a></td>
                                        <td class='center'><a href='".BASE_URL."admin/page/blog/post_delete.php?id_artikel=$row[id_artikel]' class='btn btn-primary btn-xs' type='button'>Delete</a></td> 
                                        </tr>   
                                    ";
                                }


                            ?>
                        </tbody>
                    </table>
                    <!-- DATA TABLE SCRIPT -->
                    <script type="text/javascript">
                      $(function () {
                        $("#datatables").DataTable({
                            "columnDefs": [
                                { "searchable": false, "targets": [4,5] },
                                { "orderable": false, "targets": [4,5] }
                              ]
                        });
                      }); 
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>

