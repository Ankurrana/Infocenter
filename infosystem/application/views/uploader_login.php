
<?php
echo doctype();


$this->load->view('sidebar');
?>
<style>
.inputs
{
	margin-left:400px;
	margin-top: 40px;
	display: block;	
}

#buttons
{
   margin-top: 50px;
}


</style>
<?php echo validation_errors("<div class='text-error'>");  ?>
<?php echo form_open('jss_admin/login') ; ?>
<div class="inputs">
<label class="labela" for="email">Email</label>
<input class="input"  type="email" name="uploader_login_email" required>
<label class="labela" for="password">Password</label>
<input type="password" class="input" name="uploader_login_password" required>
</br>
<input  class="btn btn-primary" type="submit">
</div>

