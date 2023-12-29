          <!-- carosel -->

          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?=base_url()?>images/_1.png" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
            <h5>Selamat Datang SI|BUS</h5>
          <p>Website Sewa Bus PT. Langsung Primaraya Kudus.</p>
        </div>
    </div>
    <div class="carousel-item">
      <img src="<?=base_url()?>images/_1.png"" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="<?=base_url()?>images/_1.png"" class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<div class="main-content">
<section class="section">
    <div class="section-body">
    <div class="row">
    <?php foreach ($produk as $key) { ?>
    
        <div class="col-lg-3">
            <div class="card">
            <div class="card-body">
                <div class="product-item pb-3">
                    <!-- <div class="product-image"> -->
                        <img src="<?= base_url('images/'.$key->foto)?>" alt="" width="200" height="100" class="rounded mx-auto d-block">
                    <!-- </div> -->
                    <div class="product-detail">
                    <div class="product-name"><?= $key->nama_kendaraan?></div>
                    
                    <?php
                      if($this->session->level == 'biro'){

                        $potongan = 10 / 100 * $key->harga;

                    ?>
                      <div class="product-review">Rp. <?=number_format($key->harga - $potongan, 2)?></div>
                      <div class="product-review"> <small><del> Rp. <?=number_format($key->harga, 2)?></del></small></div>
                    <?php }else{ ?>
                      <div class="product-review">Rp. <?=number_format($key->harga, 2)?></div>
                    <?php } ?>
                    <div class="text-muted text">
                        <?= $key->keterangan?>
                    </div>
                    <div class="product-cta">
                        <button type="button" id="pesan" class="btn btn-sm btn-danger btn-block" 
                            data-toggle="modal"
                            data-target="#pesanModal"
                            data-id = "<?=$key->id_kendaraan?>"
                            data-nama = "<?=$key->nama_kendaraan?>"
                            data-jenis = "<?=$key->jenis?>"
                            data-merk = "<?=$key->merk?>"
                            data-harga = "<?=$key->harga?>"
                            >
                            Pesan
                        </button> 
                    <button type="button" id="detail" class="btn btn-sm btn-info btn-block" 
                            data-toggle="modal"
                            data-target="#detailModal"
                            data-id = "<?=$key->id_kendaraan?>"
                            data-nama = "<?=$key->nama_kendaraan?>"
                            data-jenis = "<?=$key->jenis?>"
                            data-merk = "<?=$key->merk?>"
                            data-harga = "<?=$key->harga?>"
                            data-cc = "<?=$key->cc?>"
                            data-ket = "<?=$key->keterangan?>"
                            >
                            Detail
                        </button>
                    </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    <?php } ?>
    </div>
    </div>
</section>
</div>

<!-- Modal Pesan-->
<div class="modal fade" id="pesanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Data Pemesanan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('penyewaan/addPenyewaan')?>" method="post">
            <div class="form-group">
                <label for="">Nama Kendaraan</label>
                <input type="hidden" id="id_kendaraan" name="id_kendaraan" class="form-control" readonly>
                <input type="text" id="nm_kendaraan" name="nama_kendaraan" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="">Jenis</label>
                <input type="text" name="jenis" id="jenis" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="">Merk</label>
                <input type="text" name="merk" id="merk" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="">Harga per Hari</label>
                <input type="text" name="harga" id="harga" class="form-control" readonly>
            </div>
            <input type="hidden" name="tgl_sewa" readonly value="<?= date('Y-m-d', time())?>">
            <div class="form-group">
                <label for="">Tanggal Keberangkatan</label>
                <input type="text" name="tgl_pinjam" id="tgl_pinjam" class="form-control" value="<?= date('Y-m-d', time())?>">
            </div>
            <div class="form-group">
                <label for="">Tanggal Selesai</label>
                <input type="text" name="tgl_selesai" id="tgl_selesai" class="form-control" autocomplete="off" value="" >
            </div>
            <div class="form-group">
                <label for="">Tujuan</label>
                <input type="text" name="tujuan" id="tujuan" class="form-control" value="" >
            </div>
            <div class="form-group">
                <label for="">Jam Keberangkatan</label>
                <input type="time" name="jam" id="jam" class="form-control" required >
            </div>
            <div class="form-group">
                <label for="">Lama Hari</label>
                <input type="int" name="lama" id="lama" class="form-control" value="" readonly>
            </div>
            <div class="form-group">
                <label for="">Total</label>
                <input type="int" name="total_harga" id="total_harga" class="form-control" value="" readonly >
            </div>
      <div class="modal-footer">
        <button type="button" onclick="reset()" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Pesan</button>
      </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Detail Pesan-->
<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Detail Kendaraan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('penyewaan/addPenyewaan')?>" method="post">
            <div class="form-group">
                <label for="">Nama Kendaraan</label>
                <input type="hidden" id="id_kendaraan_d" name="id_kendaraan" class="form-control" readonly>
                <input type="text" id="nm_kendaraan_d" name="nama_kendaraan" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="">Jenis</label>
                <input type="text" name="jenis" id="jenis_d" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="">CC</label>
                <input type="text" name="cc" id="cc_d" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="">Merk</label>
                <input type="text" name="merk" id="merk_d" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="">Harga per Hari</label>
                <input type="text" name="harga" id="harga_d" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="">Keterangan</label>
                <textarea type="text" name="ket" id="ket_d" class="form-control" readonly
 cols="10" rows="5"></textarea>
            </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <!-- <button type="submit" class="btn btn-primary">Pesan</button> -->
      </div>
        </form>
      </div>
    </div>
  </div>
</div>


<script>
    $(document).ready(function() {
            var sess = "<?= $this->session->level?>";
            // console.log(sess);
        $(document).on('click','#pesan', function() {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            var jenis = $(this).data('jenis');
            var merk = $(this).data('merk');
            var harga = $(this).data('harga');
           
            var diskon = 10/100 * harga;
            var potongan =harga - diskon;
            $('#id_kendaraan').val(id);
            $('#nm_kendaraan').val(nama);
            $('#jenis').val(jenis);
            $('#merk').val(merk);
            if(sess == 'biro'){
              $('#harga').val(potongan);
            }else{
              $('#harga').val(harga);
            }
        });

        $(document).on('click','#detail', function() {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            var jenis = $(this).data('jenis');
            var merk = $(this).data('merk');
            var harga = $(this).data('harga');
            var cc = $(this).data('cc');
            var ket = $(this).data('ket');
            // console.log(id);
            var diskon = 10/100 * harga;
            var potongan =harga - diskon;
            $('#id_kendaraan_d').val(id);
            $('#nm_kendaraan_d').val(nama);
            $('#jenis_d').val(jenis);
            $('#merk_d').val(merk);if(sess == 'biro'){
              $('#harga_d').val(potongan);
            }else{
              $('#harga_d').val(harga);
            }
            $('#cc_d').val(cc);
            $('#ket_d').val(ket);
        });

            $('#tgl_pinjam').datepicker({dateFormat:'yy-mm-dd'});
            $('#tgl_selesai').datepicker({dateFormat:'yy-mm-dd'});
    
            // window.onload=function(){
                    $('#tgl_selesai').on('change', function() {

                    $(function() {
                    $( "#tgl_pinjam" ).datepicker({ dateFormat: 'dd-mm-yy' });
                    $( "#tgl_selesai" ).datepicker({ dateFormat: 'dd-mm-yy' });
                
                    var start = $('#tgl_pinjam').datepicker('getDate');
                    var end   = $('#tgl_selesai').datepicker('getDate');
                    var harga = $('#harga').val();
                    var days   = (end - start)/1000/60/60/24;
                    // console.log(harga);

                    $('#lama').val(days);
                    var total = harga * days;
                    console.log(total);
                    $('#total_harga').val(total);
                });
                            
                            });
                // }

        function reset() {
            $("[name='tgl_selesai']").val('');
            $("[name='lama']").val('');
            $("[name='total_harga']").val('');
        }

    })
</script>