

window.addEventListener('DOMContentLoaded', function () {
    const sliderImages = [
      "chala.png",
      "chalani.png",
      "deshi.png"
    ];
    let currentIndex = 0;
    const sliderImage = document.getElementById("sliderImage");
  
    function changeImage() {
      currentIndex = (currentIndex + 1) % sliderImages.length;
      sliderImage.src = sliderImages[currentIndex];
    }
  
    setInterval(changeImage, 3000);
  });
  
  
    
  var emailInput = document.getElementById('Your_Email');
  var phoneInput = document.getElementById('Your_Telephone');
  
  
  document.getElementById('my-form').addEventListener('submit', function(event) {
   
    if (!validateEmail(emailInput.value)) {
      alert('Please enter a valid email address.');
      event.preventDefault(); 
    }
    
    if (!validatePhoneNumber(phoneInput.value)) {
      alert('Please enter a valid phone number.');
      event.preventDefault(); 
    }
  });
  
  
  function validateEmail(email) {
    
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailPattern.test(email);
  }
  
  
  function validatePhoneNumber(phoneNumber) {
    
    var phonePattern = /^\d{10}$/;
    return phonePattern.test(phoneNumber);
  }
  