document.getElementById('contactForm').addEventListener('submit', function (e) {
    let isValid = true;

   
    const firstName = document.getElementById('firstName');
    const lastName = document.getElementById('lastName');
    const email = document.getElementById('email');
    const telephone = document.getElementById('telephone');
    const message = document.getElementById('message');
    const terms = document.getElementById('terms');

    
    document.querySelectorAll('.error').forEach(error => {
        error.style.display = 'none';
    });

    
    if (firstName.value.trim() === '') {
        document.getElementById('firstNameError').style.display = 'block';
        isValid = false;
    }

   
    if (lastName.value.trim() === '') {
        document.getElementById('lastNameError').style.display = 'block';
        isValid = false;
    }

    // Validate Email
    const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (email.value.trim() === '' || !emailPattern.test(email.value.trim())) {
        document.getElementById('emailError').style.display = 'block';
        isValid = false;
    }

    
    const phonePattern = /^[0-9]{7,15}$/; 
    if (telephone.value.trim() !== '' && !phonePattern.test(telephone.value.trim())) {
        document.getElementById('telephoneError').style.display = 'block';
        isValid = false;
    }

    
    if (message.value.trim() === '') {
        document.getElementById('messageError').style.display = 'block';
        isValid = false;
    }

    
    if (!terms.checked) {
        alert('You must agree to the Terms & Conditions');
        isValid = false;
    }

   
    if (!isValid) {
        e.preventDefault();
    }
});