<?php
include 'connect.php';
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

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'head.php'; ?>

</head>

<body>

<?php
    session_start();
     if(isset($_SESSION['loggedinuser']) == true)
     {

         include 'loginheader.php';
     }
     else
     {
         include 'header.php';
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

            
            <!-- <div class="col-md-12 cart-body-1">
                <div class="col-md-3 cart-body-sec1">
                    <img src="images/jewellerychain4.png" alt="" srcset="">
                    <p>Lorem ipsum dolor sit amet.</p>
                </div>
                <div class="col-md-3 cart-body-sec2">
                    <h4>$136.0</h4>
                </div>
                <div class="col-md-3 cart-body-sec3">
                    <div>
                        <button class="minus"><i class="fa fa-minus" aria-hidden="true"></i></button>
                        <input type="text" value="1">
                        <button class="plus"><i class="fa fa-plus" aria-hidden="true"></i></button>
                    </div>
                </div>
                <div class="col-md-2 cart-body-sec4">
                    <h4>$136.0</h4>
                    <button><i class="fa fa-times" aria-hidden="true"></i></button>
                </div>
            </div> -->

            <!-- <div class="col-md-12 cart-body-1">
                <div class="col-md-3 cart-body-sec1">
                    <img src="images/jewellerychain4.png" alt="" srcset="">
                    <p>Lorem ipsum dolor sit amet.</p>
                </div>
                <div class="col-md-3 cart-body-sec2">
                    <h4>$136.0</h4>
                </div>
                <div class="col-md-3 cart-body-sec3">
                    <div>
                        <button class="minus"><i class="fa fa-minus" aria-hidden="true"></i></button>
                        <input type="text" value="1">
                        <button class="plus"><i class="fa fa-plus" aria-hidden="true"></i></button>
                    </div>
                </div>
                <div class="col-md-2 cart-body-sec4">
                    <h4>$136.0</h4>
                    <button><i class="fa fa-times" aria-hidden="true"></i></button>
                </div>
            </div> -->
            <!-- <div class="col-md-12  cart-body-footer">
                <button class="cart-body-footer-shop">Continue Shopping</button>
                <button class="cart-body-footer-update"><i class="fa fa-spinner"></i> update Cart</button>
            </div> -->


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
                    <input type="text" name="promocode" placeholder="Enter Promo Code Here">
                    <button type="submit" name="promo"><i class="fa fa-arrow-right"></i></button>
                </div>
               
            </div>

            <div class="col-md-6 check-out-footer-body-1">
                <?php
                     
                     
                       $sql = "SELECT SUM(`price` * `quentity`)  AS `Total` FROM cartdetail";
                       $result = mysqli_query($conn, $sql);
                       
                       if (mysqli_num_rows($result) > 0) {
                         // output data of each row
                         while($row = mysqli_fetch_assoc($result)) {
                            $total = $row['Total'];
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

        function update(count, id, updateid, updatequentity) {
            let Value = document.getElementById(updatequentity);
            console.log(Value);
            console.log(document.getElementById(`value${count}`).value);
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