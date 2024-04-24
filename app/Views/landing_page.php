<?= $this->extend('template') ?>
<?= $this->section('content') ?>

  
  <div class="d-flex flex-column justify-content-center align-items-center" style="height: 90vh;">
    <h1>Sign in</h1>
    <div class="card  w-50">
        <div class="card-body">
            <form>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Email address</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
          <div class="card-footer text-center">
            <div class="row">
                <div class="col-12">
                    Login in with
                </div>
                <div class="col-12 p-2">
                    <a href="#" class="btn bg-success text-light"><i class="bi bi-google"></i></a>
                    <a href="#" class="btn bg-primary text-light"><i class="bi bi-facebook"></i></a>
                </div>
            </div>

          </div>
    </div>
  </div>


<?= $this->endSection() ?>