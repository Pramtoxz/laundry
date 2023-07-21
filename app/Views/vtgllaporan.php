<?= $this->extend('layout/vmain') ?>
<?= $this->extend('layout/vmenu') ?>
<?= $this->section('isi') ?>
<div class="row">
    <div class="col-sm-12">
        <h3>Laporan Transaksi Priode </h3>
        <div class="card">
            <form method="POST" action="<?= site_url('Laporan/laporanTransaksiPeriode') ?>" target="_blank">
                <div class="card-body">
                    <div class="form-group">
                        <label>Tanggal Awal</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="date" name="tglawal" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Akhir</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="date" name="tglakhir" class="form-control">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-info">Cetak</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection('') ?>