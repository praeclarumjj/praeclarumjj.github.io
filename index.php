<?php

 // define variables and set to empty values
$passwordErr = $emailErr = "";
$password = $email = "";


// Validate credentials
    if(empty($emailErr) && empty($passwordErr)){
        // Prepare a select statement
        $sql = "SELECT 'email,pwd,id' FROM 'users' WHERE 'email' = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $email;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt,$email);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $rows['pwd'])){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["email"] = $email;                            
                            
                            // Redirect user to welcome page
                            header("location: Table.php");
                        } else{
                            // Display an error message if password is not valid
                            $passwordErr = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $usernameErr = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
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

	.enter{
		color:rgb(240,236,26);
		font-size: 125%;
		font-style: italic;
		text-align: center;




	}

.error {color: #FF0000;}

	.divis{
        
		color:rgb(240,236,26);
		font-style: italic;
	    font-family: "Bell MT";
		font-size: 125%;
		}




		body{ background-color: rgb(0,0,0);

		}

</style>
<body>
<div class="divis" style=" border: 0.05px solid orange" >
	<pre>
	<h1  style=" text-align: left;text-decoration: none" > LibSeat                        Book Your Study Table!!           @ MGCL,IIT Roorkee</h1>
</pre>
</div>
<br><br>
<img src="1st.jpg"  style="width: 300px;height: 300px;float: right;border-color: rgb(240,236,36);border-width: 1px">

<?php


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<div style="border: 1px solid red;width: 75%">
<h2 class="enter" style="text-align: center">Login</h2>

<p style="text-align: center;font-style: italic;font-size: 110%"><span class="error">* required field</span></p>
<form method="post" action="Login.php">

<pre><p class="enter">Email-Id : <input type="text" name="email" value="<?php echo $email;?>" ><span class="error"> *<?php echo $emailErr;?></span>  </p></pre>

 <pre><p class="enter">Password :  <input type="password" name="password" value="<?php echo $password;?>"><span class="error"> *<?php echo $passwordErr;?></span></p></pre>
   <br>
 <pre>    <a style="color:  rgb(3,156,24);font-size: 105%;font-family: sans-serif;" href="http://people.iitr.ernet.in/login/?next=/">Forgot Password? (change it on Channeli)</a>                                <button type="submit"><a style="color: blue;font-style: italic;font-family: sans-serif;font-size: 125%" href="Table.php">Login </pre> 
 <br><br><br>
</form>

</div>


	



</body>

	
</html>