<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url(); ?>">TOKO KUE</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">

                <?php if (!$this->session->has_userdata('logged_in')) : ?>

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('pendaftaran'); ?>">DAFTAR</a>
                </li>
                <li class="nav-item">
                    <a class="my-button btn btn-primary" href="<?= base_url('login'); ?>">LOGIN</a>
                </li>

                <?php else : ?>

                <li class="nav-item">
                    <a class="my-button btn btn-primary" href="<?= base_url('dashboard'); ?>">Dashboard</a>
                </li>

                <?php endif; ?>

            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->

<!-- Jumbotron -->
<div class="jumbotron text-center">
    <h1 class="display-4">Toko Kue Terpercaya #1</h1>
    <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum amet delectus tempore quaerat architecto eum eius temporibus adipisci quo molestias dicta quam nisi nihil distinctio, ducimus esse similique, natus deserunt?</p>

    <a class="btn btn-primary" href="#" role="button">Selengkapnya</a>
</div>
<!-- End Jumbotron --> 