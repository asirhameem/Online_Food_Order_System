function LoginCheck() {
    var logError = usernameError + passwordError;
    var userName = document.getElementById("userName").value;
    var password = document.getElementById("pass").value;

    var info = {
        'username': userName,
        'password': password
    };

    info = JSON.stringify(info);

    if (logError == 0) {
        var xhttp = new XMLHttpRequest();
        xhttp.open('POST', '../PhpController/loginController.php', true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.send('info=' + info);
        xhttp.onreadystatechange = function () {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                alert(xhttp.responseText);
                if (xhttp.responseText == "Customer") {
                    window.location.href = "HomePage.html"
                }
            }
        }
    } else {
        alert("Invalid Input");
    }

}



var usernameError = 0;
var passwordError = 0;

function CredentialCheck() {
    var UserName = document.getElementById("userName").value;
    var usernameMsg = document.getElementById("userNameMsg");

    var pass = document.getElementById("pass").value;
    var passwordMsg = document.getElementById("passWordMsg");


    if (UserName.length < 4) {
        usernameMsg.innerHTML = "Invalid User Name";
        usernameError = 1;
    } else {
        usernameMsg.innerHTML = "";
        usernameError = 0;
    }

    if (pass.length < 8) {
        passwordMsg.innerHTML = "Password Must have 8 Characters";
        passwordError = 1;
    } else {
        passwordMsg.innerHTML = "";
        passwordError = 0;
    }

}


function RememberMe() {
    var userName = document.getElementById("userName").value;
    var password = document.getElementById("pass").value;

    if (userName.length < 4 || password.length < 8) {
        alert("Invalid Credentials");
    } else {
        var info = {
            'username': userName,
            'password': password
        };
        info = JSON.stringify(info);

        var save = new XMLHttpRequest();
        save.open('POST', '../PhpController/loginController.php', true);
        save.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        save.send('remember=' + info);
        save.onreadystatechange = function () {
            if (save.readyState == 4 && save.status == 200) {
                alert("Saved");
            }
        }
    }
}
