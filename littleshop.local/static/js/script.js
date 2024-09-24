document.addEventListener('DOMContentLoaded', function() {
    var dropZone = document.getElementById('drop-zone');
    var imageFileInput = document.getElementById('image-file');
    var imagePreview = document.getElementById('image-preview');

    dropZone.addEventListener('dragover', function(e) {
        e.preventDefault();
        dropZone.classList.add('dragging');
    });

    dropZone.addEventListener('dragleave', function(e) {
        dropZone.classList.remove('dragging');
    });

    dropZone.addEventListener('drop', function(e) {
        e.preventDefault();
        dropZone.classList.remove('dragging');

        var files = e.dataTransfer.files;
        if (files.length > 0) {
            imageFileInput.files = files;
            var reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.src = e.target.result;
            };
            reader.readAsDataURL(files[0]);
        }
    });
});
