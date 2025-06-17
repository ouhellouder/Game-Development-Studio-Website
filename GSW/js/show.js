const button = document.getElementById('hidden');
const content = document.getElementById('hiddenContent');

button.addEventListener('click', function() {
    // Toggle the display property of the content
    if (content.style.display === 'none' || content.style.display === '') {
        content.style.display = 'block';  // Make content appear
    } else {
        content.style.display = 'none';   // Make content disappear
    }
});

  