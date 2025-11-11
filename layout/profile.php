<?php require_once '../service/session.php'; ?>

<style>
    .mini-profile {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 16px;
        background: #ffffff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        width: fit-content;
        font-family: Arial, sans-serif;
    }

    .mini-profile img {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        object-fit: cover;
        background: #ddd;
    }

    .mini-profile-info {
        display: flex;
        flex-direction: column;
        line-height: 1.2;
    }

    .mini-profile-info p {
        margin: 0;
    }

    .username {
        font-weight: bold;
        font-size: 16px;
    }

    .role {
        font-size: 13px;
        color: #555;
    }
</style>

<div class="mini-profile">
    <img src="<?= $_SESSION['PHOTO'] ?? 'default.png' ?>" alt="Foto Profil">
    
    <div class="mini-profile-info">
        <p class="username"><?= $_SESSION['USERNAME'] ?? 'Guest' ?></p>
        <p class="role"><?= $_SESSION['ROLE'] ?? 'Pengguna' ?></p>
    </div>
</div>
