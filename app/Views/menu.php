<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= esc($restaurant['name']) ?> - Table <?= esc($table_no) ?></title>
  <!-- This is the main stylesheet for Bootstrap. It includes all the CSS necessary for Bootstrap's components and utilities to work. -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- Include Bootstrap Icons -->
  <!-- This link imports the Bootstrap Icons library, which provides a wide range of SVG icons for use in your projects. -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>

<body>
  <header>
    <nav class="navbar bg-dark">
      <div class="container-fluid justify-content-center">
        <div class="row mx-100">
          <div class="col mx-100">
            <h1 class="text-light">
              <?= esc($restaurant['name']) ?> - Table <?= esc($table_no) ?>
            </h1>
          </div>
        </div>
      </div>
    </nav>
  </header>

  <ul class="nav justify-content-center sticky-top bg-body-tertiary">
    <?php foreach ($types as $type): ?>
      <li class="nav-item">
        <a class="nav-link" href="#<?= esc($type['type']) ?>"><?= esc($type['type']) ?></a>
      </li>
    <?php endforeach; ?>
  </ul>

  <template id="itemTemplate">
    <div class="col-12">
      <div class="card p-3">
        <div class="row">
          <div class="col-3">
            <select onchange="updatePrice()" name="item_id" class="form-select" aria-label="Default select example" id="itemAmount">
              <option selected value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
            </select>
            <div>
              <button onclick='remove(this)' type="button" class="btn-close"></button>
            </div>
          </div>
          <div class="col-6">
            <p><strong></strong></p>
          </div>
          <div class="col-3" id="itemPrice">
            <p><strong></strong></p>
          </div>
        </div>
      </div>
    </div>
  </template>


  <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions"
    aria-labelledby="offcanvasWithBothOptionsLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Orders</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <form method='post' action="<?= base_url('menu/' . $restaurant['restaurant_id'] . '/' . $table_no) ?>">
      <div class="offcanvas-body">
        <div class="row" id="cart">
        </div>
      </div>
      <div class="bg-body-tertiary">
        <div class="row m-3">
          <div class="col-8" id="totalItems">
            <p>Total item(s): 0</p>
          </div>

          <div class="col-4" id="totalPrice">
            <p value="0"><strong>$0.00</strong></p>
          </div>
        </div>
      </div>
      <div class="container m-2">
        <div class="d-grid gap-2 col-12 mx-auto p-3">
          <button type="submit" class="btn btn-primary btn-lg">Complete Order</button>
        </div>
      </div>
    </form>
  </div>

  <main>
    <?php foreach ($types as $type): ?>
      <section id="<?= esc($type['type']) ?>" class="py-5">
        <div class="container">
          <div class="row gy-2">
            <div class="col-12">
              <figure class="text-center">
                <h2><?= esc($type['type']) ?></h2>
                <p class="text-body-secondary"><?= esc($type['description']) ?></p>
              </figure>
            </div>

            <?php foreach (${"_" . $type['type']} as $item): ?>
              <div class="col-12 col-lg-6">
                <div class="card">
                  <div class="row">
                    <div class="col-8">
                      <div class="card-body">
                        <h5 class="card-title"><?= esc($item['item_name']) ?></h5>
                        <p class="card-text"><?= esc($item['description']) ?></p>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="container">
                        <div class="row py-3">
                          <?php if ($item['kj'] != 0): ?>
                            <div class="col-12"><?= esc($item['kj']) ?>kJ</div>
                          <?php endif; ?>
                          <div class="col-12">$<?= esc($item['price']) ?></div>
                          <div class="col-12">
                            <a onclick='additem(<?= json_encode($item) ?>)'
                              class="card-block stretched-link text-decoration-none" href="#" id="additem"
                              value="<?= esc($item['item_id']) ?>">
                              <strong>Order Now</strong>
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
      <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="offcanvas"
        data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">View Cart <span
          class="badge text-bg-secondary" id="cartamount">0</span></button>
    </div>
  </div>

  <footer class="bg-dark text-light py-4">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <p>&copy; 2024 MenuScan. All rights reserved.</p>
        </div>
        <div class="col-lg-6 text-md-end">
          <a href="#" class="text-light me-3">Privacy Policy</a>
          <a href="#" class="text-light">Terms of Service</a>
        </div>
      </div>
    </div>
  </footer>
  <!-- This script includes all of Bootstrap's JavaScript-based components and behaviors, such as modal windows, dropdowns, and tooltips.  -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

<script>
  function additem(item) {
    const template = document.getElementById('itemTemplate');
    const templateContent = template.content.cloneNode(true);
    const cart = document.getElementById('cart');

    for (const child of cart.children) {
      if (child.querySelector('select').name == item['item_id']) {
        if (parseInt(child.querySelector('select').value) < 8) {
          child.querySelector('select').value = parseInt(child.querySelector('select').value) + 1
        }
        return
      }
    }

    templateContent.querySelectorAll('strong')[0].textContent = item['item_name'];
    templateContent.querySelectorAll('select')[0].name = item['item_id'];
    templateContent.querySelectorAll('strong')[1].textContent = '$' + item['price'];
    templateContent.querySelectorAll('strong')[1].setAttribute('value', item['price']);

    cart.appendChild(templateContent);

    updatePrice();

  }

  function updatePrice() {
    const cart = document.getElementById('cart');
    var total = 0;
    var price = 0;
    var amount = 0;
    var totalAmount = 0;
    for (const child of cart.children) {
      price = child.querySelectorAll('strong')[1].getAttribute('value')
      amount = child.querySelector('select').value
      totalAmount += parseInt(amount);
      total += price * amount;
    }

    const itemAmount = document.getElementById('cartamount');
    itemAmount.textContent = cart.childElementCount;
    document.getElementById('totalItems').textContent = 'Total item(s): ' + totalAmount;
    document.getElementById('totalPrice').querySelector('strong').textContent = '$' + total;
  }

  function remove(e) {
    e.parentElement.parentElement.parentElement.parentElement.parentElement.remove();
    updatePrice();
  }



</script>

</html>