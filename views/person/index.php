<?php
include_once '../layouts/header.php';
require_once '../../config/koneksi.php';
require_once '../../controllers/PersonController.php';

$db = new Database();
$connection = $db->getConnection();
$controller = new PersonController($connection);
$stmt = $controller->index();
?>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Data Person</h3>
        <a href="tambah.php" class="btn btn-primary">+ Tambah Data</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>JK</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th>Desa</th>
                <th>Jabatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= htmlspecialchars($row['nama']) ?></td>
                    <td><?= htmlspecialchars($row['jk']) ?></td>
                    <td><?= htmlspecialchars($row['tempat_lahir']) ?></td>
                    <td><?= htmlspecialchars($row['tanggal_lahir']) ?></td>
                    <td><?= htmlspecialchars($row['alamat']) ?></td>
                    <td><?= htmlspecialchars($row['desa'] ?? '-') ?></td>
                    <td><?= htmlspecialchars($row['jabatan'] ?? '-') ?></td>
                    <td>
                        <a href="edit.php?id=<?= $row['id_person'] ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="hapus.php?id=<?= $row['id_person'] ?>" class="btn btn-sm btn-danger"
                            onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php include_once '../layouts/footer.php'; ?>