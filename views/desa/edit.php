<?php
include_once '../layouts/header.php';
require_once '../../config/koneksi.php';
require_once '../../controllers/DesaController.php';
require_once '../../controllers/KecamatanController.php';

$db = new Database();
$conn = $db->getConnection();
$controller = new DesaController($conn);
$kecController = new KecamatanController($conn);

$id = $_GET['id'];
$data = $controller->edit($id);
$kecamatan = $kecController->index();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->update($id);
}
?>

<div class="container mt-4">
    <h3>Edit Desa</h3>
    <form method="POST">
        <div class="mb-3">
            <label>Kecamatan</label>
            <select name="id_kecamatan" class="form-select" required>
                <option value="">-- Pilih Kecamatan --</option>
                <?php while ($k = $kecamatan->fetch(PDO::FETCH_ASSOC)): ?>
                    <option value="<?= $k['id_kecamatan'] ?>" <?= $k['id_kecamatan'] == $data['id_kecamatan'] ? 'selected' : '' ?>>
                        <?= $k['kecamatan'] ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="mb-3">
            <label>Nama Desa</label>
            <input type="text" name="desa" class="form-control" value="<?= htmlspecialchars($data['desa']) ?>"
                required>
        </div>
        <button type="submit" class="btn btn-warning">Update</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?php include_once '../layouts/footer.php'; ?>