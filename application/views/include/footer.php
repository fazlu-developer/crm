<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top" data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a> </div>
<script src="<?= base_url();?>assets/js/vendor.min.js" type="text/javascript"></script> 
<script src="<?= base_url();?>assets/js/app.min.js" type="text/javascript"></script>
<!--Datatable--->
<script src="<?= base_url();?>assets/plugins/datatables.net/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="<?= base_url();?>assets/plugins/datatables.net-bs5/js/dataTables.bootstrap5.min.js" type="text/javascript"></script>
<script src="<?= base_url();?>assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js" type="text/javascript"></script>
<script src="<?= base_url();?>assets/plugins/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js" type="text/javascript"></script>
<script src="<?= base_url();?>assets/js/demo/table-manage-default.demo.js" type="text/javascript"></script>
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

<script src="<?=base_url();?>toast.js"></script>
    <script>
      $( document ).ready(function() {
        $.toast({
            type: 'info',
            title: 'Notice!',
            content: 'Hello, world! This is a toast message.',
            delay: 5000,
        });

        $.toast({
            type: 'success',
            title: 'Success',
            content: 'Hello, world! This is a toast message.',
            delay: 5000,
        });

        $.toast({
            type: 'error',
            title: 'Success',
            content: 'Hello, world! This is a toast message.',
            delay: 5000,
        });

        $.toast({
            type: 'warning',
            title: 'Success',
            content: 'Hello, world! This is a toast message.',
            delay: 5000,
        });

        $.toast({
            type: 'toast',
            title: 'Success',
            content: 'Hello, world! This is a toast message.',
            delay: 5000,
        });

      });
    </script>

</body>
</html>