var name;


function FullnameCheck() {
    var fullName = document.getElementById("fullName").value;
    var fullnameMsg = document.getElementById("fullnameMsg");
    if (fullName.length < 3) {
        fullnameMsg.innerHTML = "Please provide a valid Name";
        return false;
    } else {
        fullnameMsg.innerHTML = "";
        name = fullName;
        return true;
    }
}

var username;

function UserNameCheck() {
    var userName = document.getElementById("userName").value;
    var usernameMsg = document.getElementById("usernameMsg");

    if (userName.length < 4) {
        usernameMsg.innerHTML = "Provide atleast 4 character";
        return false;
    } else {
        usernameMsg.innerHTML = "";
        username = userName;
        return true;
    }
}

var pass;

function PasswordCheck() {

    var password = document.getElementById("password").value;
    var passwordMsg = document.getElementById("passwordMsg");

    if (password.length < 8) {
        passwordMsg.innerHTML = "Password must have 8 character";
        return false;
    } else if (password.length >= 8 && ((password.indexOf("@") == -1))) {
        passwordMsg.innerHTML = "Password is not so Strong";
        pass = password;
        return true;
    } else {
        passwordMsg.innerHTML = "Strong Password";
        pass = password;
        return true;
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

var mail;

function EmailCheck() {
    var email = document.getElementById("email").value;
    var emailMsg = document.getElementById("emailMsg");

    if ((email.indexOf("@") == -1) || (email.indexOf(".") == -1)) {
        emailMsg.innerHTML = "Please provide a valid email address";
        return false;
    } else {
        emailMsg.innerHTML = "";
        mail = email;
        return true;
    }


}


var user;
/*
function UserCheck() {
    var selectUser = document.getElementById("users");
    var usertypeMsg = document.getElementById("usertypeMsg");
    if (selectUser.value == "Select") {
        alert("Please select a user type");
    } else {
        usertypeMsg.innerHTML = "";
        user = select.options[select.selectedIndex].value;
    }
} */

function SubmissionCheck() {
    var userData = {
        'name': name,
        'email': mail,
        'username': username,
        'password': pass,
        'user': "Customer",
        'status': "Active"

    };

    userData = JSON.stringify(userData);

    var xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../PhpController/signupController.php', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhttp.send('data=' + userData);
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("usertypeMsg").innerHTML = this.responseText;

        }
    }

}
