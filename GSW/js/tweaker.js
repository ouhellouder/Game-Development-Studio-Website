document.querySelectorAll('.clickable-image').forEach((image) => {

    //kreatívne body
    image.addEventListener('click', () => {
        const hiddenContent = image.nextElementSibling;

        if (hiddenContent.style.maxHeight) {
            hiddenContent.style.maxHeight = null; // Collapse the content
            hiddenContent.style.padding = '0 15px'; // Reset padding
        } else {
            hiddenContent.style.maxHeight = hiddenContent.scrollHeight + 'px'; // Expand the content
            hiddenContent.style.padding = '10px 15px'; // Add padding
        }
    });
});
