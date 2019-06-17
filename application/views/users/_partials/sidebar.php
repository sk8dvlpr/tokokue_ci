    
    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?= base_url('assets/img/users/'.$data_session['photo_path']); ?>" class="img-circle" alt="User Image" style="height:50px;width:50px;">
                </div>
                <div class="pull-left info">
                    <p><?= $data_session['nama_depan'] . " " . $data_session['nama_belakang'] ?></p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>
                <li>
                    <a href="<?= base_url('users/dashboard'); ?>">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('users/carts') ?>">
                        <i class="fa fa-shopping-cart"></i>
                        <span>Keranjang</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('users/transactions') ?>">
                        <i class="fa fa-shopping-cart"></i>
                        <span>Transaksi</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('users/profile') ?>">
                        <i class="fa fa-user"></i> <span>Profile</span>
                    </a>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>