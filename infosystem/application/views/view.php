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
          
           <div id="container">
    
    <table class="table table-hover">
        <thead>
    <tr class="info">
      <th>#</th>
      <th>Subject</th>
      <th>Uploaded By:</th>    
      <th>Date</th>
      <th>View File</th>
      <th>Download</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <?php foreach ($news as $news_item): ?>
    <?php echo "<td>".$news_item['id']."</td>" ?>
    <?php echo "<td>".$news_item['subject']."</td>" ?>
    <?php echo "<td>".$news_item['uploader']."</td>" ?>
    <?php echo "<td>".$news_item['date']."</td>" ?>
    <?php echo "<td><a href=".base_url()."index.php/news/view_news/".$news_item['id'].">View News</a>" ?>
    <?php 
    if($news_item['file']!='null')
    {
    echo "<td><a href=".base_url()."index.php/news/download/".$news_item['file'] .">Download</a></td>";
    }
    else
    {
     echo "<td>Download</td>";
    }
    ?>
    </tr>
    <?php endforeach ?>
</tbody>
   </table>
 </div>

    <?php echo $this->pagination->create_links(); ?>
    
      </div><!--/row-->
    </div><!--/.fluid-container-->

  </body>
</html>
    