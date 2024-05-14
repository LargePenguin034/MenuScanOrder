<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<div class="container-fluid pb-">
  <div class="row p-5 gy-5">
    <?php foreach (range(1, $tables) as $index): ?>
      <div class="col-4">
        <div class="card" style="width: 18rem;">
          <div class="card-body">
            <h5 class="card-title">Table <?= esc($index) ?></h5>
            <a href="#" class="btn btn-primary">Download</a>
            <a href="<?= base_url("menu/". esc($restaurant_id ) . "/" . $index); ?>" class="btn btn-warning">Visit</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <div class="nav justify-content-center sticky-bottom bg-body-tertiary">
    <div class="d-grid col-4 mx-auto">
      <button type="button" class="btn btn-primary btn-lg">Download all</button>
    </div>
    <div class="d-grid col-6 mx-auto">
      <form action="<?= base_url('owner/tables') ?>" method="post">
        <div class="row">
          <div class="d-grid col-5 mx-auto">
            <div class="input-group">
              <button class="btn btn-lg btn-warning" type="submit" name="action" value="SET">Change</button>
              <input type="number" min="0" value="<?= esc($tables) ?>" class="form-control" id="tableNo" name="tableNo"
                required>
            </div>
          </div>
          <div class="d-grid  col-3 mx-auto">
            <button class="btn btn-success btn-lg" type="submit" name="action" value="ADD">Add</button>
          </div>
          <div class="d-grid col-3 mx-auto">
            <button class="btn btn-danger btn-lg" type="submit" name="action" value="REMOVE">Remove</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>


<?= $this->endSection() ?>