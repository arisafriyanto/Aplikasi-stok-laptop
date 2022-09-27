<?php

require_once __DIR__ . "/template/header.php";

if (!isset($_SESSION['login'])) {
    header("location: ./login.php");
    exit();
}

require_once __DIR__ . "/template/menu.php";
require_once __DIR__ . "/template/content.php";

require_once __DIR__ . "/template/footer.php";
