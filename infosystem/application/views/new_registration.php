<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Uploader Regisration!</title>


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
	
<?php  echo form_open('new_registration/submit');    ?>

<fieldset>

<legend>Registration</legend>
<?php echo  validation_errors("<div class='text-error'>","</div>");  ?>


<label class="control-label">Your Complete Name</label>
<input type="text" id="uploader_name" name="uploader_name" required/>

<label for="uploader_email">Email</label>
<input type="email" id="uploader_email" name="uploader_email" required/>

<label for= "password">Password</label>
<input type="password" name="uploader_password" required/>


<button type="submit" class="btn btn-success" id="submit_button" >Create My Account</button>


</fieldset>
</form>

</div>
</body>

</html>