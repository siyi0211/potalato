<?php
if (isset($_POST['submit'])) {
    echo "From Post";

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
        
        include_once 'connection.php';

        move_uploaded_file($_FILES["imageToUpload"]["tmp_name"],$new_image_filename);

        $user_name = $_POST['user_name'];
        $recipe_name = $_POST['recipe_name'];
        $description = $_POST['description'];
        $ingredients = $_POST['ingredients'];
        $directions = $_POST['directions'];
        $recipe_category = $_POST['recipe_category'];
        $cooking_style = $_POST['cooking_style'];

        $query = $connection -> prepare('INSERT INTO recipe (recipe_name, recipe_img, recipe_description, recipe_ingredients, recipe_category, recipe_cooking_style, recipe_directions, create_user) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');

        $result = $query -> execute([$recipe_name, $new_image_filename, $description, $ingredients, $recipe_category, $cooking_style, $directions, $user_name]);

        if ($result) {
            echo "Successful";
            header("Location:potalatoweb.php");
        } else {
            echo "Failed";
        }
    }

} else {
    header("Location: potalatoweb.php");
}