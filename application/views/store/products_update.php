
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Update Data Product
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
                                    <label for="categories" class="col-sm-2 control-label"><span class="text-danger">*</span> Categories</label>
                    
                                    <div class="col-sm-10">
                                        <select class="form-control" name="categories" id="categories">
                                            <option value="">Categories</option>

                                            <?php foreach ($categories as $category) : ?>
                                            
                                            <option <?= ($data_product['kd_kategori_kue'] == $category['kd_kategori_kue']) ? 'selected' : ''; ?> value="<?= $category['kd_kategori_kue']; ?>"><?= $category['nama_kategori']; ?></option>

                                            <?php endforeach; ?>

                                        </select>

                                        <?= form_error('categories', '<small class="text-danger">', '</small>'); ?>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="productname" class="col-sm-2 control-label"><span class="text-danger">*</span> Nama Produk</label>
                    
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="productname" name="productname" placeholder="Nama Produk" value="<?= $data_product['nama_kue'] ?>">

                                        <?= form_error('productname', '<small class="text-danger">', '</small>'); ?>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="productdesc" class="col-sm-2 control-label"><span class="text-danger">*</span> Deskripsi Produk</label>
                    
                                    <div class="col-sm-10">                                        
                                        <textarea name="productdesc" id="productdesc" class="textarea form-control" placeholder="Deskripsi Produk" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= $data_product['deskripsi_kue'] ?></textarea>

                                        <?= form_error('productdesc', '<small class="text-danger">', '</small>'); ?>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="price" class="col-sm-2 control-label"><span class="text-danger">*</span> Harga</label>
                    
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="price" name="price" placeholder="Harga" value="<?= $data_product['harga_kue'] ?>">

                                        <?= form_error('price', '<small class="text-danger">', '</small>'); ?>

                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-purple pull-right">Save Data</button>
                                <a role="button" href="<?= base_url('store/products'); ?>" class="btn btn-default pull-right" style="margin-right: 10px;">Cancel</a>
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