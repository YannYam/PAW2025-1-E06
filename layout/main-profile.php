<?php 
include_once '../function.php';

if(!$_SESSION['isLogin']){
    header('location: ' . BASE_PATH . '/index.php');
    exit();
}

$list_css_tambahan = [
    'main.administrator.css',
    'menu.administrator.css'
];

include_once BASE_PATH . '/layout/header.php';
include_once BASE_PATH . '/layout/menu.administrator.php';
?>

<!-- code -->

<?php include_once BASE_PATH . '/layout/footer.php' ?>

