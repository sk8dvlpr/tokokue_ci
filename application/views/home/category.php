
    <section class="main-content my-4">
        <div class="container">

            <?php echo $this->session->flashdata('message'); ?>
            
            <div class="row m-0">

                <div class="col-lg-3">
                    <div class="card mt-2">
                        <div class="card-body">
                            <h5>Filter Produk</h5>

                            <form action="<?php echo base_url('home/filter'); ?>" method="POST" class="pt-2">
                                
                                <div class="form-group">
                                    <label for="category">Kategori kue :</label>
                                    <select class="form-control" id="category" name="category">
                                        
                                        <option value="">Pilih</option>

                                        <?php if ($categories): ?>
                                        <?php foreach ($categories as $category) : ?>

                                        <option value="<?php echo $category['kd_kategori_kue'] ?>"><?php echo $category['nama_kategori'] ?></option>

                                        <?php endforeach; ?>
                                        <?php endif; ?>

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="price">Harga :</label>
                                    <select class="form-control" id="price" name="price">
                                        <option value="">Pilih</option>
                                        <option value="asc">Minimum - Maksimum</option>
                                        <option value="desc">Maksimum - Minimum</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="date">Tanggal ditambah :</label>
                                    <select class="form-control" id="date" name="date">
                                        <option value="">Pilih</option>
                                        <option value="asc">Terlama - Terbaru</option>
                                        <option value="desc">Terbaru - Terlama</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-block btn-purple">Filter Sekarang</button>
                            </form>
                        </div>
                    </div>        
                </div>

                <div class="col-lg-9">
                
                    <div class="row">

                    <?php if ($products): ?>
                    <?php foreach ($products as $product) : ?>

                        <div class="col-lg-4 col-md-4 col-6">
                            <div class="card my-2">
                                <img class="card-img-top" src="<?= base_url('assets/img/cake/'. $product['photo_path']) ?>" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title m-0"><?= $product['nama_kue'] ?></h5>
                                    <small><i><?php echo $product['nama_kategori'] ?></i></small>
                                    <p class="card-price">Rp. <?= number_format($product['harga_kue']) ?></p>

                                    <?php if ($this->session->has_userdata('id_toko') || $this->session->has_userdata('id_user')): ?>

                                        <?php if ($this->session->has_userdata('id_toko')) : ?>

                                        <a href="<?= base_url('home/detail/'. $product['kd_kue']) ?>" class="btn btn-sm btn-purple col-12">Detail</a>

                                        <?php else: ?>
                                        
                                        <a href="<?= base_url('home/detail/'. $product['kd_kue']) ?>" class="btn btn-sm btn-purple col-9">Detail</a>
                                        <a role="button" href="<?= base_url('home/add_cart/'. $product['kd_kue']) ?>" class="btn btn-sm btn-outline-purple col-2 ml-2" onclick="return confirm('Apakah anda ingin menambahkan ke dalam keranjang?')"><i class="fa fa-shopping-cart"></i></a>

                                        <?php endif; ?>

                                    <?php else: ?>

                                    <a href="<?= base_url('home/detail/'. $product['kd_kue']) ?>" class="btn btn-sm btn-purple col-9">Detail</a>
                                    <a role="button" href="<?= base_url('home/add_cart/'. $product['kd_kue']) ?>" class="btn btn-sm btn-outline-purple col-2 ml-2" onclick="return confirm('Apakah anda ingin menambahkan ke dalam keranjang?')"><i class="fa fa-shopping-cart"></i></a>

                                    <?php endif; ?>
                                </div>
                                <div class="card-footer text-muted">
                                    <small>Ditambah pada <?php echo substr($product['tanggal_ditambah'], 0, 10); ?></small>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>
                    <?php else: ?>

                        <div class="col-lg-12">
                            <p class="text-center text-muted"><i>Data Tidak Tersedia.</i></p>
                        </div>

                    <?php endif; ?>

                    </div>

                    <?php echo $halaman; ?>
                    
                </div>              

            </div>
        </div>
    </section>