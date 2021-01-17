<?= $this->include('admin/layout/header') ?>

<div class="row">
    <div class="col-md-12">
        <!-- DATA TABLE -->
        <h3 class="title-5 m-b-35">USER</h3>
        <div class="table-data__tool">
            <div class="table-data__tool-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    <i class="fas fa-plus-circle"></i> Tambah User</button>
            </div>
        </div>
        <div class="table-responsive table-responsive-data2">
            <table class="table table-data2">
                <thead>
                    <tr>
                      <th>No</th>
                      <th>NIS/NIK</th>
                      <th>Nama</th>
                      <th>No HP</th>
                      <th>Akses</th>
                      <th>Tanggal Daftar</th>
                      <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach($usr as $key => $data){?>
                    <tr class="tr-shadow">
                        <td><?= $no; ?></td>
                        <td><?php if($data['nis']==null){echo $data['nik'];}else{echo $data['nis'];} ?></td>
                        <td><?= $data['nama']; ?></td>
                        <td><?= $data['telp']; ?></td>
                        <td>
                            <span class="<?php if($data['akses']==='usr'){echo 'role user';}else{echo 'role admin';} ?>">
                              <?php if($data['akses']==='usr'){echo 'User';}else{echo 'Pustakawan';} ?></span>
                        </td>
                        <td><?= $data['tgl_daftar']; ?></td>
                        <td>
                            <div class="table-data-feature">
                                <a href="edit-user.php" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                    <i class="zmdi zmdi-edit"></i>
                                </a>
                                <a href="<?= base_url('adm/hapususer/'.$data['kd_user']); ?>" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                    <i class="zmdi zmdi-delete"></i>
                                </a>
                                <a href="detail-user.php" class="item" data-toggle="tooltip" data-placement="top" title="More">
                                    <i class="zmdi zmdi-more"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <tr class="spacer"></tr>
                    <?php $no++;} ?>
                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE -->
    </div>
</div>
<?= $this->include('admin/layout/footer') ?>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('/adm/tambahuser')?>" method="post">
          <div class="form-group">
              <label for="exampleInputPassword1">Akses</label><br>
              <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="akses" id="pus" value="pus" onclick="disNIS()">
                  <label class="form-check-label" for="inlineRadio1">Admin</label>
              </div>
              <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="akses" id="usr" value="usr" onclick="disNIK()">
                  <label class="form-check-label" for="inlineRadio2">User</label>
              </div>
          </div>
            <div class="form-group">
                <label for="exampleInputEmail1">NIS</label>
                <input type="text" name="nis" class="form-control" id="nis" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">NIK</label>
                <input type="text" name="nik" class="form-control" id="nik" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Nama</label>
                <input type="text" name="nama" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Jenis Kelamin</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jk" id="inlineRadio1" value="L">
                    <label class="form-check-label" for="inlineRadio1">Laki-laki</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jk" id="inlineRadio2" value="P">
                    <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Tanggal Lahir</label>
                <input type="date" name="tgllahir"class="form-control" id="exampleInputPassword1" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Nomor Telepon</label>
                <input type="text" name="telp" class="form-control" id="exampleInputPassword1">
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
            <i class="fas fa-times"></i> Close
        </button>
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-check-circle"></i> Simpan
        </button>
      </div>
      </form>
    </div>
  </div>
</div>
<script>
  function disNIS(){
    var nis = document.getElementById('nis').disabled = true;
    var nik = document.getElementById('nik').disabled = false;
  }
  function disNIK(){
    var nik = document.getElementById('nik').disabled = true;
    var nis = document.getElementById('nis').disabled = false;
  }
  // function Akses(){
  //   var pus = document.getElementById('pus');
  //   var usr = document.getElementById('usr');
  //   var nis = document.getElementById('nis');
  //   var nik = document.getElementById('nik');
  //
  //   if()
  // }
</script>
