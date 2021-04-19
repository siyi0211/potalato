<?php
session_start();
    include 'connection.php';

    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $encrypted_password = password_hash ($password,PASSWORD_DEFAULT);

echo $encrypted_password;

    $query = $connection->prepare('INSERT INTO users (user_name, user_email, user_password) VALUES (?,?,?)');

    $result = $query -> execute([$username, $email, $encrypted_password]);

if ($result){
     echo "Successfully Sign up.";
     header("Location:potalatoweb.php");
}
    else
    {
    echo "Sorry, there is an error.";
    }

?>