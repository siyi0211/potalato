<?php
  if (session_status() === PHP_SESSION_NONE) { session_start(); }
?>

<style>
  
  .navbar-expand-sm {
    -ms-flex-flow: row nowrap;
    flex-flow: row nowrap;
    -ms-flex-pack: start;
    justify-content: space-around;
  }
</style>

    <nav class="navbar navbar-expand-sm bg-nav navbar-dark ">
      
        <?php
        if (!isset($_SESSION['is_admin'])){
        ?>

        <a class="navbar-brand" href="potalatoweb.php"><img src="img/webimg/potalatologo.png" height="50px"></a>

        <ul class="navbar-nav">
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">All Recipes</a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="recipepage.php">All Recipes</a>
                <a class="dropdown-item" href="search.php?sortCatogory=Main Dish">Main Dish</a>
                <a class="dropdown-item" href="search.php?sortCatogory=Side Dish">Side Dish</a>
                <a class="dropdown-item" href="search.php?sortCatogory=Soup">Soup</a>
                <a class="dropdown-item" href="search.php?sortCatogory=Salad">Salad</a>
                <a class="dropdown-item" href="search.php?sortCatogory=Appetizer and Snacks">Appetizer and Snacks</a>
              </div>
          </li>
        </ul>
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Cooking Styles</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="search.php?sortCookingStyle=Vegetarian">Vegetarian</a>
              <a class="dropdown-item" href="search.php?sortCookingStyle=Asian style">Asian style</a>
              <a class="dropdown-item" href="search.php?sortCookingStyle=Western style">Western style</a>
            </div>
          </li>
        </ul>

        <form class="form-inline" action="search.php" method="get">
          <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search">
          <button class="btn button-color" type="submit" value="search"><img src="img/webimg/iconfinder_-_Magnifier-Search-Zoom-_3844467.png" height="20px"></button>
        </form>
        
        <?php if (isset($_SESSION['user_id'])){ ?>
          <ul class="navbar-nav">
            <li class="nav-item dropdown right">
              <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown"><?php echo $_SESSION['user_name'];?></a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="profile.php?user_id=<?php echo $_SESSION['user_id']; ?>">Profile</a>
                <a class="dropdown-item" href="create%20recipe.php">Create Recipe</a>
                <a class="dropdown-item" href="profile.php?user_id=<?php echo $_SESSION['user_id']; ?>&favourite=true">My Favourite</a>
                <a class="dropdown-item" href="logout.php">Logout</a>

        <?php } else {?>
          <ul class="navbar-nav right" >
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="login.php" id="navbardrop" data-toggle="dropdown"> Login</a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="login.php">Login</a>       
        <?php }?>
        
              </div>
            </li>
        </ul>
      <?php
        }else{ //if is admin will show admin nav bar
      ?>
      <a class="navbar-brand" href="potalato_admin.php"><img src="img/webimg/potalatologo.png" height="50px"></a>

      <a class="navbar-brand" href="create%20recipe.php">Create Recipe</a>

      <form class="form-inline" action="potalato_admin.php" method="get">
        <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search">
        <button class="btn button-color" type="submit" value="search"><img src="img/webimg/iconfinder_-_Magnifier-Search-Zoom-_3844467.png" height="20px"></button>
      </form>

      <?php if (isset($_SESSION['user_id'])){ ?>
        <ul class="navbar-nav">
          <li class="nav-item dropdown right">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown"><?php echo $_SESSION['user_name'];?></a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="logout.php">Logout</a>

      <?php } else {?>
        <ul class="navbar-nav right" >
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="login.php" id="navbardrop" data-toggle="dropdown"> Login</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="login.php">Login</a>       
      <?php }?>

            </div>
          </li>
      </ul>

      <?php
        }
      ?>
    </nav>

