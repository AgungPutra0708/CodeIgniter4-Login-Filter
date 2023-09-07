  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-lg-6">

        <div class="card o-hidden border-0 shadow-lg my-5" style="border-radius: 15px;">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg">
                <div class="p-5">
                    <div class="text-center">
                      <h1 class="h4 mb-4 rum" style="color: #66A076;margin-top: 20px">Login</h1>
                    </div>
                    <?php if (!empty(session()->getFlashdata('message'))) : ?>
                    <div class="alert alert-warning" role="alert">
                        <?php echo session()->getFlashdata('message'); ?>
                    </div>
                    <?php endif; ?>
                  <form class="user" method="post" action="<?= base_url('/auth'); ?>">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="username" aria-describedby="emailHelp" placeholder="Masukan username anda ..." name="username">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Masukan password anda ...">
                    </div>
                    <button type="submit" class="btn btn-user btn-block" style="background-color: #66A076; color: white;">
                      Masuk
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>