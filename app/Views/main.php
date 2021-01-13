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
                                <th scope="col">Editor</th>
                                <th scope="col">Penerbit</th>
                                <th scope="col">Tahun</th>
                                <th scope="col">Lokasi</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php
                          $no = 1;
                          foreach($hasil as $key => $data){
                          ?>
                            <tr>
                                <th scope="row"><?= $no; ?></th>
                                <td><?= $data['kd_buku']; ?></td>
                                <td><?= $data['judul']; ?></td>
                                <td><?= $data['pengarang']; ?></td>
                                <td><?= $data['editor']; ?></td>
                                <td><?= $data['penerbit']; ?></td>
                                <td><?= $data['tahun']; ?></td>
                                <td><?= $data['halaman']; ?></td>
                                <td><?= $data['lokasi']; ?></td>
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
