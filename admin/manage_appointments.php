<?php
// admin/manage_appointments.php
require_once 'auth.php';
include 'partials/header.php';

// Fetch all appointments
$result = $conn->query("SELECT * FROM appointments ORDER BY appointment_date DESC, preferred_time DESC");
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Manage Appointments</h1>
</div>

<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Client Name</th>
                <th>Pet Name</th>
                <th>Service</th>
                <th>Date & Time</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= htmlspecialchars($row['full_name']) ?></td>
                    <td><?= htmlspecialchars($row['pet_name']) ?></td>
                    <td><?= htmlspecialchars($row['service']) ?></td>
                    <td><?= date('M d, Y', strtotime($row['appointment_date'])) . ' at ' . date('h:i A', strtotime($row['preferred_time'])) ?></td>
                    <td><span class="badge bg-info text-dark"><?= htmlspecialchars($row['status']) ?></span></td>
                    <td>
                        <a href="generate_pdf.php?id=<?= $row['id'] ?>" target="_blank" class="btn btn-sm btn-secondary">
                            <i class="bi bi-file-earmark-pdf"></i> View PDF
                        </a>
                    </td>
                </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7" class="text-center">No appointments found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php
include 'partials/footer.php';
$conn->close();
?>