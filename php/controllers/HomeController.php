<?php
class HomeController {
    public function index() {
        require_once '../views/home.php';
    }
    public function about() {
        require_once '../views/about.php';
    }
    public function contact() {
        require_once '../views/contact.php';
    }
}
?>