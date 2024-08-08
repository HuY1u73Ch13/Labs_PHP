function validateForm() {
    var password = document.getElementById('signup-password').value;

    // Validate password
    if (!validatePassword(password)) {
        return false;
    }

    return true;
}

function validatePassword(password) {
    if (password.length < 8) {
        alert("Password must be at least 8 characters long.");
        return false;
    }
    if (!/[A-Z]/.test(password)) {
        alert("Password must contain at least one uppercase letter.");
        return false;
    }
    if (!/[a-z]/.test(password)) {
        alert("Password must contain at least one lowercase letter.");
        return false;
    }
    if (!/\d/.test(password)) {
        alert("Password must contain at least one number.");
        return false;
    }
    if (!/[^a-zA-Z\d]/.test(password)) {
        alert("Password must contain at least one special character.");
        return false;
    }
    if (/[\\\/:*?<>|]/.test(password)) {
        alert("Password contains invalid special characters: \\ / : * ? < > |");
        return false;
    }
    return true;
}

function submitSignupForm(event) {
    event.preventDefault();
    var form = document.getElementById('signup-form');
    
    // Run client-side validation
    if (!validateForm()) {
        return;
    }

    var formData = new FormData(form);
    
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'signup.php', true);
    xhr.setRequestHeader('Accept', 'application/json');
    xhr.onload = function () {
        var response = JSON.parse(this.responseText);
        var messageDiv = document.getElementById('signup-message');
        if (response.success) {
            messageDiv.style.color = 'green';
            messageDiv.textContent = "Registration successful!";
        } else {
            messageDiv.style.color = 'red';
            messageDiv.textContent = response.message;
        }
    };
    xhr.send(formData);
}
