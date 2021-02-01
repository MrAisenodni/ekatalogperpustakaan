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
                                <th scope="col">Judul</th>
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
                                <td><?= $data['judul']; ?></td>
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
                    <img src="gmb/Denah.png" alt="denah" style="width: 100%; height: 100%;">
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
<?= $this->include('layout/footer') ?>
