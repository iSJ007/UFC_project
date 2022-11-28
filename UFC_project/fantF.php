<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="style/styles4.css" rel="stylesheet" >
</head>

<body>
    <?php  include 'navbar.php'?>
    <div class="banner">
      <img src="files/UFCfighters.jpg">
    </div>

    <div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title" >
        <a data-toggle="collapse" data-parent="#accordion" href="#searchbox" style = "color: red;" >
         Review a Fight!</a>
      </h4>
    </div>
    <div id="searchbox" class="panel-collapse collapse">
    <div  class="container">
        <div class="row height d-flex justify-content-center align-items-center">
          <div class="col-md-8">
           <div class="search">
              <i class="fa fa-search"></i>
              <input type="text" class="form-control" placeholder="Type Fights to review:">
              <button class="btn btn-primary">Search</button>
            </div>
          </div>
        </div>
    </div>

    <div class="photo" id = "photo" style = "position: absolute;
      height:0;
      width:20%;
      padding-bottom:20%;
      background-color:black;
      top: 40%;
      border-radius: 2px;
      border-color: black; ">
         <div>
          
         </div>
      </div>

</div>

  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2" style = "color: red;" >
         My Fights!</a>
      </h4>
    </div>
    <div id="collapse2" class="panel-collapse collapse">
      <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
      sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
      minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
      commodo consequat.</div>
    </div>
  </div>

 </div>





</body>
</html>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">