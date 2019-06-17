    
    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?= base_url('assets/img/store/'.$data_session['photo_path']); ?>" class="img-circle" alt="User Image" style="height:50px;width:50px;object-fit: contain;">
                </div>
                <div class="pull-left info">
                    <p><?= $data_session['nama_toko'] ?></p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>
                <li>
                    <a href="<?= base_url('store/dashboard'); ?>">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('store/products') ?>">
                        <i class="fa fa-birthday-cake"></i>
                        <span>Produk</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('store/transactions') ?>">
                        <i class="fa fa-shopping-cart"></i>
                        <span>Transaksi</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('store/profile') ?>">
                        <i class="fa fa-user"></i> <span>Profile</span>
                    </a>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>