
    <header class="sticky-top">
        <div class="top-nav text-right">
            <div class="container">
                <small>Social Media :</small>

                <a href="#" class="nav-icon">
                    <i class="fa fa-facebook-square"></i>
                </a>
                <a href="#" class="nav-icon">
                    <i class="fa fa-twitter-square"></i>
                </a>                
                <a href="#" class="nav-icon">
                    <i class="fa fa-instagram"></i>
                </a>
            </div>
        </div>

        <div class="second-nav">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="<?= base_url('home') ?>">
                        <img class="d-inline-block align-top" src="<?= base_url('assets/img/logo-1.png') ?>" alt="Logo" width="200">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item pl-4">
                                <a class="nav-link" href="<?php echo base_url('home/category'); ?>">Kategori</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ml-auto">

                            <?php if ($this->session->has_userdata('id_user')) : ?>

                            <li class="nav-item px-4" style="border-right: #f3f3f3 solid 1px">
                                <a class="nav-link" href="<?= base_url('users/carts') ?>"><i class="fa fa-shopping-cart"></i> 0</a>
                            </li>
                                
                            <?php endif; ?>

                            <?php if ($this->session->has_userdata('id_toko') || $this->session->has_userdata('id_user')): ?>

                                <?php if ($this->session->has_userdata('id_toko')) : ?>
                                
                                <li class="nav-item pl-4">
                                    <a role="button" href="<?= base_url('store/dashboard') ?>" class="btn btn-outline-purple">Dashboard</a>
                                </li>

                                <?php else: ?>

                                <li class="nav-item pl-4">
                                    <a role="button" href="<?= base_url('users/dashboard') ?>" class="btn btn-outline-purple">Dashboard</a>
                                </li>

                                <?php endif; ?>

                            <?php else: ?>

                            <li class="nav-item pl-4">
                                <a class="nav-link" href="<?= base_url('login') ?>">Login</a>
                            </li>
                            <li class="nav-item pl-4">
                                <a role="button" href="<?= base_url('registration') ?>" class="btn btn-outline-purple">Daftar</a>
                            </li>

                            <?php endif; ?>

                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>