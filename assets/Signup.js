function FullnameCheck() {
    var fullName = document.getElementById("fullName").value;
    var fullnameMsg = document.getElementById("fullnameMsg");
    if (fullName.length < 3) {
        fullnameMsg.innerHTML = "Please provide a valid Name";
    } else {
        fullnameMsg.innerHTML = "";
    }
}

function UserNameCheck() {
    var userName = document.getElementById("userName").value;
    var usernameMsg = document.getElementById("usernameMsg");

    if (userName.length < 4) {
        usernameMsg.innerHTML = "Provide atleast 4 character";
    } else {
        usernameMsg.innerHTML = "";
    }
}

function PasswordCheck() {

    var password = document.getElementById("password").value;
    var passwordMsg = document.getElementById("passwordMsg");

    if (password.length < 8) {
        passwordMsg.innerHTML = "Password must have 8 character";
    } else if (password.length >= 8 && ((password.indexOf("@") == -1))) {
        passwordMsg.innerHTML = "Password is not Strong";
    } else {
        passwordMsg.innerHTML = "Strong Password";
    }
}

function ConfirmPassCheck() {
    var password = document.getElementById("password").value;
    var confPass = document.getElementById("confPassword").value;
    var confpassMsg = document.getElementById("confpassMsg");

    if (password != confPass) {
        confpassMsg.innerHTML = "Password does not match";
    } else {
        confpassMsg.innerHTML = "";
    }
}


function EmailCheck() {
    var email = document.getElementById("email").value;
    var emailMsg = document.getElementById("emailMsg");

    if ((email.indexOf("@") == -1) || (email.indexOf(".") == -1)) {
        emailMsg.innerHTML = "Please provide a valid email address";
    } else {
        emailMsg.innerHTML = "";
    }
}
