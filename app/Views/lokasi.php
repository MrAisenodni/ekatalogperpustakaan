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
                    <table class="table table-hover table-responsive" style="text-align: left;">
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
                        <tr>
                            <td>Nomor Lemari</td>
                            <td> : </td>
                            <td><?= $data['no_lemari']?></td>
                        </tr>
                        <tr>
                            <td>Nomor Rak</td>
                            <td> : </td>
                            <td><?= $data['no_rak']?></td>
                        </tr>
                        <tr>
                            <td>
                                <a href="<?= base_url('/'); ?>">
                                    <button type="button" class="btn btn-primary">
                                        <i class="fas fa-arrow-left"></i> Kembali
                                    </button>
                                </a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6"><br>
            <div class="card bg-light mb-3">
                <div class="card-header" style="color: black;">Denah Perpustakaan</div>
                    <div class="card-body">
                        <img src="gmb/<?= $data['gambar'] ?>" alt="denah" style="width: 100%; height: 100%;">
                        <table class="table table-sm table-borderless" style="text-align: left;">
                            <tr>
                                <td>
                                    <img src="gmb/Antologi.png" alt="legend" style="width: 15px; height: 15px;">
                                </td>
                                <td><p>Antologi</p></td>
                                <td width="150px"></td>
                                <td>
                                    <img src="gmb/Atlas.png" alt="legend" style="width: 15px; height: 15px;">
                                </td>
                                <td><p>Atlas</p></td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="gmb/Buku Pelajaran.png" alt="legend" style="width: 15px; height: 15px;">
                                </td>
                                <td><p>Buku Pelajaran</p></td>
                                <td>        </td>
                                <td>
                                    <img src="gmb/Ensiklopedia.png" alt="legend" style="width: 15px; height: 15px;">
                                </td>
                                <td><p>Ensiklopedia</p></td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="gmb/Kamus.png" alt="legend" style="width: 15px; height: 15px;">
                                </td>
                                <td><p>Kamus</p></td>
                                <td>        </td>
                                <td>
                                    <img src="gmb/Komik.png" alt="legend" style="width: 15px; height: 15px;">
                                </td>
                                <td><p>Komik</p></td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="gmb/Majalah.png" alt="legend" style="width: 15px; height: 15px;">
                                </td>
                                <td><p>Majalah</p></td>
                                <td>        </td>
                                <td>
                                    <img src="gmb/Novel.png" alt="legend" style="width: 15px; height: 15px;">
                                </td>
                                <td><p>Novel</p></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </header>
  <?php }; ?>
<?= $this->include('layout/footer') ?>
