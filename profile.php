<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="Yong Fen Yu">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<title>Profile</title>

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/fontawesome-all.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</head>
<body>


<!-- Extra Style -->
<style>
    .hidden {
        display: none;
    }
</style>

<?php
    include 'nav.php';
    include_once('connection.php');
    if(isset($_GET['user_id'])) {
        $user_id = $_GET['user_id'];
        $query = $connection->prepare("SELECT * FROM users WHERE user_id = ?");
        $query -> execute([$user_id]);
        $result = $query->fetch();
    } else {
        header("Location: potalatoweb.php");
    }

    function getAllRecipes($conn) {
        $stmt = $conn -> prepare("SELECT * FROM recipe WHERE create_user = ?");
        $stmt -> execute([$_SESSION["user_name"]]);
        return $stmt;
    }

    function getAllFavourite($conn) {
        $stmt = $conn -> prepare("SELECT * FROM recipe INNER JOIN `my favourite` ON `my favourite`.`recipe_id` = `recipe`.`recipe_id` WHERE `my favourite`.`user_id` = ?");
        $stmt -> execute([$_SESSION["user_id"]]);
        return $stmt;
    }

    $userRecipe = getAllRecipes($connection);
    $userFavourite = getAllFavourite($connection);

?>
  <div class="container-fluid">
      <div class="row bg-beige justify-content-center">
          <div class="row">
              <div class="col px-0">
                  <div class="col text-center px-0 my-0 py-4">
                          <div class="container borderimg"><img src="img/webimg/default_profile_img.jpg">
                          </div>
                      <heading2-1 class="py-0 my-0"><?php echo $result['user_name']; ?></heading2-1>
                  </div>
              </div>
          </div>
      </div>
  </div>
    
    <div class="row bg-profile">
        <div class="col-lg-12 text-center">
            <div class="row">
                <div class="col">
                    <a  class="btn" onclick="showRecipe()"><h3 class="heading2">My Recipes</h3></a>
                </div>
                <div class="col">
                    <a class="btn" onclick="showFavourite()"><h3 class="heading2">My Favourite</h3></a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Content -->
        <div id="recipe" class="container-fluid" style="padding: 30px">
            <div class="row  justify-content-center">
                <div class="col-10">
                    <div class="container">
                        <div class="row">
                        <?php
                            while ($result = $userRecipe->fetch()){
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

        <div id="favourite" class="container-fluid hidden" style="padding: 30px">
            <div class="row  justify-content-center">
                <div class="col-10">
                    <div class="container">
                        <div class="row">
                        <?php
                            while ($result = $userFavourite->fetch()){
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
        <div class="col-lg-12 text-center" style="padding: 20px">
            <p>&copy;all right deserved to How Jue Min</p>
        </div>
    </div>
    
    <!-- JavaScript -->
    <script>
        let recipe = document.getElementById('recipe');
        let favourite = document.getElementById('favourite');

        function showRecipe() {
            recipe.classList.remove('hidden');

            favourite.classList.add('hidden');
        } 

        function showFavourite() {
            favourite.classList.remove('hidden');

            recipe.classList.add('hidden');
        }
        <?php
        if (isset($_GET['favourite'])) {
        ?>
        showFavourite();
        <?php
        }
        ?>

    </script>



    </body>
</html>