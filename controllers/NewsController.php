<?php
    if ($_SERVER["REQUEST_METHOD"] === "GET") {
        $action = $_GET["action"];
        echo $action;
    }
