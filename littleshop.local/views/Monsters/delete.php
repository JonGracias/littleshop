<?php
ob_start();
?>


<!-- The Modal -->
<div id="myModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <h1>Delete Confirmation</h1>
        <p>Are you sure you want to delete this Vamp?</p>
        <form method="POST" action="<?= BASE_URL ?>/index.php/delete">
            <input type="hidden" name="id" value="<?= htmlspecialchars($vampId) ?>">
            <button type="submit" name="confirm" value="yes" class="modal-button">Yes</button>
            <button type="submit" name="confirm" value="no" class="modal-button">No</button>
        </form>
    </div>
</div>

<?php
$content = ob_get_clean();
$title = 'Delete Vamp';
include __DIR__ . '/../layout/template.php';
?>