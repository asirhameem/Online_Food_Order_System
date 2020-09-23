<?php
require_once('../Models/homeService.php');
session_start();
if(isset($_SESSION["valid"]) && $_SESSION["valid"]=="Yes"){ 
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" lang="en">
    <title>Home Page</title>
    <link rel="stylesheet" href="../assets/css/home.css">
    <script type="text/javascript" src="../assets/js/home.js"></script>
</head>

<body>
    <header>

        <nav>
            <a href="MyProfile.php">Welcome, <?php   echo $_SESSION['name']   ?></a>
            <a href="HomePage.php">Home</a>
            <a href="MyProfile.php">My Profile</a>
            <a href="OrderDetails.php">Order Details</a>
            <a href="cart.php">Cart</a>
            <a href="LoginPage.php">Logout</a>
        </nav>

    </header>

    <div id="Dishes">
        <?php
        $result = GetAllItems();
        while ($row = mysqli_fetch_array($result)) {
    ?>
        <div class="DinnerDishes">
            <form action="../PhpController/cartController.php" method="post">
                <h5 class="itemName" style="text-align:center;"> <?php echo $row["i_name"]; ?>
                    <input type="hidden" name="i_name" value="<?php echo $row["i_name"] ?>">
                </h5>
                <img class="itemPic" src="<?php echo $row["i_picture"];?>" alt="Item Image">
                <div class="itemDetail">
                    <h3 class="itemPrice"> <?php echo $row['i_price'];?> Taka</h3>
                    <input type="hidden" name="i_price" value="<?php echo $row["i_price"]?>">
                    <h5 class="itemCategory"> <?php echo $row['i_category'];?></h5>
                    <p><?php echo $row['i_detail'];?> </p>
                </div>
                <div>
                    <table>
                        <tr>
                            <td>Quantity</td>
                            <td><input id="quantity" name="quantity" type="number" min="0" max="25"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" name="add_to_cart" value="Add To Cart"></td>
                        </tr>
                    </table>
                </div>
            </form>
        </div>


        <?php
        }
        ?>



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
