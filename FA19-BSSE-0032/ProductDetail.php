<?php
include 'connect.php';
session_start();
if(!isset($_SESSION['loggedinadmin']))
{
	header("location: signup.php");
}
if(isset($_GET['GetId']))   
{
    $sql = "DELETE FROM `productdetail` WHERE `Id`='".$_GET['GetId']."'";
    mysqli_query($conn,$sql);
    $cart_delete = "DELETE FROM `cartdetail` WHERE `Id`='".$_GET['GetId']."'";
    mysqli_query($conn,$cart_delete);
}    

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'head.php'; ?>

</head>

<body>

    <?php
    include 'Adminnavbar.php';
?>


    <div id="cover" class="container-fluid">
        <div id="divCover" class="container border">
            <h1 class="h1">Product Detail</p>
        </div>
    </div>
    <div class="container">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>

                </thead>
                <tbody>

                    <?php 
        $sql = "SELECT * FROM `productdetail`";
        $result = mysqli_query($conn,$sql);
        $i = 0;
        foreach($result as $value)
        {
            $i++;
            ?>
            <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $value['name'];?></td>
            <td><?php echo $value['price']; ?></td>   
            <td><button onclick="window.location='productUpdate.php?GetId=<?php echo $value['Id'];?>'" class='btn-edit'>Edit</button></td>
            <td><button onclick="window.location='productDetail.php?GetId=<?php echo $value['Id'];?>'" class='btn-edit '>Delete</button></td>
            </tr>
            <?php 
        }
        ?>


                </tbody>
            </table>
        </div>
    </div>


    <?php
    include 'footer.php';
    ?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.plot.ly/plotly-2.12.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="index.js"></script>

</body>

</html>