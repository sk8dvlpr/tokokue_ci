
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                User Account
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-md-12">
                    <!-- Horizontal Form -->

                    <div class="box box-purple">
                        
                        <!-- form start -->
                        <form class="form-horizontal" style="margin-top: 10px;">
                            <div class="box-body">
                                <div class="form-group">
                                    <label class="col-sm-2"></label>
                    
                                    <div class="col-sm-10">
                                        <img class="img-thumbnail" src="<?= base_url('assets/img/users/'.$user['photo_path']) ?>" alt="<?= $user['nama_depan'] . " " . $user['nama_belakang'] ?>" style="width:150px">

                                        <?= ($user['status_user'] == TRUE) ? '<div class="alert alert-success" style="width:150px;margin-top:8px;padding-top:5px;padding-bottom:5px;">Aktif</div>' : '<div class="alert alert-warning" style="width:150px;margin-top:8px;padding-top:5px;padding-bottom:5px;">Non Aktif</div>';  ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Full Name :</label>
                    
                                    <div class="col-sm-10">
                                        <h4><?= $user['nama_depan'] . " " . $user['nama_belakang']?></h4>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Address :</label>
                    
                                    <div class="col-sm-10">
                                        <h4><?= ($user['alamat'] == NULL) ? 'Null' : $user['alamat']; ?></h4>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Telephone Number :</label>
                    
                                    <div class="col-sm-10">
                                        <h4><?= ($user['no_telp'] == NULL) ? 'Null' : $user['no_telp']; ?></h4>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Mobile Number :</label>
                    
                                    <div class="col-sm-10">
                                        <h4><?= $user['no_handphone'] ?></h4>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Email :</label>
                    
                                    <div class="col-sm-10">
                                        <h4><?= $user['email'] ?></h4>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Date Registered :</label>
                    
                                    <div class="col-sm-10">
                                        <h4><?= $user['tanggal_pendaftaran'] ?></h4>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <a role="button" href="<?= base_url('admin/account/users'); ?>" class="btn btn-default pull-right" style="margin-right: 10px;">Back</a>
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