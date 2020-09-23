<?php
require_once('../Models/cartService.php');
session_start();


if(isset($_POST['add_to_cart']))
{
    if(empty($_POST['i_name']) || empty($_POST['i_price']) || empty($_POST['quantity']))
    {
        echo "Null Submission!!";
    }
    else
    {
        $item = $_POST['i_name'];
        $quantity = $_POST['quantity'];
        $price = $_POST['i_price'] * $_POST['quantity'];
        
        $add = AddToCart($item,$quantity,$price);
        if($add)
        {
    ?>
<script>
    alert("Item Added");
    window.location.href = "../Views/cart.php";

</script>
<?php
        }
    }
}


if(isset($_POST['remove']))
{
    if(empty($_POST['orderId']))
    {
        echo "Null Submission!!";
    }
    else
    {
        $id = $_POST['orderId'];
        $delete = DeleteFromCart($id);
        if($delete)
        {
            ?>
<script>
    alert("Removed From Cart");
    window.location.href = "../Views/cart.php";

</script>
<?php
        }
    }
}



if(isset($_POST['checkout']))
{
    if(empty($_POST['bill']) || empty($_POST['status']) || empty($_POST['list']))
    {
        echo "Something Went Wrong";
    }
    else
    {
        $details = $_POST['list'];
        $bill = $_POST['bill'];
        $status = $_POST['status'];
        $customer = $_SESSION['username'];
        
        $result = SendToOrders($customer,$details,$bill,$status);
        
        if($result)
        {
            ?>
<script>
    alert("Order Placed");
    window.location.href = "../Views/OrderDetails.php";

</script>
<?php
        }
    }
}



?>
