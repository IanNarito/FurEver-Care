<?php
// admin/manage_users.php
require_once 'auth.php';

// --- PHP LOGIC FOR CRUD OPERATIONS ---

// DELETE User
if (isset($_GET['delete'])) {
    $id_to_delete = $_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $id_to_delete);
    $stmt->execute();
    header("Location: manage_users.php?msg=deleted");
    exit();
}

// FETCH all users for display
$users_result = $conn->query("SELECT id, username, email, role FROM users ORDER BY id DESC");

include 'partials/header.php';
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Manage Users</h1>
</div>

<?php if(isset($_GET['msg'])): ?>
<div class="alert alert-success">User successfully <?= htmlspecialchars($_GET['msg']) ?>.</div>
<?php endif; ?>

<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($user = $users_result->fetch_assoc()): ?>
            <tr>
                <td><?= $user['id'] ?></td>
                <td><?= htmlspecialchars($user['username']) ?></td>
                <td><?= htmlspecialchars($user['email']) ?></td>
                <td><span class="badge bg-<?= ($user['role'] == 'admin') ? 'danger' : 'secondary' ?>"><?= ucfirst($user['role']) ?></span></td>
                <td>
                    <button class="btn btn-sm btn-primary">Edit</button>
                    <a href="manage_users.php?delete=<?= $user['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php
include 'partials/footer.php';
$conn->close();
?>