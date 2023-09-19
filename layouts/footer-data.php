<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top" data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a> </div>
<script src="assets/js/vendor.min.js" type="text/javascript"></script> 
<script src="assets/js/app.min.js" type="text/javascript"></script>
<!--Datatable--->
<script src="assets/plugins/datatables.net/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="assets/plugins/datatables.net-bs5/js/dataTables.bootstrap5.min.js" type="text/javascript"></script>
<script src="assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js" type="text/javascript"></script>
<script src="assets/plugins/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js" type="text/javascript"></script>
<script src="assets/js/demo/table-manage-default.demo.js" type="text/javascript"></script>
<script>
    var thispageurl = window.location.href;
    console.log(thispageurl)
    $(".find-link .menu-item").children().each(function() {
        if (this.href === thispageurl) {
            $(this).closest(".menu-item").addClass("active")
            $(this).closest(".has-sub").addClass("active")
        }
    });
</script> 
</body>
</html>