var name;


function FullnameCheck() {
    var fullName = document.getElementById("fullName").value;
    var fullnameMsg = document.getElementById("fullnameMsg");
    if (fullName.length < 3) {
        fullnameMsg.innerHTML = "Please provide a valid Name";
    } else {
        fullnameMsg.innerHTML = "";
        name = fullName;
    }
}

var username;

function UserNameCheck() {
    var userName = document.getElementById("userName").value;
    var usernameMsg = document.getElementById("usernameMsg");

    if (userName.length < 4) {
        usernameMsg.innerHTML = "Provide atleast 4 character";
    } else {
        usernameMsg.innerHTML = "";
        username = userName;
    }
}

var pass;

function PasswordCheck() {

    var password = document.getElementById("password").value;
    var passwordMsg = document.getElementById("passwordMsg");

    if (password.length < 8) {
        passwordMsg.innerHTML = "Password must have 8 character";
    } else if (password.length >= 8 && ((password.indexOf("@") == -1))) {
        passwordMsg.innerHTML = "Password is not Strong";
        pass = password;
    } else {
        passwordMsg.innerHTML = "Strong Password";
        pass = password;
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
    } else {
        emailMsg.innerHTML = "";
        mail = email;
    }


}


var user;

function UserCheck() {
    var select = document.getElementById("userType").value;
    var usertypeMsg = document.getElementById("usertypeMsg");
    if (select == "0") {
        usertypeMsg.innerHTML = "Please select a user type";
    } else {
        usertypeMsg.innerHTML = select.option[select.selectedIndex].value;
        user = select.selected;
    }
}

function SubmissionCheck() {
    var userData = {
        'name': name,
        'email': mail,
        'username': username,
        'password': pass,
        'user': user,
        'status': "Active"

    };

    userData = JSON.stringify(userData);

    var xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../PhpController/signupController.php', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.responseType = "json";
    xhttp.send('data=' + userData);
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            alert(this.responseText);

        }
    }

}
