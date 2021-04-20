<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<title>Potalato</title>

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/fontawesome-all.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</head>

<?php
include 'nav.php'
?>
<?php

include 'connection.php';

$query = $connection->prepare("SELECT * FROM recipe ORDER BY recipe_id DESC LIMIT 4");
$query -> execute();

?>

<body>
    
    <!somethinglikeslideshow>
  <div class="container-fluid">
        <div class="row bg-beige">
            <div class="row">
                <div class="col px-0">
                    <div class="card">
                        <img class="card-img banner-height" src="img/webimg/leftover-mashed-potato-recipe-2000.jpg" title="this is my banner">
                        <div class="card-img-overlay d-flex align-items-center px-0">
                            <div class="col text-center px-0 my-0 py-4">
                                <heading1 class="py-0 my-0">Find A Recipe</heading1>
                                <div class="search-container">
                                    <form action="search.php" method="get">
                                        <input type="text" placeholder="Search" name="search">
                                        <button class="btn button-color" type="submit" value="search">
                                            <img src="img/webimg/iconfinder_-_Magnifier-Search-Zoom-_3844467.png" height="30px">
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!content>
    <div class="container-fluid">
        <div class="text-center">
            <div class="row">
                <div class="col">
                    <br><h2 class="heading2">Newest</h2><br>
                    <div class="container-fluid">
                        <div class="row  justify-content-center">
                            <div class="col-10">
                                <div class="container">
                                    <div class="row">
                                        <?php
                                            while ($result = $query->fetch()){
                                        ?>
                                        <div class="col-3">
                                            <div class="card">
                                                <img class="card-img-top" src="<?php echo ($result['recipe_img'])?>" alt="Card image" height="200px">
                                                <div class="card-body">
                                                    <h4 class="card-title"><?php echo $result['recipe_name']?></h4>
                                                    <a href="recipedetail.php?recipe_id=<?php echo ($result['recipe_id'])?>" class="stretched-link"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <?php 
                                            }
                                        ?> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br><br><br>
                    <h2 class="heading2">Most Popular</h2><br>
                    <div class="container-fluid">
                        <div class="row  justify-content-center">
                            <div class="col-10">
                                <div class="container">
                                    <div class="row">
                                    <div class="col-3">
                                        <div class="card">
                                            <img class="card-img-top" src="img/webimg/rosemary-roasted-potatoes-recipe-768x1152.jpg" alt="Card image" height="300px">
                                            <div class="card-body">
                                                <h4 class="card-title">Best Potato Wedges</h4>
                                                <a href="#" class="stretched-link"></a>
                                            </div>
                                        </div>
                                    </div>  
                                        <div class="col-3">
                                            <div class="card">
                                                <img class="card-img-top" src="img/webimg/rosemary-roasted-potatoes-recipe-768x1152.jpg" alt="Card image" height="300px">
                                                <div class="card-body">
                                                    <h4 class="card-title">Best Potato Wedges</h4>
                                                    <a href="#" class="stretched-link"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="card">
                                                <img class="card-img-top" src="img/webimg/rosemary-roasted-potatoes-recipe-768x1152.jpg" alt="Card image" height="300px">
                                                <div class="card-body">
                                                    <h4 class="card-title">Best Potato Wedges</h4>
                                                    <a href="#" class="stretched-link"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="card">
                                                <img class="card-img-top" src="img/webimg/rosemary-roasted-potatoes-recipe-768x1152.jpg" alt="Card image" height="300px">
                                                <div class="card-body">
                                                    <h4 class="card-title">Best Potato Wedges</h4>
                                                    <a href="#" class="stretched-link"></a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                                            
                </div>   
            </div>
        </div>
    </div>
     <br><br>
    
    <div class="row bg-nav pt-2">
        <div class="col-lg-12 text-center" style="padding: 20px"><p>&copy;all right deserved to How Jue Min</p></div>    
    </div>

    </body>
</html>