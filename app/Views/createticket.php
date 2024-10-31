<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('css/sample.css') ?>">
    <script src="<?= base_url('js/sample.js') ?>"></script>
    <title>Create Ticket</title>
</head>

<body>
    <?= $this->include('layout/navbar.php') ?>
    <div class="dashboad">
        <div class="dashboard-app">
            <div class="dashboard-content">
                <div class="container">
                    <div class="card">
                        <div class="card-header">
                            <h2>Create Ticket</h2>
                        </div>
                        <div class="card-body">
                            <?php if (session()->getFlashdata('success')): ?>
                            <p style="color: green;"><?php echo session()->getFlashdata('success'); ?></p>
                            <?php endif; ?>
                            <form action="/saveticket" method="post">
                                <label for="title">Title:</label>
                                <input type="text" name="title" id="title" required><br>

                                <label for="description">Description:</label>
                                <textarea name="description" id="description" required></textarea><br>

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

                                <button type="submit">Create Ticket</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>