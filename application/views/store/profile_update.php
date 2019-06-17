
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Update Profile
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-md-12">
                    <!-- Horizontal Form -->

                    <?= $this->session->flashdata('message'); ?>

                    <div class="box box-purple">
                        
                        <!-- form start -->
                        <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data" style="margin-top: 10px;">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="nama_toko" class="col-sm-2 control-label"><span class="text-danger">*</span> Nama Toko</label>
                    
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama_toko" name="nama_toko" placeholder="Nama Toko" value="<?= $data_session['nama_toko'] ?>">

                                        <?= form_error('nama_toko', '<small class="text-danger">', '</small>'); ?>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="tentang_toko" class="col-sm-2 control-label">Tentang Toko</label>

                                    <div class="col-sm-10">
                                        <textarea name="tentang_toko" id="tentang_toko" class="form-control" placeholder="Tentang Toko"><?php echo $data_session['tentang_toko'] ?></textarea>
                                        
                                        <?= form_error('tentang_toko', '<small class="text-danger">', '</small>'); ?>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="alamat_toko" class="col-sm-2 control-label"><span class="text-danger">*</span> Alamat Toko</label>

                                    <div class="col-sm-10">
                                        <textarea name="alamat_toko" id="alamat_toko" class="form-control" placeholder="Alamat Toko"><?php echo $data_session['alamat_toko'] ?></textarea>
                                        
                                        <?= form_error('alamat_toko', '<small class="text-danger">', '</small>'); ?>
                                        
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="no_telp" class="col-sm-2 control-label">No Telepon</label>

                                    <div class="col-sm-10">
                                        <input type="tel" name="no_telp" id="no_telp" class="form-control" placeholder="No Telepon" value="<?php echo $data_session['no_telp'] ?>">

                                        <?= form_error('no_telp', '<small class="text-danger">', '</small>'); ?>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="no_handphone" class="col-sm-2 control-label"><span class="text-danger">*</span> No Handphone</label>

                                    <div class="col-sm-10">
                                        <input type="tel" name="no_handphone" id="no_handphone" class="form-control" placeholder="No Handphone" value="<?php echo $data_session['no_handphone'] ?>">

                                        <?= form_error('no_handphone', '<small class="text-danger">', '</small>'); ?>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="toko_buka" class="col-sm-2 control-label">Jam Buka Toko</label>

                                    <div class="col-sm-10">
                                        <input type="time" name="toko_buka" id="toko_buka" class="form-control" value="<?php echo $data_session['toko_buka'] ?>">

                                        <?= form_error('toko_buka', '<small class="text-danger">', '</small>'); ?>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="toko_tutup" class="col-sm-2 control-label">Jam Tutup Toko</label>

                                    <div class="col-sm-10">
                                        <input type="time" name="toko_tutup" id="toko_tutup" class="form-control" value="<?php echo $data_session['toko_tutup'] ?>">

                                        <?= form_error('toko_tutup', '<small class="text-danger">', '</small>'); ?>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label"><span class="text-danger">*</span> Email</label>
                    
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?= $data_session['email'] ?>">

                                        <?= form_error('email', '<small class="text-danger">', '</small>'); ?>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="photo" class="col-sm-2 control-label">Photo Profile</label>
                    
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" id="photo" name="photo" placeholder="Username">

                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-purple pull-right">Save Data</button>
                                <a role="button" href="<?= base_url('store/profile'); ?>" class="btn btn-default pull-right" style="margin-right: 10px;">Cancel</a>
                            </div>
                            <!-- /.box-footer -->
                        </form>
                    </div>
                    <!-- /.box -->
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->