document.addEventListener('DOMContentLoaded', function () {
    const popup = document.getElementById('popup_contact');
  
    // Check if the #popup_contact element exists
    if (!popup) return;
  
    // Create the overlay element
    const overlay = document.createElement('div');
    overlay.className = 'overlay';
    document.body.appendChild(overlay);
  
    // Get the button that opens the popup
    const openPopupButton = document.querySelector('.sidebar a.btn');
    // Get the button that closes the popup (inside the popup)
    const closePopupButton = document.querySelector('#popup_contact .close');
  
    // Add click event listener to open the popup
    openPopupButton.addEventListener('click', function (e) {
      e.preventDefault();  // Prevent default link behavior
      popup.classList.add('visible');  // Show popup
      overlay.classList.add('visible');  // Show overlay
    });
  
    // Add click event listener to close the popup when clicking the overlay
    overlay.addEventListener('click', function () {
      popup.classList.remove('visible');  // Hide popup
      overlay.classList.remove('visible');  // Hide overlay
    });
  
    // Add click event listener to close the popup when clicking the close button
    closePopupButton.addEventListener('click', function () {
      popup.classList.remove('visible');  // Hide popup
      overlay.classList.remove('visible');  // Hide overlay
    });
  });
  