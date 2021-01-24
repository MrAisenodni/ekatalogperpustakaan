<?= $this->include('admin/layout/header') ?>

<div class="row">
    <div class="col-md-12">
        <!-- DATA TABLE -->
        <h3 class="title-5 m-b-35">KELOLA PUSTAKA</h3>
        <div class="table-data__tool">
            <div class="table-data__tool-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    <i class="fas fa-plus-circle"></i> Tambah Pustaka</button>
            </div>
        </div>
        <div class="col-md-13">
          <?php if(session()->getFlashdata('pesan')) : ?>
          <div class="alert alert-success alert-dismissable fade show" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?php endif; ?>
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
                      <th>Lokasi Rak</th>
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
                        <td><?= $data['nama']; ?></td>
                        <td>
                            <div class="table-data-feature">
                                <a href="adm/detailubahbuku/<?= $data['kd_buku']; ?>" class="item" data-toggle="tooltip" data-placement="top" title="Ubah">
                                    <i class="zmdi zmdi-edit"></i>
                                </a>
                                <form action="adm/<?= $data['kd_buku']; ?>" method="post" class="item">
                                  <?= csrf_field(); ?>
                                  <input type="hidden" name="_method" value="DELETE">
                                  <button name="hapus" class="item" title="Hapus" onclick="return confirm('Apakah Anda Yakin?');">
                                    <i class="zmdi zmdi-delete"></i>
                                  </button>
                                </form>  
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Pustaka</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('adm/tambahbuku'); ?>" method="post">
          <div class="form-group">
            <label for="exampleInputPassword1">Judul</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="judul">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Pengarang</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="pengarang">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Tempat Terbit</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="tmpt">
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
            <label for="exampleInputPassword1">Lokasi Rak</label>
            <select name="rak" class="form-control">
              <option>--Pilih Rak--</option>
              <?php
              foreach($rak as $key => $data1){?>
                <option value="<?= $data1['kd_rak']; ?>"><?= $data1['nama']; ?></option>
              <?php } ?>
            </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
            <i class="fas fa-times"></i> Tutup
        </button>
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-check-circle"></i> Simpan
        </button>
      </div>
      </form>
    </div>
  </div>
</div>
