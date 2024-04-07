function check () {
    var username = document.getElementById('username').value.trim();
    var pass = document.getElementById('pass').value;
    var pass2 = document.getElementById('pass2').value;

    var usernameElement = document.getElementById('username');
    var passElement = document.getElementById('pass');
    var pass2Element = document.getElementById('pass2');

    var usernameIsValid = username !== '' && login.length <= 20;
    var passIsValid = pass.length >= 6 && /[a-z]/.test(pass) && /[A-Z]/.test(pass);
    var pass2IsValid = pass2.length >= 6 && /[a-z]/.test(pass2) && /[A-Z]/.test(pass2) && pass === pass2;

    if (usernameIsValid) {
        usernameElement.style.borderColor = 'lightgreen';
    } else {
        usernameElement.style.borderColor = 'red';
    }

    if (passIsValid) {
        passElement.style.borderColor = 'lightgreen';
    } else {
        passElement.style.borderColor = 'red';
    }

    if (pass2IsValid) {
        pass2Element.style.borderColor = 'lightgreen';
    } else {
        pass2Element.style.borderColor = 'red';
    }

    return usernameIsValid && passIsValid && pass2IsValid;
}