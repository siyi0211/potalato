<?php
session_start();
    include 'connection.php';

    $email = $_POST["email"];
    $password = $_POST["password"];

    echo $email;

    $query = $connection->prepare("SELECT * FROM users WHERE user_email = ?");
    $query -> execute([$email]);
    $result = $query->fetch();

if ($result && password_verify($password, $result["user_password"]))
{
    session_start();
    $_SESSION["user_id"] = $result['user_id'];



    header("Location:potalatoweb.php");
}
else
{
    echo "invalid";
}

?>

