<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Dashboard</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Notifications
            </div>
            <div class="panel-body">
            <?php 

            if(isset($_GET['notif']) == "comment_approved"){

             ?>
                <div class="alert alert-success alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
                    Approve Comment Berhasil di Setujui
                </div>
            <?php } ?>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                Approve Comments
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Name</th>
                                <th>Comment</th>
                                <th>Datetime</th>
                                <th>Approve</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 

                                $query = mysqli_query($conn,"SELECT komentar.*,artikel.id_artikel,artikel.judul FROM komentar JOIN artikel ON 
                                                        komentar.artikel_id = artikel.id_artikel WHERE komentar.status = 0 ORDER BY komentar.id_komentar DESC");
                                while($row = mysqli_fetch_assoc($query)){
                                    $status = ($row['status'] == 1) ? "On" : "Off";
                                    echo "<tr>
                                        <td>$row[judul]</td>
                                        <td>$row[user]</td>
                                        <td>$row[reply]</td>
                                        <td>".tanggal_indonesia($row['tanggal'])."</td>
                                        <td class='center'><a href='".BASE_URL."admin/page/home/approve_comment.php?id_komentar=$row[id_komentar]' class='btn btn-success btn-xs' type='button'>Approve</a></td> 
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