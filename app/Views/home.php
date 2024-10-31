<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('css/sample.css') ?>">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?= base_url('js/sample.js') ?>"></script>
    <title>Home</title>

</head>

<body>
    <?php $session = session(); ?>
    <?= $this->include('layout/navbar.php') ?>

    <div class='dashboard'>
        <div class='dashboard-app'>
            <div class='dashboard-content'>
                <div class='container'>
                    <div class='card'>
                        <div class='card-header'>
                            <h1>Welcome <?= esc($session->get('name')); ?></h1>
                        </div>
                        <div class='card-body'>
                            <p>Your Role is: <strong><?= esc($session->get('role')); ?></strong></p>
                            <p>Your Job is to Finish the Ticket</p>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <h2>Recent Tickets for You</h2>
                </div>

                <div class='container'>
                    <div class="recent-tickets-container">
                        <?php if (!empty($recentTickets)): ?>
                            <?php foreach ($recentTickets as $ticket): ?>
                                <div class="ticket-card">
                                    <div class="head-card">
                                        <h3><?= esc($ticket['title']); ?></h3>
                                    </div>
                                    <div class="body-card">
                                        <p>Status: <strong><?= esc($ticket['status']); ?></strong></p>
                                        <p><b>description :</b><br><?= esc($ticket['description']); ?></p>
                                        <p><?= esc($ticket['created_at']); ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>    
                        <?php else: ?>
                            <p>No recent tickets available.</p>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>

</html>
