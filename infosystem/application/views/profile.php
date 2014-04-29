<?php $this->load->view('uploader_sidebar'); ?>
        <div class="span9">
             <div id="container">
    
    <table class="table table-hover">
        <thead>
    <tr class="info">
      <th>#</th>
      <th>Subject</th>
      <th>Uploaded By:</th>    
      <th>Date</th>
      <th>Edit news</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <?php foreach ($news as $news_item): ?>
    <?php echo "<td>".$news_item['id']."</td>" ?>
    <?php echo "<td>".$news_item['subject']."</td>" ?>
    <?php echo "<td>".$news_item['uploader']."</td>" ?>
    <?php echo "<td>".$news_item['date']."</td>" ?>
    <?php echo "<td><a href=".base_url()."index.php/jss_admin/edit_record/".$news_item['id'].">Edit News</a>" ?>
    <td><a href=<?php echo base_url()."index.php/jss_admin/delete_record/".$news_item['id'];?> target="_blank">Delete</a></td>
    





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