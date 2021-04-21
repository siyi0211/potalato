<?php
session_start();
include_once('connection.php');

if (isset($_GET['recipe_id']) && isset($_GET['favourite'])) {

    if (isset($_SESSION['user_id'])) {
        
        $favourite = $_GET['favourite'];
        $recipe_id = $_GET['recipe_id'];

        if ($favourite == 'true') {
            try {
                $query = $connection->prepare("DELETE FROM `my favourite` WHERE user_id = ? AND recipe_id = ?");
                $query -> execute([$_SESSION['user_id'], $recipe_id]);
            } catch (PDOException $error) {
                echo "\n" . $error->getMessage;
            }

        } else if ($favourite == 'false') {
            echo "false";
        }

    } else {
        echo "go to login";
    }

} else {
    echo "in else - back to home";
}