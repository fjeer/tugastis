<?php
require_once '../../config/koneksi.php';
require_once '../../controllers/KecamatanController.php';

$db = new Database();
$conn = $db->getConnection();
$controller = new KecamatanController($conn);

$id = $_GET['id'];
$controller->destroy($id);
