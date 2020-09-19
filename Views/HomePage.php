<?php
session_start();
if(isset($_SESSION["valid"]) && $_SESSION["valid"]=="Yes"){ 
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" lang="en">
    <title>Home Page</title>
    <link rel="stylesheet" href="../assets/css/home.css">
</head>

<body>
    <header>

        <nav>
            <a href="HomePage.html">Home</a>
            <a href="">My Profile</a>
            <a href="">Order Details</a>
            <a href="">Cart</a>
        </nav>

    </header>

    <div id="Dishes">
        <div id="DinnerDishes">


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
