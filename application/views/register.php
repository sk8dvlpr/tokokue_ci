<?php $this->load->view('_partials/navbar'); ?>

<!-- Registration -->
<section id="registration">
    <div class="container">
        <h1 class="mt-5">Pendaftaran</h1>
        <hr>

        <?php 
        echo $this->session->flashdata('message');
        ?>

        <!-- Form -->
        <form action="" method="post">
            <div class="form-group row">
                <label for="firstname" class="col-sm-2 col-form-label">Nama Depan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control my-form-control" id="firstname" name="firstname" placeholder="Nama Depan" value="<?= set_value('firstname'); ?>">
                    <?= form_error('firstname', '<small class="text-danger">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="lastname" class="col-sm-2 col-form-label">Nama Belakang</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control my-form-control" id="lastname" name="lastname" placeholder="Nama Belakang" value="<?= set_value('lastname'); ?>">
                    <?= form_error('lastname', '<small class="text-danger">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control my-form-control" id="email" name="email" placeholder="Email" value="<?= set_value('email'); ?>">
                    <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control my-form-control" id="password" name="password" placeholder="Password">
                    <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="confirm_password" class="col-sm-2 col-form-label">Konfirmasi Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control my-form-control" id="confirm_password" name="confirm_password" placeholder="Konfirmasi Password">
                    <?= form_error('confirm_password', '<small class="text-danger">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</section> 