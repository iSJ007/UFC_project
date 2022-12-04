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
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>

<body>

    <?php include 'navbar.php';?>
    <?php include 'conn.php';?>
    

    <link href="style/styles2.css" rel="stylesheet" >

    


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
              <input type="text" id = "search1" class="form-control" placeholder="Search a Fight to review:"> 
              <button onclick = "startTimeout()"   id = "submit" class="btn btn-primary">Search</button> 
              <div  id = "show-list" > </div>
            </div>
               <div id = "record" class = "record" > </div>
          </div>
               <div  id = "photo" style = "
                                          position: relative;
                                          width: 25%;
                                          height:25%;
                                          padding-bottom:20%;
                                          right: -1%;
                                          top: 10%;
                                          "><div>
           </div>
          </div>




<div class = "formcontainer"  >

<div class="col-sm-7" style = "border:red;"  >
<form id="ratingForm" method="POST"   > 
<div  id = "formcontainer"> 
<span onmouseover="starmark(this)" onclick="starmark(this)" id="1one" style="font-size:40px;cursor:pointer;"  class="fa fa-star checked"></span>
<span onmouseover="starmark(this)" onclick="starmark(this)" id="2one"  style="font-size:40px;cursor:pointer;" class="fa fa-star "></span>
<span onmouseover="starmark(this)" onclick="starmark(this)" id="3one"  style="font-size:40px;cursor:pointer;" class="fa fa-star "></span>
<span onmouseover="starmark(this)" onclick="starmark(this)" id="4one"  style="font-size:40px;cursor:pointer;" class="fa fa-star"></span>
<span onmouseover="starmark(this)" onclick="starmark(this)" id="5one"  style="font-size:40px;cursor:pointer;" class="fa fa-star"></span>
<br/>
<textarea  style="margin-top:5px;" class="form-control" rows="3" id="comment" placeholder="Enter your review"></textarea>

<div class="form-group">
<button class="btn btn-success" id="saveReview">Save Review</button> <button type="button" onclick = "clearbox()" class="btn btn-danger" id="cancelReview">Cancel</button>
</div>		
</div>
</form>
</div>
</div>


<div id = "userID" style = "color: white;"> <?php 
$username = $_SESSION['username'];
$r = mysqli_query($db, "SELECT id FROM users WHERE username='$username'");
$userid = mysqli_fetch_assoc($r);
echo $userid['id'];
?> 
</div>



<div id = "fight-reviews"> </div>

    
</div>
</div>        
</div>

  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" onclick = "gettable()" data-parent="#accordion" href="#collapse2" style = "color: red;" >
         My Fights!</a>
      </h4>
    </div>
    <div id="collapse2" class="panel-collapse collapse">
      <div class ="mytable" id = "mytable"> <div>
    </div>
  </div>

 </div>

<script > 

var count;

function starmark(item)
{
count=item.id[0];
sessionStorage.starRating = count;
var subid= item.id.substring(1);
for(var i=0;i<5;i++)
{
if(i<count)
{
document.getElementById((i+1)+subid).style.color="red";
}
else
{
document.getElementById((i+1)+subid).style.color="black";
}
}



}

function gettable() {
  var user_id = document.getElementById("userID").innerHTML;
  
       
       $.ajax({
         url: "actions/myreviews.php",
         method: "post",
         data: {
           userid: user_id,
            },
     success: function (response) {
     $("#mytable").html(response);
   },
       });
  
  
}


function startTimeout() {
    console.log('success');
    TestsFunction();
    setTimeout(getreviews, 3000);
  }

  
  function getreviews () {
    var fightid = document.getElementById("fightid").innerHTML;
       console.log(fightid);
       $.ajax({
         url: "actions/userreviews.php",
         method: "post",
         data: {
           fightid: fightid,
            },
     success: function (response) {
     $("#fight-reviews").html(response);
   },
       });
  }   
  
  function clearbox() {
    
    $("#ratingForm")[0].reset();
  }


  function TestsFunction() {
    console.log('hide');
    var T = document.getElementById("formcontainer");
    T.style.display = "block";  // <-- Set it to block
}




  $(document).ready(function () {

  // Send Search Text to the server
  $("#search1").keyup(function () {
    let searchText = $(this).val();
    if (searchText != "") {
      $.ajax({
        url: "actions/reviewautocomplete.php",
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
  $(document).on("click", "#fightauto", function () {
    $("#search1").val($(this).text());
    $("#show-list").html("");
  });

  
 // Get the fight stats
  $(document).on('click' ,  '#submit', function() {
  
       var value = $('#search1').val(); 
       
            $.ajax({
              url: "actions/getfightstats.php",
              method: "post",
              data: {
                query: value,
                 },
           success: function (data) {
          
          $("#record").html(data);
          
        },
            });

            

});

// Image api call 
$(document).on('click' ,  '#submit', function() {
       var value = $('#search1').val(); 
       
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

// submit user rating 
$('#ratingForm').on('submit', function(event){
    
    startTimeout();

		event.preventDefault();
    var fightid = document.getElementById("fightid").innerHTML;
		var rating = count;
    let review = document.getElementById("comment").value;
    let userid = document.getElementById("userID").innerHTML;
    
    
    if (review) {
		$.ajax({
			
			url : 'actions/postreview.php',		
      method : 'POST',				
			data: { fightid: fightid, rating: rating, review: review, userid:userid },
			success:function(data){
				if(data = 1) {
          alert("Review succesfully submitted");
					$("#ratingForm")[0].reset();
					
				}
        
			}
		});	
  }
  else {
    alert('Please write a review');
  }	
	});

});

</script>  

</body>
</html>