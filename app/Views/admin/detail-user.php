<?php require_once("src/header.php"); ?>
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <strong>Katalog</strong>
                <small> Edit</small>
            </div>
            <div class="card-body card-block">
                <form>
                    <div class="form-group">
                        <label for="exampleInputEmail1">NIS</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" disabled>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nama</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" disabled>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Jenis Kelamin</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio1" value="option1" disabled>
                            <label class="form-check-label" for="inlineRadio1">Laki-laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio2" value="option2" disabled>
                            <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="exampleInputPassword1" disabled>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nomor Telepon</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" disabled>
                    </div>
                    <div class="form-group">
                     <label for="exampleInputPassword1">Akses</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="akses" id="inlineRadio1" value="option1" disabled>
                            <label class="form-check-label" for="inlineRadio1">Admin</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="akses" id="inlineRadio2" value="option2" disabled>
                            <label class="form-check-label" for="inlineRadio2">User</label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body card-block">
            </div>
            <div class="card-footer">

            </div>
        </div>
    </div>
</div>
<?php require_once("src/footer.php"); ?>