var nameError = 0;
var name;


function FullnameCheck() {
    var fullName = document.getElementById("fullName").value;
    var fullnameMsg = document.getElementById("fullnameMsg");
    if (fullName.length < 3) {
        fullnameMsg.innerHTML = "Please provide a valid Name";
        nameError = 1;
    } else {
        fullnameMsg.innerHTML = "";
        name = fullName;
        nameError = 0;
    }
}


var username;
var usernameError = 0;

function UserNameCheck() {
    var userName = document.getElementById("userName").value;
    var usernameMsg = document.getElementById("usernameMsg");

    if (userName.length < 4) {
        usernameMsg.innerHTML = "Provide atleast 4 character";
        usernameError = 1;
    } else {
        /*  usernameMsg.innerHTML = "";
        
        return true;     */
        var uname = new XMLHttpRequest();
        uname.open('POST', '../PhpController/signupController.php', true);
        uname.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        uname.send('username=' + userName);
        uname.onreadystatechange = function () {
            if (uname.readyState == 4 && uname.status == 200) {
                usernameMsg.innerHTML = uname.responseText;
                if (uname.responseText == "User Name Taken") {
                    usernameError = 1;
                } else {
                    usernameError = 0;
                    username = userName;
                }

            }
        }
    }
}

var pass;
var passError = 0;

function PasswordCheck() {

    var password = document.getElementById("password").value;
    var passwordMsg = document.getElementById("passwordMsg");

    if (password.length < 8) {
        passwordMsg.innerHTML = "Password must have 8 character";
        passError = 1;
    } else if (password.length >= 8 && ((password.indexOf("@") == -1))) {
        passwordMsg.innerHTML = "Password is not so Strong";
        pass = password;
        passError = 0;
    } else {
        passwordMsg.innerHTML = "Strong Password";
        pass = password;
        passError = 0;
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
var mailError = 0;

function EmailCheck() {
    var email = document.getElementById("email").value;
    var emailMsg = document.getElementById("emailMsg");


    if ((email.indexOf("@") == -1) || (email.indexOf(".") == -1)) {
        emailMsg.innerHTML = "Please provide a valid email address";
        mailError = 1;
    } else if (email.indexOf("@") > email.indexOf(".")) {
        emailMsg.innerHTML = "Invalid Email";
        mailError = 1;
    } else {
        /*emailMsg.innerHTML = "";
        
        return true;*/
        var emreq = new XMLHttpRequest();
        emreq.open('POST', '../PhpController/signupController.php', true);
        emreq.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        emreq.send('email=' + email);
        emreq.onreadystatechange = function () {
            if (emreq.readyState == 4 && emreq.status == 200) {
                emailMsg.innerHTML = emreq.responseText;
                if (emreq.responseText == "Email Taken") {
                    mailError = 1;
                } else {
                    mailError = 0;
                    mail = email;
                }
            }
        }

    }


}


var user;

/*function UserCheck() {
    var selectUser = document.getElementById("users");
    var usertypeMsg = document.getElementById("usertypeMsg");
    if (selectUser.value == "Select") {
        alert("Please select a user type");
    } else {
        usertypeMsg.innerHTML = "";
        user = select.options[select.selectedIndex].value;
    }
}
*/


function SubmissionCheck() {
    var subError = nameError + usernameError + passError + mailError;

    if (subError == 0) {
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
            if (xhttp.readyState == 4 && xhttp.status == 200) {

                alert(xhttp.responseText);
                if (xhttp.responseText == "Registered to the system") {
                    window.location.href = 'LoginPage.php';
                }

            }
        }
    } else {
        alert("Check Previous Fields");
    }

}
