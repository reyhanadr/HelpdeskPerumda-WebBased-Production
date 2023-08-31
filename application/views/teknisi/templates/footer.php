<!-- END PAGE CONTENT-->
<footer class="page-footer">
    <div class="font-13">2023 © <b>Perumda Air Minum Tirta Raharja</b> - All rights reserved.</div>
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
<script>
    // Fungsi untuk pratinjau gambar
    function previewImage(event) {
        var input = event.target;
        var preview = document.getElementById('previewImage');

        var reader = new FileReader();
        reader.onload = function () {
            preview.src = reader.result;
        };

        reader.readAsDataURL(input.files[0]);
    }

    // Tambahkan event listener saat halaman selesai dimuat
    document.addEventListener('DOMContentLoaded', function () {
        var fotoInput = document.getElementById('inputImage');
        fotoInput.addEventListener('change', previewImage);
    });
</script>
<script src="<?php echo base_url(); ?>assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/vendors/popper.js/dist/umd/popper.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"
    type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/vendors/metisMenu/dist/metisMenu.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js"
    type="text/javascript"></script>
<!-- PAGE LEVEL PLUGINS-->
<script src="<?php echo base_url(); ?>assets/vendors/DataTables/datatables.min.js" type="text/javascript"></script>
<!-- CORE SCRIPTS-->
<script src="<?php echo base_url(); ?>assets/js/app.js" type="text/javascript"></script>
<!-- PAGE LEVEL SCRIPTS-->
<script type="text/javascript">
    $(function () {
        $('#example-table').DataTable({
            pageLength: 10,
        });
    })
</script>
<!-- PLUGIN FONTAWESOME -->
<script src="https://kit.fontawesome.com/eccb17b8b4.js" crossorigin="anonymous"></script>
<!-- JavaScript -->
<script>
$(document).ready(function() {
    // Initialize tooltips
    $('.combined-button').tooltip();

    // Show modal when button is clicked
    $('.combined-button').click(function() {
        $('#myModal').modal('show');

        var sesiPesan = $(this).data('sesi');
        $('#sesi_pesan').text(sesiPesan);

        var namaSender = $(this).data('nama');
        $('#nama_sender').text(namaSender);

        // Set the href of the Terima Pesan button
        var terimaUrl = "<?= base_url('index.php/KelolaPesan/terimaPesanTeknisi/') ?>" + sesiPesan;
        $('#terimaButton').attr('href', terimaUrl);
    });
});
</script>

<<<<<<< HEAD

<script>
    $(document).ready(function () {
        $('#summernote').summernote();
    });
</script>

=======
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
</body>

</html>