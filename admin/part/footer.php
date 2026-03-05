<footer class="main-footer">
    <strong>Copyright &copy; 2026 <a href="../../" style="text-decoration:none">Desa Nusajati</a>.</strong>
    All
    rights reserved.
</footer>
<script src="../../assets/AdminLTE/bower_components/jquery/dist/jquery.min.js"></script>
<script src="../../assets/AdminLTE/bower_components/jquery-ui/jquery-ui.min.js"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="../../assets/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="../../assets/AdminLTE/bower_components/raphael/raphael.min.js"></script>
<script src="../../assets/AdminLTE/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="../../assets/AdminLTE/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../../assets/AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../../assets/AdminLTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="../../assets/AdminLTE/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../../assets/AdminLTE/bower_components/moment/min/moment.min.js"></script>
<script src="../../assets/AdminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../../assets/AdminLTE/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../../assets/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../../assets/AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../assets/AdminLTE/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../assets/AdminLTE/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../../assets/AdminLTE/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../assets/AdminLTE/dist/js/demo.js"></script>
<!-- DataTable Plugin -->
<script src="../../assets/datatables-1.10.12/js/jquery.dataTables.min.js"></script>
<script src="../../assets/datatables-1.10.12/js/dataTables.bootstrap.min.js"></script>
<script>
    $(document).ready(function() {

    $(document).ready(function(){

    $('#data-table').DataTable({
    scrollX:true,
    scrollCollapse:true,
    autoWidth:false,
    paging:true,
    fixedHeader:true,
    language:{
    search:"Search:",
    paginate:{
    previous:"Previous",
    next:"Next"
    }
    }
    });

    });
    });

    $(document).on("click",".btn-detail",function(){
    let id=$(this).data("id");
    $("#modalDetail").modal("show");
    $("#detailContent").load("detail_ajax.php?id="+id);
    });

    $(document).on("click","#btnUpdateStatus",function(){

    let id=$("#pengaduanId").val();
    let status=$("#statusSelect").val();

    $.post("update_status.php",{id:id,status:status},function(res){

    alert("Status berhasil diupdate");

    // reload isi modal biar status terbaru tampil
    $("#detailContent").load("detail_ajax.php?id="+id);

    });

    });

</script>
<style>
    .content-wrapper{
    min-height:100vh;
    }

    .main-sidebar{
    height:100vh;
    overflow:auto;
    }

    .main-header{
    position:sticky;
    top:0;
    z-index:1000;
    }

</style>
</div>
</body>

</html>