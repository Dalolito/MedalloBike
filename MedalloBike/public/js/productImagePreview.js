document.addEventListener('DOMContentLoaded', function() {
    const imageInput = document.getElementById('image');
    const previewContainer = document.getElementById('image-preview-container');
    const previewImage = document.getElementById('image-preview');
    const removeButton = document.getElementById('remove-image');

    function showImagePreview(file) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            previewImage.src = e.target.result;
            previewContainer.style.display = 'block';
        };
        
        reader.readAsDataURL(file);
    }

    function hideImagePreview() {
        previewContainer.style.display = 'none';
        previewImage.src = '#';
        imageInput.value = '';
    }

    function validateFile(file) {
        const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
        const maxSize = 2 * 1024 * 1024; // 2MB en bytes

        if (!allowedTypes.includes(file.type)) {
            alert('Tipo de archivo no permitido. Solo se permiten: JPG, PNG, GIF');
            return false;
        }

        if (file.size > maxSize) {
            alert('El archivo es muy grande. El tamaño máximo permitido es 2MB');
            return false;
        }

        return true;
    }

    imageInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        
        if (file) {
            if (validateFile(file)) {
                showImagePreview(file);
            } else {
                e.target.value = '';
                hideImagePreview();
            }
        } else {
            hideImagePreview();
        }
    });

    removeButton.addEventListener('click', function() {
        hideImagePreview();
    });

    const form = document.querySelector('form');
    form.addEventListener('submit', function(e) {
        const file = imageInput.files[0];
        
        if (file && !validateFile(file)) {
            e.preventDefault();
            alert('Por favor, selecciona una imagen válida antes de continuar.');
        }
    });

    const imageInputContainer = imageInput.parentElement;
    
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        imageInputContainer.addEventListener(eventName, preventDefaults, false);
    });

    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    ['dragenter', 'dragover'].forEach(eventName => {
        imageInputContainer.addEventListener(eventName, highlight, false);
    });

    ['dragleave', 'drop'].forEach(eventName => {
        imageInputContainer.addEventListener(eventName, unhighlight, false);
    });

    function highlight(e) {
        imageInputContainer.classList.add('border-primary', 'bg-light');
    }

    function unhighlight(e) {
        imageInputContainer.classList.remove('border-primary', 'bg-light');
    }

    imageInputContainer.addEventListener('drop', handleDrop, false);

    function handleDrop(e) {
        const dt = e.dataTransfer;
        const files = dt.files;

        if (files.length > 0) {
            imageInput.files = files;
            const event = new Event('change', { bubbles: true });
            imageInput.dispatchEvent(event);
        }
    }
});