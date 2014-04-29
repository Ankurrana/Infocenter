<?php
$i=0;
$this->load->view('sidebar');
?>
<div class="span9">
          
    <div id="container">
    
    <table class="table table-hover">
    <thead>
    <tr class="info">
    <th>#</th>
    <th>Name</th>    
    </tr>
  	</thead>
  	<tbody>
    <tr>
    <?php foreach ($uploaders as $uploader): ?>
    <?php echo "<td>".++$i."</td>" ?>
    <?php echo "<td id=".$uploader['uploader_name']."><a href=".base_url()."/index.php/news/filtered_search/uploader/".underscore($uploader['uploader_name']).">".$uploader['uploader_name']."</a></td>" ?>
   
    </tr>
    <?php endforeach ?>
	</tbody>
   	</table>
 	</div>

    
    </div><!--/row-->
</div><!--/.fluid-container-->

