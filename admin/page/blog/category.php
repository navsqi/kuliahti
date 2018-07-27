<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Blog &raquo; Category</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <!-- NOTIFIKASI -->
        <?php 
            $notif = isset($_GET['notif']) ? $_GET['notif'] : false;
            if( $notif == "success"){
                echo "<div class='alert alert-success alert-dismissable'>
                        <button aria-hidden='true' data-dismiss='alert' class='close' type='button'>&times;</button>
                        Kategori berhasil di tambahkan
                    </div>";
            }else if($notif == "updated") {
                echo "<div class='alert alert-success alert-dismissable'>
                        <button aria-hidden='true' data-dismiss='alert' class='close' type='button'>&times;</button>
                        Kategori berhasil di perbaharui
                    </div>";
            }else if($notif == "deleted") {
                echo "<div class='alert alert-success alert-dismissable'>
                        <button aria-hidden='true' data-dismiss='alert' class='close' type='button'>&times;</button>
                        Kategori berhasil di hapus
                    </div>";
            }

            // EDIT KATEGORI
            $category_edit = isset($_GET['category_edit']) ? $_GET['category_edit'] : false;
            if($category_edit) {
                $id_kategori = $category_edit;
                $queryUpdate = mysqli_query($conn,"SELECT * FROM kategori WHERE id_kategori = $id_kategori");
                $rowUpdate = mysqli_fetch_assoc($queryUpdate);
            }

         ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                Input Data
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form role="form" action="<?php echo ($category_edit) ? BASE_URL.'admin/page/blog/category_update.php' : BASE_URL.'admin/page/blog/category_insert.php' ; ?>" method="post">
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" type="text" name="nama" required="required" <?php echo ($category_edit) ? "value='$rowUpdate[nama]'" : false; ?>/>
                            </div>
                            <div class="form-group">
                                <label>Icon</label>
                                <input class="form-control" type="text" name="icon" <?php echo ($category_edit) ? "value='$rowUpdate[icon]'" : false; ?>  />
                            </div>
                            <?php if($category_edit) echo "<input type='hidden' name='id_kategori' value='$category_edit'>"; ?>
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
                                <th>Name</th>
                                <th>Icon</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 

                            $query = mysqli_query($conn,"SELECT * FROM kategori");

                            while($row = mysqli_fetch_assoc($query)){
                                echo "
                                    <tr>
                                        <td>$row[nama]</td>
                                        <td>$row[icon]</td>
                                        <td class='center'><a href='index.php?category_edit=$row[id_kategori]' class='btn btn-primary btn-xs' type='button'>Update</a></td>
                                        <td class='center'><a href='".BASE_URL."admin/page/blog/category_delete.php?id_kategori=$row[id_kategori]' class='btn btn-primary btn-xs' type='button'>Delete</a></td>
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
                                { "searchable": false, "targets": [2,3] },
                                { "orderable": false, "targets": [2,3] }
                              ]
                        });
                      }); 
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>