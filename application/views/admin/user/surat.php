<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Pernyataan</title>
</head>
<style>
    p.a {
        text-align: justify;
        text-justify: inter-word;
        text-indent: 50px;
    }
    p.user{
        float:left;
    }
    p.pt{
        float:right;
    }
    .user{
        margin-left: 10px;
        /* width: 20%; */
    }
    .pt{
        margin-right: 10px;
        /* width: 20%; */
    }
</style>
<body>
    <h2><center>SURAT PERNYATAAN PT. LANGSUNG PRIMARAYA</center></h2>
    <h4><center>Getas Pejaten, Kec. Jati, Kab. Kudus</center></h4>
    <hr boder="2" solid>
    <br>

    <p class="a"> Pernyataan dari PT. Langsung Primaraya, apabila terjadi kecelakaan / kerusakan bus
    Pihak PT. Langsung Primaraya dengan jasa raharja sudah berwenang sebagai mana berikut : <br>
    Peraturan dari Menteri keuangan No 15 tahun 2017,

    Jika terjadi kecelakaan pada bus dan jasaraharja akan menyantuni sebagaimana berikut :

    </p>

    <ul>
        <?php if($data->p1 != null) { ?>
        <li>Kecelakaan untuk korban meninggal akan mendapatkan santunan 50jt</li>
        <?php }else{ ?>
        <?php }?>
        
        <?php if($data->p2 != null) { ?>
        <li>Kecelakaan untuk korban luka-luka akan mendapatkan rawat inap sebesar 20jt</li>
        <?php }else{ ?>
        <?php }?>

        <?php if($data->p3 != null) { ?>
        <li>Kecelakaan untuk korban luka akan mendapatkan 500rb</li>
        <?php }else{ ?>
        <?php }?>
    </ul>
    <p> Claem dana jasa raharja akan di proses 1x24 jam, sedangakn claem bus jika terjadi kemacetan mesin akan di proses 1x24 jam. (Apabila kerusakan tidak dapat di benahi akan di ganti bus baru) </p> <br><br>

    <div class="user">
        <p class="user">
            Penyewa <br><br><br><br>
            <u><strong><?=$data->nama_user?></strong></u>
        </p>
    </div>
    <div class="pt">
        <p class="pt">  
            Direktur Utama <br><br><br><br>
            <u><strong>PT. Langsung Primaraya</strong></u>
        </p>
    </div>
</body>
</html>

<script>
    window.print();
</script>