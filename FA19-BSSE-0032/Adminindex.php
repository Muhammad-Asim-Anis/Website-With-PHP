<?php
include 'connect.php';
session_start();
if(!isset($_SESSION['loggedinadmin']))
{
	header("location: signup.php");
}
        $array = array();
        $arrayquentity = array();
        
         $sql = "SELECT `name`  FROM `cartdetail` ORDER BY `quentity` DESC";
          $result = mysqli_query($conn,$sql);
          
          foreach($result as $value)
          {
            $array[] = $value['name'];
          }
         $sqlquery ="SELECT `quentity` FROM `cartdetail` ORDER BY `quentity` desc";  
         $result2 = mysqli_query($conn,$sqlquery);
          
         foreach($result2 as $value)
         {
           $array2[] = $value['quentity'];
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
            <h1 class="h1">Admin Deshboard</p>
        </div>
    </div>
    <div class="container">
    <div class="row">
     <div class="dashboard_boxes">

         <div class="col-lg-2 col-sm-8 col-xs-12 col-md-4">
             <?php 
             $sql = "SELECT count(*) as `Total Products` FROM `productdetail` ";
             $result = mysqli_query($conn,$sql);
             foreach($result as $value)
             {
              echo "<div class='circle-tile'>


             <a href='#'><div class='circle-tile-heading dark-blue'><i class='fa fa-star fa-fw fa-3x' style='margin-top: 15px;' aria-hidden='true'></i></div></a>
             
             
             <div class='circle-tile-content dark-blue'>
             <div class='circle-tile-description text-faded'> Total Products</div>
             <div class='circle-tile-number text-faded '>".$value['Total Products']."</div>
             <div class='circle-tile-footer' ></div>
             
             </div>
             </div>";
            }
               ?>
         </div>
         <div class="col-lg-2 col-sm-8 col-xs-12 col-md-4">
         <?php 
             $sql = "SELECT SUM(`price` * `quentity`) as `Total` FROM `cartdetail` ";
             $result = mysqli_query($conn,$sql);
             foreach($result as $value)
             {
              echo "<div class='circle-tile'>


             <a href='#'><div class='circle-tile-heading dark-blue'><i class='fa fa-star fa-fw fa-3x' style='margin-top: 15px;' aria-hidden='true'></i></div></a>
             
             
             <div class='circle-tile-content dark-blue'>
             <div class='circle-tile-description text-faded'> Total SELL</div>
             <div class='circle-tile-number text-faded '>$".$value['Total']."</div>
             <div class='circle-tile-footer' ></div>
             
             </div>
             </div>";
            }
               ?>
         </div>
         <div class="col-lg-2 col-sm-8 col-xs-12 col-md-4">
         <?php 
             $sql = "SELECT count(*) as `Total user` FROM `userinfo` ";
             $result = mysqli_query($conn,$sql);
             foreach($result as $value)
             {
              echo "<div class='circle-tile'>


             <a href='#'><div class='circle-tile-heading dark-blue'><i class='fa fa-star fa-fw fa-3x' style='margin-top: 15px;' aria-hidden='true'></i></div></a>
             
             
             <div class='circle-tile-content dark-blue'>
             <div class='circle-tile-description text-faded'> Total User</div>
             <div class='circle-tile-number text-faded '>".$value['Total user']."</div>
             <div class='circle-tile-footer' ></div>
             
             </div>
             </div>";
            }
               ?>
         </div>
         <div class="col-lg-2 col-sm-8 col-xs-12 col-md-4">
         <?php 
             $sql = "SELECT count(*) as `Total Order` FROM `cartdetail` ";
             $result = mysqli_query($conn,$sql);
             foreach($result as $value)
             {
              echo "<div class='circle-tile'>


             <a href='#'><div class='circle-tile-heading dark-blue'><i class='fa fa-star fa-fw fa-3x' style='margin-top: 15px;' aria-hidden='true'></i></div></a>
             
             
             <div class='circle-tile-content dark-blue'>
             <div class='circle-tile-description text-faded'> Total SELL</div>
             <div class='circle-tile-number text-faded '>".$value['Total Order']."</div>
             <div class='circle-tile-footer' ></div>
             
             </div>
             </div>";
            }
               ?>
         </div>
         <div class="col-md-6">
    
             <canvas id="myChart" ></canvas>
         </div>
         <div class="col-md-6">
         <canvas id="myChart2" ></canvas>
         </div>
         
     </div>

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
    <script>
      
var xValues = <?php echo json_encode($array);  ?>;
console.log(<?php echo json_encode($array2);  ?> );
var yValues = <?php echo json_encode($array2 );  ?> ;
<?php
$arraycolor  = array();
function random_color_part() {
  return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
}
foreach ($array as $value ) {
  $arraycolor[] = "#".random_color_part() . random_color_part() . random_color_part();
}
?>
var barColors = <?php echo json_encode($arraycolor); ?>;
console.log(barColors);


new Chart("myChart", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues 
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Products Graph"
    }
  }
});

new Chart("myChart2", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false}
  }
});

</script>

</body>

</html>