<?php

    include 'connection.php';
    if(isset($_GET['recipe_id'])){

        $recipeid = $_GET['recipe_id'];
        $query = $connection->prepare("SELECT * FROM recipe WHERE recipe_id = ?");
        $query -> execute([$recipeid]);
        $result = $query->fetch();

    } else {
        header("Location: potalatoweb.php");
    }
    

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="Yong Fen Yu">
<link rel="icon" href="favicon.ico" type="image/x-icon">

<title><?php echo $result['recipe_name']?></title>

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/fontawesome-all.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</head>
<body>
<?php
include 'nav.php';

?>
    <!--content-->
    <div class="container-fluid">
        <div class="row bg-beige justify-content-center">
            <div class="col-10">
                <heading1 class="py-0 my-0"><?php echo $result['recipe_name']?></heading1>
                <p>By <?php echo $result['create_user']?></p>
                <div class="row">
                    <div class="col-8">
                    <img src="<?php echo ($result['recipe_img'])?>" width="700px">
                    <p><?php echo ($result['recipe_description'])?></p>
                        <h2 class="heading2">Directions</h2>
                        <h3 class="heading3"><p><?php 
                        $directions = preg_replace("/\r\n|\r/", "<br />", $result['recipe_directions']);
                        $directions = trim($directions);
                        echo $directions;
                        ?></p></h3>
                </div>
                    <div class="col-4 text-center">
                        <h4 class="heading3">Ingredients</h4><p>
                        <?php 
                        $ingredients = preg_replace("/\r\n|\r/", "<br />", $result['recipe_ingredients']);
                        $ingredients = trim($ingredients);
                        echo $ingredients;
                        ?></p>
                        <button type="submit" class="btn button-color mt-3">Add to My Favourite</button>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    

    
    <div class="row bg-nav pt-2">
        <div class="col-lg-12 text-center" style="padding: 20px"><p>&copy;all right deserved to How Jue Min</p>
        </div>
        </div>

    </body>
</html>