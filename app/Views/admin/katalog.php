<?= $this->include('admin/layout/header') ?>

<div class="row">
    <div class="col-md-12">
        <!-- DATA TABLE -->
        <h3 class="title-5 m-b-35">KATALOG</h3>
        <div class="table-data__tool">
            <div class="table-data__tool-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    <i class="fas fa-plus-circle"></i> Tambah Buku</button>
            </div>
        </div>
        <div class="table-responsive table-responsive-data2">
            <table class="table table-data2">
                <thead>
                    <tr>
                      <th>No</th>
                      <th>Judul Buku</th>
                      <th>Pengarang</th>
                      <th>Penerbit</th>
                      <th>Tahun</th>
                      <th>Lokasi</th>
                      <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach($pustaka as $key => $data){?>
                    <tr class="tr-shadow">
                        <td><?= $no; ?></td>
                        <td>
                            <?= $data['judul']; ?>
                        </td>
                        <td class="desc"><?= $data['pengarang']; ?></td>
                        <td>
                            <span class="status--process"><?= $data['penerbit']; ?></span>
                        </td>
                        <td><?= $data['tahun']; ?></td>
                        <td><?= $data['lokasi']; ?></td>
                        <td>
                            <div class="table-data-feature">
                                <a href="<?= base_url('adm/ubahbuku/form/'.$data['kd_buku']); ?>" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                    <i class="zmdi zmdi-edit"></i>
                                </a>
                                <a href="<?= base_url('adm/hapusbuku/'.$data['kd_buku']); ?>" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                    <i class="zmdi zmdi-delete"></i>
                                </a>
                                <a href="detail-katalog.php" class="item" data-toggle="tooltip" data-placement="top" title="More">
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Katalog Buku</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('adm/tambahbuku'); ?>" method="post">
            <!-- <div class="form-group">
                <label for="exampleInputEmail1">Kode Buku</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div> -->
            <div class="form-group">
                <label for="exampleInputPassword1">Judul</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="judul">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Pengarang</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="pengarang">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Editor</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="editor">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Penerbit</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="penerbit">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Tahun</label>
                <input type="year" class="form-control" id="exampleInputPassword1" name="tahun">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Jumlah Halaman</label>
                <input type="number" class="form-control" id="exampleInputPassword1" name="halaman">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Lokasi</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="lokasi">
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
