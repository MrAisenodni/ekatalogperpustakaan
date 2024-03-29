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
                <form action="<?= base_url('/adm/ubahuser/'.$usr['kd_user']); ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Akses</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="akses" id="pus" value="pus" <?php if($usr['akses']=='pus') { echo 'checked';} ?> onclick="disNISNIK()">
                            <label class="form-check-label" for="inlineRadio1">Pustakawan</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="akses" id="usr" value="usr" <?php if($usr['akses']=='usr') { echo 'checked';} ?> onclick="disNISNIK()">
                            <label class="form-check-label" for="inlineRadio2">Peserta Didik</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">NIS</label>
                        <input type="text" name="nis" class="form-control" id="nis" aria-describedby="emailHelp" value="<?= $usr['nis']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">NIK</label>
                        <input type="text" name="nik" class="form-control" id="nik" aria-describedby="emailHelp" value="<?= $usr['nik']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nama</label>
                        <input type="text" name="nama" class="form-control" id="exampleInputPassword1" value="<?= $usr['nama']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Jenis Kelamin</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jk" id="inlineRadio1" value="L" <?php if($usr['jenkel']=='L') { echo 'checked';} ?>>
                            <label class="form-check-label" for="inlineRadio1">Laki-laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jk" id="inlineRadio2" value="P" <?php if($usr['jenkel']=='P') { echo 'checked';} ?>>
                            <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Tanggal Lahir</label>
                        <input type="date" name="tgllahir"class="form-control" id="exampleInputPassword1" required value="<?= $usr['tgl_lahir']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nomor HP</label>
                        <input type="text" name="telp" class="form-control" id="exampleInputPassword1" value="<?= $usr['telp']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password Baru</label>
                        <input type="password" name="pass" class="form-control" id="exampleInputPassword1" required>
                    </div>
                    <div class="modal-footer">
                        <a href="/adm_user">
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

<script>
    function disNISNIK(){
        var nis = document.getElementById('nis');
        var nik = document.getElementById('nik');
        var pus = document.getElementById('pus');
        var usr = document.getElementById('usr');
        if(pus.checked == true){
            nis.disabled = true;
            nik.disabled = false;
            nik.required = true;
        } else if (usr.checked == true) {
            nis.disabled = false;
            nik.disabled = true;
            nis.required = true;
        } else {
            nis.disabled = true;
            nik.disabled = true;
        }
    }
</script>