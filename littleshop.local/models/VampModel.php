<?php
// Include necessary files and classes.
require_once 'entities/Vamp.php';
require_once 'config/config.php';
require_once 'Validate.php';

// VampModel class handles database operations for Vamp entities.
class VampModel {
    private $pdo;

    // Constructor initializes the PDO object for database connection.
    public function __construct() {
        $this->pdo = getPDO();
    }

    // Fetch all vamps from the database.
    public function getAllVamps() {
        $query = "SELECT * FROM vamps";
        $result = $this->pdo->query($query);
        $vamps = [];

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $vamps[] = new Vamp(
                validateInput($row['id'], 'int'),
                validateInput($row['name'], 'string'),
                validateInput($row['type'], 'string'),
                validateInput($row['rarity'], 'string'),
                validateInput($row['hp'], 'int'),
                validateInput($row['defense'], 'int'),
                validateInput($row['stage'], 'string'),
                validateInput($row['image_url'], 'string')
            );
        }
        return $vamps;
    }

    // Fetch a specific vamp by its ID.
    public function getVampById($vampId) {
        echo ': ' . $vampId;
        
        // SQL query to get a vamp by ID from the database.
        $query = "SELECT * FROM vamps WHERE id = :vamp_id";
        $stmt = $this->pdo->prepare($query);
    
        if ($stmt->execute([':vamp_id' => $vampId])) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($row) {
                $vamp = new Vamp(
                    validateInput($row['id'], 'int'),
                    validateInput($row['name'], 'string'),
                    validateInput($row['type'], 'string'),
                    validateInput($row['rarity'], 'string'),
                    validateInput($row['hp'], 'int'),
                    validateInput($row['defense'], 'int'),
                    validateInput($row['stage'], 'string'),
                    validateInput($row['image_url'], 'string')
                );
                return $vamp;
            } else {
                echo 'No data found for ID: ' . htmlspecialchars($vampId) . '<br>';
                return null;
            }
        } else {
            echo 'Error executing query.';
            return null;
        }
    }

    // Delete a vamp from the database by its ID.
    public function deleteVamp($vamp_id) {
        $query = "DELETE FROM vamps WHERE id = :vamp_id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':vamp_id' => $vamp_id]);
    }

    // Insert a new vamp into the database.
    public function insertVamp($vamp) {
        $vampData = $vamp->getData();
    
        $name = validateInput($vampData['name'], 'string');
        $type = validateInput($vampData['type'], 'string');
        $rarity = validateInput($vampData['rarity'], 'string');
        $hp = validateInput($vampData['hp'], 'int');
        $defense = validateInput($vampData['defense'], 'int');
        $stage = validateInput($vampData['stage'], 'string');
        $image_url = validateInput($vampData['image_url'], 'string');
    
        $query = "INSERT INTO vamps (name, type, rarity, hp, defense, stage, image_url) 
                  VALUES (:name, :type, :rarity, :hp, :defense, :stage, :image_url)";
    
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([
            ':name' => $name,
            ':type' => $type,
            ':rarity' => $rarity,
            ':hp' => $hp,
            ':defense' => $defense,
            ':stage' => $stage,
            ':image_url' => $image_url
        ]);
    }

    // Update an existing vamp in the database.
    public function updateVamp($vamp) {
        $vampData = $vamp->getData();
    
        $vamp_id = validateInput($vampData['id'], 'int');
        $name = validateInput($vampData['name'], 'string');
        $type = validateInput($vampData['type'], 'string');
        $rarity = validateInput($vampData['rarity'], 'string');
        $hp = validateInput($vampData['hp'], 'int');
        $defense = validateInput($vampData['defense'], 'int');
        $stage = validateInput($vampData['stage'], 'string');
        $image_url = validateInput($vampData['image_url'], 'string');
    
        $query = "UPDATE vamps SET name = :name, type = :type, rarity = :rarity, hp = :hp, defense = :defense, stage = :stage, image_url = :image_url WHERE id = :vamp_id";
    
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([
            ':name' => $name,
            ':type' => $type,
            ':rarity' => $rarity,
            ':hp' => $hp,
            ':defense' => $defense,
            ':stage' => $stage,
            ':image_url' => $image_url,
            ':vamp_id' => $vamp_id
        ]);
    }
}
?>
