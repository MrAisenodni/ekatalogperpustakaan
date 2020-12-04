<?php require_once("src/header-register-admin.php"); ?>
    <div class="login-form">
        <div class="row">
            <form action="" method="post">
                <div class="col-lg-6">
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
                            <input type="checkbox" name="aggree">Agree the terms and policy
                        </label>
                    </div>
                    <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">register</button>
                    <div class="social-login-content">
                        <div class="social-button">
                            <button class="au-btn au-btn--block au-btn--blue m-b-20">register with facebook</button>
                            <button class="au-btn au-btn--block au-btn--blue2">register with twitter</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">

                </div>
            </form>
        </div>
            
                
            <div class="register-link">
                <p>
                    Already have account?
                    <a href="#">Sign In</a>
                </p>
            </div>
    </div>
<?php require_once("src/footer-login-admin.php"); ?>