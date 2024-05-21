

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/admin/lib/chart/chart.min.js') ?>"></script>
    <script src="<?= base_url('assets/admin/lib/easing/easing.min.js') ?>"></script>
    <script src="<?= base_url('assets/admin/lib/waypoints/waypoints.min.js') ?>"></script>
    <script src="<?= base_url('assets/admin/lib/owlcarousel/owl.carousel.min.js') ?>"></script>
    <script src="<?= base_url('assets/admin/lib/tempusdominus/js/moment.min.js') ?>"></script>
    <script src="<?= base_url('assets/admin/lib/tempusdominus/js/moment-timezone.min.js') ?>"></script>
    <script src="<?= base_url('assets/admin/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') ?>"></script>

    <!-- Template Javascript -->
    <script src="<?= base_url('assets/admin/js/main.js') ?>"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
    <script>
         $(document).ready( function () {
            $('#myTable').DataTable();
        } );

        $("#konfirmasi-btn").click(function(){
            // alert('adadad');
        $('#form-confirm').submit();
       
    });
    </script>
</body>

</html>