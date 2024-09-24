<?php
// Display the directory path for the VampController.php file.
echo __DIR__ . '/VampController.php';

// Include the VampModel class for database operations.
require_once __DIR__ . '/../models/VampModel.php';   

// VampController class handles operations related to Vamp entities.
class VampController {
    private $vampModel;

    // Constructor initializes the VampModel object.
    public function __construct() {
        $this->vampModel = new VampModel();
    }

    // Display all vamps by fetching from the database and requiring the view file.
    public function displayVamps() {
        echo ' | display vamps';
        $vamps = $this->vampModel->getAllVamps();
        require __DIR__ . '/../views/Monsters/view.php';
    }

    // Fetch a specific vamp by its ID.
    public function getVampById($vampId) {
        echo ' | get vamp by ID';
        try {
            $vamp = $this->vampModel->getVampById($vampId);
            echo $vamp->id;
            return $vamp;
        } catch (Exception $e) {
            echo "Error fetching vamp: " . $e->getMessage();
        }
    }

    public function addVamp($vampData) {
        // Handle file upload
        $vampData['image_url'] = $this->handleFileUpload();
        if (!$vampData['image_url']) {
            return;  // Return if there was an error during file upload
        }

        echo ' | add vamp';
        try {
            $this->vampModel->insertVamp(new Vamp(
                null,  // ID is auto-incremented in the database.
                $vampData['name'],
                $vampData['type'],
                $vampData['rarity'],
                $vampData['hp'],
                $vampData['defense'],
                $vampData['stage'],
                $vampData['image_url']
            ));
            echo "Vamp added successfully!";
        } catch (Exception $e) {
            echo "Error adding vamp: " . $e->getMessage();
        }
    }

    public function editVamp($vampId, $vampData) {
        // Handle file upload
        $vampData['image_url'] = $this->handleFileUpload();
        if (!$vampData['image_url']) {
            return;  // Return if there was an error during file upload
        }

        echo ' | edit vamp';
        try {
            $this->vampModel->updateVamp(new Vamp(
                $vampId,
                $vampData['name'],
                $vampData['type'],
                $vampData['rarity'],
                $vampData['hp'],
                $vampData['defense'],
                $vampData['stage'],
                $vampData['image_url']
            ));
            echo "Vamp edited successfully!";
        } catch (Exception $e) {
            echo "Error editing vamp: " . $e->getMessage();
        }
    }

    // Handle file upload
    private function handleFileUpload() {
        if (isset($_FILES['image_url']) && $_FILES['image_url']['error'] == UPLOAD_ERR_OK) {
            $uploadDir = __DIR__ . '/../static/images/';
            $uploadFile = $uploadDir . basename($_FILES['image_url']['name']);
            
            // Print the target path for debugging
            echo 'Upload directory: ' . $uploadDir . '<br>';
            echo 'Upload file path: ' . $uploadFile . '<br>';
    
            // Move the uploaded file to the target directory
            if (move_uploaded_file($_FILES['image_url']['tmp_name'], $uploadFile)) {
                // Return the image URL to the local path
                return 'static/images/' . basename($_FILES['image_url']['name']);
            } else {
                echo "Error moving the uploaded file.";
                return false;
            }
        } else {
            echo "No file uploaded or upload error.";
            return false;
        }
    }

    // Delete a vamp from the database by its ID.
    public function deleteVamp($vampId) {
        echo ' | delete vamp';
        try {
            $this->vampModel->deleteVamp($vampId);
        } catch (Exception $e) {
            echo "Error deleting vamp: " . $e->getMessage();
        }
    }
}
?>
