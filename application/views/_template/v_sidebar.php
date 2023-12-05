<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<a class="sidebar-brand d-flex align-items-center justify-content-center bg-gradient-primary" href="<?=base_url('dashboard'); ?>">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-chess-knight"></i>
    </div>
    <div class="sidebar-brand-text mx-3">d'Besto</div>
</a>

<!-- ... (your existing code) ... -->

<!-- Nav Item - Dashboard -->
<li class="nav-item bg-gradient-primary">
    <a class="nav-link" href="<?=base_url('dashboard'); ?>">
        <i class=" fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- ... (your existing code) ... -->

<!-- Nav Item - Barang -->
<li class="nav-item bg-gradient-primary">
    <a class="nav-link" href="<?= base_url('barang'); ?>">
        <i class="fa fa-cube"></i>
        <span>Barang</span>
    </a>
</li>

<!-- ... (your existing code) ... -->

<!-- Nav Item - Kategori -->
<li class="nav-item bg-gradient-primary">
    <a class="nav-link" href="<?= base_url('kategori'); ?>">
        <i class="fa fa-th-large"></i>
        <span>Kategori</span>
    </a>
</li>

<!-- ... (your existing code) ... -->

<!-- Nav Item - Manajemen Stok -->
<li class="nav-item bg-gradient-primary">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
        aria-expanded="false" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Manajemen Stok</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Flow</h6>
            <a class="collapse-item" href="<?= base_url(); ?>flow/masuk">Masuk</a>
            <a class="collapse-item" href="<?= base_url(); ?>flow/keluar">Keluar</a>
            <a class="collapse-item" href="<?= base_url(); ?>flow/riwayat">Riwayat</a>
        </div>
    </div>
</li>

</ul>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
$(document).ready(function() {
    // Add 'active' class to the initially selected menu item
    var initialUrl = window.location.href;
    $('.nav-item').each(function() {
        var menuItemUrl = $(this).find('a.nav-link').attr('href');
        if (initialUrl.includes(menuItemUrl) && menuItemUrl !== '') {
            $(this).addClass('active');
        }
    });

    // Handle click events for the navigation items
    $('.nav-item').click(function() {
        // Remove 'active' class from all menu items
        $('.nav-item').removeClass('active');

        // Add 'active' class to the clicked menu item (except for "Transaksi")
        if (!$(this).hasClass('nav-item-not-active')) {
            $(this).addClass('active');
        }
    });
});
</script>

