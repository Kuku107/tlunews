<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>News Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
<?php
    include "../header.php";
    require_once "../../../models/news.php";
    $news = new News();
    $newsList = $news->getAllNews();
    session_start();
    if (!isset($_SESSION['user_id']) || (isset($_SESSION["role"]) && $_SESSION['role'] != 1)) {
        header ("Location: login.php");
        exit();
    }
?>
<div class="container">
    <a href="../../../controllers/NewsController.php?action=create">
        <button class="mt-3 btn btn-primary btn-lg">Thêm bài viết</button>
    </a>
    <table class="mt-5 table table-success table-striped">
        <thead>
        <tr>
            <th>Tiêu đề</th>
            <th>Nội dung</th>
            <th>Ảnh</th>
            <th>Khởi tạo lúc</th>
            <th>Danh mục</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($newsList as $key => $news) { ?>
            <tr>
                <td><?= $news["title"]?></td>
                <td><?= $news["content"]?></td>
                <td><img class="img-fluid" style="width: 100px; height: 100px" src=../../../<?= $news["image"]?> ></td>
                <td><?= $news["created_at"]?></td>
                <td><?= $news["category_name"]?></td>
                <td>
                    <a href="../../../controllers/NewsController.php?action=edit&id=<?= $news["id"]?>" class="btn btn-warning btn-sm me-2 mb-2" title="Edit">
                        <i class="bi bi-pencil-fill"></i>
                    </a>

                    <a href="../../../controllers/NewsController.php?action=delete&id=<?= $news["id"]?>" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Are you sure you want to delete this news?');">
                        <i class="bi bi-trash-fill"></i>
                    </a>
                </td>
            </tr>
        <?php }?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
