
    <footer class="text-center py-2" style="border-top: 1px solid #f3f3f3">
        <small>Copyright <?php echo date('Y') . ". Powered by Cake Factory" ?></small>
    </footer>

    <!-- Jquery -->
    <script src="<?= base_url('assets/vendor/jquery/dist/jquery.min.js') ?>"></script>
    <!-- Bootstrap -->
    <script src="<?= base_url('assets/vendor/bootstrap4/dist/js/bootstrap.min.js') ?>"></script>
    <!-- Popper.js -->
    <script src="<?= base_url('assets/vendor/popper.js/dist/popper.min.js') ?>"></script>
    <script>
		$(function () {
            $('#example1').DataTable();
        });
    </script>
</body>
</html>