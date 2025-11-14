<?php require_once '../service/session.php'; ?>

        <div class="touchable">
            <a href="main-profile.php">
                <div class="mini-profile">
                    <img src="<?= $_SESSION['PHOTO'] ?? 'default.png' ?>" alt="Foto Profil">
                    <div class="mini-profile-info">
                        <p class="username"><?= $_SESSION['nama'] ?? 'Guest' ?></p>
                        <p class="role"><?= $_SESSION['peran'] ?? 'Pemustaka' ?></p>
                    </div>
                </div>
            </a>
        </div>
