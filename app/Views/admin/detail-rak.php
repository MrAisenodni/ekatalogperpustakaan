<?= $this->include('admin/layout/header') ?>

<div class="row">
    <div class="col-md-10">
        <div class="card">
            <div class="card-body card-block">
                <h3 class="title-5 m-b-35">DETAIL RAK</h3>
                <form action="" method="" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="gambarLama" value="<?= $gmb['gambar']; ?>">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nama Lemari</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="jenis" value="<?= $drak['jenis']; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">No. Lemari</label>
                        <input type="number" class="form-control" id="exampleInputPassword1" name="nolem" value="<?= $drak['no_lemari']; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nama Rak</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="nama" value="<?= $drak['nama']; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">No. Rak</label>
                        <input type="number" class="form-control" id="exampleInputPassword1" name="norak" value="<?= $drak['no_rak']; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Lokasi</label>
                        <input type="file" class="form-control" id="exampleInputPassword1" name="gmb" disabled>
                    </div>
                    <div class="modal-footer">
                        <a href="/adm_rak">
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