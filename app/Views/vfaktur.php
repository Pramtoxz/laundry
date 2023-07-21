<!DOCTYPE html>
<html>

<head>
    <title>Cetak Faktur</title>
    <link rel="shortcut icon" href="<?= base_url(); ?>/assets/images/logo.png">
    <style type="text/css">
        .head {
            border-style: double;
            border-width: 3px;
            border-color: white;
        }

        .body {
            border-collapse: collapse;
            border: 1px;
            border-color: black;
        }

        table tr .text2 {
            text-align: right;
            font-size: 13px;
        }

        table tr .text {
            text-align: center;
            font-size: 13px;
        }

        table tr td {
            font-size: 13px;
        }
    </style>
</head>

<body>
    <center>
        <table class="head" width="680">
            <tr>
                <td>
                    <center>
                        <font size="4">Dinschuu  LAUNDRY</font><br>
                        <font size="2"><i>Email : Dinschuulaundry@gmail.com Telp./Whatsapp (0822) 45634577 </i></font>
                    </center>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <hr>
                </td>
            </tr>
        </table>
        <table class="head" style="margin-bottom: 20px;">
            <tr>
                <td>Faktur Barang Masuk</td>
            </tr>
        </table>
        <table class="head" style="margin-bottom: 20px;">
           
        </table>
        <table border="1" class="body" width="680">
            <thead>
                <tr style="height: 25px;">
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Jenis</th>
                    <th>Berat</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 0;
                foreach ($faktur->getResultObject() as $row) : $no++ 
              
                ?>
                <?php   $total = $row->berat_detail * $row->harga_detail;?>
                    <tr style="height: 20px; text-align: center;">
                        <td> <?= $row->notransaksi; ?></td>
                        <td> <?= $row->nama; ?></td>
                        <td><?= $row->berat_detail; ?> Kg</td>
                        <td>Rp. <?= number_format($row->harga_detail); ?></td>                       
                        <td>Rp.  <?= number_format($total); ?></td>                       
                    </tr>
                <?php endforeach; ?>

        </table>
        <table width="680" style="margin-top: 30px;">
            <tr style="text-align: right !important;">
                <td>Kota Padang, <?= date("d M Y"); ?></td>
            </tr>
            <tr style="text-align: right !important;">
                <td>Pimpinan</td>
            </tr>
            <tr style="text-align: right !important; height: 120px;">
                <td>(...........................................)</td>
            </tr>
        </table>
    </center>
</body>

<script>
    window.print();
</script>

</html>