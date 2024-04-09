
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

    var usernameIsValid = username !== '' && username.length <= 20;
    var passIsValid = pass.length >= 6 && /[a-z]/.test(pass) && /[A-Z]/.test(pass);
    var pass2IsValid = pass2.length >= 6 && /[a-z]/.test(pass2) && /[A-Z]/.test(pass2) && pass === pass2;

    if (usernameIsValid && passIsValid && pass2IsValid) {
       window.location.assign("./ToDo_HTML/ToDo.html");
    }

    thePHP();

    return usernameIsValid && passIsValid && pass2IsValid;
}

function toIndex() {
    window.location.href = "./ToDo_HTML/ToDo.html";
}

function validUsername() {
    document.getElementById('UserBlankText').style.display = 'none';
    document.getElementById('UserLengthText').style.display = 'none';
    document.getElementById('UserErrorText').style.display = 'none';
    usernameElement.style.borderColor = 'lightgreen';
}

function userAlreadyExists() {
    document.getElementById('UserBlankText').style.display = 'none';
    document.getElementById('UserLengthText').style.display = 'none';
    usernameElement.style.borderColor = 'red';
    document.getElementById('UserErrorText').style.display = 'inline';
    document.getElementById('UserErrorText').style.color = 'red';
}

function mustIncludeUsername() {
    document.getElementById('UserErrorText').style.display = 'none';
    document.getElementById('UserLengthText').style.display = 'none';
    usernameElement.style.borderColor = 'red';
    document.getElementById('UserBlankText').style.display = 'inline';
    document.getElementById('UserBlankText').style.color = 'red';
}

function userMustBeLessThan20char() {
    document.getElementById('UserErrorText').style.display = 'none';
    document.getElementById('UserBlankText').style.display = 'none';
    usernameElement.style.borderColor = 'red';
    document.getElementById('UserLengthText').style.display = 'inline';
    document.getElementById('UserLengthText').style.color = 'red';
}

function validPassword() {
    passElement.style.borderColor = 'lightgreen';
    document.getElementById('PassErrorText').style.display = 'none';
}

function passMustInclude() {
    passElement.style.borderColor = 'red';
    document.getElementById('PassErrorText').style.display = 'inline';
    document.getElementById('PassErrorText').style.color = 'red';
}

function valid2ndPass() {
    pass2Element.style.borderColor = 'lightgreen';
    document.getElementById('Pass2ErrorText').style.display = 'none';
    document.getElementById('Pass2BlankText').style.display = 'none';
}

function mustRepeatPassword() {
    document.getElementById('Pass2ErrorText').style.display = 'none';
    pass2Element.style.borderColor = 'red';
    document.getElementById('Pass2BlankText').style.display = 'inline';
    document.getElementById('Pass2BlankText').style.color = 'red';
}

function passDoNotMatch() {
    document.getElementById('Pass2BlankText').style.display = 'none';
    pass2Element.style.borderColor = 'red';
    document.getElementById('Pass2ErrorText').style.display = 'inline';
    document.getElementById('Pass2ErrorText').style.color = 'red';
}