<?php
include '../auth.php';
include '../config.php';
$id = $_SESSION['user']['id'];
$foto = $_SESSION['user']['profile_picture'];
if ($foto) {
    unlink("uploads/$foto");
    $conn->query("UPDATE users SET profile_picture=NULL WHERE id=$id");
    $_SESSION['user']['profile_picture'] = null;
}
header("Location: dashboard.php");
?>
