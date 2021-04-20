<<<<<<< HEAD
<?php 
    include_once('connection.php');
    if(isset($_GET['user_id'])) {
        $user_id = $_GET['user_id'];
        $query = $connection->prepare("SELECT * FROM users WHERE user_id = ?");
        $query -> execute([$user_id]);
        $result = $query->fetch();
    }
?>
=======
>>>>>>> 20be9236a04621c9150d026d35c66759c7c0f454
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
<?php
    include 'nav.php';
?>
  <div class="container-fluid">
      <div class="row bg-beige justify-content-center">
          <div class="row">
              <div class="col px-0">
                  <div class="col text-center px-0 my-0 py-4">
                          <div class="container borderimg"><img src="img/1601362881448109%20-%20Copy%20(2).jpg">
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
                <div class="col-4">
                    <a href="#" class="btn"><h3 class="heading2">My Recipes</h3></a>
                </div>
                <div class="col-4">
                    <a href="#" class="btn"><h3 class="heading2">My Posts</h3></a>
                </div>
                <div class="col-4">
                    <a href="profilemyfavourite.html" class="btn"><h3 class="heading2">My Favourite</h3></a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- content -->
        <div class="container-fluid" style="padding: 30px">
            <div class="row  justify-content-center">
                <div class="col-10">
                    <div class="container">
                        <div class="row">
                            <div class="col-3">
                                <div class="card">
                                    <img class="card-img-top" src="img/webimg/Creamy-Mashed-Potato_8-copy.jpg" alt="Card image" height="200px">
                                    <div class="card-body" style="padding-top: 2px">
                                        <h4 class="card-title heading3">Mashed Potato</h4>
                                        <p>By France C</p>
                                        <a href="#" class="stretched-link"></a>
                                    </div>
                                </div>
                            </div>
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