<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<header>
  <nav class="navbar bg-dark">
    <div class="container-fluid justify-content-center">
      <div class="row mx-100">
        <div class="col mx-100">
          <h1 class="text-light">
            <div class="row">
              <div class="col">
                <form action="<?= base_url('owner/edit_name' . esc($restaurant['restaurant_id'])) ?>" method="post">
                  <div class="input-group mb-3 py-2">
                    <button class="btn btn-warning" type="submit">Change</button>
                    <input type="text" class="form-control" value="<?= esc($restaurant['name']) ?>" id="Name Change" name="name" required>
                  </div>
                </form>
              </div>
              <div class="col">
                - Table X
              </div>
            </div>
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
    <h5 class="offcanvas-title" id="MenuLabel">Edit Menu Item</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body small">
    <div class="container-fluid">
      <form method="post" action="<?= base_url('owner/edit') ?>">
        <div class="row">
          <input type="text" class="form-control" id='item_id' name='item_id' value="" hidden>
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
            <select class="form-select form-select-sm" id="type" name="type" required>
              <?php foreach ($types as $type) : ?>
                <option value="<?= esc($type['type']) ?>"><?= esc($type['type']) ?></option>
              <?php endforeach; ?>
            </select>
            <div class="input-group mb-3 py-2">
              <input type="text" class="form-control" placeholder="" id="typeaddition">
              <button class="btn btn-success" type="button" id="typeaddition" onclick="addtype()">AddType</button>
            </div>
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

        </div>
        <div class="row">
          <div class="col">
            <button id="addeditButton" type="submit" name="action" value="Modify" class="btn btn-primary">Add item</button>
          </div>
          <div class="col">
            <button id="deleteButton" type="submit" name="action" value="Delete" onclick="return confirm('Are you sure you want to delete this menu item?')" class="btn btn-danger">Delete item</button>
          </div>
        </div>
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
            <div class="row align-items-center justify-content-center">
              <div class="col-3">
                <form action="<?= base_url('owner/edit_type') ?>" method="post">
                  <div class="input-group mb-3 py-2">
                    <button class="btn btn-warning" type="submit">Change</button>
                    <input name="type_id" value="<?= esc($type['type_id']) ?>" hidden></input>
                    <input type="text" class="form-control" value="<?= esc($type['type']) ?>" id="Type Change" name="type" required>
                  </div>
                </form>
              </div>
              <div class="row align-items-center justify-content-center">
                <div class="col-6">
                  <form action="<?= base_url('owner/edit_type') ?>" method="post">
                    <div class="input-group mb-3 py-2">
                      <input name="type_id" value="<?= esc($type['type_id']) ?>" hidden></input>
                      <button class="btn btn-warning" type="submit">Change</button>
                      <input type="text" class="form-control" value="<?= esc($type['description']) ?>" id="Name Change" name="description" required>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <?php foreach (${"_".$type['type']} as $item) : ?>
            <div class="col-12 col-lg-6">
              <div class="card">
                <div class="row">
                  <div class="col-8">
                    <div class="card-body">
                      <h5 class="card-title"><?= esc($item['item_name']) ?></h5>
                      <p class="card-text"><?= esc($item['description']) ?></p>
                    </div>
                  </div>
                  <div class="col-4 py-3">
                    <div class="container">
                      <div class="row">
                        <?php if ($item['kj'] != 0) : ?>
                          <div class="col-12"><?= esc($item['kj']) ?>kJ</div>
                        <?php endif; ?>
                        <div class="col-12">$<?= esc($item['price']) ?></div>
                        <div class="col-12">
                          <a href="" onclick='edit(<?= json_encode($item) ?>)' class="card-block stretched-link text-decoration-none text-warning" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">
                            <strong>EDIT</strong>
                          </a>
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
    <button onclick="add()" type="button" class="btn btn-success btn-lg" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">Add Item</button>
  </div>
</div>

<script type='text/javascript' src="<?php echo base_url(); ?>js/editmenu.js"></script>

<?= $this->endSection() ?>