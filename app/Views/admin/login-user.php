<?php require_once("src/header-login-admin.php"); ?>
    <div class="login-form">
        <form action="" method="post">
            <div class="form-group">
                <label>Username / NIS</label>
                <input class="au-input au-input--full" type="email" name="email" placeholder="Masukan Username / NIS">
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
    </div>
<?php require_once("src/footer-login-admin.php"); ?>
