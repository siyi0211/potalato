<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<title>Manage Recipes - Admin</title>

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/fontawesome-all.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<style>
    .recipeImg{
        height:180px;
        width:180px;
    }
    #Recipe {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 95%;
    margin-left: auto; 
    margin-right: auto;
    }

    #Recipe td, #Recipe th {
    border: 1px solid #ddd;
    padding: 8px;
    }

    #Recipe tr:nth-child(even){background-color: #f2f2f2;}

    #Recipe tr:hover {background-color: #ddd;}

    #Recipe th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #E8BA46;
    color: white;
    }

</style>
</head>

<body>

<?php
include 'nav.php'
?>

<?php

include 'connection.php';

if (isset($_SESSION['is_admin'])){
    if(isset($_GET['search'])){
        $searchq = $_GET['search'];
        
        $searchq = preg_replace ("#[^0-9a-z]#i","",$searchq);
        
        $query = $connection->prepare("SELECT * FROM recipe WHERE recipe_name LIKE '%$searchq%' OR recipe_category LIKE '%$searchq%' OR recipe_cooking_style LIKE '%$searchq%';");
            
    }else{
        $query = $connection->prepare("SELECT * FROM recipe");
    }
    
    $query -> execute();
}else{
    header("Location:login.php");
}




?>
<h1 style="text-align:center;"> Recipes</h1>

<table id="Recipe">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Image</th>
            <th>Description</th>
            <th>Category</th>
            <th>Cooking Style</th>
            <th>Create User</th>
            <th>Operation</th>
        </tr>
    </thead>
    <tbody>
                   
    <?php
        while ($result = $query->fetch()){
    ?>
    <tr key="<?php echo $result['recipe_id']?>">
        <td><?php echo $result['recipe_id']?></td>
        <td><?php echo $result['recipe_name']?></td>
        <td><img src="<?php echo $result['recipe_img']?>" class="recipeImg" alt="recipe_img" /></td>
        <td style="width:600px;"><?php echo $result['recipe_description']?></td>
        <td><?php echo $result['recipe_category']?></td>
        <td><?php echo $result['recipe_cooking_style']?></td>
        <td><?php echo $result['create_user']?></td>
        <td>
            <a class="btn button-color" href="edit_recipe.php?recipe_id=<?php echo $result['recipe_id']?>"> Edit </a><br><br>
            <a class="btn button-color" href="delete_recipe.php?recipe_id=<?php echo $result['recipe_id']?>"> Delete </a>
        </td>
        </tr>
    <?php 
        }
    ?> 

    </tbody>
    </table>

    </div>
    <br><br>
    <div class="row bg-nav pt-2">
        <div class="col-lg-12 text-center" style="padding: 20px"><p>&copy;all right deserved to How Jue Min</p>
        </div>
    </div>

    </body>
</html>