<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

</head>
<body>

<div class = "formcontainer"  style = "position:relative;
                                       " >

<div class="col-sm-7" style = "border:red;"  >
<form id="ratingForm" method="POST"   > 
<!-- <input type="hidden" class="form-control" id="userId" name="userId" value="<//?php echo $userid['id']; ?>"> -->
<div  id = "formcontainer"> 
<span onmouseover="starmark(this)" onclick="starmark(this)" id="1one" style="font-size:40px;cursor:pointer;"  class="fa fa-star checked"></span>
<span onmouseover="starmark(this)" onclick="starmark(this)" id="2one"  style="font-size:40px;cursor:pointer;" class="fa fa-star "></span>
<span onmouseover="starmark(this)" onclick="starmark(this)" id="3one"  style="font-size:40px;cursor:pointer;" class="fa fa-star "></span>
<span onmouseover="starmark(this)" onclick="starmark(this)" id="4one"  style="font-size:40px;cursor:pointer;" class="fa fa-star"></span>
<span onmouseover="starmark(this)" onclick="starmark(this)" id="5one"  style="font-size:40px;cursor:pointer;" class="fa fa-star"></span>
<br/>
<textarea  style="margin-top:5px;" class="form-control" rows="3" id="comment" placeholder="Enter your review"></textarea>

<div class="form-group">
<button onclick = 'edit()'  class="btn btn-success" id="saveReview">Save Review</button> <a type="button" href ="../review.php" class="btn btn-danger" id="cancelReview">Return</a>
</div>		
<!-- <button  onclick="result()" type="button" style="margin-top:10px;margin-left:5px;" class="btn btn-lg btn-success">Submit</button> -->
</div>
</form>
</div>
</div>

<div style = "color:white;" id = 'reviewid' class = "reviewid"> 
    <?php  echo $_GET['id']; ?>
</div> 


<script>

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
 function result()
{
//Rating : Count
//Review : Comment(id)
alert("Rating : "+count+"\nReview : "+document.getElementById("comment").value);
}
}

function edit () {
    event.preventDefault();
    var reviewid = document.getElementById("reviewid").innerHTML;
    var rating = count;
    let review = document.getElementById("comment").value;
    console.log(reviewid );
    console.log(rating);
    console.log(review);
    
		$.ajax({
			
			url : 'edit.php',		
            method : 'POST',				
			data: { reviewid: reviewid, rating: rating, review: review },
			success:function(data){
				if(data = 1) {
          alert("Review succesfully Updated");
					$("#ratingForm")[0].reset();
					
				}
			}
		});		  
}


</script>
    
</body>
</html>