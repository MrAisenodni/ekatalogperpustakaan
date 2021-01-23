<?php require_once("src/header.php"); ?>
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <strong>Pustaka</strong>
                <small> Ubah</small>
            </div>
            <div class="card-body card-block">
                <form>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kode Buku</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Judul</label>
                        <input type="text" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Pengarang</label>
                        <input type="text" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Editor</label>
                        <input type="text" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Penerbit</label>
                        <input type="text" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Tahun</label>
                        <input type="text" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Tempat Terbit</label>
                        <input type="text" class="form-control" id="exampleInputPassword1">
                    </div>
                    <hr>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times"></i> Tutup
                    </button>
                    <button type="button" class="btn btn-primary">
                        <i class="fas fa-check-circle"></i> Simpan
                    </button>
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