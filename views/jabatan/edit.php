<?php
include_once '../layouts/header.php';
require_once '../../config/koneksi.php';
require_once '../../controllers/JabatanController.php';

$db = new Database();
$connection = $db->getConnection();
$controller = new JabatanController($connection);

$id = $_GET['id'] ?? null;
if (!$id)
    header("Location: index.php");

$data = $controller->edit($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->update($id);
}
?>

<div class="container mt-4">
    <h3>Edit Jabatan</h3>
    <form method="POST">
        <div class="mb-3">
            <label for="jabatan" class="form-label">Nama Jabatan</label>
            <input type="text" name="jabatan" id="jabatan" class="form-control"
                value="<?= htmlspecialchars($data['jabatan']) ?>" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?php include_once '../layouts/footer.php'; ?>