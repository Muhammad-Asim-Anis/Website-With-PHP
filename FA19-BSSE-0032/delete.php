<?php
if(isset($_GET['GetID']))
{
    $sql = "DELETE FROM `cartdetail` where `Id`='".$_GET['GetID']."' ";
    $result = mysqli_query($conn, $sql);
}
header("cart.php");
?>