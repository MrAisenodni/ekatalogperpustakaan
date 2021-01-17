<?= $this->include('layout/header') ?>
  <!-- Masthead -->
  <header class="text-white text-center">
  <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-6"><br>
            <div class="card bg-light mb-3">
                <div class="card-header" style="color:black;">Pustaka</div>
                <div class="card-body">
                    <table class="table table-hover table-responsive">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kode</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Pengarang</th>
                                <th scope="col">Tempat Terbit</th>
                                <th scope="col">Penerbit</th>
                                <th scope="col">Tahun</th>
                                <th scope="col">Halaman</th>
                                <th scope="col">Lokasi</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php
                          $no = 1;
                          foreach($hasil as $key => $data){
                          ?>
                            <tr>
                                <form method="post" action="<?= base_url('loc')?>">
                                <input type="hidden" value="<?= $data['kd_buku']; ?>" name="kd">
                                <th scope="row"><?= $no; ?></th>
                                <td><?= $data['kd_buku']; ?></td>
                                <td><?= $data['judul']; ?></td>
                                <td><?= $data['pengarang']; ?></td>
                                <td><?= $data['tmpt_terbit']; ?></td>
                                <td><?= $data['penerbit']; ?></td>
                                <td><?= $data['tahun']; ?></td>
                                <td><?= $data['halaman']; ?></td>
                                <td><?= $data['nama']; ?></td>
                                <td>
                                  <button type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Lihat Selengkapnya">
                                    <i class="fa fa-location"></i> Lokasi
                                  </button></td>
                                </form>
                            </tr>
                          <?php $no++;}?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6"><br>
            <div class="card bg-light mb-3">
                <div class="card-header" style="color: black;">Denah Perpustakaan</div>
                <div class="card-body">
                    <img src="user/img/denah.jpg" alt="denah" style="width: 500px; height: 750px;"> -->
                </div>
            </div>
        </div>
      </div>
    </div>
  </header>
<?= $this->include('layout/footer') ?>
