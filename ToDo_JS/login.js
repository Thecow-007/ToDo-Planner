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

    var usernameIsValid = username !== '' && username.length <= 20;
    var passIsValid = pass.length >= 6 && /[a-z]/.test(pass) && /[A-Z]/.test(pass);
    var pass2IsValid = pass2.length >= 6 && /[a-z]/.test(pass2) && /[A-Z]/.test(pass2) && pass === pass2;
    var complete = false;

    if (usernameIsValid) {
        usernameElement.style.borderColor = 'lightgreen';
        document.getElementById('UserErrorText').style.display = 'none';
    } else {
        usernameElement.style.borderColor = 'red';
        document.getElementById('UserErrorText').style.display = 'inline';
        document.getElementById('UserErrorText').style.color = 'red';
    }

    if (passIsValid) {
        passElement.style.borderColor = 'lightgreen';
        document.getElementById('PassErrorText').style.display = 'none';
    } else {
        passElement.style.borderColor = 'red';
        document.getElementById('PassErrorText').style.display = 'inline';
        document.getElementById('PassErrorText').style.color = 'red';
    }

    if (pass2IsValid) {
        pass2Element.style.borderColor = 'lightgreen';
        document.getElementById('Pass2ErrorText').style.display = 'none';
    } else {
        pass2Element.style.borderColor = 'red';
        document.getElementById('Pass2ErrorText').style.display = 'inline';
        document.getElementById('Pass2ErrorText').style.color = 'red';
    }

    if (usernameIsValid && passIsValid && pass2IsValid) {
       window.location.assign("./index.html");
    }

    return usernameIsValid && passIsValid && pass2IsValid;
}

function toIndex() {
    window.location.href = "index.html";
}

function userAlreadyExists() {

    document.getElementById('UserErrorText').style.display = 'inline';
    document.getElementById('UserErrorText').style.color = 'red';

}