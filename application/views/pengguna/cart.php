<div class="main-content">
<section class="section">
    <div class="section-body">
        <div class="card card-primary">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Kendaraan</th>
                            <th>No Polisi</th>
                            <th>Jenis</th>
                            <th>Merk</th>
                            <th>Keterangan</th>
                            <th>Harga</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Selesai</th>
                            <th>Total Harga</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $no = 1;
                        foreach($pesanan as $key){
                    ?>
                        <tr>
                            <td><?=$no++?></td>
                            <td><?=$key->nama_kendaraan?></td>
                            <td><?=$key->nopol?></td>
                            <td><?=$key->jenis?></td>
                            <td><?=$key->merk?></td>
                            <td><?=$key->keterangan?></td>
                            <td>Rp. <?=number_format($key->harga, 2)?></td>
                            <td><?=$key->tgl_pinjam?></td>
                            <td><?=$key->tgl_selesai?></td>
                            <td>Rp. <?= number_format($key->total_harga, 2)?></td>
                            <td>
                            <br>
                            <?php if ($key->status_sewa == 'pending' ) { ?>
                                <a href="<?=base_url('pengguna/pembayaran/'.$key->id_penyewaan)?>" class="btn btn-success btn-sm btn-block"><i class="fas fa-dollar-sign"></i> Pembayaran</a>
                                <a href="<?=base_url('penyewaan_a/unAccP/'.$key->id_penyewaan.'/'. $key->id_kendaraan)?>" title="Tolak" class="btn btn-block btn-danger btn-sm"><i class="fas fa-times"></i></a>
                                <a href="<?=base_url('penyewaan/hapusCart/'.$key->id_penyewaan.'/'. $key->id_kendaraan)?>" class="btn btn-danger btn-sm btn-block"><i class="fas fa-trash"></i></a>
                            <?php }elseif ($key->status_sewa == 'pinjam') { ?>
                                <a class="btn btn-light btn-sm btn-block" disabled></i> Telah di Sewa</a>
                                <a href="<?=base_url('pengguna/invoice/'.$key->id_penyewaan)?>" class="btn btn-danger btn-sm btn-block" target="_blank"><i class="fas fa-print"></i> Cetak</a>
                            <?php }elseif ($key->status_sewa == 'selesai') {?>
                                <a class="btn btn-dark btn-sm btn-block" disabled> Sewa Selesai</a>
                                <a href="<?=base_url('pengguna/invoice/'.$key->id_penyewaan)?>" class="btn btn-danger btn-sm btn-block" target="_blank"><i class="fas fa-print"></i> Cetak</a> 
                                
                            <?php }else{ ?>
                                <a class="btn btn-dark btn-sm btn-block" disabled> Di tolak</a>
                            <?php } ?>
                            <br>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </div>
</section>
</div>