
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Add Product
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
                        <form action="" method="POST" class="form-horizontal" style="margin-top: 10px;" enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="categories" class="col-sm-2 control-label"><span class="text-danger">*</span> Categories</label>
                    
                                    <div class="col-sm-10">
                                        <select class="form-control" name="categories" id="categories">
                                            <option value="">Pilih</option>

                                            <?php foreach ($categories as $category) : ?>

                                            <option value="<?= $category['kd_kategori_kue']; ?>"><?= $category['nama_kategori']; ?></option>

                                            <?php endforeach; ?>

                                        </select>

                                        <?= form_error('categories', '<small class="text-danger">', '</small>'); ?>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="productname" class="col-sm-2 control-label"><span class="text-danger">*</span> Nama Produk</label>
                    
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="productname" name="productname" placeholder="Nama Produk" value="<?= set_value('productname'); ?>">

                                        <?= form_error('productname', '<small class="text-danger">', '</small>'); ?>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="productdesc" class="col-sm-2 control-label"><span class="text-danger">*</span> Deskripsi Produk</label>
                    
                                    <div class="col-sm-10">
                                        <textarea name="productdesc" id="productdesc" class="form-control" placeholder="Deskripsi Produk"><?= set_value('productdesc'); ?></textarea>

                                        <?= form_error('productdesc', '<small class="text-danger">', '</small>'); ?>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="price" class="col-sm-2 control-label"><span class="text-danger">*</span> Harga</label>
                    
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="price" name="price" placeholder="Harga" value="<?= set_value('price'); ?>">

                                        <?= form_error('price', '<small class="text-danger">', '</small>'); ?>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="photo" class="col-sm-2 control-label"><span class="text-danger">*</span> Foto Produk</label>
                    
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" id="photo" name="photo" placeholder="Foto Produk">

                                        <?= form_error('photo', '<small class="text-danger">', '</small>'); ?>

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