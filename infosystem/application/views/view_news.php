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
  <div class="span9">
  <Title><?php echo $subject ?></title>
	<h1><?php echo $subject ?> </h1>
	<p><?php echo $content ?> <p>
  <?php 
  if($file!='null')
    echo "<a href=".base_url()."index.php/news/download/".$file.">Download</a>"; ?>
	
  <h5><?php echo "<div class=''><i>Posted by ".$uploader ?></i></div> </h5> 

          
      </div><!--/row-->


</div><!--/.fluid-container-->

</body>
</html>

   