<?= $this->extend('layout/vmain') ?>
<?= $this->extend('layout/vmenu') ?>

<?= $this->section('isi') ?>
<div class="row">
    <div class="col-sm-12">
        <h3>Transaksi Laundry </h3>
        <div class="card">
            <form method="POST" name="form_transaksi" action="<?= base_url('transaksi/save') ?>">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>No.Transaksi</label>
                                <input type="text" name="notransaksi" value="<?= date('YmdHis') ?>"
                                    class="form-control">
                            </div>

                        </div>
                        <div class="col-sm-3">

                            <!-- text input -->
                            <div class="form-group">
                                <label>Tanggal Transaksi</label>
                                <input type="date" name="tanggaltransaksi" class="form-control">
                            </div>

                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Tanggal Selesai</label>
                                <input type="date" name="tanggalselesai" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Nama Konsumen</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="hidden" id="idkon" readonly name="idkonsumen" class="form-control">
                                <input type="text" id="namakon" readonly class="form-control">
                            </div>
                            <div class="col-sm-6">
                                <button type="button" data-toggle="modal" data-target="#modaldatakonsumen"
                                    title="Cari Konsumen" class="btn btn-primary"><i class="fa fa-search"
                                        aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Kategori</label>
                        <div class="row">
                            <div class="col-sm-3">
                                <input type="hidden" readonly id="idkat" name="idkategori" class="form-control">
                                <input type="text" readonly id="kodekat" name="kodekat" class="form-control">
                            </div>
                            <div class="col-sm-3">
                                <input type="text" placeholder="" id="namakat" name="nama_kat" readonly
                                    class="form-control">
                            </div>

                            <div class="col-sm-3">
                                <input type="text" placeholder="" id="jeniskat" name="jenis_kat" readonly
                                    class="form-control">
                            </div>

                            <div class="col-sm-3">
                                <input type="text" placeholder="" id="hargakat" name="harga" readonly
                                    class="form-control">
                            </div>
                            <div class="col-sm-3">
                                <button type="button" data-toggle="modal" data-target="#modaldatakategori"
                                    title="Cari Kategori" class="btn btn-primary"><i class="fa fa-search"
                                        aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label>Berat (Per Kilo)</label>
                            <div class="col-sm-2">
                                <input type="text" onkeyup="gantiHarga()" name="berat" id="berat" class="form-control">
                            </div>
                            <label>Harga Total</label>
                            <div class="col-sm-2">
                                <input type="text" readonly name="total" id="total" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            <a href=""><button type="button" class="btn btn-primary" onclick="simpanTem()"
                                    title="Tambah Transaksi"><i class="fa fa-plus" aria-hidden="true"></i></button></a>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12" id="data_sementara">
                    <div class="box-body table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>

                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Jenis</th>
                                    <th>Berat</th>
                                    <th>Harga</th>
                                    <th>Total Harga</th>
                                    <th width="150">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="dataTemp">
                                <?php foreach ($temp as $data) {
                                    $total  = $data['hargatemp'] * $data['berattemp'];
                                ?>
                                <tr>
                                    <td><?= $data['kdtemp'] ?></td>
                                    <td><?= $data['namatemp'] ?></td>
                                    <td><?= $data['jenistemp'] ?></td>
                                    <td><?= $data['berattemp'] ?></td>
                                    <td><?= "Rp. " . number_format($data['hargatemp']) ?></td>
                                    <td><?= "Rp. " . number_format($total) ?></td>
                                    <td style="text-align: center;">
                                        <a class="btn-sm btn-danger btn-delete" data-id="<?= $data['kdtemp']; ?>"><i
                                                class=" fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Transaksi</button>
                <button type="button" class="btn btn-secondary" data-dismiss="vtransaksi">Close</button>
        </div>

        </form>
    </div>
</div>
</div>




<div class="modal fade" id="modaldatakonsumen">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Konsumen</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                <table id="datakonsumen" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Konsumen</th>
                            <th>Nama Konsumen</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        foreach ($data_konsumen as $d) :
                            $no++; ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $d['kodekonsumen']; ?></td>
                            <td><?php echo $d['namakonsumen']; ?></td>
                            <td>
                                <button type="button" class="btn btn-primary"
                                    onclick="return pilihkonsumen('<?php echo $d['kodekonsumen'] ?>','<?php echo $d['namakonsumen'] ?>')">
                                    <i class="fa fa-check-circle" aria-hidden="true"></i>
                                </button>
                            </td>
                        </tr>
                        <?php
                        endforeach;
                        ?>
                    </tbody>
                </table>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modaldatakategori">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Kategori</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                <table id="datakategori" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode </th>
                            <th>Nama</th>
                            <th>Jenis</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        foreach ($data_kategori as $d) :
                            $no++; ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $d['id']; ?></td>
                            <td><?php echo $d['kode']; ?></td>
                            <td><?php echo $d['jenis']; ?></td>
                            <td><?php echo $d['nama']; ?></td>
                            <td><?php echo $d['harga']; ?></td>
                            <td>
                                <button type="button" class="btn btn-primary"
                                    onclick="return pilihkategori('<?php echo $d['id'] ?>','<?php echo $d['kode'] ?>','<?php echo $d['nama'] ?>','<?php echo $d['jenis'] ?>','<?php echo $d['harga'] ?>')">
                                    <i class="fa fa-check-circle" aria-hidden="true"></i>
                                </button>
                            </td>
                        </tr>
                        <?php
                        endforeach;
                        ?>
                    </tbody>
                </table>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<form id="formDelete" method="POST">
    <?= csrf_field(); ?>
    <div class="modal" tabindex="-1" id="deleteModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="id" name="id" id="id" required />
                    <h6>Yakin ingin menghapus data ini?</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <button type="button" onclick="ajaxDelete()" class="btn btn-danger mt-2 mb-2 mr-2">Yakin</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
$('.btn-delete').on('click', function() {
    const id = $(this).data('id');
    $('.id').val(id);
    $('#deleteModal').modal('show');
});

function reload() {
    $.ajax({
        url: "<?= base_url('Transaksi/LoadTemp') ?>",
        beforeSend: function(f) {
            $('#dataTemp').html(`<div class="text-center">
                Mencari data...
                </div>`);
        },
        success: function(data) {
            $('#dataTemp').html(data);
        }
    });
}

function simpanTem() {

    var kodekat = $('#kodekat').val();
    var namakat = $('#namakat').val();
    var jeniskat = $('#jeniskat').val();
    var beratkat = $('#berat').val();
    var hargakat = $('#hargakat').val();

    $.ajax({
        method: 'POST',
        url: '<?= base_url('Transaksi/SimpanTem') ?>',
        data: {
            'kodekat': kodekat,
            'namakat': namakat,
            'jenis': jeniskat,
            'berat': beratkat,
            'harga': hargakat,
        },
        dataType: 'JSON',
        cache: false,
        success: function(data) {
            reload();
            kosong();
        }
    });

}

function ajaxDelete() {
    $.ajax({
        url: "<?= base_url('Transaksi/DeleteTemp'); ?>",
        type: "POST",
        data: $("#formDelete").serialize(),
        success: function(data) {
            $('#deleteModal').modal('hide');
            reload();
            kosong();
        }
    });
}




function pilihkonsumen(id, nama) {
    $('#idkon').val(id);
    $('#namakon').val(nama);
    $('#modaldatakonsumen').modal('hide');
}

function pilihkategori(id, kode, nama, jenis, harga) {
    $('#idkat').val(id);
    $('#kodekat').val(kode);
    $('#namakat').val(nama);
    $('#jeniskat').val(jenis);
    $('#hargakat').val(harga);
    $('#modaldatakategori').modal('hide');
}

function gantiHarga() {
    var harga = $('#hargakat').val();
    var berat = $('#berat').val();

    var total = harga * berat;

    $('#total').val(total);

}

function kosong() {
    $('#kodekat').val('');
    $('#namakat').val('');
    $('#jeniskat').val('');
    $('#berat').val('');
    $('#hargakat').val('');
}
</script>

<?= $this->endSection('') ?>