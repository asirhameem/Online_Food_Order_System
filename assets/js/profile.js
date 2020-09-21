function UpdateName() {
    var fullName = document.getElementById('fullName').value;

    var xName = new XMLHttpRequest();
    xName.open('POST', '../PhpController/profileController.php', true);
    xName.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xName.send('name=' + fullName);
    xName.onreadystatechange = function () {
        if (xName.readyState == 4 && xName.status == 200) {
            alert(xName.responseText);
        }
    }

}

function UpdatePassword() {
    var newPass = document.getElementById('newPass').value;
    var confPass = document.getElementById('confPass').value;

    if (newPass == confPass) {
        var xPass = new XMLHttpRequest();
        xPass.open('POST', '../PhpController/profileController.php', true);
        xPass.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xPass.send('password=' + newPass);
        xPass.onreadystatechange = function () {
            if (xPass.readyState == 4 && xPass.status == 200) {
                alert(xPass.responseText);
            }
        }
    }
}

function FullnameCheck() {
    var fullName = document.getElementById("fullName").value;
    var fullnameMsg = document.getElementById("infoMsg");
    if (fullName.length < 3) {
        fullnameMsg.innerHTML = "Please provide a valid Name";
    } else {
        fullnameMsg.innerHTML = "";
    }
}

function PasswordCheck() {

    var password = document.getElementById("newPass").value;
    var old = document.getElementById('recentPass').value;
    var passwordMsg = document.getElementById("passMsg");

    if (password.length < 8) {
        passwordMsg.innerHTML = "Password must have 8 character";

    } else if (password.length >= 8 && ((password.indexOf("@") == -1))) {
        passwordMsg.innerHTML = "Password is not so Strong";
    } else {
        passwordMsg.innerHTML = "Strong Password";
    }
}

function ConfirmPassCheck() {
    var password = document.getElementById("newPass").value;
    var confPass = document.getElementById("confPass").value;
    var passMsg = document.getElementById("passMsg");

    if (password != confPass) {
        passMsg.innerHTML = "Password does not match";
    } else {
        passMsg.innerHTML = "";
    }
}


function UploadImage() {
    var path = document.getElementById('imageFile').value;
    if (path.length < 1) {
        alert("Please Select an Image");
    }

}
