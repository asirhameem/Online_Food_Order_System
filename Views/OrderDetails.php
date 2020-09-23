<!--Php Session Code Here-->
<?php
require_once('../Models/orderService.php');
session_start();
if(isset($_SESSION["valid"]) && $_SESSION["valid"]=="Yes"){ 
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Order Details</title>
    <link rel="stylesheet" href="../assets/css/orderdetail.css">
</head>

<body>
    <header>

        <nav>
            <a href="MyProfile.php">Welcome, <?php   echo $_SESSION['name']   ?></a>
            <a href="HomePage.php">Home</a>
            <a href="MyProfile.php">My Profile</a>
            <a href="cart.php">Cart</a>
            <a href="OrderDetails.php">Order Details</a>
            <a href="LoginPage.php">Logout</a>
        </nav>

    </header>


    <div class="OrderOnGoing">
        <h1 style="text-align:center;">Order On Going</h1>
        <table style="border: 3px solid; border-radius: 2px; margin-top: 5%; width:100%;">

            <thead>
                <tr>
                    <td>Order Id</td>
                    <td>Rider Name</td>
                    <td>Order Details</td>
                    <td>Total Price</td>
                    <td>Order Status</td>

                </tr>
            </thead>
            <!---Php Code Here-->

            <?php
        $username = $_SESSION['username'];
        $result = GetAllOrdersOnGoing($username);
        while ($row = mysqli_fetch_array($result)) {
    ?>

            <tbody>
                <tr>
                    <td colspan="5">
                        <hr>
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h5 class="orderId"><?php echo $row['o_id'];?></h5>
                    </td>

                    <td>
                        <h5 class="riderName"> <?php echo $row["r_name"]; ?> </h5>
                    </td>
                    <td>
                        <h3 class="orderedItems"><?php echo $row['o_details'];?> </h3>
                    </td>
                    <td>
                        <h3 class="orderMoney"><?php echo $row['o_total'];?></h3>
                    </td>
                    <td>
                        <h3 class="orderStatus"><?php echo $row['o_status'];?></h3>
                    </td>
                </tr>

            </tbody>
            <?php
                }
                ?>
        </table>


    </div>


    <div class="OrderServed">
        <h1 style="text-align:center;">Order Served</h1>
        <table style="border: 3px solid; border-radius: 2px; margin-top: 5%; width:100%;">

            <thead>
                <tr>
                    <td>Order Id</td>
                    <td>Rider Name</td>
                    <td>Order Details</td>
                    <td>Total Price</td>
                    <td>Order Status</td>
                    <td>Comment</td>

                </tr>
            </thead>
            <!---Php Code Here-->

            <?php
        $username = $_SESSION['username'];
        $result = GetAllOrders($username);
        while ($row = mysqli_fetch_array($result)) {
    ?>
            <form action="../PhpController/commentController.php" method="post">
                <tbody>
                    <tr>
                        <td colspan="6">
                            <hr>
                            <hr>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5 class="orderId"><?php echo $row['o_id'];?></h5>
                            <input type="hidden" name="orderId" value="<?php echo $row['o_id'];?>">
                        </td>

                        <td>
                            <h5 class="riderName"> <?php echo $row["r_name"]; ?> </h5>
                        </td>
                        <td>
                            <h3 class="orderedItems"><?php echo $row['o_details'];?> </h3>
                        </td>
                        <td>
                            <h3 class="orderMoney"><?php echo $row['o_total'];?></h3>
                        </td>
                        <td>
                            <h3 class="orderStatus"><?php echo $row['o_status'];?></h3>
                        </td>

                        <td>
                            <input type="text" name="comment" placeholder="Comment Here">
                            <input type="submit" name="commentSubmit" value="Submit">
                        </td>
                    </tr>
            </form>

            </tbody>
            <?php
                }
                ?>
        </table>


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
