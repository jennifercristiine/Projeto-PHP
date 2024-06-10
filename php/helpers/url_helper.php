<?php
require_once '../config/config.php';

function redirect($page) {
    header('Location: ' . URLROOT . '/' . $page);
    exit();
}
?>