<?php
require_once '../../config/koneksi.php';
require_once '../../controllers/PersonController.php';

$db = new Database();
$connection = $db->getConnection();
$controller = new PersonController($connection);

$id = $_GET['id'] ?? null;
if ($id) {
    $controller->destroy($id);
}

header('Location: index.php');
exit;
?>