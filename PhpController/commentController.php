<?php
require_once('../Models/commentService.php');
session_start();

if(isset($_POST['commentSubmit']))
{
    if(empty($_POST['comment']) || empty($_POST['orderId']))
    {
        echo "Null Submission";
    }
    else
    {
        $oid = $_POST['orderId'];
        $post = $_POST['comment'];
        $uname = $_SESSION['username'];
        
        $result = PostComment($oid,$uname,$post);
        if($result)
        {
            ?>
<script>
    alert("Comment Posted");
    window.location.href = "../Views/HomePage.php";

</script>
<?php
        }
    }
}




?>
