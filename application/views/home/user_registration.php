    
    <section class="registration my-4">
        <div class="container">

            <?= $this->session->flashdata('message'); ?>

            <h2 class="pl-2">PENDAFTARAN</h2>
            <hr>
            <div class="ml-2">
                <form action="" method="POST">
                    <div class="form-group">
                        <label class="control-label" for="firstname"><span class="text-danger">*</span> Nama Depan</label>
                        <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Nama Depan" value="<?= set_value('firstname'); ?>">

                        <?= form_error('firstname', '<small class="text-danger">', '</small>'); ?>

                    </div>

                    <div class="form-group">
                        <label class="control-label" for="lastname">Nama Belakang</label>
                        <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Nama Belakang" value="<?= set_value('lastname'); ?>">

                        <?= form_error('lastname', '<small class="text-danger">', '</small>'); ?>

                    </div>

                    <div class="form-group">
                        <label class="control-label" for="phonenumber"><span class="text-danger">*</span> Nomor Handphone</label>
                        <input type="tel" class="form-control" name="phonenumber" id="phonenumber" placeholder="Nomor Handphone" value="<?= set_value('phonenumber'); ?>">

                        <?= form_error('phonenumber', '<small class="text-danger">', '</small>'); ?>

                    </div>

                    <div class="form-group">
                        <label for="address" class="control-label"><span class="text-danger">*</span> Alamat</label>
                        <textarea name="address" id="address" class="form-control"><?= set_value('address'); ?></textarea>

                        <?= form_error('address', '<small class="text-danger">', '</small>') ?>

                    </div>

                    <div class="form-group">
                        <label class="control-label" for="email"><span class="text-danger">*</span> Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?= set_value('email'); ?>">

                        <?= form_error('email', '<small class="text-danger">', '</small>'); ?>

                    </div>

                    <div class="form-group">
                        <label class="control-label" for="password"><span class="text-danger">*</span> Kata Sandi</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Kata Sandi">
                        <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="repassword"><span class="text-danger">*</span> Ulang Kata Sandi</label>
                        <input type="password" class="form-control" name="repassword" id="repassword" placeholder="Ulang Kata Sandi">
                    </div>

                    <button type="submit" class="btn btn-primary mr-2">Buat Akun</button>
                    <a role="button" href="<?= base_url('registration'); ?>" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </section>