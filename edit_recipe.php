<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="Yong Fen Yu">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<title>Edit Recipe</title>

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
<?php
    if (!isset($_SESSION['is_admin'])) {
        header("Location: login.php");
    }
?>
<?php

include 'connection.php';
if(isset($_GET['recipe_id'])){  //get recipe detail

    $recipeid = $_GET['recipe_id'];
    $query = $connection->prepare("SELECT * FROM recipe WHERE recipe_id = ?");
    $query -> execute([$recipeid]);
    $result = $query->fetch();

} else {
    header("Location: potalato_admin.php");
}

if (isset($_POST['edit'])) {  //update recipe

    $target_folder = "img/webimg/";

    $isEverythingOK = true;

    $target_file = $target_folder . basename($_FILES["imageToUpload"]["name"]);

    $file_name = strtolower(pathinfo($target_file, PATHINFO_FILENAME));

    $file_extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $new_image_filename = $target_folder . $file_name . time() . "." . $file_extension;
    
    if ($file_extension != "jpg" && $file_extension != "webp" && $file_extension != "png" && $file_extension != "gif") {
        echo "Sorry, image only";
        $isEverythingOK = false;
    } 
    if ($_FILES["imageToUpload"]["size"] > 100000000) {
        echo "File too big";
        $isEverythingOK = false;
    }

    if (!$isEverythingOK) {
        echo "File not upload";
    } else {
        
        move_uploaded_file($_FILES["imageToUpload"]["tmp_name"],$new_image_filename);

        $create_user = $_POST['create_user'];
        $recipe_id = $_POST['recipe_id'];
        $recipe_name = $_POST['recipe_name'];
        $description = $_POST['description'];
        $ingredients = $_POST['ingredients'];
        $directions = $_POST['directions'];
        $recipe_category = $_POST['recipe_category'];
        $cooking_style = $_POST['cooking_style'];

        $query = $connection -> prepare("UPDATE recipe SET recipe_name='$recipe_name', recipe_img='$new_image_filename', recipe_description='$description', 
        recipe_ingredients='$ingredients', recipe_category='$recipe_category', recipe_cooking_style='$cooking_style', recipe_directions='$directions', 
        create_user='$create_user' WHERE recipe_id='$recipe_id'");

        $result = $query -> execute();

        if ($result) {
            header("Location:potalato_admin.php");
        } else {
            echo "Failed";
        }
    }

    } 
?>
    <!-- Create Recipe -->
    <div class="container-fluid">
        <div class="row bg-beige">
            <div class="col">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 text-center" style="padding: 20px">

                <!-- Create Recipe -->
			     <heading1-1>Edit Recipe</heading1-1>

			     <form action="edit_recipe.php" method="post" enctype="multipart/form-data">
			     
                <input type="hidden" name="recipe_id" value="<?php echo $result['recipe_id']?>">
                
			     <div class="form-group">	
                 <h2>Recipe Name: </h2>
			        <input type="text" class="form-control mr-sm-2" id="recipe_name" placeholder="Recipe Name" name="recipe_name" value="<?php echo $result['recipe_name']?>" required>
			     </div>
			     
			     <div class="form-group">
                 <h2>Description: </h2>
                    <textarea style="resize:none" type="text" class="form-control mr-sm-2" id="description" placeholder="Description" name="description" rows="6" required><?php echo $result['recipe_description']?></textarea>
			     </div>

			     <div class="form-group">
                 <h2>Ingredients: </h2>
			        <textarea style="resize:none" type="text" class="form-control mr-sm-2" id="ingredients" placeholder="Ingredients" name="ingredients" rows="8" required><?php echo $result['recipe_ingredients'];?></textarea>
			     </div>

                 <div class="form-group">
                     <h2>Directions: </h2>
                    <textarea style="resize:none" type="text" class="form-control mr-sm-2" id="directions" placeholder="Directions" name="directions" rows="10" required><?php echo $result['recipe_directions']?></textarea>
                 </div>

                 <div class="form-group">
                     <h2>Create User: </h2>
                     <input type="text" class="form-control mr-sm-2" id="create_user" placeholder="Create User Name" name="create_user" value="<?php echo $result['create_user']?>" required>
                 </div>

                <div class="form-group txt_field1">
                    <h2>Recipe Category:</h2>
                    
                    <input type="radio" id="appertizer_and_snacks" name="recipe_category" value="Appertizer and Snacks" <?php if ($result['recipe_category'] == 'Appertizer and Snacks'){echo ' checked="checked"';}?>>
                    <label for="appertizer_and_snacks">Appertizer and Snacks</label>
                    <br>

                    <input type="radio" id="main_dish" name="recipe_category" value="Main Dish" required <?php if ($result['recipe_category'] == 'Main Dish'){echo ' checked="checked"';}  ?>>
                    <label for="main_dish">Main Dish</label>                    
                    <br>
                    
                    <input type="radio" id="side_dish" name="recipe_category" value="Side Dish" <?php if ($result['recipe_category'] == 'Side Dish'){echo ' checked="checked"';}  ?>>
                    <label for="side_dish">Side Dish</label>
                    <br>
                
                    <input type="radio" id="soup" name="recipe_category" value="Soup" <?php if ($result['recipe_category'] == 'Soup'){echo ' checked="checked"';}  ?>>
                    <label for="soup">Soup</label>
                    <br>
                    
                    <input type="radio" id="salad" name="recipe_category" value="Salad" <?php if ($result['recipe_category'] == 'Salad'){echo ' checked="checked"';}  ?>>
                    <label for="salad">Salad</label>
                    <br>


                </div>
                
                <div class="form-group">
                    <h2>Cooking Style: </h2>

                    <input type="radio" id="vegetarian" name="cooking_style" value="Vegetarian" required <?php if ($result['recipe_cooking_style'] == 'Vegetarian'){echo ' checked="checked"';}  ?>>
                    <label for="vegetarian">Vegetarian</label>
                    <br>

                    <input type="radio" id="asian_style" name="cooking_style" value="Asian style" <?php if ($result['recipe_cooking_style'] == 'Asian style'){echo ' checked="checked"';}  ?>>
                    <label for="asian_style">Asian Style</label>
                    <br>

                    <input type="radio" id="western_style" name="cooking_style" value="Western style" <?php if ($result['recipe_cooking_style'] == 'Western style'){echo ' checked="checked"';}  ?>>
                    <label for="western_style">Western Style</label>
                    <br>
                </div>

                <div class="form-group txt_field1">
                    <label class="heading3">Upload Photo</label>
                    <br>
                    <input type="file" id="imageToUpload" name="imageToUpload" accept="image/*" onchange="loadImage(event)" required>
                    <img id="output" src="<?php echo $result['recipe_img']?>" style="width:300px">
                    <script>
                        var loadImage = function(event) {
                            var reader = new FileReader();
                            reader.onload = function() {
                                var output = document.getElementById('output');
                                output.src = reader.result;
                            };
                            reader.readAsDataURL(event.target.files[0]);
                        };
                    </script>
                </div>
                <button type="submit" name="edit" class="btn button-color mt-3">Edit Recipe</button>
                                                   
                </form>
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
