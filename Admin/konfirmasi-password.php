<?php require_once("src/header-nonlogo.php"); ?>
    <div class="login-form">
        <form action="" method="post">
            <div class="form-group">
                <label>Kata Sandi Baru</label>
                <input class="au-input au-input--full" type="email" name="email" placeholder="Masukan Kata Sandi Baru Anda">
            </div>
            <div class="form-group">
                <label>Konfirmasi Kata Sandi Baru</label>
                <input class="au-input au-input--full" type="password" name="password" placeholder="Konfirmasi Kata Sandi Baru Anda">
            </div>
            <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit"><b>Benar</b></button>
        </form>
    </div>
<?php require_once("src/footer-login-admin.php"); ?>
