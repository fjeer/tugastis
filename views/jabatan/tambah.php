<?php
include_once '../layouts/header.php';
require_once '../../config/koneksi.php';
require_once '../../controllers/JabatanController.php';

$db = new Database();
$connection = $db->getConnection();
$controller = new JabatanController($connection);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->store();
}
?>

<div class="container mt-4">
    <h3>Tambah Jabatan</h3>
    <form method="POST">
        <div class="mb-3">
            <label for="jabatan" class="form-label">Nama Jabatan</label>
            <input type="text" name="jabatan" id="jabatan" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?php include_once '../layouts/footer.php'; ?>