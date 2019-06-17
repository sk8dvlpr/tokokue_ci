    
    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?= base_url('assets/img/admin/'.$data_session['photo_profile']); ?>" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p><?= $data_session['firstname'] ?></p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>
                <li>
                    <a href="<?= base_url('admin/dashboard'); ?>">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-users"></i>
                        <span>Account</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?= base_url('admin/account/admin'); ?>"><i class="fa fa-circle-o"></i> Admin</a></li>
                        <li><a href="<?= base_url('admin/account/store'); ?>"><i class="fa fa-circle-o"></i> Store</a></li>
                        <li><a href="<?= base_url('admin/account/users'); ?>"><i class="fa fa-circle-o"></i> Users</a></li>
                    </ul>
                </li>
                <li>
                    <a href="<?= base_url('admin/transactions'); ?>">
                        <i class="fa fa-shopping-cart"></i>
                        <span>Transaksi</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('admin/profile'); ?>">
                        <i class="fa fa-user"></i> <span>Profile</span>
                    </a>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>