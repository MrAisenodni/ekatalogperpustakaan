<?= $this->include('admin/layout/header') ?>

<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1">Dashboard</h2>
        </div>
    </div>
</div>
<div class="row m-t-25">
    <div class="col-sm-6 col-lg-6">
        <div class="overview-item overview-item--c1">
            <div class="overview__inner">
                <div class="overview-box clearfix">
                    <div class="icon">
                        <i class="zmdi zmdi-account-o"></i>
                    </div>
                    <div class="text">
                        <h2><?= $numusr; ?></h2>
                        <span>Pengguna Terdaftar</span>
                    </div>
                </div>
                <div class="overview-chart">
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-6">
        <div class="overview-item overview-item--c2">
            <div class="overview__inner">
                <div class="overview-box clearfix">
                    <div class="icon">
                        <i class="fas fa-book"></i>
                    </div>
                    <div class="text">
                        <h2><?= $numpus; ?></h2>
                        <span>Pustaka Terdaftar</span>
                    </div>
                </div>
                <div class="overview-chart">
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->include('admin/layout/footer') ?>
