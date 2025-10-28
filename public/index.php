<?php
require_once __DIR__ . '/../app/controllers/MahasiswaController.php';

$controller = new MahasiswaController();

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    if ($action == 'create') {
        $controller->create();
    } elseif ($action == 'store') {
        $controller->store();
    } elseif ($action == 'edit') {
        $controller->edit($_GET['id']);
    } elseif ($action == 'update') {
        $controller->update();
    } elseif ($action == 'delete') {
        $controller->delete($_GET['id']);
    } else {
        $controller->index();
    }
} else {
    $controller->index();
}
