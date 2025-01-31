const addFileInputBtn = document.getElementById('addFileInput');
const fileInputsContainer = document.getElementById('fileInputsContainer');

if (addFileInputBtn && fileInputsContainer) {
    addFileInputBtn.addEventListener('click', () => {
        const newInput = document.createElement('input');
        newInput.type = 'file';
        newInput.name = 'Documento[]';
        newInput.classList.add('form-control', 'mb-2');
        fileInputsContainer.appendChild(newInput);
    });
}