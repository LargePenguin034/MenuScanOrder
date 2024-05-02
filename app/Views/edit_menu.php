<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<header>
  <nav class="navbar bg-dark">
    <div class="container-fluid justify-content-center">
      <div class="row mx-100">
        <div class="col mx-100">
          <h1 class="text-light">
            <?= esc($restaurant['name']) ?> - Table X
          </h1>
        </div>
      </div>
    </div>
  </nav>
</header>

<ul class="nav justify-content-center sticky-top bg-body-tertiary">
  <?php foreach ($types as $type) : ?>
    <li class="nav-item">
      <a class="nav-link" href="#<?= esc($type['type']) ?>"><?= esc($type['type']) ?></a>
    </li>
  <?php endforeach; ?>
</ul>

<div class="offcanvas offcanvas-bottom h-75" tabindex="-1" id="offcanvasBottom" aria-labelledby="offcanvasBottomLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasBottomLabel"><?= isset($name) ? 'Edit Menu Item' : 'Add Menu Item' ?></h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body small">
    <div class="container-fluid">
      <form method="post" action="<?= base_url('edit/' . esc($restaurant['restaurant_id'])) ?>">
        <div class="row">
          <div class="col-6 mb-3">
            <label for='item_name' class="form-label">Name</label>
            <input type="text" class="form-control" id='item_name' name='item_name' value="" required>
          </div>
          <div class="col-6 mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="2" required></textarea>
          </div>
          <div class="col-6 mb-3">
            <label for='type' class="form-label">Type</label>
            <input type="text" class="form-control" id="type" name="type" value="" required>
          </div>
          <div class="col-3 mb-3">
            <label for="kj" class="form-label">Energy</label>
            <div class="input-group">
              <input type="text" class="form-control" id="kj" name="kj" required>
              <span class="input-group-text" id="basic-addon3">Kj</span>
            </div>
            <div class="form-text" id="basic-addon4">Put 0 if you want the energy blank</div>
          </div>
          <div class="col-3">
            <div class="mb-3">
              <label for="price" class="form-label">Price</label>
              <div class="input-group">
                <span class="input-group-text" id="basic-addon3">$</span>
                <input type="text" class="form-control" name='price' id="price" aria-describedby="basic-addon3 basic-addon4">
              </div>
            </div>
          </div>
          <div class="col-3">
            <div class="mb-3">
              <label for="image" class="form-label">Image</label>
              <input class="form-control" type="file" id='image' name='image'>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Add item</button>
      </form>
    </div>
  </div>

</div>

<main>
  <?php foreach ($types as $type) : ?>
    <section id="<?= esc($type['type']) ?>" class="py-5">
      <div class="container">
        <div class="row gy-2">
          <div class="col-12">
            <figure class="text-center">
              <h2><?= esc($type['type']) ?></h2>
              <p class="text-body-secondary"><?= esc($type['description']) ?></p>
            </figure>
          </div>

          <?php foreach (${$type['type']} as $item) : ?>
            <div class="col-12 col-lg-6">
              <div class="card">
                <div class="row">
                  <div class="col-4">
                    <img src="" class="img-fluid rounded-start" />
                  </div>
                  <div class="col-8">
                    <div class="card-body">
                      <h5 class="card-title"><?= esc($item['item_name']) ?></h5>
                      <p class="card-text"><?= esc($item['description']) ?></p>
                      <div class="container">
                        <div class="row">
                          <?php if ($item['kj'] != 0) : ?>
                            <div class="col-3"><?= esc($item['kj']) ?>kJ</div>
                          <?php endif; ?>
                          <div class="col-3">$<?= esc($item['price']) ?></div>
                          <div class="col-6">
                            <a href="" class="card-block stretched-link text-decoration-none text-warning" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">
                              <strong>EDIT</strong>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          <?php endforeach; ?>

        </div>
      </div>
    </section>
  <?php endforeach; ?>
</main>

<div class="nav justify-content-center sticky-bottom bg-body-tertiary">
  <div class="d-grid gap-2 col-5 mx-auto p-3">
    <button type="button" class="btn btn-success btn-lg" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">Add Item</button>
  </div>
</div>

<?= $this->endSection() ?>