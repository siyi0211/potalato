<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="Yong Fen Yu">
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
<body>
<?php 
	include 'nav.php';
?>
<?php
    if (!isset($_SESSION['user_name'])) {
        header("Location: potalatoweb.php");
    }
?>
    <!-- Create Recipe -->
    <div class="container-fluid">
        <div class="row bg-beige">
            <div class="col">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 text-center" style="padding: 20px">

                <!-- Create Recipe -->
			     <heading1-1>Create Recipe</heading1-1>

			     <form action="new_recipe.php" method="post" enctype="multipart/form-data">
			     
                <input type="hidden" name="user_name" value="<?php echo $_SESSION['user_name']; ?>">
                
			     <div class="form-group">	
			        <input type="text" class="form-control mr-sm-2" id="recipe_name" placeholder="Recipe Name" name="recipe_name" required>
			     </div>
			     
			     <div class="form-group">
                    <input style="padding:40px 10px" type="text" class="form-control mr-sm-2" id="description" placeholder="Description" name="description" required>
			     </div>

			     <div class="form-group">
			        <input style="white-space: pre-line" style="padding:60px 10px" type="text" class="form-control mr-sm-2" id="ingredients" placeholder="Ingredients" name="ingredients" required>
			     </div>

                 <div class="form-group">
                    <input style="white-space: pre-line" style="padding:80px 10px" type="text" class="form-control mr-sm-2" id="directions" placeholder="Directions" name="directions" required>
                 </div>

                <div class="form-group txt_field1">
                    <h2>Recipe Category:</h2>

                    <input type="radio" id="appertizer_and_snacks" name="recipe_category" value="Appertizer and Snacks">
                    <label for="appertizer_and_snacks">Appertizer and Snacks</label>
                    <br>

                    <input type="radio" id="main_dish" name="recipe_category" value="Main Dish" required>
                    <label for="main_dish">Main Dish</label>                    
                    <br>
                    
                    <input type="radio" id="side_dish" name="recipe_category" value="Side Dish">
                    <label for="side_dish">Side Dish</label>
                    <br>
                
                    <input type="radio" id="soup" name="recipe_category" value="Soup">
                    <label for="soup">Soup</label>
                    <br>
                    
                    <input type="radio" id="salad" name="recipe_category" value="Salad">
                    <label for="salad">Salad</label>
                    <br>

                    <input type="radio" id="appertizer_and_snacks" name="recipe_category" value="Appertizer and Snacks">
                    <label for="appertizer_and_snacks">Appertizer and Snacks</label>
                    <br>

                </div>
                
                <div class="form-group">
                    <h2>Cooking Style: </h2>

                    <input type="radio" id="vegetarian" name="cooking_style" value="Vegetarian" required>
                    <label for="vegetarian">Vegetarian</label>
                    <br>

                    <input type="radio" id="asian_style" name="cooking_style" value="Asian style">
                    <label for="asian_style">Asian style</label>
                    <br>

                    <input type="radio" id="western_style" name="cooking_style" value="Western style">
                    <label for="western_style">Western style</label>
                    <br>
                </div>
                <div class="form-group txt_field1">
                    <label class="heading3">Upload Photo</label>
                    <br>
                    <input type="file" id="imageToUpload" name="imageToUpload" accept="image/*" onchange="loadImage(event)" required>
                    <img id="output" style="width:300px">
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
                <button type="submit" name="new" class="btn button-color mt-3">Submit Your Recipe</button>
                                                   
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
