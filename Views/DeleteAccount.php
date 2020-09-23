<?php
require_once('../PhpController/profileController.php');

if(isset($_SESSION["valid"]) && $_SESSION["valid"]=="Yes"){ 

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>My Profile</title>
    <link rel="stylesheet" href="../assets/css/profile.css">

</head>

<body>
    <header>
        <nav>
            <a href="MyProfile.php">Welcome, <?php   echo $_SESSION['name']   ?></a>
            <a href="HomePage.php">Home</a>
            <a href="MyProfile.php">My Profile</a>
            <a href="cart.php">Cart</a>
            <a href="OrderDetails.php">Order Details</a>
            <a id="btnLogout" href="LoginPage.php">Logout</a>
        </nav>
    </header>

    <div id="delAccount" style="display: block;  margin:10%;">
        <form action="../PhpController/profileController.php" method="post">
            <table style="border: 3px solid; border-radius: 3px; width:50%;">

                <tr>
                    <td>Delete Your Account</td>

                </tr>
                <tr>
                    <td><input type="submit" name="deleteAccount" value="Delete"></td>
                </tr>
            </table>

        </form>

    </div>

</body>

<?php

}
else{
    $_SESSION["valid"]="";

    header("Location:../Views/LoginPage.php");
}

?>
