<!DOCTYPE>
<html>

<head>
    <meta charset="UTF-8">
    <title>Laporan Data Konsumen</title>
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
                                    Konsumen</span><br>
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
                                <th>Kode Konsumen</th>
                                <th>Nama Konsumen</th>
                                <th>Alamat</th>
                                <th>No Telepon</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            foreach ($data_konsumen as $d) {

                                $no++;
                            ?>
                            <tr>
                                <th width="50px" class="text-center"><?php echo $no . '.'; ?></th>
                                <th><?php echo $d->kodekonsumen ?></th>
                                <th><?php echo $d->namakonsumen ?></th>
                                <th><?php echo $d->alamatkonsumen ?></th>
                                <th><?php echo $d->notelpkonsumen ?></th>
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