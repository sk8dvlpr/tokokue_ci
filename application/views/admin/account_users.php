
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Users Account
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="">

                                <?= $this->session->flashdata('message'); ?>

                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="dataTable" class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Photo Profile</th>
                                            <th>Full Name</th>
                                            <th>No Handphone</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php foreach ($users as $user) : ?>

                                        <tr>
                                            <td style="text-align:center;"><img class="img-circle" src="<?= base_url('assets/img/users/'. $user['photo_path']) ?>" alt="<?= $user['nama_depan'] . " " . $user['nama_belakang'] ?>" width="80" height="80" style="object-fit: contain;"></td>
                                            <td><?= $user['nama_depan'] . " " . $user['nama_belakang'] ?></td>
                                            <td><?= $user['no_handphone'] ?></td>
                                            <td><?= $user['email'] ?></td>
                                            <td>
                                                <?php if ($user['status_user']) : ?>

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
                                                <a href="<?= base_url('admin/account/user/view/'.$user['id_user']) ?>" role="button" class="btn btn-sm btn-purple"><i class="fa fa-eye"></i></a>
                                                <a href="<?= base_url('admin/account/user/status/').$user['id_user'] ?>" role="button" class="btn btn-sm btn-warning" onclick="return confirm('Are you sure?')"><i class="fa fa-ban"></i></a>

                                                <?php if($data_session['id_position'] == 'POS01'): ?>

                                                <a href="<?= base_url('admin/account/user/delete/').$user['id_user'] ?>" role="button" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></a>
                                                
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