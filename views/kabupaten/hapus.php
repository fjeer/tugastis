<?php
require_once '../../config/koneksi.php';
require_once '../../controllers/KabupatenController.php';

$db = new Database();
$conn = $db->getConnection();
$controller = new KabupatenController($conn);

$id = $_GET['id'];
$controller->destroy($id);
