
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Admin Account
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
                                        <img class="img-thumbnail" src="<?= base_url('assets/img/admin/'.$admin['photo_profile']) ?>" alt="<?= $admin['firstname'] . " " . $admin['lastname'] ?>" style="width:150px">

                                        <?= ($admin['admin_status'] == TRUE) ? '<div class="alert alert-success" style="width:150px;margin-top:8px;padding-top:5px;padding-bottom:5px;">Aktif</div>' : '<div class="alert alert-warning" style="width:150px;margin-top:8px;padding-top:5px;padding-bottom:5px;">Non Aktif</div>';  ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="position" class="col-sm-2 control-label">Position :</label>
                    
                                    <div class="col-sm-10">
                                        
                                        <h4><?= $admin['position_name'] ?></h4>
                                        
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="firstname" class="col-sm-2 control-label">Full Name :</label>
                    
                                    <div class="col-sm-10">
                                        <h4><?= $admin['firstname'] . " " . $admin['lastname']?></h4>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="username" class="col-sm-2 control-label">Username :</label>
                    
                                    <div class="col-sm-10">
                                        <h4><?= ($admin['username'] == NULL) ? 'Null' : $admin['username']; ?></h4>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">Email :</label>
                    
                                    <div class="col-sm-10">
                                        <h4><?= $admin['email'] ?></h4>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="date_created" class="col-sm-2 control-label">Date Created :</label>
                    
                                    <div class="col-sm-10">
                                        <h4><?= $admin['date_created'] ?></h4>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <a role="button" href="<?= base_url('admin/account/admin'); ?>" class="btn btn-default pull-right" style="margin-right: 10px;">Back</a>
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