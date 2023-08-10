
const openModalBtn = document.getElementById('openQuoteModalBtn');
const closeModalBtn = document.getElementById('closeModalBtn');
const quoteModal = document.getElementById('quoteModal');

openModalBtn.addEventListener('click', () => {
    quoteModal.style.display = 'block';
});

closeModalBtn.addEventListener('click', () => {
    quoteModal.style.display = 'none';
});

quoteModal.addEventListener('click', (event) => {
    if (event.target === quoteModal) {
        quoteModal.style.display = 'none';
    }
});


function toggleFileUpload() {
            const fileUploadBox = document.getElementById("fileUploadBox");
            const haveDesignCheckbox = document.getElementById("haveDesignCheckbox");
            
            if (haveDesignCheckbox.checked) {
                fileUploadBox.style.display = "block";
            } else {
                fileUploadBox.style.display = "none";
            }
        }




document.getElementById("closeModalBtn").addEventListener("click", function() {
    document.getElementById("quoteModal").style.display = "none";
});

function sanitizeInput(input) {
    return input.replace(/</g, "&lt;").replace(/>/g, "&gt;");
}


