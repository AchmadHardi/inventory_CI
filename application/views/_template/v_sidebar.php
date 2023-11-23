<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-chess-knight"></i>
        </div>
        <div class="sidebar-brand-text mx-3">d'Besto</div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('transaksi'); ?>">
            <i class="fa fa-tachometer"></i>
            <span>Transaksi</span>
        </a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('barang'); ?>">
            <i class="fa fa-cube"></i>
            <span>Barang</span>
        </a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('kategori'); ?>">
            <i class="fa fa-th-large"></i>
            <span>Kategori</span>
        </a>
    </li>

</ul>
<!-- End of Sidebar -->