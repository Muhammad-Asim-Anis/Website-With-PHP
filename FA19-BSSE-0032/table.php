<?php
include 'connect.php';
$empty=false;
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

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'head.php'; ?>

</head>
<style>
.quentity-table {
    width: 30%;
}

.table .table-header th {
    border-top: 0;
    border-width: thick;
}

.table tbody tr td {
    vertical-align: middle;
}

.table-data .table-sec1,
.table-sec2,
.table-sec3,
.table-sec4 {
    display: flex;
    align-items: center;
}

.table-data .table-sec2,
.table-sec4 h4 {
    color: #b0a171;
}

.table-data .table-sec4 .cencel {
    color: #b0a171;
    border: none;
    background-color: white;
    margin-left: 5px;
}

.table-data .table-sec3 .minus {
    border: none;
    background-color: #8080803b;
    padding: 6px 8px;
    border-radius: 5px 0px 0px 5px;
}

.table-data .table-sec3 .plus {
    border: none;
    background-color: #8080803b;
    padding: 6px 8px;
    border-radius: 0px 5px 5px 0px;

}

.table-data .table-sec3 input {
    width: 20%;
    background-color: #8080803b;
    border: none;
    text-align: center;
    height: 32px;
}

.table-data .table-sec1 img {
    margin-right: 10px;
    width: 100px;
    height: 100px;
}

.cart-body-footer {
    display: flex;
    margin-top: 20px;
    justify-content: space-between;
    /* margin-left: 64px; */
}

@media only screen and (max-width: 557px) {
    .table-data .table-sec1 {
        flex-direction: column;
    }

    .table-data .table-sec3 input {
        width: 30%;
    }

    .table-data .table-sec1 img {
        margin-right: 10px;
        width: 100%;

    }
}
</style>

<body>

    <?php
    include 'header.php';
    ?>
    <div id="cover" class="container-fluid">
        <div id="divCover" class="container border">
            <h1 class="h1">Cart</h1>

        </div>
    </div>

    <div class="container table-responsive" style="border:none;">

        <table class="table  ">
            <tr class="table-header">
                <th class="heading">Products</th>
                <th class="heading">Price</th>
                <th class="heading">Quentity</th>
                <th class="heading">Total</th>
            </tr>
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
            <tr class="table-data">
                <td>
                    <div class="table-sec1">
                        <img src="images/<?php echo $image; ?>" alt="" srcset="">
                        <p> <?php echo $name; ?>.</p>
                    </div>
                </td>
                <td>
                    <div class="table-sec2">
                        <input type="hidden" id="id<?php echo $i; ?>" name="id" value="<?php echo $id; ?>">
                        <h4>$</h4>
                        <h4 id="price<?php echo $i;?>">
                            <?php echo $price; ?>
                        </h4>
                    </div>
                </td>
                <td class="quentity-table">
                    <div class="table-sec3">
                        <button type="button"
                            onclick="decreasenumber('value<?php echo $i ?>','price<?php echo $i ?>','total<?php echo $i ?>')"
                            class="minus"><i class="fa fa-minus" aria-hidden="true"></i></button>
                        <input id="value<?php echo $i; ?>" name="quentity" type="number"
                            value="<?php echo $quentity; ?>">
                        <button type="button"
                            onclick="increasenumber('value<?php echo $i ?>','price<?php echo $i ?>','total<?php echo $i ?>')"
                            class="plus"><i class="fa fa-plus" aria-hidden="true"></i></button>
                    </div>
                </td>
                <td>
                    <div class="table-sec4">

                        <h4>$</h4>
                        <h4 id="total<?php echo $i; ?>">
                            <?php echo $price * $quentity; ?>
                        </h4>
                        <button class="cencel" type="button"
                            onclick="window.location='cart.php?GetId=<?php echo $id; ?>'"><i class="fa fa-times"
                                aria-hidden="true"></i></button>
                    </div>
                </td>
            </tr>
            <?php
                         }
                        }
            ?>


        </table>

    </div>
    <div class="container">
        <div class="col-md-12  cart-body-footer">
            <button type="button" onclick="window.location='checkout.php'" class="cart-body-footer-shop">Continue
                Shopping</button>
                <form action="" method="post">
                    <input type="hidden" id="quentityarray" name="quentityarray" value="">
                    <input type="hidden" id="idarray" name="idarray" value="">
                <button type="sumbit" name="submit" onclick="update()" class="cart-body-footer-update"><i
                        class="fa fa-spinner"></i> update Cart</button>
                    </form>
        </div>
    </div>



    <?php
    include 'footer.php';
    ?>
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