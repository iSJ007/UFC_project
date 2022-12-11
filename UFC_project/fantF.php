<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: index.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: index.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UFCFantasyFight</title>
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
         Fantasy Fight</a>
      </h4>
    </div>
    <div id="searchbox" class="panel-collapse collapse">
    
    <div class = "compcontainer"> 

      <div class = "img1"> </div>
      <div class = "img2"> </div>
      <div class = "vsimage"> <img src="files/vspic.png"> </div>
      <input type="text" id = "search1" class="searchbox1" placeholder="Enter fighter 1:"> 
      <div  id = "show-list1" > </div>
      <input type="text" id = "search2" class="searchbox2" placeholder="Enter fighter 2:"> 
      <div  id = "show-list2" > </div>
      <button id = "runbutton" class="btn btn-primary ">Run</button> 
      <div class = "winner"> </div>
      
      <input type="text" id = "search3" class="searchbox3" placeholder="Enter 0 for left, 1 for right:"> 
      <button id = "insertbutton" class="btn btn-success">Insert</button> 

      
    </div>


   
          
         </div>
      </div>

</div>

  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" onclick = "gettable()" data-parent="#accordion" href="#collapse2" style = "color: red;" >
         My Prediction</a>
      </h4>
    </div>
    <div id="collapse2" class="panel-collapse collapse">
    <div class ="mytable" id = "mytable"> <div>
    </div>
  </div>

 </div>




<script> 

// gets all the comparisons the user has made 

function gettable() {
  
  
       
       $.ajax({
         url: "actions/mycompare.php",
         method: "get",
         
     success: function (response) {
     $("#mytable").html(response);
   },
       });
  
  
}

// inserts winner into the compare table 

$(document).on('click' , '#insertbutton', function() {
       var leftf = $('#search1').val(); 
       var rightf = $('#search2').val(); 
       var winner;
       if ($('#search3').val() == 0) {
          winner = leftf;
       }
       else if ($('#search3').val() == 1) {
             winner = rightf;
       }
       else {
          alert('Enter 0 or 1');
       }
       
            $.ajax({
              url: "actions/insertcompare.php",
              method: "post",
              data: {
                leftf: leftf, rightf: rightf, winner:winner
                 },
        success: function (data) {
          if(data = 1) {
          alert("Fighter succesfully submitted");
					//document.getElementById('search3').value = '';
					
				}
        
        },
            });
});

// runs the compare formula 
$(document).on('click' , '#runbutton', function() {
       var leftf = $('#search1').val(); 
       var rightf = $('#search2').val(); 
       console.log(leftf);
       console.log(rightf);
            $.ajax({
              url: "actions/compare.php",
              method: "post",
              data: {
                leftf: leftf, rightf: rightf
                 },
        success: function (data) {
          $(".winner").html(data);
        },
            });
});
// image api call 
$(document).on('click' , '#runbutton', function() {
       var value = $('#search1').val(); 
       console.log(value);
            $.ajax({
              url: "actions/getphoto.php",
              method: "post",
              data: {
                query: value,
                 },
        success: function (data) {
          $(".img1").html(data);
        },
            });
});

// image api call

$(document).on('click' , '#runbutton', function() {
       var value = $('#search2').val(); 
       console.log(value);
            $.ajax({
              url: "actions/getphoto.php",
              method: "post",
              data: {
                query: value,
                 },
        success: function (data) {
          $(".img2").html(data);
        },
            });
});

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
          $("#show-list1").html(response);
        },
      });
    } else {
      $("#show-list1").html("");
    }
  });
  // Set searched text in input field on click of search button
  $(document).on("click", "#ato", function () {
    $("#search1").val($(this).text());
    $("#show-list1").html("");
  });

  // Send Search Text to the server
$("#search2").keyup(function () {
    let searchText = $(this).val();
    if (searchText != "") {
      $.ajax({
        url: "actions/autocomplete1.php",
        method: "post",
        data: {
          query: searchText,
        },
        success: function (response) {
          $("#show-list2").html(response);
        },
      });
    } else {
      $("#show-list2").html("");
    }
  });
  // Set searched text in input field on click of search button
  $(document).on("click", "#ato1", function () {
    $("#search2").val($(this).text());
    $("#show-list2").html("");
  });


</script>
</body>
</html>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
