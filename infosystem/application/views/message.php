<?php
if(isset($_COOKIE['uploader_name']))
{
  $this->load->view('uploader_sidebar');
}
else
{ 
$this->load->view('sidebar'); 
}
?>
<?php

echo heading($message,2,$attr);
$this->load->view('footer');
?>

<style>
#message
{
	margin-top: 200px;
	text-align: center;
}
</style>




