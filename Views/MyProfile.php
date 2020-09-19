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
            <a href="HomePage.html">Home</a>
            <a href="MyProfile.html">My Profile</a>
            <a href="">Rider Details</a>
            <a href="">Cart</a>
            <a id="btnLogout" href="LoginPage.php">Logout</a>
        </nav>
    </header>

    <div class="flex">
        <div id="info">
            <table id="infoTable">
                <tr>
                    <td class="infoTag">Full Name</td>

                    <td><input class="infoBox" type="text" placeholder="" readonly></td>
                </tr>
                <tr>
                    <td class="infoTag">User Name</td>

                    <td><input class="infoBox" type="text" placeholder="" readonly></td>
                </tr>
                <tr>
                    <td class="infoTag">Email</td>

                    <td><input class="infoBox" type="text" placeholder="" readonly></td>
                </tr>

                <tr>
                    <td class="infoTag">Password</td>

                    <td><input class="infoBox" type="password" placeholder="" readonly></td>
                </tr>
            </table>

        </div>

        <div id="dp">

            <div id="image">
                <h4>Profile Image</h4>

            </div>
        </div>
    </div>
</body>

</html>
