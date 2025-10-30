<?php
include_once '../layouts/header.php';
require_once '../../config/koneksi.php';
require_once '../../controllers/KecamatanController.php';
require_once '../../controllers/KabupatenController.php';

$db = new Database();
$conn = $db->getConnection();
$controller = new KecamatanController($conn);
$kabController = new KabupatenController($conn);

$id = $_GET['id'];
$data = $controller->edit($id);
$kabupaten = $kabController->index();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->update($id);
}
?>

<div class="container mt-4">
    <h3>Edit Kecamatan</h3>
    <form method="POST">
        <div class="mb-3">
            <label>Kabupaten</label>
            <select name="id_kabupaten" class="form-select" required>
                <option value="">-- Pilih Kabupaten --</option>
                <?php while ($k = $kabupaten->fetch(PDO::FETCH_ASSOC)): ?>
                    <option value="<?= $k['id_kabupaten'] ?>" <?= $k['id_kabupaten'] == $data['id_kabupaten'] ? 'selected' : '' ?>>
                        <?= $k['kabupaten'] ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="mb-3">
            <label>Nama Kecamatan</label>
            <input type="text" name="kecamatan" class="form-control" value="<?= $data['kecamatan'] ?>"
                required>
        </div>
        <button type="submit" class="btn btn-warning">Update</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?php include_once '../layouts/footer.php'; ?>