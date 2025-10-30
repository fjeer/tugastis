<?php
require_once '../../config/koneksi.php';
require_once '../../controllers/DesaController.php';

$db = new Database();
$conn = $db->getConnection();
$controller = new DesaController($conn);

$id = $_GET['id'];
$controller->destroy($id);
