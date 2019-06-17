
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Profile Account
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
                        <form class="form-horizontal" style="margin-top: 10px;">
                            <div class="box-body">
                                <div class="form-group">
                                    <label class="col-sm-2"></label>
                    
                                    <div class="col-sm-10">
                                        <img class="img-thumbnail" src="<?= base_url('assets/img/users/'.$data_session['photo_path']) ?>" alt="<?= $data_session['nama_depan'] . " " . $data_session['nama_belakang'] ?>" style="width:150px">
                                        <br>
                                        <a href="<?= base_url('users/profile/update/'.$this->session->userdata('id_user')) ?>" role="button" class="btn btn-success" style="margin-top:8px;">Edit</a>
                                        <a href="<?= base_url('users/profile/update_password/'.$this->session->userdata('id_user')) ?>" role="button" class="btn btn-primary" style="margin-top:8px;">Ubah Password</a>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Nama Lengkap :</label>
                    
                                    <div class="col-sm-10">
                                        <h4><?= $data_session['nama_depan'] . " " . $data_session['nama_belakang'] ?></h4>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Alamat :</label>
                    
                                    <div class="col-sm-10">
                                        <h4><?= ($data_session['alamat'] == NULL) ? 'Null' : $data_session['alamat']; ?></h4>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">No Telepon :</label>
                    
                                    <div class="col-sm-10">
                                        <h4><?= ($data_session['no_telp'] == NULL) ? 'Null' : $data_session['no_telp']; ?></h4>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">No Handphone :</label>
                    
                                    <div class="col-sm-10">
                                        <h4><?= ($data_session['no_handphone'] == NULL) ? 'Null' : $data_session['no_handphone']; ?></h4>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Email :</label>
                    
                                    <div class="col-sm-10">
                                        <h4><?= $data_session['email'] ?></h4>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Date Registered :</label>
                    
                                    <div class="col-sm-10">
                                        <h4><?= $data_session['tanggal_pendaftaran'] ?></h4>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </form>
                    </div>
                    <!-- /.box -->
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->