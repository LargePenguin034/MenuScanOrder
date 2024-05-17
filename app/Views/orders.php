<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Orders</title>
    <!-- This is the main stylesheet for Bootstrap. It includes all the CSS necessary for Bootstrap's components and utilities to work. -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Include Bootstrap Icons -->
    <!-- This link imports the Bootstrap Icons library, which provides a wide range of SVG icons for use in your projects. -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>

<body>
    <header>
        <nav class="navbar bg-success text-light">
            <div class="container-fluid justify-content-center">
                <div class="row mx-100">
                    <div class="col mx-100">
                        <h1 class="text-light">
                            Orders - Bump Mode
                        </h1>
                    </div>
                </div>
            </div>
        </nav>
    </header>



    <main>
        <section class="py-5">
            <div class="container-fluid">

                <div class="row g-3">
                    <?php foreach ($orders as $order): ?>
                        <div class="col">
                            <div class="card" style="width: 18rem;">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col">
                                            <strong>Table: <?= $order["table"] ?></strong>
                                            <div>
                                                <strong>#<?= $order["order_id"] ?></strong>
                                            </div>

                                        </div>
                                        <div class="col">
                                            <strong><?= substr($order['time_created'], -8) ?></strong>
                                        </div>
                                    </div>

                                </div>
                                <ul class="list-group list-group-flush">
                                    <?php foreach ($order_id[$order['order_id']] as $item): ?>
                                        <li class="list-group-item"><?= esc($item['item_name']) ?><strong> x
                                                <?= esc($item['amount']) ?></strong></li>
                                    <?php endforeach; ?>
                                </ul>
                                <div class="card-footer">
                                    Price: <Strong>$<?= esc($order['totalPrice']) ?></Strong>
                                </div>
                                <form method='post' id='changeOrder' action="<?= base_url('owner/order') ?>">
                                    <input type="text" name='action' value='Bump' hidden>
                                    <input type="text" name='order_id' value='<?= $order["order_id"] ?>' hidden>
                                    <button class="card-block stretched-link text-decoration-none btn btn-link" type='submit'></button>
                                </form>
                            </div>
                        </div>
                    <?php endforeach; ?>
        </section>

    </main>
    <footer>
        <ul class="nav nav-pills nav-fill fixed-bottom">
            <li class="nav-item">
                <a class="nav-link active bg-danger" href="<?= base_url('owner/order/recall') ?>">Recall Last</a>
            </li>
        </ul>
    </footer>

    <!-- This script includes all of Bootstrap's JavaScript-based components and behaviors, such as modal windows, dropdowns, and tooltips.  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>