<section class="section">
<div class="section-body">
    <div class="card card-primary">
    <div class="card-header">Pembayaran</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped" id="tabel1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>No Sewa</th>
                        <th>Nama Penyewa</th>
                        <th>Nama Kendaraan</th>
                        <th>No Polisi</th>
                        <th>Total Harga</th>
                        <th>Bukti Pembayaran</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $no = 1;
                    foreach($data as $key) {
                ?>
                    <tr>
                        <td><?=$no++?></td>
                        <td><?=$key->id_penyewaan?></td>
                        <td><?=$key->nama_user?></td>
                        <td><?=$key->nama_kendaraan?></td>
                        <td><?=$key->nopol?></td>
                        <td><?=$key->total_harga?></td>
                        <td><img src="<?=base_url('images/invoice/'.$key->foto_bukti)?>" alt="Invoice" width="70" height="70"></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>
</div>
</section>