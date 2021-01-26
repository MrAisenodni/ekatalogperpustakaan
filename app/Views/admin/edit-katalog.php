<?= $this->include('admin/layout/header') ?>

<div class="row">
    <div class="col-md-10">
        <div class="card">
            <div class="card-body card-block">
                <h3 class="title-5 m-b-35">UBAH PUSTAKA</h3>
                <div class="col-md-13">
                  <?php if(session()->getFlashdata('pesan')) : ?>
                  <div class="alert alert-success alert-dismissable fade show" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <?php elseif(session()->getFlashdata('error')): ?>
                  <div class="alert alert-danger alert-dismissable fade show" role="alert">
                    <?= session()->getFlashdata('error'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <?php endif; ?>
                </div>
                <form action="<?= base_url('/adm/ubahbuku/'.$pustaka['kd_buku']); ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Judul</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="judul" value="<?= $pustaka['judul']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Pengarang</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="pengarang" value="<?= $pustaka['pengarang']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Tempat Terbit</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="tmpt" value="<?= $pustaka['tmpt_terbit']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Penerbit</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="penerbit" value="<?= $pustaka['penerbit']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Tahun</label>
                        <input type="year" class="form-control" id="exampleInputPassword1" name="tahun" value="<?= $pustaka['tahun']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Jumlah Halaman</label>
                        <input type="number" class="form-control" id="exampleInputPassword1" name="halaman" value="<?= $pustaka['halaman']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Lokasi Rak</label>
                        <select name="rak" class="form-control" required>
                            <option value="<?= $pustaka['kd_rak']; ?>"><?php echo $pustaka['nama']." -- No Lemari (".$pustaka['no_lemari'].") -- No Rak (".$pustaka['no_rak'].")"; ?></option>
                            <?php foreach($rak as $key => $data1){?>
                            <option value="<?= $data1['kd_rak']; ?>" required><?php echo $data1['nama']." -- No Lemari (".$data1['no_lemari'].") -- No Rak (".$data1['no_rak'].")"; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <a href="<?= base_url('adm_katalog'); ?>">
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-times"></i> Batal
                            </button>
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-check-circle"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->include('admin/layout/footer') ?>