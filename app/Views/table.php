<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<div class="container-fluid pb-">
  <div class="row p-5 gy-5">
    <div class="col">
      <div class="card" style="width: 18rem;">
        <img src="Images\frame.png" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Table 1</h5>
          <a href="#" class="btn btn-primary">Download</a>
          <a href="<?= base_url("menu/1"); ?>" class="btn btn-warning">Visit</a>
        </div>
      </div>
    </div>

    <div class="col">
      <div class="card" style="width: 18rem;">
        <img src="Images\frame.png" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Table 2</h5>
          <a href="#" class="btn btn-primary">Download</a>
          <a href="<?= base_url("menu/1"); ?>" class="btn btn-warning">Visit</a>
        </div>
      </div>
    </div>

    <div class="col">
      <div class="card" style="width: 18rem;">
        <img src="Images\frame.png" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Table 3</h5>
          <a href="#" class="btn btn-primary">Download</a>
          <a href="menu.html" class="btn btn-warning">Visit</a>
        </div>
      </div>
    </div>

    <div class="col">
      <div class="card" style="width: 18rem;">
        <img src="Images\frame.png" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Table 4</h5>
          <a href="#" class="btn btn-primary">Download</a>
          <a href="menu.html" class="btn btn-warning">Visit</a>
        </div>
      </div>
    </div>

    <div class="col">
      <div class="card" style="width: 18rem;">
        <img src="Images\frame.png" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Table 5</h5>
          <a href="#" class="btn btn-primary">Download</a>
          <a href="menu.html" class="btn btn-warning">Visit</a>
        </div>
      </div>
    </div>

    <div class="col">
      <div class="card" style="width: 18rem;">
        <img src="Images\frame.png" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Table 6</h5>
          <a href="#" class="btn btn-primary">Download</a>
          <a href="menu.html" class="btn btn-warning">Visit</a>
        </div>
      </div>
    </div>

    <div class="col">
      <div class="card" style="width: 18rem;">
        <img src="Images\frame.png" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Table 7</h5>
          <a href="#" class="btn btn-primary">Download</a>
          <a href="menu.html" class="btn btn-warning">Visit</a>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="nav justify-content-center sticky-bottom bg-body-tertiary">
  <div class="d-grid gap-2 col-5 mx-auto p-3">
    <button type="button" class="btn btn-primary btn-lg">Download all</button>
  </div>
  <div class="d-grid gap-2 col-5 mx-auto p-3">
    <div class="row">
      <div class="d-grid gap-2 col-4 mx-auto">
        <button type="button" class="btn btn-primary btn-lg">Set</button>
      </div>
      <div class="d-grid gap-2 col-4 mx-auto">
        <button type="button" class="btn btn-success btn-lg">Add</button>
      </div>
      <div class="d-grid gap-2 col-4 mx-auto">
        <button type="button" class="btn btn-danger btn-lg">Remove</button>
      </div>
    </div>

  </div>
</div>




<?= $this->endSection() ?>