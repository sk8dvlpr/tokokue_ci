    
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 1.0.0
        </div>
        <strong>Copyright &copy; 2019 <a href="#">Cake Factory</a>.</strong>
    </footer>
    </div>
    <!-- jQuery 3 -->
    <script src="<?= base_url('assets/vendor/jquery/dist/jquery.min.js'); ?>"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?= base_url('assets/vendor/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
    <!-- DataTables -->
    <script src="<?= base_url('assets/vendor/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/datatables.net-bs/js/dataTables.bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/datatables.net/js/dataTables.buttons.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/datatables.net-bs/js/buttons.bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/datatables.net/js/jszip.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/datatables.net/js/pdfmake.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/datatables.net/js/vfs_fonts.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/datatables.net/js/buttons.html5.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/datatables.net/js/buttons.print.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/datatables.net/js/buttons.colVis.min.js'); ?>"></script>
    <!-- FastClick -->
    <script src="<?= base_url('assets/vendor/fastclick/lib/fastclick.js'); ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/js/adminlte.min.js'); ?>"></script>
    <!-- SlimScroll -->
    <script src="<?= base_url('assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js'); ?>"></script>
    <!-- ChartJS -->
    <script src="<?= base_url('assets/vendor/chart.js/Chart.js'); ?>"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?= base_url('assets/js/pages/dashboard2.js'); ?>"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url('assets/js/demo.js'); ?>"></script>
    <!-- CK Editor -->
    <script src="<?= base_url('assets/vendor/ckeditor/ckeditor.js')?>"></script>

    <script>
        $(function () {
            // $('#example1').DataTable();
            CKEDITOR.replace('productdesc');
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                dom: 'Bfrtip',
                lengthMenu: [
                    [ 5, 10, 25, -1 ],
                    [ '5 rows', '10 rows', '25 rows', 'Show all' ]
                ],
                buttons: [
                    'pageLength', 'copyHtml5', 'excelHtml5', 'pdfHtml5', 'print'
                ]
            });
        });
    </script>
</body>

</html>