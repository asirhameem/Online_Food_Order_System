<!--Php Session Code Here-->
<?php
require_once('../Models/cartService.php');
session_start();
if(isset($_SESSION["valid"]) && $_SESSION["valid"]=="Yes"){ 
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Cart</title>
    <link rel="stylesheet" href="../assets/css/orderdetail.css">
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




    <div class="CartItems">
        <h1 style="text-align:center;">Cart</h1>
        <table style="border: 3px solid; border-radius: 2px; margin-top: 5%; width:100%;">

            <thead>
                <tr>
                    <td>Item Id</td>
                    <td>Item Name</td>
                    <td>Item Quantity</td>
                    <td>Item Price</td>
                    <td>Action</td>
                </tr>
            </thead>
            <!---Php Code Here-->

            <?php
        $total = SumTotal();
        $sum = mysqli_fetch_array($total);                                                  
        $result = GetAllFromCart();
        while ($row = mysqli_fetch_array($result)) {
    ?>

            <tbody>
                <form action="../PhpController/cartController.php" method="post">
                    <tr>
                        <td colspan="5">
                            <hr>
                            <hr>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5 class="orderId"><?php echo $row['c_id']?></h5>
                            <input type="hidden" name="orderId" value="<?php echo $row['c_id'];?>">
                        </td>
                        <td>
                            <h5 class="orderName"><?php echo $row['c_item'];?></h5>
                        </td>

                        <td>
                            <h5 class="riderName"> <?php echo $row["c_quantity"]; ?> </h5>
                        </td>
                        <td>
                            <h3 class="orderedItems"><?php echo $row['c_price'];?> </h3>
                        </td>

                        <td>
                            <input type="submit" name="remove" value="Remove">
                        </td>

                    </tr>
                </form>


                <?php
                }
                ?>
                <tr>
                    <td></td>
                </tr>
            </tbody>
        </table>




    </div>

    <div style="display:inline-block; float:left;">
        <table style="border:5px solid; border-radius:5px; margin-top:3%;">
            <tr>
                <td colspan="3">
                    <h2>Total Bill: <?php   echo $sum['total'];   ?>৳ </h2>
                </td>

                <?php   
                    $items = ItemsList();
                    $food = mysqli_fetch_array($items);
                    $q = QuantityList();
                    $quantity = mysqli_fetch_array($q);
                    $concat = $food['items']." : ".$quantity['quantity'];
                                                           
                ?>


            </tr>



        </table>
    </div>


    <div style="display:inline-block; float:right;">
        <form action="../PhpController/cartController.php" method="post">
            <table style="border:5px solid; border-radius:3px; margin-top:5%;">
                <tr style="text-align:right; width:100%;">
                    <td colspan="2">
                        <input type="hidden" name="bill" value="<?php echo $sum['total']; ?>">
                        <input type="hidden" name="status" value="Pending">
                        <input type="hidden" name="list" value="<?php echo $concat; ?>">
                        <input type="submit" name="checkout" value="getout">

                    </td>
                </tr>
            </table>
        </form>
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
