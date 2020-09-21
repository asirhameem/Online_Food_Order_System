<?php
require_once('../Models/profileService.php');
session_start();
if(isset($_SESSION["valid"]) && $_SESSION["valid"]=="Yes"){ 

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>My Profile</title>
    <link rel="stylesheet" href="../assets/css/profile.css">
    <script type="text/javascript" src="../assets/js/profile.js"></script>
</head>

<body>
    <header>
        <nav>
            <a href="MyProfile.php">Welcome, <?php   echo $_SESSION['name']   ?></a>
            <a href="HomePage.php">Home</a>
            <a href="MyProfile.php">My Profile</a>
            <a href="">Cart</a>
            <a href="OrderDetails.php">Order Details</a>
            <a id="btnLogout" href="LoginPage.php">Logout</a>
        </nav>
    </header>

    <div class="flex">
        <div id="info">
            <table id="infoTable">

                <tr>
                    <td colspan="2" style="text-align:center;">
                        <h4>User Informations</h4>
                    </td>
                </tr>
                <tr>
                    <?php    $fetch = LoadInfo($_SESSION['username'])    ?>
                    <td class="infoTag">Full Name</td>

                    <td><input class="infoBox" type="text" id="fullName" onkeyup="FullnameCheck()" value="<?php   echo $fetch["name"];  ?>"></td>
                </tr>

                <tr>
                    <td></td>
                    <td id="fullNameMsg"></td>
                </tr>

                <tr>
                    <td class="infoTag">User Name</td>

                    <td><input class="infoBox" type="text" value="<?php echo $_SESSION['username'] ?>" id="userName" readonly></td>
                </tr>

                <tr>
                    <td class="infoTag">Email</td>

                    <td><input class="infoBox" type="text" value="<?php echo $_SESSION['email'] ?>" id="userEmail" readonly></td>
                </tr>

                <tr>
                    <td colspan="2" id="infoMsg"></td>
                </tr>

                <!--<tr>
                    <td class="infoTag">Password</td>

                    <td><input class="infoBox" type="password" placeholder="" readonly></td>
                </tr>-->


                <tr>
                    <td colspan="2">
                        <hr>
                    </td>
                </tr>


                <tr>
                    <td></td>
                    <td><button type="button" onclick="UpdateName()">Update Information</button></td>
                </tr>
            </table>

        </div>

        <div id="changePassword">
            <table style="border:3px solid; border-radius:2px; padding:6%;">
                <tr>
                    <td colspan="2" style="text-align:center;">
                        <b>Change Password</b>
                    </td>
                </tr>

                <tr>
                    <td>Recent Password</td>
                    <td><input id="recentPass" type="" value="<?php  echo $fetch['password']; ?>"></td>
                </tr>

                <tr>
                    <td>New Password</td>
                    <td><input id="newPass" type="text" placeholder="New Password" onkeyup="PasswordCheck()"></td>
                </tr>

                <tr>
                    <td>Confirm Password</td>
                    <td><input id="confPass" type="text" placeholder="Confirm Password" onkeyup="ConfirmPassCheck()"></td>
                </tr>

                <tr>
                    <td colspan="2">
                        <hr>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td id="passMsg"></td>
                </tr>

                <tr>
                    <td></td>
                    <td><button type="button" onclick="UpdatePassword()">Update Password</button></td>
                </tr>
            </table>

        </div>
        <!---<div id="dp">

            <div id="image">
                <h3 style="align:center;">Profile Image</h3>
                <div>
                    <table>
                        <tr>
                            <td>
                            
                          </td>
                        </tr>
                    </table>
                </div>

            </div>
        </div>-->

        <div id="displayPic">
            <table style="border: 3px solid; border-radius:2px; padding:5%; width:40%;">
                <tr>
                    <td style="text-align:center;">
                        <h3>Profile Picture</h3>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div>
                            <img src="<?php echo $fetch['dp']?>" alt="User Image">
                        </div>
                    </td>
                </tr>

                <form action="../PhpController/profileController.php" method="post" name="frm" enctype="multipart/form-data">
                    <tr>
                        <td>

                            <input type="file" name="fileToUpload" onchange="UploadImage()">


                        </td>
                    </tr>

                    <tr>
                        <td>
                            <hr>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <button type="submit">Upload Image</button>
                        </td>
                    </tr>
                </form>
            </table>


        </div>

    </div>
</body>

</html>


<?php

}
else{
    $_SESSION["valid"]="";

    header("Location:../Views/LoginPage.php");
}

?>
