<?php require_once '../function.php';
    if(isset($_POST['logout'])){
        unset($_SESSION['isAdmin']);
        header('location: ../index.php');
        exit();
    }
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout Akun</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .logout-box {
            background: white;
            padding: 25px;
            border-radius: 8px;
            text-align: center;
            width: 320px;
            box-shadow: 0 0 12px rgba(0,0,0,0.1);
        }

        .logout-box h2 {
            margin-bottom: 10px;
        }

        .logout-box p {
            color: #555;
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            padding: 10px 18px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            font-weight: bold;
        }

        .btn-logout {
            background: #e63946;
            color: white;
        }

        .btn-logout:hover {
            background: #d62828;
        }

        .btn-logout {
            padding: 11.5px 18px;
        }

        .btn-cancel-logout {
            background: #457b9d;
            color: white;
            text-decoration: none;
        }

        .btn-cancel-logout a {
            text-decoration: none;
            color: white;
        }

        .btn-cancel-logout:hover {
            background: #1d3557;
        }
    </style>
</head>

<body>
    <div class="logout-box">
        <h2>Keluar Akun?</h2>
        <p>Anda yakin ingin logout dari akun ini?</p>

        <!-- FORM POST -->
        <form action="" method="POST">
            <button type="submit" name="logout" class="btn btn-logout">Logout</button>
            
            <a class="btn btn-cancel-logout" href="daftar_buku.php">Batal</a>
        </form>
    </div>
</body>
