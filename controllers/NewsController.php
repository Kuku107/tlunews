<?php
    require_once("../models/news.php");
    require_once("../models/categories.php");

    if ($_SERVER["REQUEST_METHOD"] === "GET") {
        $action = $_GET["action"];
        if ($action === "create") {
            $categories = new Categories();
            $categoriesList = $categories->getAllCategories();
            require "../views/admin/news/add.php";
        }

        if ($action === "edit") {
            $id = $_GET["id"];
            $news = new News();
            $news = $news->getById($id);
            $categories = new Categories();
            $category_name = $categories->getNameById($news["category_id"]);
            print_r($news);
            print_r($category_name);
        }
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $categories = new Categories();
        $action = $_GET["action"];

        $id = $_POST["id"] ?? 0;
        $title = $_POST["title"];
        $content = $_POST["content"];
        $category_name = $_POST["category"];
        $category_id = $categories->getIdByName($category_name);
        $created_at = date("Y-m-d H:i:s");
        $anh = $_POST["anh"] ?? "";
        if (isset($_FILES["anh"]) && $_FILES["anh"]["error"] == 0) {
            $target_dir = __DIR__ . "\\..\\assets\\images\\";
            $target_file = $target_dir . basename($_FILES["anh"]["name"]);
            move_uploaded_file($_FILES["anh"]["tmp_name"], $target_file);
            $anh = "assets/images/" . basename($_FILES["anh"]["name"]);
        }
        $news = new News($id, $title, $content, $anh, $created_at, $category_id);

        if ($action === "create") {
            $news->createNews();
            header ("Location: ../views/admin/news/index.php");
            exit();
        }
    }
