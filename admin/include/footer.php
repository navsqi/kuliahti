<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>

<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>

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

<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="js/plugins/morris/raphael-2.1.0.min.js"></script>
<script src="js/plugins/morris/morris.js"></script>
<script src="js/sb-admin.js"></script>
<script src="js/demo/dashboard-demo.js"></script>