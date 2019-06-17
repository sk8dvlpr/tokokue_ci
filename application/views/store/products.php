
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Products
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">

                                <?= $this->session->flashdata('message'); ?>

                                <a href="<?= base_url('store/products/add'); ?>" role="button" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah Produk</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="dataTable" class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Photo Produk</th>
                                            <th>Nama Produk</th>
                                            <th>Deskripsi</th>
                                            <th>Harga</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php if(is_array($products)): ?>
                                        <?php foreach ($products as $product): ?>

                                        <tr>
                                            <td style="text-align:center;"><img class="img-circle" src="<?= base_url('assets/img/cake/'. $product['photo_path']) ?>" alt="<?= $product['nama_kue'] ?>" style="width: 50px"></td>
                                            <td><?= $product['nama_kue'] ?></td>
                                            <td><?php echo ($product['deskripsi_kue'] == NULL) ? 'Null' : substr($product['deskripsi_kue'], 0, 150) ?>...</td>
                                            <td width="100"><?= "Rp. ".number_format($product['harga_kue']) ?></td>
                                            <td>
                                                <?php if ($product['status_kue']) : ?>

                                                <div class="alert alert-success" style="padding: 4px; text-align: center;">
                                                    <p>Publikasi</p>
                                                </div>
                                                <?php else : ?>

                                                <div class="alert alert-warning" style="padding-top: 4px; padding-bottom: 4px; text-align: center;">
                                                    <p>Tidak publikasi</p>
                                                </div>
                                                <?php endif; ?>

                                            </td>
                                            <td width="150">
                                                <a href="<?= base_url('store/products/view/'.$product['kd_kue']) ?>" role="button" class="btn btn-sm btn-purple"><i class="fa fa-eye"></i></a>
                                                <a href="<?= base_url('store/products/status/').$product['kd_kue'] ?>" role="button" class="btn btn-sm btn-warning" onclick="return confirm('Are you sure?')"><i class="fa fa-ban"></i></a>
                                                <a href="<?= base_url('store/products/update/'.$product['kd_kue']) ?>" role="button" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
                                                <a href="<?= base_url('store/products/delete/').$product['kd_kue'] ?>" role="button" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></a>
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