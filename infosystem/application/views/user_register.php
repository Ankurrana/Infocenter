<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>User Register</title>


</head>
<body>
<style>
.registration,input
{
   margin-left: 400px;
   padding: 50px;
}

#submit_button
{
	display: block;
	margin-top: 30px;
}
</style>



<?php $this->load->view('sidebar'); ?>
<div class="registration">
	
<?php  echo form_open('user/user_register');    ?>

<fieldset>

<legend>Registration</legend>
<?php echo  validation_errors("<div class='text-error'>","</div>");  ?>


<label class="control-label">Your Complete Name</label>
<input type="text" id="user_name" name="user_name" required/>

<label for="class">You belong to</label>
<Select name="class">
	  		<option value="CS1">CS1</option>
            <option value="CS2">CS2</option>
            <option value="EC1">EC1</option>
            <option value="EC2">EC2</option>
            <option value="ME1">ME1</option>
            <option value="ME2">ME2</option>
            <option value="CI1">CI1</option>
            <option value="CI2">CV1</option>
            <option value="EL1">EL1</option>
            <option value="EL2">EL2</option>
            <option value="other1">other1</option>
            <option value="other2">Other2</option>
</select>	  

<label for="user_email">Email</label>
<input type="email" id="user_email" name="user_email" required/>

<label for= "user_password">Password</label>
<input type="password" name="user_password" required/>


<button type="submit" class="btn btn-success" id="submit_button" >Create My Account</button>


</fieldset>
</form>

</div>
</body>

</html>