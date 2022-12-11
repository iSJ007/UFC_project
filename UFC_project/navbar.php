<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">


  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="style/styles.css" rel="stylesheet" >
</head>
<body>

<nav class="navbar">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" >

      <img src =  "files/logo.png" alt = "Logo">
      </a>

      <ul class="nav navbar-nav navbar-left">
      <li> <a href="#" class = "color-me"><?php  echo $_SESSION['username']; ?> </a> </li> 
</ul>
    </div>


    <ul class="nav navbar-nav navbar-right">
    
      <li><a href="stats.php" class = "color-me">Stats</a></li>
      <li><a href="review.php"class = "color-me" >Review</a></li>
      <li><a href="fantF.php" class = "color-me">Fantasy Fight</a></li>
      <li><a href="logout.php" class = "color-me">Logout</a></li>
    </ul>
  </div>
</nav>
  

</body>
</html>
