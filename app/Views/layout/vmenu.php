<?= $this->extend('layout/vmain') ?>
<?= $this->section('vmenu') ?>

<?php $session = session();
$request = \Config\Services::request();

?>
<aside class="main-sidebar elevation-4 sidebar-dark-primary" style="background-color:black;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link " style="background-color:black;">
        <img src="<?= base_url() ?>/assets/dist/img/i.jpg" alt="Laundry" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-navy">Laundry Kevin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url() ?>/assets/dist/img/avatar2.png" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= " WELCOME : " . $session->get('namauser'); ?> </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <?php if ($session->get('level') == '1') { ?>
                <li class="nav-item">
                    <a href="<?= base_url('Beranda') ?>"
                        class="nav-link <?php if ($request->uri->getSegment(1) == 'Beranda') echo 'active'; ?>">
                        <i class="nav-icon fas fa-laptop-house"></i>
                        <p>
                            Beranda
                        </p>
                    </a>
                </li>
                <li
                    class="nav-item has-treeview <?php if ($request->uri->getSegment(1)  == 'kategori' || $request->uri->getSegment(1)  == 'konsumen' || $request->uri->getSegment(1)  == 'karyawan' || $request->uri->getSegment(1)  == 'user') echo 'menu-open'; ?>">
                    <a href="#"
                        class="nav-link <?php if ($request->uri->getSegment(1)  == 'kategori' || $request->uri->getSegment(1)  == 'konsumen' || $request->uri->getSegment(1)  == 'karyawan' || $request->uri->getSegment(1)  == 'user') echo 'active'; ?>">
                        <i class="nav-icon fas fa-book-open"></i>
                        <p>
                            Master
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('konsumen') ?>"
                                class="nav-link <?php if ($request->uri->getSegment(1) == 'konsumen') echo 'active'; ?>">
                                <i class="fas fa-user-plus nav-icon"></i>
                                <p>Data Konsumen</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('karyawan') ?>"
                                class="nav-link <?php if ($request->uri->getSegment(1) == 'karyawan') echo 'active'; ?>">
                                <i class="fas fa-user-plus nav-icon"></i>
                                <p>Data Karyawan</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?= base_url('kategori') ?>"
                                class="nav-link <?php if ($request->uri->getSegment(1) == 'tbl_kategori') echo 'active'; ?>">
                                <i class="fas fa-user-plus nav-icon"></i>
                                <p>Kategori</p>
                            </a>
                        </li>
                        <li class="nav-item">

                        <li class="nav-item">
                            <a href="<?= base_url('user') ?>"
                                class="nav-link <?php if ($request->uri->getSegment(1) == 'user') echo 'active'; ?>">
                                <i class="fas fa-user-tie nav-icon"></i>
                                <p>Data User</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li
                    class="nav-item has-treeview <?php if ($request->uri->getSegment(1)  == 'transaksi') echo 'menu-open'; ?>">
                    <a href="#"
                        class="nav-link <?php if ($request->uri->getSegment(1)  == 'transaksi') echo 'active'; ?>">
                        <i class="nav-icon fas fa-handshake"></i>
                        <p>
                            Transaksi
                            <i class="right fas fa-angle-left"></i>
                        </p>

                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('transaksi') ?>"
                                class="nav-link <?php if ($request->uri->getSegment(1)  == 'transaksi') echo 'active'; ?>">
                                <i class="fas fa-shopping-cart"></i>
                                <p>Pembayaran</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li
                    class="nav-item has-treeview <?php if ($request->uri->getSegment(1)  == 'transaksi') echo 'menu-open'; ?>">
                    <a href="#"
                        class="nav-link <?php if ($request->uri->getSegment(1)  == 'transaksi') echo 'active'; ?>">
                        <i class="nav-icon fas fa-handshake"></i>
                        <p>
                            laporan
                            <i class="right fas fa-angle-left"></i>
                        </p>

                    </a>
                    <ul class="nav nav-treeview">
                    <li class="nav-item">
                            <a href="<?= site_url('Laporan/laporan_karyawan') ?>" target="_blank"
                                class="nav-link <?php if ($request->uri->getSegment(2)  == 'laporan_mobil') echo 'active'; ?>">
                                <i class="fas fa-file-contract nav-icon"></i>
                                <p>Laporan Karyawan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= site_url('Laporan/laporan_kategori') ?>" target="_blank"
                                class="nav-link <?php if ($request->uri->getSegment(2)  == 'laporan_mobil') echo 'active'; ?>">
                                <i class="fas fa-file-contract nav-icon"></i>
                                <p>Laporan Kategori</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= site_url('Laporan/laporan_konsumen') ?>" target="_blank"
                                class="nav-link <?php if ($request->uri->getSegment(2)  == 'laporan_pelanggan') echo 'active'; ?>">
                                <i class="fas fa-file-contract nav-icon"></i>
                                <p>Laporan Konsumen</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= site_url('Laporan/tgllaporan') ?>"
                                class="nav-link <?php if ($request->uri->getSegment(2)  == 'tanggal_laporan') echo 'active'; ?>">
                                <i class="fas fa-file-contract nav-icon"></i>
                                <p>Laporan Data Transaksi</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <?php } else if ($session->get('level') == '2') { ?>
                <li class="nav-item">
                    <a href="<?= base_url('Beranda') ?>"
                        class="nav-link <?php if ($request->uri->getSegment(2) == 'Layout') echo 'active'; ?>">
                        <i class="nav-icon fas fa-laptop-house"></i>
                        <p>
                            Beranda
                        </p>
                    </a>
                </li>                <li
                    class="nav-item has-treeview <?php if ($request->uri->getSegment(2)  == 'transaksi') echo 'menu-open'; ?>">
                    <a href="#"
                        class="nav-link <?php if ($request->uri->getSegment(2)  == 'transaksi') echo 'active'; ?>">
                        <i class="nav-icon fas fa-handshake"></i>
                        <p>
                            Transaksi
                            <i class="right fas fa-angle-left"></i>
                        </p>

                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('transaksi') ?>"
                                class="nav-link <?php if ($request->uri->getSegment(2)  == 'transaksi') echo 'active'; ?>">
                                <i class="fas fa-shopping-cart"></i>
                                <p>Pembayaran</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li
                    class="nav-item has-treeview <?php if ($request->uri->getSegment(2)  == 'laporan_mobil' || $request->uri->getSegment(2)  == 'laporan_sopir' || $request->uri->getSegment(2)  == 'tanggal_laporan' || $request->uri->getSegment(2)  == 'laporan_pelanggan') echo 'menu-open'; ?>">
                    <a href="#"
                        class="nav-link <?php if ($request->uri->getSegment(2)  == 'laporan_mobil' || $request->uri->getSegment(2)  == 'laporan_sopir' || $request->uri->getSegment(2)  == 'tanggal_laporan' || $request->uri->getSegment(2)  == 'laporan_pelanggan') echo 'active'; ?>">
                        <i class="nav-icon fas fa-file"></i>
                        <p>
                            Laporan
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= site_url('Laporan/laporan_kategori') ?>" target="_blank"
                                class="nav-link <?php if ($request->uri->getSegment(2)  == 'laporan_mobil') echo 'active'; ?>">
                                <i class="fas fa-file-contract nav-icon"></i>
                                <p>Laporan Kategori</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= site_url('Laporan/laporan_konsumen') ?>" target="_blank"
                                class="nav-link <?php if ($request->uri->getSegment(2)  == 'laporan_pelanggan') echo 'active'; ?>">
                                <i class="fas fa-file-contract nav-icon"></i>
                                <p>Laporan Konsumen</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?= site_url('Laporan/tgllaporan') ?>"
                                class="nav-link <?php if ($request->uri->getSegment(2)  == 'tanggal_laporan') echo 'active'; ?>">
                                <i class="fas fa-file-contract nav-icon"></i>
                                <p>Laporan Data Transaksi</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <?php } ?>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<?= $this->endSection('') ?>