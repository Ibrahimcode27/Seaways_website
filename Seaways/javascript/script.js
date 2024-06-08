// Wait for the DOM to be fully loaded
document.addEventListener('DOMContentLoaded', function () {
    // Get a reference to the Explore button
    const exploreButton = document.querySelector('#explore-button');

    // Add a click event listener to the Explore button
    exploreButton.addEventListener('click', function () {
        // Redirect to the login page when the Explore button is clicked
        window.location.href = 'login.html'; // Replace 'login.html' with the actual login page URL
    });
});
