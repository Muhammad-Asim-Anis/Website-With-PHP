<?php
session_start();
include 'connect.php';
if(isset($_SESSION['loggedinuser']))
{
    $recordsend = "SELECT `purchaseitems`.`ProductName`,`purchaseitems`.`ProductQuentity`,`paymentdeatils`.`Total`  FROM `paymentdeatils`
    INNER JOIN `purchaseitems`
    ON `paymentdeatils`.`orderId` = `purchaseitems`.`orderId`
    Where `paymentdeatils`.`OrderId` = '".$_SESSION['orderid']."' AND `paymentdeatils`.`Email` = '".$_SESSION['email']."'";
}
else
{

$recordsend = "SELECT `purchaseitems`.`ProductName`,`purchaseitems`.`ProductQuentity`,`paymentdeatils`.`Total`  FROM `paymentdeatils`
INNER JOIN `purchaseitems`
ON `paymentdeatils`.`orderId` = `purchaseitems`.`orderId`
Where `paymentdeatils`.`OrderId` = '".$_SESSION['orderid']."' AND `paymentdeatils`.`Email` = '".$_SESSION['guestemail']."'";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'head.php'; ?>

</head>

<body>
    <?php
    
   
     if(isset($_SESSION['loggedinuser']) == true)
     {

         include 'loginheader.php';
     }
     else
     {
         include 'header.php';
     }

    ?>
    <div class="container">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>

                        <th>Product Name</th>
                        <th>Product Quentity</th>
                    </tr>

                </thead>
                <tbody>

                    <?php 
       
        $result = mysqli_query($conn,$recordsend);
        foreach($result as $value)
        {
            $total = $value['Total'];
            echo "<tr>
            <td>".$value['ProductName']."</td>
            <td>".$value['ProductQuentity']."</td>
            </tr>"; 
        }
        ?>


                </tbody>
            </table>
        </div>
    </div>
    <div class="container">
        <span>
            The Total is <?php echo $total;?>
        </span>
    </div>
    <div class="container">
        <strong>Thanks for purchasing. Have a Nice Day</strong>
    </div>
    <?php
    include 'footer.php';
    ?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="index.js"></script>
</body>

</html>