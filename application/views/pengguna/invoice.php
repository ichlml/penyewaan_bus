<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Sewa Kendaraan</title>
</head>
<style>
    table{
        font-size: 12px;
    }
    #an{
        font-size:14px;
    }
</style>
<body>
    <h3><center><strong>INVOICE SEWA BUS PT LANGSUNG PRIMARAYA KUDUS </strong></center></h3>
    <small><center>Getas Pejaten, Kecamatan Jati, Kabupaten Kudus (59343)</center></small>
    <hr border="3" solid> <br>

<table>
    <tr>
        <td>Nama Penyewa</td>
        <td>:</td>
        <td><?=$data->nama_user?></td>
    </tr>
    <tr>
        <td>Alamat Penyewa</td>
        <td>:</td>
        <td><?=$data->alamat?></td>
    </tr>
</table>
<!-- kendaraan -->
<table>
    <tr>
        <td>No Sewa</td>
        <td>:</td>
        <td style="color:red;"><strong><?=$data->id_penyewaan?></strong></td>
    </tr>
    <tr>
        <td>Nama Kendaraan</td>
        <td>:</td>
        <td><?=$data->nama_kendaraan?></td>
        <td></td>
        <td>Tanggal Sewa</td>
        <td>:</td>
        <td><?=$data->tgl_pinjam?></td>
        <td></td>
        <td>Total Harga</td>
        <td>:</td>
        <td style="color:red;">Rp. <?=number_format($data->total_harga, 2)?></td>
    </tr>
    <tr>
        <td>Nopol</td>
        <td>:</td>
        <td><?=$data->nopol?></td>
        <td></td>
        <td>Tanggal Selesai</td>
        <td>:</td>
        <td><?=$data->tgl_selesai?></td>
    </tr>
    <tr>
        <td>Jenis</td>
        <td>:</td>
        <td><?=$data->jenis?></td>
        <td></td>
        <td>Harga / Hari</td>
        <td>:</td>
        <td>Rp. <?=number_format($data->harga, 2)?></td>
    </tr>
    <tr>
        <td>Merk</td>
        <td>:</td>
        <td><?=$data->merk?></td>
        <td></td>
        <td>Lama Sewa</td>
        <td>:</td>
        <td><?=$data->lama_pinjam?></td>
    </tr>
</table>
<br>
<!-- harga -->
<hr border="3" solid>
<table id="an">
    <tr>
        <!-- <td colspan="12"></td> -->
        <!-- <td colspan="12"></td> -->
        <td><strong> Atas Nama </strong></td>
    </tr>
    <tr>
        <td> </td>
    </tr>
    <tr>
        <td> </td>
    </tr>
    <tr>
        <td> </td>
    </tr>
    <tr>
        <td> </td>
    </tr>
    <tr>
        <td><center><u><?=$data->nama_user?></u></center></td>
    </tr>
</table>

</body>
</html>

<script>
    window.print();
</script>