<?= $this->include('admin/layout/header') ?>

<div class="row">
    <div class="col-md-12">
        <!-- DATA TABLE -->
        <h3 class="title-5 m-b-35">LAPORAN</h3>
        <div class="table-data__tool">
            <div class="table-data__tool-right">
            <a class="btn btn-primary" href="<?= base_url('adm_lap_history')?>" target="_blank">
                    <i class="fas fa-file"></i> Cetak Laporan Pengunjung</a>
            </div>
            <a class="btn btn-primary" href="<?= base_url('adm_lap_pencarian')?>" target="_blank">
                    <i class="fas fa-file"></i> Cetak Laporan Pencarian</a>
            </div>
        </div>
        <div class="table-responsive table-responsive-data2">
            <table class="table table-data2">
                <thead>
                    <tr>
                      <th>No</th>
                      <th>Keterangan</th>
                      <th>Sebagai</th>
                      <th>Tanggal Akses</th>
                    </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach($history as $key => $data){?>
                    <tr class="tr-shadow">
                        <td><?= $no; ?></td>
                        <td>
                            <?= $data['aksi'] ?>
                        </td>
                        <td>
                            <span class="<?php if($data['akses']==='usr'){echo 'role user';}else{echo 'role admin';} ?>">
                              <?php if($data['akses']==='usr'){echo 'Peserta Didik';}else{echo 'Pustakawan';} ?></span>
                        </td>
                        <td><?= $data['tgl_akses']; ?></td>
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
