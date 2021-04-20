<?php

    include 'connection.php';
    
    $query = $connection->prepare("SELECT * FROM recipe");
    $query -> execute();

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="Yong Fen Yu">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<title>Recipes</title>

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
include 'nav.php'
?>

  <div class="container-fluid">
      <div class="row bg-beige justify-content-center">
          <div class="row">
              <div class="col px-0">
                  <div class="col text-center px-0 my-0 py-4">
                      <heading1 class="py-0 my-0">All Recipes</heading1>
                      <div class="search-container">
                          <form action="/action_page.php">
                              <input type="text" placeholder="Search" style="padding: 10px">
                              <button class="btn button-color" type="submit">
                                  <img src="img/webimg/iconfinder_-_Magnifier-Search-Zoom-_3844467.png" height="30px">
                              </button>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
    

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
                                    <div class="card-body" style="padding-top: 2px">
                                        <h4 class="card-title heading3"><?php echo $result['recipe_name']?></h4>
                                        <p>By <?php echo $result['create_user']?></p>
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
    
    <div class="row bg-nav pt-2">
        <div class="col-lg-12 text-center" style="padding: 20px"><p>&copy;all right deserved to How Jue Min</p>
        </div>
    </div>

    </body>
</html>