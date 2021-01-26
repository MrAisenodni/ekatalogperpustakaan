<?= $this->include('admin/layout/header') ?>

<div class="row">
    <div class="col-md-10">
        <div class="card">
            <div class="card-body card-block">
                <h3 class="title-5 m-b-35">DETAIL PUSTAKA</h3>
                <form action="" method="">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Judul</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="judul" value="<?= $pustaka['judul']; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Pengarang</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="pengarang" value="<?= $pustaka['pengarang']; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Tempat Terbit</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="tmpt" value="<?= $pustaka['tmpt_terbit']; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Penerbit</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="penerbit" value="<?= $pustaka['penerbit']; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Tahun</label>
                        <input type="year" class="form-control" id="exampleInputPassword1" name="tahun" value="<?= $pustaka['tahun']; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Jumlah Halaman</label>
                        <input type="number" class="form-control" id="exampleInputPassword1" name="halaman" value="<?= $pustaka['halaman']; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Lokasi Rak</label>
                        <select name="rak" class="form-control" disabled>
                            <option value="<?= $pustaka['kd_rak']; ?>"><?php echo $pustaka['nama']." -- No Lemari (".$pustaka['no_lemari'].") -- No Rak (".$pustaka['no_rak'].")"; ?></option>
                            <?php foreach($rak as $key => $data1){?>
                            <option value="<?= $data1['kd_rak']; ?>" disabled><?php echo $data1['nama']." -- No Lemari (".$data1['no_lemari'].") -- No Rak (".$data1['no_rak'].")"; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <a href="/adm_katalog">
                            <button type="button" class="btn btn-primary">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </button>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->include('admin/layout/footer') ?>