<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('css/sample.css') ?>">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?= base_url('js/sample.js') ?>"></script>
    <title>Dashboard</title>
</head>

<body>
    <?php $session = session();?>
    <?= $this->include('layout/navbar.php') ?>
    <div class="dashboard">
        <div class="dashboard-app">
            <div class="dashboard-content">
                <div class="container">
                    <div class="card">
                        <div class="card-header">
                            <h2>Tickets List</h2>
                            <!-- Form pencarian -->
                            <form id="searchForm" action="javascript:void(0);">
                                <input type="text" name="query" id="query"
                                    placeholder="Search by title or description..." value="">
                                <button type="submit">Search</button>
                            </form>
                        </div>
                        <div class="card-body">
                            <a href="<?= base_url('createticket') ?>">Create New Ticket</a>

                            <!-- Area untuk menampilkan tabel tiket -->
                            <div id="ticketTable">
                                <?php include('partial_table.php'); ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        $('form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '<?= base_url('tickets/search') ?>',
                method: 'GET',
                data: $(this).serialize(),
                success: function(response) {
                    $('#ticketTable').html(
                    response); // Memperbarui tabel dengan hasil pencarian
                }
            });
        });
    });
    </script>

</body>

</html>