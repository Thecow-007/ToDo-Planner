/* COLE */

/* COLE */
function AccountLogin() {
    var username = document.getElementById('username').value.trim();
    var pass = document.getElementById('pass').value;
    var usernameElement = document.getElementById('username');
    var passElement = document.getElementById('pass');

    var usernameIsValid = username !== '' && username.length <= 20;
    var passIsValid = pass.length >= 6 && /[a-z]/.test(pass) && /[A-Z]/.test(pass);

    if (usernameIsValid) {
        usernameElement.style.borderColor = 'lightgreen';
    } else {
        usernameElement.style.borderColor = 'red';
        document.getElementById('UserErrorText').style.display = 'inline';
        document.getElementById('UserErrorText').style.color = 'red';
    }

    if (passIsValid) {
        passElement.style.borderColor = 'lightgreen';
    } else {
        passElement.style.borderColor = 'red';
        document.getElementById('PassErrorText').style.display = 'inline';
        document.getElementById('PassErrorText').style.color = 'red';
    }

    return usernameIsValid && passIsValid;
}

function AccountCreate() {
    var username = document.getElementById('username').value.trim();
    var pass = document.getElementById('pass').value;
    var pass2 = document.getElementById('pass2').value;
    var usernameElement = document.getElementById('username');
    var passElement = document.getElementById('pass');
    var pass2Element = document.getElementById('pass2');
    var usernameElement = document.getElementById('username');
    var passElement = document.getElementById('pass');
    var pass2Element = document.getElementById('pass2');

    var usernameIsValid = username !== '' && username.length <= 20;
    var passIsValid = pass.length >= 6 && /[a-z]/.test(pass) && /[A-Z]/.test(pass);
    var pass2IsValid = pass2.length >= 6 && /[a-z]/.test(pass2) && /[A-Z]/.test(pass2) && pass === pass2;

    // Checks if inputs are valid
    if (usernameIsValid) {
        usernameElement.style.borderColor = 'lightgreen';
        document.getElementById('UserErrorText').innerText = ' ';
    }
    if (passIsValid) {
        passElement.style.borderColor = 'lightgreen';
        document.getElementById('PassErrorText').innerText = ' ';
    }
    if (pass2IsValid) {
        pass2Element.style.borderColor = 'lightgreen';
        document.getElementById('Pass2ErrorText').innerText = ' ';
    }

    // Checks for username specific errors
    if (username.length > 20) {
        document.getElementById('UserErrorText').innerText = '*Must Be Less Than or Equal To 20 Characters.';
        usernameElement.style.borderColor = 'red';
        document.getElementById('UserErrorText').style.color = 'red';
    }
    if (username === '') {
        document.getElementById('UserErrorText').innerText = '*Must Include Username.';
        usernameElement.style.borderColor = 'red';
        document.getElementById('UserErrorText').style.color = 'red';
    }
    // Checks if inputs are valid
    if (usernameIsValid) {
        usernameElement.style.borderColor = 'lightgreen';
        document.getElementById('UserErrorText').innerText = ' ';
    }
    if (passIsValid) {
        passElement.style.borderColor = 'lightgreen';
        document.getElementById('PassErrorText').innerText = ' ';
    }
    if (pass2IsValid) {
        pass2Element.style.borderColor = 'lightgreen';
        document.getElementById('Pass2ErrorText').innerText = ' ';
    }

    // Checks for username specific errors
    if (username.length > 20) {
        document.getElementById('UserErrorText').innerText = '*Must Be Less Than or Equal To 20 Characters.';
        usernameElement.style.borderColor = 'red';
        document.getElementById('UserErrorText').style.color = 'red';
    }
    if (username === '') {
        document.getElementById('UserErrorText').innerText = '*Must Include Username.';
        usernameElement.style.borderColor = 'red';
        document.getElementById('UserErrorText').style.color = 'red';
    }

    // Checks for password specific errors
    if (!passIsValid) {
        document.getElementById('PassErrorText').innerText = '*Password Must Contain At Least: 6 Letters, 1 Lowercase Letter, 1 Capital Letter.';
        passElement.style.borderColor = 'red';
        document.getElementById('PassErrorText').style.color = 'red';
    }
    if (pass === '') {
        document.getElementById('PassErrorText').innerText = '*Must Include Password.';
        passElement.style.borderColor = 'red';
        document.getElementById('PassErrorText').style.color = 'red';
    }
    
    // Checks for second password specific errors
    if (!(pass2.length >= 6 && /[a-z]/.test(pass2) && /[A-Z]/.test(pass2) && pass === pass2)) {
        document.getElementById('Pass2ErrorText').innerText = '*Passwords Do Not Match.';
        pass2Element.style.borderColor = 'red';
        document.getElementById('Pass2ErrorText').style.color = 'red';
    }
    if (pass2 === '') {
        document.getElementById('Pass2ErrorText').innerText = '*Must Repeat Password.';
        pass2Element.style.borderColor = 'red';
        document.getElementById('Pass2ErrorText').style.color = 'red';
    }


    return usernameIsValid && passIsValid && pass2IsValid;
}
