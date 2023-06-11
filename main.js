// Function to validate the form
function validateForm() {
    // Get the values from the email and telephone fields
    var email = document.getElementById("email").value;
    var telephone = document.getElementById("telephone").value;
  
    // Create regular expressions for email and telephone validation
    var emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var telephoneRegex = /^\d{10}$/;
  
    // Check if the email field is empty or doesn't match the email regex pattern
    if (email === "" || !emailRegex.test(email)) {
      alert("Please enter a valid email address.");
      return false; // Prevent form submission
    }
  
    // Check if the telephone field is empty or doesn't match the telephone regex pattern
    if (telephone === "" || !telephoneRegex.test(telephone)) {
      alert("Please enter a valid 10-digit telephone number.");
      return false; // Prevent form submission
    }
  }

  var sliderImages = document.querySelectorAll('#slider img');
var currentImageIndex = 0;

// Function to show the current image
function showImage(index) {
  // Hide all images
  for (var i = 0; i < sliderImages.length; i++) {
    sliderImages[i].classList.remove('active');
  }

  // Show the image at the specified index
  sliderImages[index].classList.add('active');
}

// Function to cycle through the images
function nextImage() {
  currentImageIndex++;
  if (currentImageIndex >= sliderImages.length) {
    currentImageIndex = 0;
  }
  showImage(currentImageIndex);
}

// Interval for automatic cycling of images (change the duration as needed)
var interval = setInterval(nextImage, 3000);

// Optional: Add navigation controls (previous and next buttons)
var prevButton = document.createElement('button');
prevButton.textContent = 'Previous';
prevButton.addEventListener('click', function() {
  clearInterval(interval);
  currentImageIndex--;
  if (currentImageIndex < 0) {
    currentImageIndex = sliderImages.length - 1;
  }
  showImage(currentImageIndex);
});

var nextButton = document.createElement('button');
nextButton.textContent = 'Next';
nextButton.addEventListener('click', function() {
  clearInterval(interval);
  nextImage();
});

document.getElementById('slider').appendChild(prevButton);
document.getElementById('slider').appendChild(nextButton);
