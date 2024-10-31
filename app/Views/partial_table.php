<table border="1">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Description</th>
        <th>Department</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    <?php if (isset($tickets) && !empty($tickets)): ?>
        <?php foreach($tickets as $ticket): ?>
            <tr>
                <td><?= $ticket['id']; ?></td>
                <td><?= $ticket['title']; ?></td>
                <td><?= $ticket['description']; ?></td>
                <td><?= $ticket['department_name']; ?></td>
                <td><?= $ticket['status']; ?></td>
                <td><a href="/tickets/delete/<?= $ticket['id']; ?>">Delete</a></td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="6">No tickets found.</td>
        </tr>
    <?php endif; ?>
</table>
