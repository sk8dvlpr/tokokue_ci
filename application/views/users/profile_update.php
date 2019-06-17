
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
                                    <label for="nama_depan" class="col-sm-2 control-label"><span class="text-danger">*</span> Nama Depan</label>
                    
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama_depan" name="nama_depan" placeholder="Nama Depan" value="<?= $data_session['nama_depan'] ?>">

                                        <?= form_error('nama_depan', '<small class="text-danger">', '</small>'); ?>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="nama_belakang" class="col-sm-2 control-label">Nama Belakang</label>
                    
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama_belakang" name="nama_belakang" placeholder="Nama Belakang" value="<?= $data_session['nama_belakang'] ?>">

                                        <?= form_error('nama_belakang', '<small class="text-danger">', '</small>'); ?>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="alamat" class="col-sm-2 control-label"><span class="text-danger">*</span> Alamat</label>

                                    <div class="col-sm-10"><textarea name="alamat" id="alamat" class="form-control"><?php echo $data_session['alamat'] ?></textarea></div>

                                    <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>

                                </div>

                                <div class="form-group">
                                    <label for="no_telp" class="col-sm-2 control-label">No Telepon</label>
                    
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="No Telepon" value="<?= $data_session['no_telp'] ?>">

                                        <?= form_error('no_telp', '<small class="text-danger">', '</small>'); ?>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="no_handphone" class="col-sm-2 control-label"><span class="text-danger">*</span> No Handphone</label>
                    
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="no_handphone" name="no_handphone" placeholder="No Handphone" value="<?= $data_session['no_handphone'] ?>">

                                        <?= form_error('no_handphone', '<small class="text-danger">', '</small>'); ?>

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
                                <a role="button" href="<?= base_url('users/profile'); ?>" class="btn btn-default pull-right" style="margin-right: 10px;">Cancel</a>
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