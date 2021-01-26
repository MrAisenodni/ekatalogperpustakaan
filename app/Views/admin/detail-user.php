<?= $this->include('admin/layout/header') ?>

<div class="row">
    <div class="col-md-10">
        <div class="card">
            <div class="card-body card-block">
                <h3 class="title-5 m-b-35">DETAIL PENGGUNA</h3>
                <form action="" method="">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Akses</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="akses" id="pus" value="pus" <?php if($usr['akses']=='pus') { echo 'checked';} ?> onclick="disNISNIK()" disabled>
                            <label class="form-check-label" for="inlineRadio1">Pustakawan</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="akses" id="usr" value="usr" <?php if($usr['akses']=='usr') { echo 'checked';} ?> onclick="disNISNIK()" disabled>
                            <label class="form-check-label" for="inlineRadio2">Peserta Didik</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">NIS</label>
                        <input type="text" name="nis" class="form-control" id="nis" aria-describedby="emailHelp" value="<?= $usr['nis']; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">NIK</label>
                        <input type="text" name="nik" class="form-control" id="nik" aria-describedby="emailHelp" value="<?= $usr['nik']; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nama</label>
                        <input type="text" name="nama" class="form-control" id="exampleInputPassword1" value="<?= $usr['nama']; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Jenis Kelamin</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jk" id="inlineRadio1" value="L" <?php if($usr['jenkel']=='L') { echo 'checked';} ?> disabled>
                            <label class="form-check-label" for="inlineRadio1">Laki-laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jk" id="inlineRadio2" value="P" <?php if($usr['jenkel']=='P') { echo 'checked';} ?> disabled>
                            <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Tanggal Lahir</label>
                        <input type="date" name="tgllahir"class="form-control" id="exampleInputPassword1" required value="<?= $usr['tgl_lahir']; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nomor HP</label>
                        <input type="text" name="telp" class="form-control" id="exampleInputPassword1" value="<?= $usr['telp']; ?>" disabled>
                    </div>
                    <div class="modal-footer">
                        <a href="/adm_user">
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