
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
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                <?= $this->session->flashdata('message'); ?>
                                
                                <?php if($data_session['id_position'] == 'POS01'): ?>

                                <a href="<?= base_url('admin/account/admin/add'); ?>" role="button" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah Admin</a>

                                <?php endif; ?>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="dataTable" class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Photo Profile</th>
                                            <th>Full Name</th>
                                            <th>Username</th>
                                            <th>Jabatan</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php foreach ($admin as $row) : ?>

                                        <tr <?php if ($row['id_admin'] == $this->session->id_admin) echo "hidden"; ?>>
                                            <td class="text-center">
                                                <img class="img-circle" src="<?= base_url('assets/img/admin/'. $row['photo_profile']) ?>" alt="Profile Picture" width="80" height="80" style="object-fit: contain;">
                                            </td>
                                            <td>
                                                
                                                <?= $row['firstname'] . " " . $row['lastname'] ?>
                                                
                                            </td>
                                            <td>

                                                <?php echo ($row['username'] == NULL) ? 'Null' : $row['username']?>
                                                    
                                            </td>
                                            <td>
                                                
                                                <?= $row['position_name'] ?>
                                                    
                                            </td>
                                            <td>
                                                <?php if ($row['admin_status']) : ?>

                                                <div class="alert alert-success" style="padding: 4px; text-align: center;">
                                                    <p>Aktif</p>
                                                </div>
                                                <?php else : ?>

                                                <div class="alert alert-warning" style="padding-top: 4px; padding-bottom: 4px; text-align: center;">
                                                    <p>Non Aktif</p>
                                                </div>
                                                <?php endif; ?>

                                            </td>
                                            <td width="140">
                                                <a href="<?= base_url('admin/account/admin/view/'.$row['id_admin']) ?>" role="button" class="btn btn-sm btn-purple"><i class="fa fa-eye"></i></a>

                                                <?php if($data_session['id_position'] == 'POS01'): ?>

                                                <a href="<?= base_url('admin/account/admin/status/').$row['id_admin'] ?>" role="button" class="btn btn-sm btn-warning" onclick="return confirm('Are you sure?')"><i class="fa fa-ban"></i></a>
                                                <a href="<?= base_url('admin/account/admin/update/'.$row['id_admin']) ?>" role="button" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
                                                <a href="<?= base_url('admin/account/admin/delete/').$row['id_admin'] ?>" role="button" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></a>

                                                <?php endif; ?>
                                                
                                            </td>
                                        </tr>

                                        <?php endforeach; ?>

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->