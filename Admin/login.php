<?php require_once("src/header-login-admin.php"); ?>
    <div class="login-form">
        <form action="" method="post">
            <div class="form-group">
                <label>Username / NIP</label>
                <input class="au-input au-input--full" type="email" name="email" placeholder="Masukan Username / NIP">
            </div>
            <div class="form-group">
                <label>Kata Sandi</label>
                <input class="au-input au-input--full" type="password" name="password" placeholder="Masukan Kata Sandi">
            </div>
            <div class="login-checkbox">
                <label>
                    <a href="#">Lupa Kata Sandi?</a>
                </label>
            </div>
            <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit"><b>Masuk</b></button>
        </form>
        <div class="register-link">
            <p>
                Belum punya akun?
                <a href="#" data-toggle="modal" data-target="#exampleModal">Daftar</a>
            </p>
        </div>
    </div>
<?php require_once("src/footer-login-admin.php"); ?>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Daftar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
            <div class="form-group">
                <label>Username / NIP</label>
                <input class="au-input au-input--full" type="email" name="username" placeholder="Masukan Username atau NIP">
            </div>
            <div class="form-group">
                <label>Nama Lengkap</label>
                <input class="au-input au-input--full" type="text" name="nama" placeholder="Masukan Nama Lengkap">
            </div>
            <div class="form-group">
                <label>Alamat Email</label>
                <input class="au-input au-input--full" type="email" name="email" placeholder="Masukan Email">
            </div>
            <div class="form-group">
                <label>Nomor HP/WA</label>
                <input class="au-input au-input--full" type="email" name="telp" placeholder="Masukan Nomor Telpon">
            </div>
            <div class="form-group">
                <label>Alamat Rumah</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
            </div>
            <div class="form-group">
                <label>Kata Sandi</label>
                <input class="au-input au-input--full" type="password" name="password" placeholder="Masukan Kata Sandi">
            </div>
            <div class="form-group">
                <label>Konfirmasi Kata Sandi</label>
                <input class="au-input au-input--full" type="password" name="password" placeholder="Konfirmasi Kata Sandi">
            </div>
            <div class="login-checkbox">
                <label>
                    <input type="checkbox" name="aggree">Syarat dan Ketentuan
                </label>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="button" class="btn btn-success">Daftar</button>
        </div>
    </form>
    </div>
  </div>
</div>
