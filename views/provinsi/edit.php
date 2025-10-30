<?php
include_once '../layouts/header.php';
require_once '../../config/koneksi.php';
require_once '../../controllers/ProvinsiController.php';

$db = new Database();
$conn = $db->getConnection();
$controller = new ProvinsiController($conn);

$id = $_GET['id'];
$data = $controller->edit($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->update($id);
}
?>
<div class="container mt-4">
    <h3>Edit Provinsi</h3>
    <form method="POST">
        <div class="mb-3">
            <label>Nama Provinsi</label>
            <input type="text" name="provinsi" class="form-control" value="<?= $data['provinsi'] ?>" required>
        </div>
        <button type="submit" class="btn btn-warning">Update</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
<?php include_once '../layouts/footer.php'; ?>