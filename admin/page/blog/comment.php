<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Blog &raquo; Comment</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <?php 

            $notif = isset($_GET['notif']) ? $_GET['notif'] : false;
            if( $notif == "success"){
                echo "<div class='alert alert-success alert-dismissable'>
                        <button aria-hidden='true' data-dismiss='alert' class='close' type='button'>&times;</button>
                        Komentar berhasil di tambahkan
                    </div>";
            }else if($notif == "updated") {
                echo "<div class='alert alert-success alert-dismissable'>
                        <button aria-hidden='true' data-dismiss='alert' class='close' type='button'>&times;</button>
                        Komentar berhasil di perbaharui
                    </div>";
            }else if($notif == "deleted") {
                echo "<div class='alert alert-success alert-dismissable'>
                        <button aria-hidden='true' data-dismiss='alert' class='close' type='button'>&times;</button>
                        Komentar berhasil di hapus
                    </div>";
            }

            // FORM EDIT
            $post_edit = isset($_GET['comment_edit']) ? $_GET['comment_edit'] : false;
            $queryUpdate = false;
            $status = "";
            if($post_edit) {
                $id_komentar = $post_edit;
                $queryUpdate = mysqli_query($conn,"SELECT komentar.*,artikel.id_artikel,artikel.judul FROM komentar JOIN artikel ON 
                                                        komentar.artikel_id = artikel.id_artikel WHERE komentar.id_komentar = $id_komentar
                                                        ORDER BY komentar.id_komentar DESC");
                $rowUpdate = mysqli_fetch_assoc($queryUpdate);
                $status = $rowUpdate['status'];
            }


         ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                Input Data
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form role="form" action="<?php echo BASE_URL.'admin/page/blog/comment_update.php'; ?>" method="post">
                            <div class="form-group">
                                <label>Post</label>
                                <input class="form-control" type="text" name="post_name" 
                                placeholder="<?php echo ($queryUpdate) ? $rowUpdate['judul'] : false; ?>" disabled>
                            </div>
                            <input type="hidden" name="post" value="<?php echo ($queryUpdate) ? $rowUpdate['id_artikel'] : false; ?>">
                            <div class="form-group">
                                <label>User</label>
                                <input class="form-control" type="text" name="user" value="<?php echo ($queryUpdate) ? $rowUpdate['user'] : false; ?>" />
                            </div>
                            <div class="form-group">
                                <label>Reply</label>
                                <textarea class="form-control" rows="3" name="reply"><?php echo ($queryUpdate) ? $rowUpdate['reply'] : false; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" value="0" name="status" 
                                        <?php echo ($status == 0) ? "checked=checked" : false; ?> /> Not Active
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" value="1" name="status" 
                                        <?php echo ($status == 1) ? "checked=checked" : false; ?> /> Active
                                    </label>
                                </div>
                            </div>
                            <input type="hidden" name="id_komentar" value="<?php echo ($queryUpdate) ? $rowUpdate['id_komentar'] : false; ?>">
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
                    <table id="datatables" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Post</th>
                                <th>User</th>
                                <th>Reply</th>
                                <th>Status</th>
                                <th>Datetime</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 

                                $query = mysqli_query($conn,"SELECT komentar.*,artikel.id_artikel,artikel.judul FROM komentar JOIN artikel ON 
                                                        komentar.artikel_id = artikel.id_artikel ORDER BY komentar.id_komentar DESC");
                                while($row = mysqli_fetch_assoc($query)){
                                    $status = ($row['status'] == 1) ? "On" : "Off";
                                    echo "<tr>
                                        <td>$row[judul]</td>
                                        <td>$row[user]</td>
                                        <td>$row[reply]</td>
                                        <td>$status</td>
                                        <td class='center'>$row[tanggal]</td>
                                        <td class='center'><a href='".BASE_URL."admin/index.php?comment_edit=$row[id_komentar]' class='btn btn-primary btn-xs' type='button'>Update</a></td> 

                                        <td class='center'><a href='".BASE_URL."admin/page/blog/comment_delete.php?id_komentar=$row[id_komentar]' class='btn btn-primary btn-xs' type='button'>Delete</a></td> 
                                        </tr>   
                                    ";
                                }


                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
  $(function () {
    $("#datatables").DataTable({
        "columnDefs": [
            { "searchable": false, "targets": [5,6] },
            { "orderable": false, "targets": [5,6] }
          ]
    });
  }); 
</script>