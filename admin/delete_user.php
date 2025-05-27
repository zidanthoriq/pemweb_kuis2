<?php
include '../auth.php';
include '../config.php';

if ($_SESSION['user']['role'] !== 'admin') {
    header("Location: ../user/dashboard.php");
    exit();
}

$id = $_GET['id'];
if ($id != $_SESSION['user']['id']) {
    $conn->query("DELETE FROM users WHERE id=$id");
}
header("Location: dashboard.php");
