<?php
    require_once "../models/user.php";
    session_start();

    $user = new User();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $userData = $user->getByUsername($username);
        if ($userData && $password == $userData['password'])  {
            $_SESSION['user_id'] = $userData['id'];
            $_SESSION["role"] = $userData['role'];
            header("Location: ../views/admin/dashboard.php");
            exit();
        } else {
            $_SESSION['error_message'] = 'Wrong username or password';
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET["action"]) && $_GET["action"] == "logout") {
        session_destroy();
        header("Location: ../views/admin/login.php");
        exit();
    }