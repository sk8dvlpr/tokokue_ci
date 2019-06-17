
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
                                    <label for="firstname" class="col-sm-2 control-label"><span class="text-danger">*</span> Firstname</label>
                    
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Firstname" value="<?= $admin['firstname'] ?>">

                                        <?= form_error('firstname', '<small class="text-danger">', '</small>'); ?>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="lastname" class="col-sm-2 control-label">Lastname</label>
                    
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Lastname" value="<?= $admin['lastname'] ?>">

                                        <?= form_error('lastname', '<small class="text-danger">', '</small>'); ?>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="username" class="col-sm-2 control-label">Username</label>
                    
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?= $admin['username'] ?>">

                                        <?= form_error('username', '<small class="text-danger">', '</small>'); ?>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label"><span class="text-danger">*</span> Email</label>
                    
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?= $admin['email'] ?>">

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
                                <a role="button" href="<?= base_url('admin/profile'); ?>" class="btn btn-default pull-right" style="margin-right: 10px;">Cancel</a>
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