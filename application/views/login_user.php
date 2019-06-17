<?php $this->load->view('_partials/navbar'); ?>


<section id="login-user">
    <div class="container mt-5">
        <div class="row">
            <div class="offset-lg-4 col-lg-4">
                <h1 class="text-center">LOGIN</h1>
                <hr>

                <?php
                echo $this->session->flashdata('message');
                ?>

                <form action="" method="post">
                    <div class="form-group my-4">
                        <input type="text" class="form-control my-form-control" name="email" id="email" placeholder="Masukkan Email" value="<?= set_value('email'); ?>">
                        <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group my-4">
                        <input type="password" class="form-control my-form-control" name="password" id="password" placeholder="Masukkan Password">
                        <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                    </div>

                    <button type="submit" class="btn btn-block btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
</section> 