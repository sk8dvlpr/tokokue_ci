
    <section class="main-content my-4">
        <div class="container">

            <?php echo $this->session->flashdata('message'); ?>
            
            <div class="row m-0">

                <?php if ($products): ?>
                <?php foreach ($products as $product) : ?>

                    <div class="col-lg-3 col-md-4 col-6">
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
                <?php endif; ?>

            </div>

            <center>
                <a role="button" href="<?php echo base_url('home/category'); ?>" class="btn btn-sm btn-purple my-3">Lihat Selengkapnya >></a>        
            </center>  
        </div>
    </section>