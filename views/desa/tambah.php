<?php
include_once '../layouts/header.php';
require_once '../../config/koneksi.php';
require_once '../../controllers/DesaController.php';
require_once '../../controllers/KecamatanController.php';

$db = new Database();
$conn = $db->getConnection();
$controller = new DesaController($conn);
$kecController = new KecamatanController($conn);
$kecamatan = $kecController->index();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->store();
}
?>

<div class="container mt-4">
    <h3>Tambah Desa</h3>
    <form method="POST">
        <div class="mb-3">
            <label>Kecamatan</label>
            <select name="id_kecamatan" class="form-select" required>
                <option value="">-- Pilih Kecamatan --</option>
                <?php while ($k = $kecamatan->fetch(PDO::FETCH_ASSOC)): ?>
                    <option value="<?= $k['id_kecamatan'] ?>"><?= $k['kecamatan'] ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="mb-3">
            <label>Kode Wilayah</label>
            <input type="text" name="id_desa" class="form-control" maxlength="10" pattern="\d{1,10}" title="Masukkan maksimal 10 angka" required>
        </div>
        <div class="mb-3">
            <label>Nama Desa</label>
            <input type="text" name="desa" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?php include_once '../layouts/footer.php'; ?>