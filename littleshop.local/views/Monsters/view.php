<?php
ob_start();
?>

<h2>List of Vamps</h2>

<!-- Form to add a baseline vamp -->
<form action="<?php echo BASE_URL; ?>/index.php/add" method="POST">
    <input type="hidden" name="name" value="Baseline Vamp">
    <input type="hidden" name="type" value="Vampire">
    <input type="hidden" name="rarity" value="Common">
    <input type="hidden" name="hp" value="100">
    <input type="hidden" name="defense" value="50">
    <input type="hidden" name="stage" value="stage3">
    <input type="hidden" name="image_url" value="audrey2_stage3.png">
    <button type="submit" class="button">Add Baseline Vamp</button>
</form>

<!-- Form to add a new vamp (redirects to add form) -->
<form action="<?php echo BASE_URL; ?>/index.php/add" method="GET">
    <button type="submit" class="button">Add New Vamp</button>
</form>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Type</th>
            <th>Rarity</th>
            <th>HP</th>
            <th>Defense</th>
            <th>Stage</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if (empty($vamps)): ?>
            <tr>
                <td colspan="9">No vamps available.</td>
            </tr>
        <?php else: ?>
            <?php foreach ($vamps as $vamp): ?>
                <tr>
                    <td><?php echo htmlspecialchars($vamp->id); ?></td>
                    <td><?php echo htmlspecialchars($vamp->name); ?></td>
                    <td><?php echo htmlspecialchars($vamp->type); ?></td>
                    <td><?php echo htmlspecialchars($vamp->rarity); ?></td>
                    <td><?php echo htmlspecialchars($vamp->hp); ?></td>
                    <td><?php echo htmlspecialchars($vamp->defense); ?></td>
                    <td><?php echo htmlspecialchars($vamp->stage); ?></td>
                    <td><img src="<?php echo htmlspecialchars($vamp->image_url); ?>" alt="Image" style="width: 50px; height: auto;"></td>
                    <td>
                        <form action="<?php echo BASE_URL; ?>/index.php/delete" method="get" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo $vamp->id; ?>">
                            <button type="submit" class="button">Delete</button>
                        </form>
                        <form action="<?php echo BASE_URL; ?>/index.php/edit" method="get" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo $vamp->id; ?>">
                            <button type="submit" class="button">Edit</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>

<?php
$content = ob_get_clean();
$title = 'List of Vamps';
include __DIR__ . '/../layout/template.php';
?>
