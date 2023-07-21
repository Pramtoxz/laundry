<?= $this->extend('layout/vmain') ?>
<?= $this->extend('layout/vmenu') ?>
<?php $session = session();
$request = \Config\Services::request();?>
<?= $this->section('isi') ?>




<!-- Main content -->
<?php if ($session->get('level') == '1') { ?>
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3></h3>

                        <p><center>Konsumen</center></p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <a href="<?= site_url('konsumen') ?>" class="small-box-footer">Data Konsumen <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><sup style="font-size: 20px"></sup></h3>

                        <p><center>Karyawan</center></p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <a href="<?= site_url('karyawan') ?>" class="small-box-footer">Silahkan Klik DIsini <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3></h3>

                        <p><center>User</center></p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <a href="<?= site_url('user') ?>" class="small-box-footer">Menuju User <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3></h3>

                        <p><center> Data Satuan</center></p>
                    </div>
                    <div class="icon">
                        <i class="far fa-calendar-alt">
                        
                        </i>
                    </div>
                    <a href="<?= site_url('kategori') ?>" class="small-box-footer">More info Satuan<i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

             <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3></h3>

                        <p><center>Laporan Satuan</center></p>
                    </div>
                    <div class="icon">
                        <i class="far fa-copy"></i>
                    </div>
                    <a href="<?= site_url('laporan/laporan_kategori') ?>" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><sup style="font-size: 20px"></sup></h3>

                        <p><center>Laporan Transaksi</center></p>
                    </div>
                    <div class="icon">
                        <i class="far fa-copy"></i>
                    </div>
                    <a href="<?= site_url('laporan/tgllaporan') ?>" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3></h3>

                        <p><center>Laporan Konsumen</center></p>
                    </div>
                    <div class="icon">
                        <i class="far fa-copy"></i>
                    </div>
                    <a href="<?= site_url('laporan/laporan_konsumen') ?>" class="small-box-footer">Silahkan Klik Disini <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-12 col-12">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3></h3>

                       <span style="font-size: 20pt; font-weight: bold; color: white;"><center>Transaksi Laundry </center></span><br>
                    </div>
                    <div class="icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <a href="<?= site_url('transaksi') ?>" class="small-box-footer">AYO SINI<i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>

       

        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>


<?php } else if ($session->get('level') == '2') { ?>
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
             <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3></h3>

                        <p><center>Laporan Satuan</center></p>
                    </div>
                    <div class="icon">
                        <i class="far fa-copy"></i>
                    </div>
                    <a href="<?= site_url('laporan/laporan_kategori') ?>" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><sup style="font-size: 20px"></sup></h3>

                        <p><center>Laporan Transaksi</center></p>
                    </div>
                    <div class="icon">
                        <i class="far fa-copy"></i>
                    </div>
                    <a href="<?= site_url('laporan/tgllaporan') ?>" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3></h3>

                        <p><center>Laporan Konsumen</center></p>
                    </div>
                    <div class="icon">
                        <i class="far fa-copy"></i>
                    </div>
                    <a href="<?= site_url('laporan/laporan_konsumen') ?>" class="small-box-footer">Silahkan Klik Disini <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-12 col-12">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3></h3>

                       <span style="font-size: 20pt; font-weight: bold; color: white;"><center>Transaksi Laundry </center></span><br>
                    </div>
                    <div class="icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <a href="<?= site_url('transaksi') ?>" class="small-box-footer">AYO SINI<i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>

       

        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
<?php } ?>
<!-- /.content -->


<?= $this->endsection('') ?>