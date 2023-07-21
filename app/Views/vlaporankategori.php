<!DOCTYPE>
<html>

<head>
    <meta charset="UTF-8">
    <title>Laporan Data satuan</title>
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
                                <span style="font-size: 18pt; font-weight: bold; color: black;">Laporan Data
                                    Satuan</span><br>
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

                    <br>
                </td>
            </tr>

            <tr>
                <td align="center">
                    <br>
                    <table style="border-collapse: collapse; width: 90%;" border="1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Satuan</th>
                                <th>Nama satuan</th>
                                <th>Jenis Satuan</th>
                                <th>Harga PerKilo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            foreach ($data_kategori as $d) {

                                $no++;
                            ?>
                            <tr>
                                <th width="50px" class="text-center"><?php echo $no . '.'; ?></th>
                                <th><?php echo $d->kode ?></th>
                                <th><?php echo $d->nama ?></th>
                                <td><?php echo $d->jenis ?></td>
                                <th><?php echo $d->harga ?></th>
                            </tr>
                            <?php } ?>
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
                                    <br>
                                    <strong>Pimpinan</strong>
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