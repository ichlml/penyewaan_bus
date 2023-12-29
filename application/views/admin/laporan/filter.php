<section class="section">
    <div class="section-header">Laporan</div>
    <div class="section-body">
        <div class="col-lg-4">
            <div class="card card-danger">
            <div class="card-header">Filter</div>
            <div class="card-body">
                <form action="<?=base_url('laporan/lapBulan')?>" method="post">
                    <div class="form-group">
                        <label for="">Bulan</label>
                        <select name="bulan" class="form-control">
                            <option value=""> ... </option>
                            <option value="1"> Januari </option>
                            <option value="2"> Februari </option>
                            <option value="3"> Maret </option>
                            <option value="4"> April </option>
                            <option value="5"> Mei </option>
                            <option value="6"> Juni </option>
                            <option value="7"> Juli </option>
                            <option value="8"> Agustus </option>
                            <option value="9"> September </option>
                            <option value="10"> Oktober </option>
                            <option value="11"> November </option>
                            <option value="12"> Desember </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Tahun</label>
                        <select name="tahun" class="form-control">
                            <option value=""> ... </option>
                            <?php foreach ($tahun as $key) { ?>
                                <option value="<?=$key->tahun?>"><?=$key->tahun?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <button type="submit" target="blank" class="btn btn-danger btn-sm btn-block">Cetak</button>
                </form>
            </div>
            </div>
        </div>
    </div>
</section>