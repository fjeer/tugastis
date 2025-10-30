<?php
include_once '../layouts/header.php';
require_once '../../config/koneksi.php';
require_once '../../controllers/KabupatenController.php';
require_once '../../controllers/ProvinsiController.php';

$db = new Database();
$conn = $db->getConnection();
$controller = new KabupatenController($conn);
$provController = new ProvinsiController($conn);

$id = $_GET['id'];
$data = $controller->edit($id);
$provinsi = $provController->index();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->update($id);
}
?>

<div class="container mt-4">
    <h3>Edit Kabupaten</h3>
    <form method="POST">
        <div class="mb-3">
            <label>Provinsi</label>
            <select name="id_provinsi" class="form-select" required>
                <option value="">-- Pilih Provinsi --</option>
                <?php while ($p = $provinsi->fetch(PDO::FETCH_ASSOC)): ?>
                    <option value="<?= $p['id_provinsi'] ?>" <?= $p['id_provinsi'] == $data['id_provinsi'] ? 'selected' : '' ?>>
                        <?= $p['provinsi'] ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="mb-3">
            <label>Nama Kabupaten</label>
            <input type="text" name="kabupaten" class="form-control" value="<?= $data['kabupaten'] ?>"
                required>
        </div>
        <button type="submit" class="btn btn-warning">Update</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?php include_once '../layouts/footer.php'; ?>