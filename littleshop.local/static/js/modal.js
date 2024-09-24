document.addEventListener('DOMContentLoaded', function() {
    var modal = document.getElementById("ai-image-generator-modal");
    var btn = document.getElementById("open-ai-image-generator");
    var span = document.getElementsByClassName("close")[0];

    btn.onclick = function() {
        modal.style.display = "block";
    }

    span.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    // Fetch AI generated images
    document.getElementById('generate-images').addEventListener('click', function() {
        var color = document.getElementById('color').value;
        var vibe = document.getElementById('vibe').value;
        var timePeriod = document.getElementById('time-period').value;

        fetch('/vamps/generateAiImage', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ color: color, vibe: vibe, timePeriod: timePeriod })
        })
        .then(response => response.json())
        .then(data => {
            var thumbnails = document.getElementById('thumbnails');
            thumbnails.innerHTML = '';
            data.images.forEach(imageUrl => {
                var img = document.createElement('img');
                img.src = imageUrl;
                img.style = 'max-width: 100px; cursor: pointer;';
                img.addEventListener('click', function() {
                    imagePreview.src = imageUrl;
                    var hiddenInput = document.createElement('input');
                    hiddenInput.type = 'hidden';
                    hiddenInput.name = 'image_url';
                    hiddenInput.value = imageUrl;
                    document.getElementById('vamp-form').appendChild(hiddenInput);
                    modal.style.display = 'none';
                });
                thumbnails.appendChild(img);
            });
        });
    });
});
