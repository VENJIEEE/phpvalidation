<?php

include("connections.php");

$fname = $lname = $username = $password = $cpassword = $gender = $digit = "";
$fname_err = $lname_err = $username_err = $password_err = $cpassword_err = $gender_err = $digitErr = "";
	
	if(isset($_POST["btnRegister"])){
		
			if(empty($_POST["fname"])){
				$fname_err= "This Field is Required";
			}
			else{
			$fname = $_POST["fname"];
			}
	}	
		
	if(isset($_POST["btnRegister"])){
			if(empty($_POST["lname"])){
					$lname_err= "This Field is Required";
			}
			else{
				$lname = $_POST["lname"];
			}
	}	
	
	if(isset($_POST["btnRegister"])){
			if(empty($_POST["username"])){
				$username_err= "This field is Required";	
			}
			
			else{
				$username = $_POST["username"];
			}
	}
	
	if(isset($_POST["btnRegister"])){
			if(empty($_POST["password"])){
				$password_err = "This Field is Required";
			}	
			
			else{
				$password = $_POST["password"];
			}
	}
	
	if(isset($_POST["btnRegister"])){
			if(empty($_POST["cpassword"])){
				$cpassword_err = "This Field is Required";
			}
		
			else{
				$cpassword = $_POST["cpassword"];
			}
	}
	
	if(isset($_POST["btnRegister"])){
		if(empty($_POST["gender"])){
			$gender_err = "This Field is Required";
		}
		
		else{
			$gender = $_POST["gender"];
		}
		
	}
	
	if(isset($_POST["btnRegister"])){
		if(empty($_POST["digit"])){
			$digitErr = "This Field is Required";
		}
		else{
			$digit = $_POST["digit"];
		}
	}
	
	
	if($fname && $lname && $username && $password && $cpassword && $gender && $digit){
		if(!preg_match("/^[a-zA-Z ]*$/",$fname)){
				$fname_err = "Letters and Spaces are the... anghirap englishin, wag kang jejemon.";
		}
		
		else{
		if(!preg_match("/^[a-zA-Z ]*$/",$lname)){
				$lname_err = "Letters and Spaces are the... anghirap englishin, wag kang jejemon.";
		}
		
		else{
		if(!preg_match("/^[0-9 ]*$/",$digit)){
				$digitErr = "Phone Number should only contain numbers";
		}
		
		else{
			$count_first_name_string = strlen($fname);
			if($count_first_name_string < 2){
				$fname_err = "First Name is too short";
			}
		
		else{
			$count_last_name_string = strlen($lname);
			if($count_last_name_string < 2){
				$lname_err = "Last Name is too short";
			}
		
		else{
			$count_Phone_string = strlen($digit);
			if($count_Phone_string < 11){
				$digitErr = "Phone Number must be 11 digits";
			}	
		
		else{
		
			if($password != $cpassword){
				$cpassword_err = "Password dont match";
			}
		
		else{
			$pass_string = strlen($password);
			if($pass_string < 8){
				$password_err = "Password should contain atleast 8 characters";
		}
		
	
		else{
		
		$user_check = mysqli_query($connections,"SELECT * FROM customertbl WHERE username='$username'");
		$user_check_row = mysqli_num_rows($user_check);
		if($user_check_row > 0){	
			$username_err = "Email is Already Registered";
		}
		
		
		
		else{
			mysqli_query($connections, "INSERT INTO customertbl(first_name,last_name,gender,mobile,username,password) 
			
			VALUES('$fname','$lname','$gender','$digit','$username','$cpassword')");
			
			echo "<script language = 'javascript'>alert('New Record has been Added')</script>";
			echo "<script language>window.location.href='Index.php';</script>";
		
		
			
		}
		}
		
		
		}
		}
	}	
	}
	}
	}
	}
	}
	
	
	
?>

<style>
.error{
		color:red;
}
</style>

<form method = "POST" action = "<?php htmlspecialchars("PHP_SELF"); ?>">
<br>
<center>

<tr>
	<td>
		First Name:<input type="text" name="fname" placeholder="First Name" value="<?php echo $fname?>"<?php echo $fname ?>"> 
	</td>
</tr><br>
<span class="error"><?php echo $fname_err; ?></span><br>

<tr>
	<td>
		Last Name:<input type="text" name="lname" placeholder="Last Name" value="<?php echo $lname?>"<?php echo $lname ?>"> 
	</td>
</tr><br>
<span class="error"><?php echo $lname_err; ?></span><br>

<tr>
	<td>
		Username:<input type="text" name="username" placeholder="Username" value="<?php echo $username?>"<?php echo $username ?>">
	</td>
</tr><br>
<span class="error"><?php echo $username_err; ?></span><br>

<tr>
	<td>
		Password:<input type="password" name="password" placeholder="Password" value="<?php echo $password?>"<?php echo $password ?>">
	</td>
</tr><br>
<span class="error"><?php echo $password_err; ?></span><br>

<tr>
	<td>
		Confirm Password:<input type="password" name="cpassword" placeholder="Password" value="<?php echo $cpassword?>"<?php echo $cpassword ?>">
	</td>
</tr><br>
<span class="error"><?php echo $cpassword_err; ?></span><br>



<tr>
	<td>
	Gender:<select name="gender">
		<option name="gender" value="" disabled selected hidden>Select Gender</option>
		<option name="gender" value="Male" <?php if($gender == "Male") {echo "selected";} ?> >Male</option>
		<option name="gender" value="Female" <?php if($gender == "Female"){echo "selected";}?> >Female</option>
	</select>	
	</td>
</tr>
<br>
<span class="error"><?php echo $gender_err; ?></span><br>

<tr>
		Mobile Number:<input type="text" name="digit" placeholder="Phone" value="<?php echo $digit?>"<?php echo $digit?>" maxlength="11">
	
	</td>
</tr>
<span class="error"><br><?php echo $digitErr; ?></span><br><br>


<tr>
	<td>
		<input type="submit" name="btnRegister" value="Register"> <br>
	</td>
</tr>




</form>
