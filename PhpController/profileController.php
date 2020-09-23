<?php

session_start();
require_once('../Models/profileService.php');
/*if(isset($_POST['image']))
    {
        $filepath = "Pictures/" . $_POST["image"];
        if($upload = move_uploaded_file($_POST["image"],$filepath))
        {
            echo "Image Uploaded";
        }

    }*/

if(isset($_FILES['fileToUpload']))
{

$source = $_FILES['fileToUpload']['tmp_name'];
$filename = $_FILES['fileToUpload']['name'];

$target = "../Pictures/".$_FILES['fileToUpload']['name'];

$targetDb = "../Pictures/".$_FILES['fileToUpload']['name'];

if(move_uploaded_file($source,$target))
{
    $result = UpdateImage($targetDb,$_SESSION['email']);
    if($result)
    {
        $_SESSION['dp'] = $targetDb;
        ?>

<script>
    alert("Uploaded Successfully");
    window.location.href = '../Views/MyProfile.php';

</script>

<?php
}
}
}



if(isset($_POST['name']))
{
    $name = $_POST['name'];
    $email = $_SESSION['email'];
    if(empty($name))
    {
        echo "Null Submission!!";
    }
    else{
        $result = UpdateName($name,$email);
        if($result)
        {
            echo "Name Updated";
            $_SESSION['name'] = $name;
        }
        else
        {
            echo "Could Not Update the Name";
        }
    }
}


if(isset($_POST['password']))
{
    $pass = $_POST['password'];
    $email = $_SESSION['email'];
    if(empty($pass))
    {
        echo "Null Submission!!";
    }
    else{
        $result = UpdatePassword($pass,$email);
        if($result)
        {
            echo "Password Updated";
            $_SESSION["password"] = $pass;
        }
        else
        {
            echo "Could Not Update the Name";
        }
    }
    
}


if(isset($_POST['deleteAccount']))
{
    $username = $_SESSION['username'];
    $result = DeleteAccount($username);
    if($result)
    {
        ?>
<script>
    alert("Account Deleted")
    window.location.href = "../Views/MyProfile.php";

</script>
<?php
        session_unset();
    }
}

?>
