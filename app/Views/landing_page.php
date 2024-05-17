<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<div class="cover-container w-100 p-3 mx-auto flex-column">
    <main class="px-3">
        <h1>MenuScanOrder</h1>
        <p class="lead">Create, display and edit menus that you are able to put on qrcodes</p>
        <p class="lead">
            <?php if (!session()->get('isLoggedIn')): ?>
                <a href="<?= base_url("login"); ?>" class="btn btn-lg btn-light fw-bold border-white bg-white">Login</a>
            <?php endif; ?>
            
        </p>
    </main>
</div>


<?= $this->endSection() ?>