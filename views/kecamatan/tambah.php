<?php
include_once '../layouts/header.php';
require_once '../../config/koneksi.php';
require_once '../../controllers/KecamatanController.php';
require_once '../../controllers/KabupatenController.php';

$db = new Database();
$conn = $db->getConnection();
$controller = new KecamatanController($conn);
$kabController = new KabupatenController($conn);
$kabupaten = $kabController->index();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->store();
}
?>

<div class="container mt-4">
    <h3>Tambah Kecamatan</h3>
    <form method="POST">
        <div class="mb-3">
            <label>Kabupaten</label>
            <select name="id_kabupaten" class="form-select" required>
                <option value="">-- Pilih Kabupaten --</option>
                <?php while ($k = $kabupaten->fetch(PDO::FETCH_ASSOC)): ?>
                    <option value="<?= $k['id_kabupaten'] ?>"><?= $k['kabupaten'] ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="mb-3">
            <label>Kode Wilayah</label>
            <input type="text" name="id_kecamatan" class="form-control" maxlength="6" pattern="\d{1,6}" title="Masukkan maksimal 6 angka" required>
        </div>
        <div class="mb-3">
            <label>Nama Kecamatan</label>
            <input type="text" name="kecamatan" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?php include_once '../layouts/footer.php'; ?>