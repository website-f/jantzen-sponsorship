// Get elements
const fileDropArea = document.getElementById('file-drop-area');
const fileInput = document.getElementById('file-input');
const fileList = document.getElementById('file-list');
const deleteButton = document.getElementById('delete-file');
const replaceButton = document.getElementById('replace-file');

let uploadedFiles = [];

// Prevent default drag behaviors
fileDropArea.addEventListener('dragover', (e) => {
    e.preventDefault();
    fileDropArea.classList.add('drag-over');
});

fileDropArea.addEventListener('dragleave', () => {
    fileDropArea.classList.remove('drag-over');
});

// Handle dropped files
fileDropArea.addEventListener('drop', (e) => {
    e.preventDefault();
    fileDropArea.classList.remove('drag-over');

    const files = Array.from(e.dataTransfer.files);
    uploadedFiles = uploadedFiles.concat(files);
    displayFiles();
});

// Handle file input change
fileInput.addEventListener('change', () => {
    const files = Array.from(fileInput.files);
    uploadedFiles = uploadedFiles.concat(files);
    displayFiles();
});

function updateHiddenInput() {
    const fileNamesInput = document.getElementById('file-names-input');
    const filesData = [];

    uploadedFiles.forEach(file => {
        const reader = new FileReader();

        reader.onload = function (event) {
            // Add an object with name and base64 data to the filesData array
            const extension = file.name.split('.').pop();
            filesData.push({
                name: file.name,
                data: event.target.result.split(',')[1], // Extract the base64 data
                extension: extension,
            });

            // If all files have been processed, stringify and set the value
            if (filesData.length === uploadedFiles.length) {
                fileNamesInput.value = JSON.stringify(filesData);
            }
        };

        reader.readAsDataURL(file); // Read the file as data URL (base64)
    });
    console.log(filesData)
}

// Display uploaded files with filtering
function displayFiles() {
    fileList.innerHTML = '';
    uploadedFiles.forEach((file, index) => {
        const listItem = document.createElement('li');

        if (isImage(file)) {
            // If the uploaded file is an image, create an <img> element
            const imageElement = document.createElement('img');
            imageElement.src = URL.createObjectURL(file);
            imageElement.alt = file.name;
            imageElement.classList.add('imageList');
            listItem.appendChild(imageElement);
        } else {
            // If the uploaded file is not an image, create a <div> element
            const divElement = document.createElement('div');
            divElement.textContent = isSupportedFileType(file) ? file.name : 'Not a valid file';
            divElement.classList.add('non-imageList');
            listItem.appendChild(divElement);
        }

        // Create a delete icon (x) inside a <span> tag
        const deleteIcon = document.createElement('span');
        deleteIcon.innerHTML = '&#10006;'; // Use 'x' or any delete icon you prefer
        deleteIcon.classList.add('delete-icon');
        deleteIcon.addEventListener('click', () => deleteFile(index));

        listItem.appendChild(deleteIcon); // Add the delete icon to the list item
        fileList.appendChild(listItem);
    });

    updateHiddenInput();
}

// Function to check if a file is an image
function isImage(file) {
    return file.type.startsWith('image/');
}

// Function to check if the file type is supported
function isSupportedFileType(file) {
    // Define supported file types here (e.g., PDF, DOCX, XLSX, etc.)
    const supportedFileTypes = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
    return supportedFileTypes.includes(file.type);
}


// Delete selected file
function deleteFile(index) {
    uploadedFiles.splice(index, 1);
    displayFiles();
}

let selectedFileIndex = -1; // Initialize with an invalid index

// Select a file for deletion or replacement
function selectFile(index) {
    selectedFileIndex = index; // Store the selected file index
    const fileListItems = fileList.querySelectorAll('li');
    
    // Highlight the selected file visually
    fileListItems.forEach((item, i) => {
        if (i === index) {
            item.classList.add('selected-file');
        } else {
            item.classList.remove('selected-file');
        }
    });

    updateHiddenInput();
}

// Delete selected file
deleteButton.addEventListener('click', () => {
    if (selectedFileIndex !== -1) {
        uploadedFiles.splice(selectedFileIndex, 1); // Remove the selected file
        selectedFileIndex = -1; // Reset the selected file index
        displayFiles();
    }
});

// Replace selected file
replaceButton.addEventListener('click', () => {
    if (selectedFileIndex !== -1) {
        // Replace the selected file using a new file input or other method
        // Example: You can trigger a file input click event to open the file dialog for replacement
        fileInput.click();
    }
});

// Handle file input change for replacement
fileInput.addEventListener('change', () => {
    if (selectedFileIndex !== -1) {
        // Replace the file at the selected index with the newly selected file
        const newFile = fileInput.files[0];
        if (newFile) {
            uploadedFiles[selectedFileIndex] = newFile;
            selectedFileIndex = -1; // Reset the selected file index
            displayFiles();
        }
    }
});


displayFiles();