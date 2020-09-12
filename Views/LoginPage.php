<?php
require_once('../PhpController/loginController.php');

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link rel="stylesheet" href="../assets/css/login.css">
    <script type="text/javascript" src="../assets/js/Login.js"></script>
</head>

<body>
    <div id="mainDiv">
        <div class="centerDiv">
            <div class="header-text">
                <div id="loginIcon">
                    <img src="image/login.png" alt="login system picture">
                </div>
                <div id="systemText">
                    <h2>Welcome to the System</h2>
                </div>

                <div class="login-form">
                    <div id="signinText">
                        <p>Sign In With Your Credentials</p>
                    </div>
                    <div id="credentials">
                        <form action="../PhpController/loginController.php" method="post">
                            <table>
                                <tr>
                                    <td>UserName:</td>
                                    <td><input type="text" id="userName" name="userName" onfocus="UserNameCheck()" onkeyup="UserNameCheck()" required></td>

                                </tr>

                                <tr>
                                    <td></td>
                                    <td id="userNameMsg"></td>
                                </tr>

                                <tr>
                                    <td>Password:</td>
                                    <td>
                                        <input type="password" id="password" name="password" onkeyup="PasswordCheck()" required>
                                    </td>

                                </tr>

                                <tr>
                                    <td></td>
                                    <td id="passwordMsg"></td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td><input type="checkbox" name="rememberMe">Remember Me</td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td>
                                        <button>Login</button>
                                    </td>
                                </tr>



                                <tr>
                                    <td></td>
                                    <td><a href="SignupPage.html">Sign Up!!</a></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>


</body>

</html>