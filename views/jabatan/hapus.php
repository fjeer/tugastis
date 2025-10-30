<?php
require_once '../../config/koneksi.php';
require_once '../../controllers/JabatanController.php';

$db = new Database();
$connection = $db->getConnection();
$controller = new JabatanController($connection);

$id = $_GET['id'] ?? null;
if ($id) {
    $controller->delete($id);
} else {
    header("Location: index.php");
}
