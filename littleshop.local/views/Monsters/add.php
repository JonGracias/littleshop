<?php
ob_start();
?>

<h1>Add a New Vamp</h1>
<form action="<?php echo BASE_URL; ?>/index.php/add" method="POST" enctype="multipart/form-data">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="type">Type:</label>
    <input type="text" id="type" name="type" required>

    <label for="rarity">Rarity:</label>
    <input type="text" id="rarity" name="rarity" required>

    <label for="hp">HP (Health Points):</label>
    <input type="number" id="hp" name="hp" min="1" required>

    <label for="defense">Defense:</label>
    <input type="number" id="defense" name="defense" min="1" required>

    <label for="stage">Stage:</label>
    <select id="stage" name="stage" required>
        <option value="egg" selected>Egg</option>
        <option value="stage1">Stage 1</option>
        <option value="stage2">Stage 2</option>
        <option value="stage3">Stage 3</option>
    </select>

    <label for="image_url">Image:</label>
    <input type="file" id="image_url" name="image_url" required>

    <button type="submit">Add Vamp</button>
</form>

<?php
$content = ob_get_clean();
$title = 'Add a New Vamp';
include __DIR__ . '/../layout/template.php';
?>
