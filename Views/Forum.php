<!--Php Session Code Here-->
<?php
require_once('../Models/commentService.php');
session_start();
if(isset($_SESSION["valid"]) && $_SESSION["valid"]=="Yes"){ 
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Forum</title>
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
        <h1 style="text-align:center;">Forum</h1>
        <table style="border: 3px solid; border-radius: 2px; margin-top: 5%; width:100%;">

            <thead>
                <tr>
                    <td>Post Id</td>
                    <td>Order Id</td>
                    <td>User Info</td>
                    <td>Comment</td>

                </tr>
            </thead>
            <!---Php Code Here-->

            <?php
                                                          
        $result = GetAllComments();
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
                        <h5 class="orderId"><?php echo $row['f_id']?></h5>
                        <input type="hidden" name="orderId" value="<?php echo $row['c_id'];?>">
                    </td>
                    <td>
                        <h5 class="orderName"><?php echo $row['o_id'];?></h5>
                    </td>

                    <td>
                        <h5 class="riderName"> <?php echo $row["u_name"]; ?> </h5>
                    </td>
                    <td>
                        <h3 class="orderedItems"><?php echo $row['f_post'];?> </h3>
                    </td>



                </tr>



                <?php
                }
                ?>
                <tr>
                    <td></td>
                </tr>
            </tbody>
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
