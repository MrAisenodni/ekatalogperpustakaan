<?= $this->include('admin/layout/header') ?>

<div class="row">
    <div class="col-md-10">
        <div class="card">
            <div class="card-body card-block">
                <h3 class="title-5 m-b-35">UBAH PENGGUNA</h3>
                <div class="col-md-13">
                  <?php if(session()->getFlashdata('pesan')) : ?>
                  <div class="alert alert-success alert-dismissable fade show" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <?php endif; ?>
                </div>
                <form action="<?= base_url('/adm/ubahrak/'.$drak['kd_rak']); ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="gambarLama" value="<?= $gmb['gambar']; ?>">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nama Lemari</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="jenis" value="<?= $drak['jenis']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">No. Lemari</label>
                        <input type="number" class="form-control" id="exampleInputPassword1" name="nolem" value="<?= $drak['no_lemari']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nama Rak</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="nama" value="<?= $drak['nama']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">No. Rak</label>
                        <input type="number" class="form-control" id="exampleInputPassword1" name="norak" value="<?= $drak['no_rak']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Lokasi</label>
                        <input type="file" class="form-control" id="exampleInputPassword1" name="gmb" required>
                    </div>
                    <div class="modal-footer">
                        <a href="<?= base_url('adm_rak'); ?>">
                            <button type="button" class="btn btn-danger">
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