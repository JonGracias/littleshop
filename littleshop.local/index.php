<?php
require_once 'config/config.php';
require_once 'controllers/VampController.php';

$controller = new VampController();
$path = $_SERVER['PATH_INFO'] ?? '/';

switch ($path) {
    // Default route: Display all vamps.
    case '/':
        $controller->displayVamps();
        break;


    // Route for adding a new vamp.
    case '/add':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $controller->addVamp($_POST);
            header('Location: ' . BASE_URL);
            exit();
        } else {
            include 'views/Monsters/add.php';  
            
        }
        break;


    // Route for editing an existing vamp.
    case '/edit':
        $vampId = $_GET['id'] ?? null;
        if ($vampId) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $controller->editVamp($vampId, $_POST);
                header('Location: ' . BASE_URL);
                exit();
            } else {
                $vamp = $controller->getVampById($vampId);
                include 'views/Monsters/edit.php';
            }
        }
        break;


    // Route for deleting a vamp.
    case '/delete':
        $vampId = $_GET['id'] ?? $_POST['id'] ?? null;
        if ($vampId) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['confirm'])) {
                if ($_POST['confirm'] === 'yes') {
                    $controller->deleteVamp($vampId);
                    header('Location: ' . BASE_URL);
                    exit();
                } else {
                    header('Location: ' . BASE_URL);
                    exit();
                }
            } else {
                include 'views/Monsters/delete.php';
            }
        }
        break;

    // Test route for adding a baseline vamp.
    case '/add-test':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $controller->addVamp($_POST);
            echo "Baseline vamp added successfully!"; // Debug message to confirm addition.
            // header('Location: ' . BASE_URL); // Uncomment this after testing.
            exit();
        }
        break;

    

    // Default case: 404 Not Found.
    default:
        header("HTTP/1.1 404 Not Found");
        echo '404 Not Found';
        break;
}
?>
