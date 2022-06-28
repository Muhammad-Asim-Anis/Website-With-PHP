<?php
include 'connect.php';
if(isset($_GET['name']))
{
    $category = $_GET['name'];
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
    <div id="contactus_Cover" class="container-fluid">
        <div id="divCover" class="container border">
            <h1 class="h1">Products</h1>

        </div>
    </div>
    <section class="ShopCategory">
        <div class="container">
            <div class="row">
               <div class="col-md-12">
                     <div class="productCategory">
                           <a href="shopMenu.php?name=Rings">Rings</a>
                           <a href="shopMenu.php?name=Chains">Chains</a>
                           <a id="cat3" href="shopMenu.php">Others</a>
                     </div>
               </div>
                <div id="productBody" class="shopbody">
                    <?php
                        if(isset($_GET['GetPage']))
                        {
                            $limit = 4;
                            $page = $_GET['GetPage'];
                            $offset = ($page - 1) * $limit;
                        
                        
                            $sql = "SELECT * FROM `productdetail` LIMIT ".$offset.",".$limit."";
                            
                            //    $sql = "SELECT * FROM productdetail";
                            $result = mysqli_query($conn, $sql);
                            
                       
                       if (mysqli_num_rows($result) > 0) {
                         // output data of each row
                         while($row = mysqli_fetch_assoc($result)) {
                             $id = $row['Id'];
                             $name = $row['name'];
                             $image = $row['image'];
                             $category = $row['Category'];
                           ?>

                    <div class="col-lg-3 col-md-6">
                        <img src="<?php echo $image; ?>" height="365" alt="" srcset="">
                        <h4 onclick="window.location='menuDetail.php?GetId=<?php echo $id; ?>'"><?php echo $name; ?></h4>
                    </div>


                    <?php
                         }
                        }
                    }
                    else if(isset($category) == "Rings" || isset($category) == "Chains")
                    {
                        $sql = "SELECT * FROM productdetail WHERE `Category`='".$category."'  ORDER BY `name`  ASC";
                      $result = mysqli_query($conn, $sql);
                            
                       
                         if (mysqli_num_rows($result) > 0) {
                           // output data of each row
                           while($row = mysqli_fetch_assoc($result)) {
                               $id = $row['Id'];
                               $name = $row['name'];
                               $image = $row['image'];
                          
                        ?>
                         <div class="col-lg-3 col-md-6">
                        <img src="<?php echo $image; ?>" height="365" alt="" srcset="">
                        <h4 onclick="window.location='menuDetail.php?GetId=<?php echo $id; ?>'"><?php echo $name; ?></h4>
                        </div>
                        <?php
                         }
                        }
                    }
                    else 
                    {
                            $sql = "SELECT * FROM productdetail LIMIT 0,4";
                            $result = mysqli_query($conn, $sql);
                            
                       
                         if (mysqli_num_rows($result) > 0) {
                           // output data of each row
                           while($row = mysqli_fetch_assoc($result)) {
                               $id = $row['Id'];
                               $name = $row['name'];
                               $image = $row['image'];
                               $category = $row['Category'];
                    ?>
                    <div class="col-lg-3 col-md-6">
                        <img src="<?php echo $image; ?>" height="365" alt="" srcset="">
                        <h4 onclick="window.location='menuDetail.php?GetId=<?php echo $id; ?>'"><?php echo $name; ?></h4>
                    </div>
                    <?php
                    
                           }
                        }
                    }
                    ?>
                    
                    
                </div>
                <div class="pagination col-md-12">
                <a href="#">&laquo;</a>
                <?php 
                  
                  if(isset($_GET['name']))
                  {
                      $sql = "SELECT * FROM `productdetail` where `Category`='".$category."'";
                      $result = mysqli_query($conn, $sql);
                  }
                  else
                  {
                    $sql = "SELECT * FROM `productdetail`";
                    $result = mysqli_query($conn, $sql);
                  }

                 if(mysqli_num_rows($result) > 0)
                 {
                     $totalrecord = mysqli_num_rows($result);
                     $limit = 4;
                     $totalpage = ceil($totalrecord/$limit);
                     
                     for ($i=1; $i <= $totalpage ; $i++) { 
                        
                     
                ?>   
                    <a href="shopMenu.php?GetPage=<?php echo $i; ?>"><?php echo $i; ?></a>
                    
                <?php
                     }
                    }
                
                ?>
                    <a href="#">&raquo;</a>
                  </div>
                  
            </div>
        </div>
    </section>
    
    
        <?php include 'footer.php'; ?> 
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="index.js"></script>
</body>

</html>