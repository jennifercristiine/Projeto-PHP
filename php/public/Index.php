<?php
session_start();

require_once '../config/database.php';
require_once '../config/config.php';
require_once '../helpers/url_helper.php';
require_once '../helpers/session_helper.php';

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'home';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

$controllerFile = "../controllers/{$controller}Controller.php";

if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $controllerClass = ucfirst($controller) . 'Controller';
    $controllerInstance = new $controllerClass;
    
    if (method_exists($controllerInstance, $action)) {
        $controllerInstance->$action();
    } else {
        echo "Ação '{$action}' não encontrada no controlador '{$controllerClass}'";
    }
} else {
    echo "Controlador '{$controller}' não encontrado";
}
?>
