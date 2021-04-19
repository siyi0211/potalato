<?php

    include 'connection.php';
    if($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $email = $_POST["email"];
        $password = $_POST["password"];

        $query = $connection->prepare("SELECT * FROM users WHERE user_email = ?");
        $query -> execute([$email]);
        $result = $query->fetch();

        if ($result && password_verify($password, $result["user_password"]))
        {
            session_start();
            $_SESSION["user_id"] = $result['user_id'];
            $_SESSION["user_name"] = $result['user_name'];

            header("Location:potalatoweb.php");
        }
        else
        {
            echo "invalid";
        }
    }

?>

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
<?php 
include 'nav.php'
?>

<body>
    
    <div class="container-fluid">
        <div class="row bg-beige">
            <div class="col">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 text-center" style="padding: 20px">
                            <heading1-1>Login</heading1-1><br><br>
                            <form action="login.php" method="post" >
                                <input type="text" class="form-control" id="email" placeholder="Enter email..." name="email" required><br>
                                <input type="password" class="form-control" placeholder="Enter password..." name="password" required><br>
                                <button type="submit" class="btn button-color mt-3">Login</button>
                            </form>    
                            Don't have an account? <a href="sign%20up.php"> Sign Up</a>
                        </div>
                    </div>
                   
            </div>
        </div>
    </div>
    
    
    <div class="row bg-nav pt-2 fixed-bottom">
        <div class="col-lg-12 text-center" style="padding: 20px"><p>&copy;all right deserved to How Jue Min</p>
        </div>
        </div>
    
    </body>
</html>

