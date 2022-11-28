<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</titlle>
</head>

<body>
     <?php include 'navbar.php'?>
     <link href="style/styles2.css" rel="stylesheet" > 
    <div class="container">
      <div class="row height d-flex justify-content-center align-items-center">
        <div class="col-md-8">
          <div class="search">
            <i class="fa fa-search"></i>
             <input type="text" id = "search1" class="form-control" placeholder="Enter Fighter name to view stats:"> 
             <button id = "submit" class="btn btn-primary">Search</button> 
             <div  id = "show-list" > </div>
          </div>
               <div id = "record" class = "record"> </div>
         </div>
               <div class="photo" id = "photo" > </div>
       </div>
    </div>
   
      
   
  <script > 
  $(document).ready(function () {


  // Send Search Text to the server
  $("#search1").keyup(function () {
    let searchText = $(this).val();
    if (searchText != "") {
      $.ajax({
        url: "actions/autocomplete.php",
        method: "post",
        data: {
          query: searchText,
        },
        success: function (response) {
          $("#show-list").html(response);
        },
      });
    } else {
      $("#show-list").html("");
    }
  });
  // Set searched text in input field on click of search button
  $(document).on("click", "a", function () {
    $("#search1").val($(this).text());
    $("#show-list").html("");
  });


  $(document).on('click' ,  '#submit', function() {
       var value = $('#search1').val(); 
       
            $.ajax({
              url: "actions/getstats.php",
              method: "post",
              data: {
                query: value,
                 },
        success: function (data) {
          $("#record").html(data);
        },
            });

  
   
});

$(document).on('click' , '#submit', function() {
       var value = $('#search1').val(); 
       console.log(value);
            $.ajax({
              url: "actions/testphoto.php",
              method: "post",
              data: {
                query: value,
                 },
        success: function (data) {
          $("#photo").html(data);
        },
            });
});

});

</script>
</body>
</html>

