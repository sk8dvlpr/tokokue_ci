
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Update Password
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
                        <form action="" method="POST" class="form-horizontal" style="margin-top: 10px;">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="oldpassword" class="col-sm-2 control-label"><span class="text-danger">*</span> Old Password</label>
                    
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="oldpassword" name="oldpassword" placeholder="Old Password">

                                        <?= form_error('oldpassword', '<small class="text-danger">', '</small>'); ?>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="newpassword" class="col-sm-2 control-label"><span class="text-danger">*</span> New Password</label>
                    
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="newpassword" name="newpassword" placeholder="New Password">

                                        <?= form_error('newpassword', '<small class="text-danger">', '</small>'); ?>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="renewpassword" class="col-sm-2 control-label"><span class="text-danger">*</span> Repeat New Password</label>
                    
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="renewpassword" name="renewpassword" placeholder="Repeat New Password">

                                        <?= form_error('renewpassword', '<small class="text-danger">', '</small>'); ?>

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