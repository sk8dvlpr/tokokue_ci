
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
                                        <img class="img-thumbnail" src="<?= base_url('assets/img/admin/'.$admin['photo_profile']) ?>" alt="<?= $admin['firstname'] . " " . $admin['lastname'] ?>" style="width:150px">
                                        <br>
                                        <a href="<?= base_url('admin/profile/update/'.$this->session->userdata('id_admin')) ?>" role="button" class="btn btn-success" style="margin-top:8px;">Edit</a>
                                        <a href="<?= base_url('admin/profile/update_password/'.$this->session->userdata('id_admin')) ?>" role="button" class="btn btn-primary" style="margin-top:8px;">Ubah Password</a>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Full Name :</label>
                    
                                    <div class="col-sm-10">
                                        <h4><?= $admin['firstname'] . " " . $admin['lastname']?></h4>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Jabatan :</label>
                    
                                    <div class="col-sm-10">
                                        <h4><?= $admin['position_name'] ?></h4>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Username :</label>
                    
                                    <div class="col-sm-10">
                                        <h4><?= ($admin['username'] == NULL) ? 'Null' : $admin['username']; ?></h4>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Email :</label>
                    
                                    <div class="col-sm-10">
                                        <h4><?= $admin['email'] ?></h4>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Date Registered :</label>
                    
                                    <div class="col-sm-10">
                                        <h4><?= $admin['date_created'] ?></h4>
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