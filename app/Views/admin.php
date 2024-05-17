
<?= $this->extend('template') ?>
<?= $this->section('content') ?>

    <section class="py-5">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>User Management - Admin Panel</h2>
            </div>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= esc($user['name']) ?></td>
                        <td><?= esc($user['email']) ?></td>
                        <td><?= esc($user['status']) ?></td>
                        <td>
                            <a class="btn btn-sm btn-info me-2" href="<?= base_url('menu/' . $user['restaurant_id']) . "/1" ?>"><i class="bi bi-eye-fill"></i></a>
                            <a class="btn btn-sm btn-primary me-2" href="<?= base_url('admin/edit/' . $user['restaurant_id']) ?>"><i class="bi bi-pencil-fill"></i></a>
                            <a class="btn btn-sm btn-warning me-2" href="<?= base_url('admin/delete/' . $user['restaurant_id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this user?')"><i class="bi bi-dash-circle-fill"></i></a>
                        </td>
                        <!-- Add more user details as needed -->
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>

<?= $this->endSection() ?>