<!DOCTYPE>
<html>

<head>
    <meta charset="UTF-8">
    <title>Laporan Transaksi</title>
</head>

<body onload="window.print();">
    <div align="center">
        <table style="border-collapse: collapse; width: 96%" border="1">
            <tr>
                <td align="center">
                    <table style="border-collapse: collapse; width: 90%;" border="0">
                        <tr>
                            <td style="text-align: center;">
                                <span style="font-size: 27pt; font-weight: bold; color: navy;">Laundry Kevin</span><br>
                                <span style="font-size: 18pt; font-weight: bold; color: black;">Laporan Transaksi
                                    /Priode</span><br>
                                <span style="font-size: 12pt; font-weight: bold; font-style: italic;">
                                </span>
                                <hr>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr>
                <td align="center">
                    <br>
                    <table style="border-collapse: collapse; width: 90%; font-weight: bold;" border="0">
                        <tr>
                            <th colspan="7" style="text-align:left;">Tanggal Awal: <?php echo $tglawal; ?>
                            </th>
                        </tr>
                        <tr>
                            <th colspan="7" style="text-align:left;">Tanggal Akhir: <?php echo $tglakhir; ?>
                            </th>
                        </tr>
                    </table>
                    <br>
                </td>
            </tr>

            <tr>
                <td align="center">
                    <br>
                    <table style="border-collapse: collapse; width: 90%;" border="1">
                        <thead>
                            <th> No </th>
                            <th>Tanggal Transaksi</th>
                            <th>Tanggal Selesai</th>
                            <th> Nama Konsumen </th>
                            <th> Nama Satuan </th>
                            <th> Harga Satuan </th>
                            <th> berat </th>
                            <th> Total Biaya </th>
                        </thead>
                        <tbody>
                            <?php
                            $totsemua = 0;
                            $no = 0;
                            foreach ($data_laporan as $row) {
                                $totsemua = $totsemua + $row->total;

                                $no++ ?>
                            <tr>
                                <th> <?= $no; ?> </th>
                                <th> <?= date('d-m-Y', strtotime($row->tanggaltransaksi)) ?> </th>
                                <th> <?= date('d-m-Y', strtotime($row->tanggalselesai)) ?> </th>
                                <th> <?= $row->namakonsumen ?> </th>
                                <th> <?= $row->nama ?> </th>
                                <th> <?= $row->harga ?> </th>
                                <th> <?= $row->berat ?> </th>
                                <th> <?= 'Rp ' . number_format($row->total) ?> </th>
                            </tr>
                            <?php } ?>
                            <tr>
                                <td colspan="7" style="font-weight: bold;text-align: right">Total</td>
                                <td align="right"><?php echo 'Rp ' . number_format($totsemua); ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                </td>
            </tr>
            <tr>
                <td>
                    <div align="center">
                        <table style="border-collapse: collapse; width: 90%;" border="0">
                            <tr>
                                <td width="70%"></td>
                                <td width="26%">Padang,
                                    <?php echo date('d-m-Y'); ?>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <strong>Tertanda</strong>
                                </td>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>