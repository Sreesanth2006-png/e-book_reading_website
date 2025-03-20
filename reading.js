// Function to get the query parameter from the URL
function getQueryParameter(name) {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(name);
}

// Load the correct book based on the query parameter
window.onload = function() {
    const book = getQueryParameter('book');
    const titleElement = document.getElementById('book-title');
    const contentFrame = document.getElementById('book-content');

    if (book) {
        let pdfSrc;
        switch (book) {
            case 'harry_potter':
                pdfSrc = 'books/Harry Potter and the Sorcerers Stone.pdf'; // Update with the correct path
                titleElement.textContent = "Reading: Harry Potter and the Philosopher's Stone";
                break;
            case 'sherlock_holmes':
                pdfSrc = 'books/advs.pdf'; // Update with the correct path
                titleElement.textContent = "Reading: The Adventures of Sherlock Holmes";
                break;
            case 'gullivers_travels':
                pdfSrc = 'books/gullivers-travels.pdf'; // Update with the correct path
                titleElement.textContent = "Reading: Gulliver's Travels";
                break;
            case 'theory_of_everything':
                pdfSrc = 'books/The-Theory-of-Everything.pdf-PDFDrive-.pdf'; // Update with the correct path
                titleElement.textContent = "Reading: The Theory of Everything";
                break;
            default:
                titleElement.textContent = "Book not found!";
                return;
        }
        contentFrame.src = pdfSrc;
    }
};

// Fullscreen toggle function
function toggleFullScreen() {
    const elem = document.getElementById("book-content");
    if (elem.requestFullscreen) {
        elem.requestFullscreen();
    } else if (elem.mozRequestFullScreen) { // Firefox
        elem.mozRequestFullScreen();
    } else if (elem.webkitRequestFullscreen) { // Chrome, Safari and Opera
        elem.webkitRequestFullscreen();
    } else if (elem.msRequestFullscreen) { // IE/Edge
        elem.msRequestFullscreen();
    }
}
