<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
include 'connect.php';
header("Cache-Control: no cache");
session_cache_limiter("private_no_expire");
include 'connect.php';
session_start();
if(isset($_GET['GetId']))
{
    $sql = "DELETE FROM `cartdetail` where `Id`='".$_GET['GetId']."' ";
    $result = mysqli_query($conn, $sql);
}

if(isset($_POST['Submit']))
{
    $id = $_POST['idupdate'];
    $quentity = $_POST['updatequentity'];

    $sql = "UPDATE `cartdetail` SET `quentity`='".$quentity."'  where `Id`='".$id."' ";
    $result = mysqli_query($conn, $sql);
}

if(isset($_POST['pay']))
{
    if(isset($_SESSION['loggedinuser']))
    {
        $email = $_SESSION['email'];
        $username = $_SESSION['name'];
        $accountnum = $_POST['card_num'];
        $expirymonth = $_POST['card_exp_month'];
        $expiryYear = $_POST['card_exp_year'];
        $code = $_POST['CV_code']; 
        $productTotal = $_SESSION['total'];
        
    if(!empty($accountnum) && !empty($expirymonth) && !empty($expiryYear) && !empty($code))   
    {
        $ordersql = "INSERT INTO `orderdetails`(`OrderId`, `email`) VALUES ('','".$email."')";
        mysqli_query($conn,$ordersql);

       $orderselect = "SELECT Max(`OrderId`) AS `OrderId` FROM `orderdetails` Where `email`= '".$email."'";
       $result = mysqli_query($conn,$orderselect);

       foreach ($result as $value) {
           $orderid = $value['OrderId'];
       }
       $_SESSION['orderid'] = $orderid;
       
       $cartdetail = "SELECT * FROM `cartdetail` ";
       $cartresult = mysqli_query($conn,$cartdetail);
       
       foreach ($cartresult as $value) {
        $cartid = $value['Id'];
        $productname = $value['name'];
        $productquentity = $value['quentity'];

        $sqlpurcahse = "INSERT INTO `purchaseitems`(`Id`, `orderId`, `ProductId`, `ProductName`, `ProductQuentity`) VALUES ('','".$orderid."','".$cartid."','".$productname."','".$productquentity."')";
        mysqli_query($conn,$sqlpurcahse);
        }
        $sqlpayment = "INSERT INTO `paymentdeatils`(`Id`, `OrderId`, `Email`, `Name`, `Total`) VALUES ('','".$orderid."','".$email."','".$username."','".$productTotal."')"; 
        mysqli_query($conn,$sqlpayment);
        
        $cartempty = "DELETE FROM `cartdetail`";
        mysqli_query($conn,$cartempty);
        $loginpay = true; 

       

            $mail = new PHPMailer();
            $mail->IsSMTP();
            $mail->Mailer = "smtp";
            $mail->SMTPDebug  = 0;  
            $mail->SMTPAuth   = TRUE;
            $mail->SMTPSecure = "tls";
            $mail->Port       = 587;
            $mail->Host       = "smtp.gmail.com";
            $mail->Username   = "";
            $mail->Password   = "";
            $mail->IsHTML(true);
            $mail->AddAddress($email, $username);
            $mail->SetFrom("jewelerywebsite54@gmail.com", "Jewellery Website");
            $mail->Subject = "Payment Success";
            $content = 'Payment Success
            <b>Your Total is : '.$productTotal.'</b>
            '; 
            $mail->MsgHTML($content); 
            $mail->Send(); 

            header("location: record.php");
           
    }
    }
    else{
        $email = $_POST['email'];
        $_SESSION['guestemail'] = $email;
        $username = $_POST['name'];
        $accountnum = $_POST['card_num'];
        $expirymonth = $_POST['card_exp_month'];
        $expiryYear = $_POST['card_exp_year'];
        $code = $_POST['CV_code'];
        $productTotal = $_SESSION['total'];
        // $orderid = random_int(100000, 999999);
    if(!empty($accountnum) && !empty($expirymonth) && !empty($expiryYear) && !empty($code))
    {

        $ordersql = "INSERT INTO `orderdetails`(`OrderId`, `email`) VALUES ('','".$email."')";
        mysqli_query($conn,$ordersql);

       $orderselect = "SELECT Max(`OrderId`) AS `OrderId` FROM `orderdetails` Where `email`= '".$email."'";
       $result = mysqli_query($conn,$orderselect);

       foreach ($result as $value) {
           $orderid = $value['OrderId'];
       }
        
       $_SESSION['orderid'] = $orderid;
       $cartdetail = "SELECT * FROM `cartdetail` ";
       $cartresult = mysqli_query($conn,$cartdetail);
       
       foreach ($cartresult as $value) {
        $cartid = $value['Id'];
        $productname = $value['name'];
        $productquentity = $value['quentity'];

        $sqlpurcahse = "INSERT INTO `purchaseitems`(`Id`, `orderId`, `ProductId`, `ProductName`, `ProductQuentity`) VALUES ('','".$orderid."','".$cartid."','".$productname."','".$productquentity."')";
        mysqli_query($conn,$sqlpurcahse);
        }
         $sqlpayment = "INSERT INTO `paymentdeatils`(`Id`, `OrderId`, `Email`, `Name`, `Total`) VALUES ('','".$orderid."','".$email."','".$username."','".$productTotal."')"; 
        mysqli_query($conn,$sqlpayment);
    
        $cartempty = "DELETE FROM `cartdetail`";
        mysqli_query($conn,$cartempty);
        $guestpay = true; 

        $mail = new PHPMailer();
            $mail->IsSMTP();
            $mail->Mailer = "smtp";
            $mail->SMTPDebug  = 0;  
            $mail->SMTPAuth   = TRUE;
            $mail->SMTPSecure = "tls";
            $mail->Port       = 587;
            $mail->Host       = "smtp.gmail.com";
            $mail->Username   = "";
            $mail->Password   = "";
            $mail->IsHTML(true);
            $mail->AddAddress($email, $username);
            $mail->SetFrom("jewelerywebsite54@gmail.com", "Jewellery Website");
            $mail->Subject = "Payment Success";
            $content = 'Payment Success
            <b>Your Total is : '.$productTotal.'</b>
            '; 
            $mail->MsgHTML($content); 
            $mail->Send(); 

            header("location: record.php");
    }
    }
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

<?php
if(isset($loginpay))
{
    echo "<div class='alert alert-success'>
    <strong>Success</strong> Payment Successfull.!
</div>";
}
else if(isset($guestpay))
{
    echo "
    <div class='alert alert-success'>
        <strong>Success</strong> Payment Successfull.!
    </div>";
}
?>

    <div id="cover" class="container-fluid">
        <div id="divCover" class="container border">
            <h1 class="h1">Check Out</h1>

        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-md-12 cart-body-header check-out-header">
                <h4 class="heading cart-body-header-h4">Products</h4>
                <h4 class="heading heading-checkout">Quentity</h4>
                <h4 class="heading ">Price</h4>
                <h4 class="heading">Total</h4>
            </div>
            <?php
                       $sql = "SELECT * FROM cartdetail";
                       $result = mysqli_query($conn, $sql);
                       $i=0;
                       if (mysqli_num_rows($result) > 0) {
                         // output data of each row
                         while($row = mysqli_fetch_assoc($result)) {
                             $i++;
                             $id = $row['Id'];
                             $name = $row['name'];
                             $image = $row['image'];
                             $price = $row['price'];
                            $quentity = $row['quentity'];
                            $total = $price * $quentity;
                           ?>
                <div class="col-md-12 cart-body-1 check-out-body-1">
                    <div class="col-md-3  cart-body-sec1">
                        <img src="<?php echo $image; ?>" alt="" srcset="">
                        <div>
                            <h5>
                                <?php echo $name; ?>
                                </h4>
                                <p>
                                    <?php echo $name; ?>
                                </p>
                                <h5 class="heading-body">
                                    <?php echo $name; ?>
                                    </h4>
                        </div>
                    </div>
                    <div class="col-md-3 cart-body-sec3">
                        <div>
                            <button type="button" class="minus"
                                onclick="decreasenumber('value<?php echo $i ?>','price<?php echo $i ?>','total<?php echo $i ?>')"><i
                                    class="fa fa-minus" aria-hidden="true"></i></button>
                            <input id="value<?php echo $i; ?>" name="quentity" type="number"
                                value="<?php echo $quentity; ?>">
                            <button type="button" class="plus"
                                onclick="increasenumber('value<?php echo $i ?>','price<?php echo $i ?>','total<?php echo $i ?>')"><i
                                    class="fa fa-plus" aria-hidden="true"></i></button>
                        </div>
                    </div>
                    <div class="col-md-3 cart-body-sec2">
                        <h4>$</h4>
                        <h4 id="price<?php echo $i;?>">
                            <?php echo $price; ?>
                        </h4>
                    </div>
                    <div class="col-md-2 cart-body-sec4">
                        <h4>$</h4>
                        <h4 id="total<?php echo $i; ?>">
                            <?php echo $price * $quentity; ?>
                        </h4>
                        <button type="button" onclick="window.location='checkout.php?GetId=<?php echo $id; ?>'"><i
                        class="fa fa-trash" aria-hidden="true"></i></button>
                        <form action="" method="post">
                        <input type="hidden" id="id<?php echo $i; ?>" name="idupdate" value="">
                        <input id="quentity<?php echo $i; ?>" type="hidden" name="updatequentity" value="">
                            <button type="submit" name="Submit"
                                onclick="update('<?php echo $i; ?>','<?php echo $id; ?>','id<?php echo $i; ?>','quentity<?php echo $i; ?>')"><i
                                    class="fa fa-edit" aria-hidden="true"></i></button>
                        </form>
                    </div>
                </div>
                <?php
                         }
                        }
                ?>

            
            

        </div>
    </div>
    <div id="myModal" class="modal fade" role="dialog">
   <div  class="modal-dialog ">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Payment Form</h4>
      </div>
      <div class="modal-body login">
      <form action="" method="post">
      <label  for="" id="info"> Payment Info</label>
      <input id="email" type="text" name="email" placeholder="Please enter Email">
      <input id="name" type="text" name="name" placeholder="Please enter Name">
      <label for="">Card Number</label> 
      <input type="text" name="card_num" placeholder="Please enter Email">
      <label for="">Expiry Month</label>
      <input type="text" name="card_exp_month" placeholder="please enter Card Expiry Month">
      <label for="">Expiry Year</label>
      <input type="text" name="card_exp_year" placeholder="please enter Card Expiry Month">
      <label for="">CV Code</label>
      <input type="text" name="CV_code" placeholder="please enter CV Code" autocomplete="off">
      </div>
      
      <div class="modal-footer">

        <button type="submit" class="btn-payment-1" name="pay">Payment</button>
        </form>
        <button type="button" class="btn-payment" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

    <div class="container">
        <div class="row check-out-footer">
            <div class="col-md-6 check-out-footer-body">
                
                <h4>Shopping Summary</h4>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Est, corporis! Consectetur exercitationem,
                    ipsam dolores praesentium provident placeat quidem. Velit, veniam.</p>
                <h5>Have a Coupon Code?</h5>
                <div>
                    <form action="" method="post">
                    <input type="text" name="promocode" placeholder="Enter Promo Code Here" autocomplete="off">
                    <button type="submit" name="promo"><i class="fa fa-arrow-right"></i></button>
                    <button type="button" name="credit" data-toggle="modal" data-target="#myModal" ><i class="fa fa-credit-card"></i></button>
                    </form>
                </div>
               
            </div>

            <div class="col-md-6 check-out-footer-body-1">
                <?php
               
                  
                    if(isset($_POST['promo'])) {
                        if($_POST['promocode'] == "hello69")
                        {     
                         $coupon = 0.30;
                         $_SESSION['coupon'] = true;
                        }
                        else
                        {
                            echo "promo didn't Exist";
                        }
                    }
                    
                    
                     
                       $sql = "SELECT SUM(`price` * `quentity`)  AS `Total` FROM cartdetail";
                       $result = mysqli_query($conn, $sql);
                       $total = 0;
                       if (mysqli_num_rows($result) > 0) {
                         // output data of each row
                         while($row = mysqli_fetch_assoc($result)) {
                            if(isset($coupon))
                            {
                                $total = $row['Total'] * $coupon;    $_SESSION['total'] = $total;
                            }
                            else
                            {
                                $total = $row['Total'];
                                $_SESSION['total'] = $total;
                            }
                           
                           ?>
                <div>
                    <h4>Subtotal</h4>
                    <p>
                        <?php 
                        if($total > 0)
                        { 

                            echo "$".$total; 
                            
                        }
                        else
                        {

                            echo "$0";
                        }
                        ?>
                    </p>
                </div>
                <div>
                    <h4>Tax</h4>
                    <p>$2.52</p>
                </div>
                <div class="checkout-footer-body-line">
                    <div class="line">
                    </div>
                </div>
                <div>
                    <h4>Total</h4>
                    <p>
                        <?php
                        if($total > 0)
                        {
                                echo "$".$total + 2.52; 
                        }
                        else
                        {

                            echo "$0";
                        } 
                        ?>
                    </p>
                </div>
                <?php
                         }
                        } 
                ?>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="index.js"></script>
    <script>
     <?php 
     if(isset($_SESSION['loggedinuser']))
     {
        ?>
         document.getElementById("email").setAttribute("type","hidden");
         document.getElementById("name").setAttribute("type","hidden");
         document.getElementById("info").style.display = "none";         

        <?php
     }
     ?>
        function update(count, id, updateid, updatequentity) {
            let Value = document.getElementById(updatequentity);
            
            Value.value = document.getElementById(`value${count}`).value;
            //  Value.value = document.getElementById(updatequentity).value;
            let Getid = document.getElementById(updateid);

            Getid.value = id;
            //  console.log(Getid.value);
            //  console.log(Value.value);
        }

        const increasenumber = (value, price, total) => {

            var value = document.getElementById(value);
            var price = document.getElementById(price);
            var total = document.getElementById(total);

            let quentity = value.value;
            if (quentity >= 0 && quentity <= 20) {
                quentity++;
                value.value = quentity;
                //   console.log(price.innerHTML);
                total.innerHTML = parseFloat(price.innerHTML) * quentity;

            }
            else if (quentity > 20) {
                alert("Quentity is above 20");
                console.log("hello");
            }

        }
        const decreasenumber = (value, price, total) => {
            var value = document.getElementById(value);
            var price = document.getElementById(price);
            var total = document.getElementById(total);

            let quentity = value.value;
            if (quentity > 0) {
                quentity--;
                value.value = quentity;
                total.innerHTML = parseFloat(price.innerHTML) * quentity;
            }
            else if (quentity < 0) {
                quentity = 0;
            }

        }
    </script>
</body>

</html>
