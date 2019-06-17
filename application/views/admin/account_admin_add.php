
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Add Admin Account
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-md-12">
                    <!-- Horizontal Form -->
                    <div class="box box-purple">

                        <?= $this->session->flashdata('message'); ?>
                        
                        <!-- form start -->
                        <form action="" method="POST" class="form-horizontal" style="margin-top: 10px;">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="position" class="col-sm-2 control-label"><span class="text-danger">*</span> Position</label>
                    
                                    <div class="col-sm-10">
                                        <select class="form-control" name="position" id="position">
                                            <option value="">Choose</option>

                                            <?php foreach ($admin_position as $position) : ?>

                                            <option value="<?= $position['id_position']; ?>"><?= $position['position_name']; ?></option>

                                            <?php endforeach; ?>

                                        </select>

                                        <?= form_error('position', '<small class="text-danger">', '</small>'); ?>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="firstname" class="col-sm-2 control-label"><span class="text-danger">*</span> Firstname</label>
                    
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Firstname" value="<?= set_value('firstname'); ?>">

                                        <?= form_error('firstname', '<small class="text-danger">', '</small>'); ?>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="lastname" class="col-sm-2 control-label">Lastname</label>
                    
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Lastname" value="<?= set_value('lastname'); ?>">

                                        <?= form_error('lastname', '<small class="text-danger">', '</small>'); ?>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label"><span class="text-danger">*</span> Email</label>
                    
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?= set_value('email'); ?>">

                                        <?= form_error('email', '<small class="text-danger">', '</small>'); ?>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password" class="col-sm-2 control-label"><span class="text-danger">*</span> Password</label>
                    
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">

                                        <?= form_error('password', '<small class="text-danger">', '</small>'); ?>

                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-purple pull-right">Save Data</button>
                                <a role="button" href="<?= base_url('admin/account/admin'); ?>" class="btn btn-default pull-right" style="margin-right: 10px;">Cancel</a>
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