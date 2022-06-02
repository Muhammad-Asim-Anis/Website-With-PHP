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
    <div id="aboutus_Cover" class="container-fluid">
        <div id="divCover" class="container border">
            <h1 class="h1">About US</h1>
            
        </div>
    </div>
    <section id="Aboutus">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h6 class="heading">About US</h6>
                    <h1 class="h1body">Where Class Meets Glamour</h1>
                    <div>
                        <p class="text-justify">

                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Illo iusto ipsa suscipit ducimus
                            officia fugiat quis dolore doloribus at exercitationem. Lorem ipsum dolor sit amet
                            consectetur
                            adipisicing elit. Architecto eligendi debitis illum distinctio odit quia quos eveniet
                            dignissimos, quasi voluptate ad! Esse libero beatae est in itaque neque inventore unde.

                        </p>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita id impedit labore ullam?
                            Fuga neque at minus eum tenetur omnis cum! Dolore nemo, aut minus commodi voluptas doloribus
                            architecto iste obcaecati non ipsam et laudantium iusto voluptatum, provident ratione porro!
                            Facilis accusantium quae, quisquam labore laboriosam earum dolore. Deserunt autem aliquam
                            accusantium harum, esse alias obcaecati aliquid veniam soluta ab consequuntur itaque amet
                            labore? Libero tenetur sunt eius explicabo, ad dolorum deleniti et illo assumenda a
                            cupiditate amet, sint modi alias sit odio, repudiandae vel consequuntur nostrum ratione
                            laborum autem maiores quod veritatis. Sequi voluptatum non earum id iure rerum.
                        </p>
                        <button class="btnbody">Learn More</button>

                    </div>
                </div>
                <div id="divimg" class=" col-md-6 col-xs-12">

                    <img src="images/jewelleryabout.png" alt="">
                    <img id="img_div" src="images/jewelleryabout2.png" alt="">
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

</html>`