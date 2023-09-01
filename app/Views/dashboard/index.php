<?= $this->include('template/header') ?>
<?= $this->include('template/sidebar') ?>
<?= $this->include('template/topbar') ?>
<div class="container">
            <h5>Dashboard</h5>
            <!-- Content Row -->
            <div class="row">

              <!-- Earnings (Monthly) Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card bg-primary shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-white text-uppercase mb-1">Tersedia</div>
                        
                      </div>
                      <div class="col-auto">
                        <div class="h5 mb-0 font-weight-bold text-white">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Earnings (Monthly) Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card bg-danger shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-white text-uppercase mb-1">Tidak Tersedia</div>
                      </div>
                      <div class="col-auto">
                        <div class="row no-gutters align-items-center">
                          <div class="h5 mb-0 font-weight-bold text-white">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Pending Requests Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card bg-warning shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-white text-uppercase mb-1">Menunggu Persetujuan</div>
                      </div>
                      <div class="col-auto">
                        <div class="h5 mb-0 font-weight-bold text-white">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div>
              <span>Selamat Datang di</span>
            </div>

            <!-- Content Row -->
          </div>
          <?= $this->include('template/footer') ?>