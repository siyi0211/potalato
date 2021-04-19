<?php
session_start();
?>

<html>
    <nav class="navbar navbar-expand-sm bg-nav navbar-dark">
        <a class="navbar-brand" href="potalatoweb.php"><img src="img/webimg/potalatologo.png" height="50px"></a>
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">All Recipes</a>
                <div class="dropdown-menu">
        <a class="dropdown-item" href="#">All Recipes</a>
        <a class="dropdown-item" href="#">Main Dish</a>
        <a class="dropdown-item" href="#">Side Dish</a>
        <a class="dropdown-item" href="#">Soup</a>
        <a class="dropdown-item" href="#">Salad</a>
        <a class="dropdown-item" href="#">Appetizer and Snacks</a>
      </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Cooking Styles</a>
                <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Vegetarian</a>
        <a class="dropdown-item" href="#">Asian style</a>
        <a class="dropdown-item" href="#">Western style</a>
      </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Kitchen Tips</a>
                <div class="dropdown-menu">
        <a class="dropdown-item" href="#">All About Ingredients</a>
        <a class="dropdown-item" href="#">Make it Better</a>
      </div>
            </li>
        </ul>
        <form class="form-inline" action="search.php" method="get">
    <input class="form-control mr-sm-2" type="text" placeholder="Search" value="">
    <button class="btn button-color" type="submit" ><img src="img/webimg/iconfinder_-_Magnifier-Search-Zoom-_3844467.png" height="20px"></button>
  </form>

        <?php if (isset($_SESSION['user_id'])){ ?>
          <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown"><?php echo $_SESSION['user_name'];?></a>
                <div class="dropdown-menu">
          <a class="dropdown-item" href="profile.php">Profile</a>
          <a class="dropdown-item" href="create%20recipe.php">Create Recipe</a>
          <a class="dropdown-item" href="#">My Favourite</a>
          <a class="dropdown-item" href="logout.php">Logout</a>

        <?php } else {?>
          <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="login.php" id="navbardrop" data-toggle="dropdown"> Login</a>
                <div class="dropdown-menu">
          <a class="dropdown-item" href="login.php">Login</a>
          
        <?php }?>
        
      </div>
            </li>
        </ul>
    </nav>
</html>
