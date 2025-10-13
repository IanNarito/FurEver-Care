<?php
// admin/index.php
require_once 'auth.php'; // Security check

// Fetch stats for the dashboard
$totalUsers = $conn->query("SELECT COUNT(id) as count FROM users")->fetch_assoc()['count'];
$pendingAppointments = $conn->query("SELECT COUNT(id) as count FROM appointments WHERE status = 'Pending'")->fetch_assoc()['count'];
// Assuming you create these tables later:
// $petsForAdoption = $conn->query("SELECT COUNT(id) as count FROM pets WHERE adopted = 0")->fetch_assoc()['count'];

include 'partials/header.php';
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="card text-white bg-primary mb-3">
            <div class="card-header">Total Users</div>
            <div class="card-body">
                <h5 class="card-title"><?= $totalUsers ?></h5>
                <p class="card-text">Total number of registered users.</p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card text-white bg-warning mb-3">
            <div class="card-header">Pending Appointments</div>
            <div class="card-body">
                <h5 class="card-title"><?= $pendingAppointments ?></h5>
                <p class="card-text">Appointments needing confirmation.</p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card text-white bg-success mb-3">
            <div class="card-header">Pets for Adoption</div>
            <div class="card-body">
                <h5 class="card-title">0 </h5>
                <p class="card-text">Pets waiting for a new home.</p>
            </div>
        </div>
    </div>
</div>

<?php
include 'partials/footer.php';
$conn->close();
?>