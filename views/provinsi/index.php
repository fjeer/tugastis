<?php
include_once '../layouts/header.php';
require_once '../../config/koneksi.php';
require_once '../../controllers/ProvinsiController.php';

$db = new Database();
$conn = $db->getConnection();
$controller = new ProvinsiController($conn);
$stmt = $controller->index();
?>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Data Provinsi</h3>
        <a href="tambah.php" class="btn btn-primary mb-3">+ Tambah Provinsi</a>
    </div>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Kode Wilayah</th>
                <th>Nama Provinsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= htmlspecialchars($row['id_provinsi']) ?></td>
                    <td><?= htmlspecialchars($row['provinsi']) ?></td>
                    <td>
                        <a href="edit.php?id=<?= $row['id_provinsi'] ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="hapus.php?id=<?= $row['id_provinsi'] ?>" class="btn btn-sm btn-danger"
                            onclick="return confirm('Yakin hapus?')">Hapus</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php include_once '../layouts/footer.php'; ?>