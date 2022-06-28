<?php 
session_start();
include 'connect.php';
$empty=false;
$login=false;
if(isset($_GET['GetId']))
{
    $sql = "DELETE FROM `cartdetail` where `Id`='".$_GET['GetId']."' ";
    $result = mysqli_query($conn, $sql);
}
if(isset($_POST['submit']))
{
    
    $arrayquentity = explode(",",$_POST['quentityarray']);
    $arrayid = explode(",",$_POST['idarray']); 
    
    for ($i=0; $i < count($arrayquentity) ; $i++) { 
        
        $sql = "UPDATE `cartdetail` SET `quentity`='".$arrayquentity[$i]."'  where `Id`='".$arrayid[$i]."' ";
        $result = mysqli_query($conn, $sql); 
    }
    
}
$sql = "SELECT * FROM cartdetail";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) == 0)
{
   $empty = true;
}
if(isset($_POST['shop']))
{
    $sql = "SELECT * FROM cartdetail";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) == 0) 
    {
        $emptycart = true;
    }
    else
    {

        header("location: checkout.php");
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
    if(isset($emptycart))
    {
        echo " <div class='alert alert-danger'>
        <strong>Unsuccessfull</strong> Please Fill The Cart First .
   </div>";
    }
    ?>
        
    <div id="cover" class="container-fluid">
        <div id="divCover" class="container border">
            <h1 class="h1">Cart</h1>

        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-md-12 cart-body-header">
                <h4 class="heading cart-body-header-h4">Products</h4>
                <h4 class="heading">Price</h4>
                <h4 class="heading">Quentity</h4>
                <h4 class=" heading">Total</h4>
            </div>
            <?php 
         if($empty)
         {
          ?>
            <div class="col-md-12 cart-body-line">
                <div class="line">
                </div>
            </div>

            <?php
         }
         ?>
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
                           ?>
            <div class="col-md-12 cart-body-line">
                <div class="line">
                </div>
            </div>
            <form action="" method="post">
                <div class="col-md-12 cart-body-1">
                    <div class="col-md-3 cart-body-sec1">
                        <img src="<?php echo $image; ?>" alt="" srcset="">
                        <p>
                            <?php echo $name; ?>.
                        </p>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-4 col-lg-3 cart-body-sec2">
                        <input type="hidden" id="id<?php echo $i; ?>" name="id" value="<?php echo $id; ?>">
                        <h4>$</h4>
                        <h4 id="price<?php echo $i;?>">
                            <?php echo $price; ?>
                        </h4>
                    </div>
                    <div class="col-md-3 col-xs-6 col-lg-3 cart-body-sec3">
                        <div>
                            <button type="button"
                                onclick="decreasenumber('value<?php echo $i ?>','price<?php echo $i ?>','total<?php echo $i ?>')"
                                class="minus"><i class="fa fa-minus" aria-hidden="true"></i></button>
                            <input id="value<?php echo $i; ?>" name="quentity" type="number"
                                value="<?php echo $quentity; ?>">
                            <button type="button"
                                onclick="increasenumber('value<?php echo $i ?>','price<?php echo $i ?>','total<?php echo $i ?>')"
                                class="plus"><i class="fa fa-plus" aria-hidden="true"></i></button>
                        </div>
                    </div>
                    <div class="col-md-2 cart-body-sec4">
                        <h4>$</h4>
                        <h4 id="total<?php echo $i; ?>">
                            <?php echo $price * $quentity; ?>
                        </h4>

                        <button type="button" onclick="window.location='cart.php?GetId=<?php echo $id; ?>'"><i
                                class="fa fa-times" aria-hidden="true"></i></button>
                    </div>
                </div>
                <?php
                         }
                        }
            ?>
                <div class="col-md-12  cart-body-footer">
                    <input type="hidden" id="quentityarray" name="quentityarray" value="">
                    <input type="hidden" id="idarray" name="idarray" value="">
                    <form action="" method="post">
                    <button type="submit" name="shop"
                        class="cart-body-footer-shop">Continue Shopping</button>
                        </form>
                    <button type="sumbit" name="submit" onclick="update()" class="cart-body-footer-update"><i
                            class="fa fa-spinner"></i> update Cart</button>
                </div>
            </form>
        </div>
    </div>



    <?php include 'footer.php'; ?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="index.js"></script>
    <script>
        function update() {

            var i = <?php echo $i; ?>;
            let quentityarray = [],
                idarray = [];
            for (let index = 1; index <= i; index++) {

                var quentity = document.getElementById(`value${index}`).value;
                var id = document.getElementById(`id${index}`).value;
                quentityarray.push(quentity);
                idarray.push(id);
            }
            document.getElementById('quentityarray').value = quentityarray;
            document.getElementById('idarray').value = idarray;

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

            } else if (quentity > 20) {
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
            } else if (quentity < 0) {
                quentity = 0;
            }

        }
    </script>
</body>

</html>