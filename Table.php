<?php

If(isset($_POST['submit']))
header("location:Table.php");
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Book Your Study Table at the MGCL</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta name="author" content="Jitesh Jain">
</head>
<style >
	.error {color: #FF0000;}


* {
			box-sizing: border-box;
		}


	div{
        color:rgb(240,236,26);
		font-style: italic;
	    font-family: "Times New Roman",sans-serif;
		font-size: 125%;
		}

		body{ background-color: rgb(0,0,0);

		}

	.enter{
		color:rgb(240,236,26);
		font-size: 125%;
		font-style: italic;
		text-align: center;




	}
		section:after {
 				content: "";
 				display: table;
  				clear: both;
			}


			footer{
			text-align: center;
			margin-left:15%;
    		margin-right:15%;
			color:rgb(240,236,26);
			font-style: italic;
	    	font-family: "Times New Roman",sans-serif;
			font-size: 125%;
			width: 70%;
			padding: 20px;
			position: fixed;
  			bottom: 0;
  			background-color: rgb(50,50,50);
		}

</style>
<body>


	<section>
<div style=" border: 0.05px solid orange" >
	<pre>
	<h1 style=" text-align: left;text-decoration: none" > LibSeat                                       Book Your Study Table!!                       @ MGCL,IIT Roorkee</h1>
</pre>
</div>
<br><br>
<?php

 $date1Err = $time1Err = $durErr = $floorErr = "";
 $date1 = $time1 = $dur = $floor = $comment = ""; 

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	if (empty($_POST["date1"])) {
    $date1Err = "Date is required";
  } else {
    $date1 = test_input($_POST["date1"]);
  
  } 

    if (empty($_POST["time1"])) {
    $time1Err = "Time is required";
  } else {
    $time1 = test_input($_POST["time1"]);
  
  }
    

    if (empty($_POST["dur"])) {
    $durErr = "Time is required";
  } else {
    $dur = test_input($_POST["dur"]);
  }
    

    if (empty($_POST["floor"])) {
    $floorErr = "Floor is required";
  } else {
    $floor = test_input($_POST["floor"]);
  }
     

    if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }   

}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
<div style="width: 20%; float: right;">
				<img src="1st.jpg"  style="width: 300px; height: 300px; float: right">
			</div>

<div style="border: 1px solid red;width: 75%">
<h2 class="enter" style="text-align: center">Book Your Seat</h2>
<p style="text-align: center;font-style: italic;font-size: 110%"><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
    
  <p class="enter">Date : <input type="date" name="date" value="<?php echo $date1;?>">
  <span class="error">* <?php echo $date1Err;?></span></p>

 <p class="enter"> Time(Start) : <input type="time" min = "08:30"  name="time" value="<?php echo $time1;?>">
  <span class="error">* <?php echo $time1Err;?></span></p>
  
<p class="enter">  Time(End) : <input type="time" max = "23:59" name="time" value="<?php echo $time2;?>">
  <span class="error">* <?php echo $durErr;?></span></p> 
  
 <p class="enter"> Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea></p>
  
  <p class="enter">Floor:
  <input type="radio" name="floor" <?php if (isset($floor) && $floor=="Ground") echo "checked";?> value="Ground">Ground
  <input type="radio" name="floor" <?php if (isset($floor) && $floor=="First") echo "checked";?> value="First">First
  <input type="radio" name="floor" <?php if (isset($floor) && $floor=="Second") echo "checked";?> value="Second">Second
  <span class="error">* <?php echo $floorErr;?></span></p>

  
 <pre>                                                              <button><a style="color: blue;font-style: italic;font-family: sans-serif;font-size: 150%;text-decoration: none" href="Conf.htm" target="_self">Book</a></button>  </pre>
</form>
	
		</div>

<br/><br/><br/>

	<div style="width: 20%; float: left;font-size: 150%;">
				<a  href="http://mgcl.iitr.ac.in/Docs/fp.pdf" style="color: rgb(3,252,240)">Layout</a>
				
			</div>


			
	</section>
	<footer>
			Note:Please note that after booking if you are not found present inside the library within a span of 1 hour from the time of booking then your user id will be deactivated for 24 hours. So, make sure that you mark your attendence in library. For more information visit <a href="http://mgcl.iitr.ac.in/" style="color: #00ffff">http://mgcl.iitr.ac.in/</a> 
		</footer>




</body>

	
</html>