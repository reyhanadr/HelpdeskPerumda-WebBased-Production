    <!-- END PAGE CONTENT-->
    <footer class="page-footer">
                <div class="font-13">2023 © <b>Anksx_x</b> - All rights reserved.</div>
                <div class="to-top"><i class="fa fa-angle-double-up"></i></div>
            </footer>
        </div>
    </div>
        <!-- BEGIN PAGA BACKDROPS-->
        <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>
    <!-- END PAGA BACKDROPS-->
    <!-- CORE PLUGINS-->
    <script src="<?php echo base_url(); ?>assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/popper.js/dist/umd/popper.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/metisMenu/dist/metisMenu.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- PAGE LEVEL PLUGINS-->
    <script src="<?php echo base_url(); ?>assets/vendors/DataTables/datatables.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>
    <!-- CORE SCRIPTS-->
    <script src="<?php echo base_url(); ?>assets/js/app.min.js" type="text/javascript"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    <script type="text/javascript">
        $(function() {
            $('#example-table').DataTable({
                pageLength: 10,
                //"ajax": './assets/demo/data/table_data.json',
                /*"columns": [
                    { "data": "name" },
                    { "data": "office" },
                    { "data": "extn" },
                    { "data": "start_date" },
                    { "data": "salary" }
                ]*/
            });
        })
    </script>
        <script type="text/javascript">
        $("#form-sample-1").validate({
            rules: {
                nama: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                username: {
                    required: true,
                },
                karyawan_id: {
                    required: true,
                },
                departemen: {
                    required: true,
                },
                kategori: {
                    required: true,
                },
                password: {
                    required: true,
                },
                bidang: {
                    required: true,
                },
                id: {
                    required: true
                },
            },
            messages: {
                nama: {
                    required: "Kolom ini harus diisi!"
                },
                email: {
                    required: "Kolom ini harus diisi!",
                    email: "Masukkan alamat email yang valid."
                },
                username: {
                    required: "Kolom ini harus diisi!",
                },
                karyawan_id: {
                    required: "Kolom ini harus diisi!"
                },
                departemen: {
                    required: "Kolom ini harus diisi!"
                },
                kategori: {
                    required: "Kolom ini harus diisi!"
                },
                password: {
                    required: "Kolom ini harus diisi!"
                },
                bidang: {
                    required: "Kolom ini harus diisi!"
                },
                id: {
                    required: "Kolom ini harus diisi!"
                },
                // Sisipkan pesan untuk setiap field lainnya sesuai kebutuhan Anda
            },
            
            errorClass: "help-block error",
            highlight: function(e) {
                $(e).closest(".form-group.row").addClass("has-error")
            },
            unhighlight: function(e) {
                $(e).closest(".form-group.row").removeClass("has-error")
            },
            
        });
    </script>
</script>
</body>

</html>