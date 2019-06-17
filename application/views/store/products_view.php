
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Detail Product
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
                                        <img class="img-thumbnail" src="<?= base_url('assets/img/cake/'.$data_product['photo_path']) ?>" alt="<?= $data_product['nama_kue']  ?>" style="width:150px">

                                        <?= ($data_product['status_kue'] == TRUE) ? '<div class="alert alert-success" style="width:150px;margin-top:8px;padding-top:5px;padding-bottom:5px;">Di Publikasi</div>' : '<div class="alert alert-warning" style="width:150px;margin-top:8px;padding-top:5px;padding-bottom:5px;">Tidak di Publikasi</div>';  ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="categories" class="col-sm-2 control-label">Categories :</label>
                    
                                    <div class="col-sm-10">
                                        
                                        <h4><?= $data_product['nama_kategori']; ?></h4>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="productname" class="col-sm-2 control-label">Nama Produk :</label>
                    
                                    <div class="col-sm-10">
                                        <h4><?= $data_product['nama_kue'] ?></h4>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="productdesc" class="col-sm-2 control-label">Deskripsi Produk :</label>
                    
                                    <div class="col-sm-10">
                                        <h4><?= $data_product['deskripsi_kue'] ?></h4>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="price" class="col-sm-2 control-label">Harga :</label>
                    
                                    <div class="col-sm-10">
                                        <h4>Rp. <?= number_format($data_product['harga_kue']) ?></h4>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="date_created" class="col-sm-2 control-label">Date Created :</label>
                    
                                    <div class="col-sm-10">
                                        <h4><?= $data_product['tanggal_ditambah'] ?></h4>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <a role="button" href="<?= base_url('store/products'); ?>" class="btn btn-default pull-right" style="margin-right: 10px;">Back</a>
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