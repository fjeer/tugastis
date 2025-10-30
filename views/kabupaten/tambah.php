<?php
include_once '../layouts/header.php';
require_once '../../config/koneksi.php';
require_once '../../controllers/KabupatenController.php';
require_once '../../controllers/ProvinsiController.php';

$db = new Database();
$conn = $db->getConnection();
$controller = new KabupatenController($conn);
$provController = new ProvinsiController($conn);
$provinsi = $provController->index();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->store();
}
?>

<div class="container mt-4">
    <h3>Tambah Kabupaten</h3>
    <form method="POST">
        <div class="mb-3">
            <label>Provinsi</label>
            <select name="id_provinsi" class="form-select" required>
                <option value="">-- Pilih Provinsi --</option>
                <?php while ($p = $provinsi->fetch(PDO::FETCH_ASSOC)): ?>
                    <option value="<?= $p['id_provinsi'] ?>"><?= $p['provinsi'] ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="mb-3">
            <label>Kode Wilayah</label>
            <input type="text" name="id_kabupaten" class="form-control" maxlength="4" pattern="\d{1,4}" title="Masukkan maksimal 4 angka" required>
        </div>
        <div class="mb-3">
            <label>Nama Kabupaten</label>
            <input type="text" name="kabupaten" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?php include_once '../layouts/footer.php'; ?>