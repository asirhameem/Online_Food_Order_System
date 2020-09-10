function LoginCheck() {

    var xhttp = new XMLHttpRequest();


}

function UserNameCheck() {
    var UserName = document.getElementById("userName").value;
    var usernameMsg = document.getElementById("userNameMsg");
    if (UserName.length == 0) {
        usernameMsg.innerHTML = "Cannot leave the field empty";
    }

}

function PasswordCheck() {
    var Password = document.getElementById("password").value;
    var passwordMsg = document.getElementById("passwordMsg");
    if (Password.length <= 0) {
        passwordMsg.innerHTML = "Cannot leave the field empty";
    }
}
