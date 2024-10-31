<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('css/sample.css') ?>">
    <script src="<?= base_url('js/sample.js') ?>"></script>
    <title>Create User</title>
</head>

<body>
    <?= $this->include('layout/navbar.php') ?>

    <div class="dashboad">
        <div class="dashboard-app">
            <div class="dashboard-content">
                <div class="container">
                    <div class="card">
                        <div class="card-header">
                            <h2>Create New User</h2>
                        </div>
                        <div class="card-body">
                            <?php if (session()->getFlashdata('success')): ?>
                            <p style="color: green;"><?php echo session()->getFlashdata('success');?>Account Created Successfully</p>
                            <?php endif; ?>
                            <form action="/register/store" method="post">
                                <?= csrf_field() ?>

                                <label for="username">Username:</label>
                                <input type="text" name="username" id="username" required><br>

                                <label for="password">Password:</label>
                                <input type="password" name="password" id="password" required><br>

                                <label for="name">Name:</label>
                                <input type="text" name="name" id="name" required><br>

                                <label for="role">Role:</label>
                                <select name="role" id="role">
                                    <option value="">Select User</option>
                                    <option value="user">User</option>
                                    <option value="admin">Admin</option>
                                    <option value="PIC">PIC</option>
                                    <option value="koordinator">Koordinator</option>
                                    <option value="KD">KD</option>
                                </select><br>
                                <label for="department_id">Department:</label>
                                <select name="department_id" id="department_id" required>
                                    <option value="">Select Department</option>
                                    <option value="1">SDM</option>
                                    <option value="2">Akademik</option>
                                    <option value="3">TI</option>
                                    <option value="4">Sarpras</option>
                                    <option value="5">Keuangan</option>
                                    <option value="6">Penggembalaan</option>
                                </select><br>

                                <button type="submit">Create User</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>