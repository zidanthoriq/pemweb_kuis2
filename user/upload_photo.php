<?php
session_start();
include '../auth.php';
include '../config.php';

$user = $_SESSION['user'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['photo'])) {
    $photo = $_FILES['photo'];
    $ext = pathinfo($photo['name'], PATHINFO_EXTENSION);
    $filename = uniqid() . '_' . time() . '.' . $ext;
    $target = "../uploads/" . $filename;

    if (move_uploaded_file($photo['tmp_name'], $target)) {
        
        $stmt = $conn->prepare("UPDATE users SET profile_picture = ? WHERE id = ?");
        $stmt->bind_param("si", $filename, $user['id']);
        $stmt->execute();

        
        $_SESSION['user']['profile_picture'] = $filename;

        header("Location: dashboard.php");
        exit;
    } else {
        echo "Upload gagal.";
    }
}
?>
