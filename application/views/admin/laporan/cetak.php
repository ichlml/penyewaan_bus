<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Sewa PT. Langsung Primaraya</title>
</head>
<style>
    table{
        font-size : 10px;
    }
</style>
<body>
    <center><h4><strong>Laporan Sewa Bus PT. Langsung Primaraya<br> Per Bulan <?=$row->namabul?> Tahun <?=$row->tahun?> </strong></h4></center>
    <br><br>
    <table width="100%" border="1">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Penyewa</th>
                <th>Nama Kendaraan</th>
                <th>Tanggal Sewa</th>
                <th>Tanggal Selesai</th>
                <th>Tanggal Kembali</th>
                <th>Lama Sewa (Hari)</th>
                <th>Total Harga</th>
                <th>Terlambat (Hari)</th>
                <th>Denda</th>
            </tr>
        </thead>
        <tbody>
        <?php $no=1; foreach ($cetak as $key ) { ?>        
            <tr>
                <td><?=$no++?></td>
                <td><?=$key->nama_user?></td>
                <td><?=$key->nama_kendaraan?></td>
                <td><?=$key->tgl_pinjam?></td>
                <td><?=$key->tgl_selesai?></td>
                <td><?=$key->tgl_kembali?></td>
                <td><?=$key->lama_pinjam?></td>
                <td>Rp. <?=number_format($key->total_harga,2)?></td>
                <td><?=$key->terlambat?></td>
                <td>Rp. <?=number_format($key->denda)?></td>
            </tr>
        <?php } ?>
            <tr>
                <td colspan="6"><strong>Total</strong></td>
                <td><?=($row->lama_pinjam)?></td>
                <td>Rp. <?=number_format($row->total, 2)?></td>
                <td><?=($row->lama_terlambat)?></td>
                <td>Rp. <?=number_format($row->totdenda, 2)?></td>
            </tr>

        </tbody>
    </table>
</body>
</html>

<script>
    window.print();
</script>