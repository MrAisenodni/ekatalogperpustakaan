<?= $this->include('admin/layout/header-login-admin'); ?>
    <div class="login-form">
        <form action="<?= base_url('login/proses');?>" method="post">
          <?php if(session()->getFlashdata('msg')):?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
                <?php endif;?>
            <div class="form-group">
                <label>NIK / NIS</label>
                <input class="au-input au-input--full" type="text" name="nis" placeholder="Masukan NIK / NIS">
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
<?= $this->include('layout/footer-login'); ?>
