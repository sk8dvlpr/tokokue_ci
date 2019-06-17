
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Carts
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">

                                <?= $this->session->flashdata('message'); ?>

                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="dataTable" class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Photo Produk</th>
                                            <th>Nama Produk</th>
                                            <th>Nama Toko</th>
                                            <th>Harga</th>
                                            <th>No Hp / Telp Toko</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php if(is_array($carts)): ?>
                                        <?php foreach ($carts as $cart): ?>

                                        <tr>
                                            <td style="text-align:center;"><img class="img-circle" src="<?= base_url('assets/img/cake/'. $cart['photo_path']) ?>" alt="<?= $cart['nama_kue'] ?>" style="width: 50px"></td>
                                            <td><?= $cart['nama_kue'] ?></td>
                                            <td><?= $cart['nama_toko'] ?></td>
                                            <td width="100"><?= "Rp. ".number_format($cart['harga_kue']) ?></td>
                                            <td><?= $cart['no_handphone'] . " / " . $cart['no_telp'] ?></td>
                                            <td>
                                                
                                                <?php if ($cart['status_keranjang']) : ?>

                                                <div class="alert alert-warning" style="padding: 4px; text-align: center;">
                                                    <p>Pending</p>
                                                </div>

                                                <?php endif; ?>

                                            </td>
                                            <td width="150">
                                                <a href="<?= base_url('users/carts/order/').$cart['id_keranjang'] ?>" role="button" class="btn btn-sm btn-primary" onclick="return confirm('Are you sure?')"><i class="fa fa-check"></i> Pesan Sekarang</a>
                                                <a href="<?= base_url('users/carts/delete/').$cart['id_keranjang'] ?>" role="button" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>

                                        <?php endforeach; ?>
                                        <?php endif; ?>

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