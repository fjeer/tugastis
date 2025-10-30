<?php
include_once '../layouts/header.php';
require_once '../../config/koneksi.php';
require_once '../../controllers/ProvinsiController.php';

$db = new Database();
$conn = $db->getConnection();
$controller = new ProvinsiController($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->store();
}
?>
<div class="container mt-4">
    <h3>Tambah Provinsi</h3>
    <form method="POST">
        <div class="mb-3">
            <label>Kode Wilayah</label>
            <input type="text" name="id_provinsi" class="form-control" maxlength="2" pattern="\d{1,2}" title="Masukkan maksimal 2 angka" required>
        </div>
        <div class="mb-3">
            <label>Nama Provinsi</label>
            <input type="text" name="provinsi" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
<?php include_once '../layouts/footer.php'; ?>