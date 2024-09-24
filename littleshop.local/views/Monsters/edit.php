<?php
ob_start();
?>

<h1>Edit Vamp</h1>
<form action="<?php echo BASE_URL; ?>/index.php/edit?id=<?php echo htmlspecialchars($vamp->id); ?>" method="POST" enctype="multipart/form-data">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($vamp->name); ?>" required>

    <label for="type">Type:</label>
    <input type="text" id="type" name="type" value="<?php echo htmlspecialchars($vamp->type); ?>" required>

    <label for="rarity">Rarity:</label>
    <input type="text" id="rarity" name="rarity" value="<?php echo htmlspecialchars($vamp->rarity); ?>" required>

    <label for="hp">HP (Health Points):</label>
    <input type="number" id="hp" name="hp" value="<?php echo htmlspecialchars($vamp->hp); ?>" min="1" required>

    <label for="defense">Defense:</label>
    <input type="number" id="defense" name="defense" value="<?php echo htmlspecialchars($vamp->defense); ?>" min="1" required>

    <label for="stage">Stage:</label>
    <select id="stage" name="stage" required>
        <option value="egg" <?php echo $vamp->stage == 'egg' ? 'selected' : ''; ?>>Egg</option>
        <option value="stage1" <?php echo $vamp->stage == 'stage1' ? 'selected' : ''; ?>>Stage 1</option>
        <option value="stage2" <?php echo $vamp->stage == 'stage2' ? 'selected' : ''; ?>>Stage 2</option>
        <option value="stage3" <?php echo $vamp->stage == 'stage3' ? 'selected' : ''; ?>>Stage 3</option>
    </select>


    <label for="image_url">Image:</label>
    <input type="file" id="image_url" name="image_url" required>

    <button type="submit">Update Vamp</button>
</form>


<?php
$content = ob_get_clean();
$title = 'Edit Vamp';
include __DIR__ . '/../layout/template.php';
?>
