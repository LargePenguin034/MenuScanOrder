<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MenuScanOrder</title>
  <!-- This is the main stylesheet for Bootstrap. It includes all the CSS necessary for Bootstrap's components and utilities to work. -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- Include Bootstrap Icons -->
  <!-- This link imports the Bootstrap Icons library, which provides a wide range of SVG icons for use in your projects. -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>

<style>
  .flex-wrapper {
    display: flex;
    min-height: 100vh;
    flex-direction: column;
    justify-content: space-between;
  }
</style>

<body class="flex-wrapper bg-body-tertiary">
  <header>
    <nav class="navbar navbar-expand-lg bg-dark">
      <div class="container-fluid">
        <?php if (!session()->get('isAdmin') || $_SESSION["admin_restaurant_id"] == $_SESSION["restaurant_id"]): ?>
          <a class="navbar-brand text-light" >MenuScan Dashboard</a>
        <?php else: ?>
          <a class="navbar-brand text-light" href="<?= base_url("admin"); ?>"><Strong>Return to Admin</Strong></a>
        <?php endif; ?>
        <button class="navbar-toggler text-light" type="button" data-bs-toggle="collapse"
          data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
          aria-label="Toggle navigation">
          <span class="bi bi-list text-light"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <?php if (session()->get('isLoggedIn')): ?>

              <?php if (session()->get('isAdmin') && $_SESSION["admin_restaurant_id"] == $_SESSION["restaurant_id"]): ?>
                <li class="nav-item"></li>
                <a class="nav-link text-light me-2"
                  href="<?= base_url("admin"); ?>">Admin Panel</a>
                </li>
              <?php endif; ?>

              <li class="nav-item">
                <a class="nav-link text-light" aria-current="page" href="<?= base_url("owner/tables"); ?>">Tables</a>
              </li>

              <li class="nav-item">
                <a class="nav-link text-light" href="<?= base_url("owner/edit"); ?>">Edit Menu</a>
              </li>

              <li class="nav-item">
                <a class="nav-link text-light" href="<?= base_url("owner/order"); ?>">Orders</a>
              </li>




            <?php endif; ?>
            <?php if (session()->get('isLoggedIn')): ?>
              <a class="nav-link text-light me-2 justify-content-right" href="<?= base_url("logout"); ?>">Logout</a>
            <?php else: ?>
              <a class="nav-link text-light me-2 justify-content-right" href="<?= base_url("login"); ?>">Login</a>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </nav>

  </header>

  <main>
    <?= $this->renderSection('content') ?>
  </main>

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

</html>