<?= $this->include('layout/header') ?>
  <!-- Masthead -->
  <?php foreach($hasil as $key => $data){ ?>
  <header class="text-white text-center">
  <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-6"><br>
            <div class="card bg-light mb-3">
                <div class="card-header" style="color:black;">Pustaka</div>
                <div class="card-body">
                    <table class="table table-hover table-responsive">
                            <tr>
                                <td>Kode</td>
                                <td> : </td>
                                <td><?= $data['kd_buku']?></td>
                            </tr>
                            <tr>
                                <td>Judul</td>
                                <td> : </td>
                                <td><?= $data['judul']?></td>
                            </tr>
                            <tr>
                                <td>Pengarang</td>
                                <td> : </td>
                                <td><?= $data['pengarang']?></td>
                            </tr>
                            <tr>
                                <td>Tempat Terbit</td>
                                <td> : </td>
                                <td><?= $data['tmpt_terbit']?></td>
                            </tr>
                            <tr>
                                <td>Penerbit</td>
                                <td> : </td>
                                <td><?= $data['penerbit']?></td>
                            </tr>
                            <tr>
                                <td>Tahun Terbit</td>
                                <td> : </td>
                                <td><?= $data['tahun']?></td>
                            </tr>
                            <tr>
                                <td>Jumlah Halaman</td>
                                <td> : </td>
                                <td><?= $data['halaman']?></td>
                            </tr>
                            <tr>
                                <td>Lokasi</td>
                                <td> : </td>
                                <td><?= $data['nama']?></td>
                            </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6"><br>
            <div class="card bg-light mb-3">
                <div class="card-header" style="color: black;">Denah Perpustakaan</div>
                <div class="card-body">
                    <img src="gmb/<?= $data['gambar'] ?>" alt="denah" style="width: 500px; height: 750px;"> -->
                </div>
            </div>
        </div>
      </div>
    </div>
  </header>
  <?php }; ?>
<?= $this->include('layout/footer') ?>
