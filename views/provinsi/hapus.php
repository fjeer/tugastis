<?php
require_once '../../config/koneksi.php';
require_once '../../controllers/ProvinsiController.php';

$db = new Database();
$conn = $db->getConnection();
$controller = new ProvinsiController($conn);

$id = $_GET['id'];
$controller->destroy($id);
