    
    <section class="main-content my-4">
        <div class="container">
            <div class="row m-0 my-4">
                <div class="col-lg-4">
                    <img src="<?= base_url('assets/img/cake/'. $product['photo_path']) ?>" alt="<?= $product['nama_kue'] ?>" class="img-thumbnail" width="100%">

                    <div class="info-product p-3">
                        <p><strong>Nama Toko :</strong> <?php echo $product['nama_toko'] ?></p> 
                        <p><strong>Alamat Toko :</strong> <?php echo $product['alamat_toko'] ?></p> 
                        <p><strong>No Telp :</strong> <?php echo ($product['no_telp'] == NULL) ? "-" : $product['no_telp'] ; ?></p> 
                        <p><strong>No Hp :</strong> <?php echo $product['no_handphone'] ?></p> 
                        <p><strong>Email :</strong> <?php echo $product['email'] ?></p> 
                    </div>
                </div>
                <div class="col-lg-8">
                    <h1><?= strtoupper($product['nama_kue']); ?></h1>
                    <h5><i><?php echo $product['nama_kategori'] ?></i></h5>
                    <h5 class="card-price">Rp. <?= number_format($product['harga_kue']) ?></h5>
                    <a href="<?= base_url('home/add_cart/'. $product['kd_kue']) ?>" class="btn btn-outline-purple mt-2 mb-3"><i class="fa fa-shopping-cart"></i> Tambah ke Keranjang</a>
                    <a href="#" class="btn btn-outline-secondary mt-2 mb-3"><i class="fa fa-heart"></i> Suka</a>

                    <article>
                        Deskripsi Produk :

                        <?= $product['deskripsi_kue'] ?>

                    </article>
                </div>
            </div>
        </div>
    </section>