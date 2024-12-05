<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
<?php
    include "header.php";
    require_once "../../models/news.php";
    require_once "../../models/categories.php";
    $new = new News();
    $categories = new Categories();
    session_start();
    if (!isset($_SESSION['user_id']) || (isset($_SESSION["role"]) && $_SESSION['role'] != 1)) {
        header ("Location: login.php");
        exit();
    }
?>

<div class="container mt-5">

    <div class="row justify-content-center">
        <!-- Card 1: Số tin tức -->
        <div class="col-md-6 mb-4">
            <div class="card text-bg-light shadow-sm rounded-3" style="height: 15rem;">
                <div class="card-header text-center fs-4 fw-bold">SỐ TIN TỨC</div>
                <div class="card-body d-flex align-items-center justify-content-center">
                    <p class="fs-3 fw-bold text-dark"><?= $new->getAllNews() ?></p>
                </div>
            </div>
        </div>

        <!-- Card 2: Số danh mục -->
        <div class="col-md-6 mb-4">
            <div class="card text-bg-light shadow-sm rounded-3" style="height: 15rem;">
                <div class="card-header text-center fs-4 fw-bold">SỐ DANH MỤC</div>
                <div class="card-body d-flex align-items-center justify-content-center">
                    <p class="fs-3 fw-bold text-dark"><?= $categories->getAllCategories() ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
