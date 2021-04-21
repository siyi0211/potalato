<?php
session_start();
include_once('connection.php');

if (isset($_GET['recipe_id']) && isset($_GET['favourite'])) {

    // Only when user have login
    if (isset($_SESSION['user_id'])) {
        
        $favourite = $_GET['favourite'];
        $recipe_id = $_GET['recipe_id'];

        // Already in favourite, want to remove
        if ($favourite == '1') {
            echo "removing";
            try {
                $query = $connection->prepare("DELETE FROM `my favourite` WHERE user_id = ? AND recipe_id = ?");
                $query -> execute([$_SESSION['user_id'], $recipe_id]);
            } catch (PDOException $error) {
                echo "\n" . $error->getMessage;
            }

        // Haven't favourite yet, add to favourite
        } else {
            echo "adding";
            try{
                $query = $connection -> prepare("INSERT INTO `my favourite` (`user_id`, `recipe_id`) VALUES (?, ?)");
                $query -> execute([$_SESSION['user_id'], $recipe_id]);
            } catch (PDOException $error) {
                echo "\n" . $error->getMessage;
            }
        }
    
    // Bring to login if not yet login
    } else {
        echo "go to login";
        header("Location: login.php");
    }

// Access from url 
} else {
    echo "in else - back to home";
    header("Location: potalatoweb.php");
}