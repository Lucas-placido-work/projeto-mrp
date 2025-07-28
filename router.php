<?php
require_once 'includes/componentesController.php';
require_once 'includes/mrpController.php';

$controller = new componentesController();
$mrp_controller = new mrpController();

$action = $_GET['action'] ?? null;
$page = $_GET['page'] ?? null;
$data = $_POST;

// Roteamento para páginas
if ($page) {
    switch ($page) {
        case 'estoque':
            include 'estoque.html';
            exit;
        case 'home':
        case 'mrp':
            include 'mrp.html';
            exit;
        default:
            http_response_code(404);
            echo "Página não encontrada";
            exit;
    }
}

// Se não tem página especificada e não tem action, mostra a home
if (!$action && !$page) {
    include 'index.html';
    exit;
}

// Roteamento para API/AJAX
switch ($action) {
    case 'create':
        echo $controller->create($data);
        break;
    case 'read':
        echo $controller->read();
        break;
    case 'update':
        parse_str(file_get_contents("php://input"), $data);
        echo $controller->update($data);
        break;
    case 'delete':
        parse_str(file_get_contents("php://input"), $data);
        echo $controller->delete($data['id']);
        break;
    case 'fetch_estoque':
        parse_str(file_get_contents("php://input"), $data);
        echo $controller->fetch($data);
        break;
    case 'calcular':
        parse_str(file_get_contents("php://input"), $data);
        echo $mrp_controller->calcular($data);
        break;
    default:
        // echo $controller->read();
        break;
}
?>