<?php
include '../auth.php';
include '../config.php';
$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f0f2f5;
        }
        .profile-card {
            max-width: 500px;
            margin: 50px auto;
            background: white;
            border-radius: 1rem;
            padding: 2rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .profile-img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="profile-card text-center">
        <h4 class="mb-3">Selamat datang, <strong><?= htmlspecialchars($user['username']) ?></strong>!</h4>

        <?php if ($user['profile_picture']) : ?>
            <img src="../uploads/<?= $user['profile_picture'] ?>" class="profile-img img-thumbnail mb-3">
        <?php else: ?>
            <img src="https://via.placeholder.com/150?text=No+Photo" class="profile-img img-thumbnail mb-3">
        <?php endif; ?>

        <div class="d-grid gap-2 col-10 mx-auto">
            <!-- Upload form -->
            <form method="post" action="upload_photo.php" enctype="multipart/form-data" class="d-flex flex-column gap-2">
                <input type="file" name="photo" class="form-control" required>
                <button type="submit" class="btn btn-primary">Upload / Ganti Foto</button>
            </form>

            <!-- Optional: Delete Photo -->
            <?php if ($user['profile_picture']) : ?>
                <a href="delete_photo.php" onclick="return confirm('Yakin ingin menghapus foto profil?')" class="btn btn-danger">Hapus Foto</a>
            <?php endif; ?>

            <!-- Edit Username -->
            <a href="edit_profile.php" class="btn btn-warning">Edit Username</a>

            <!-- Logout -->
            <a href="../logout.php" class="btn btn-outline-secondary">Logout</a>
        </div>
    </div>
</div>

</body>
</html>
