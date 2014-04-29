<?php $this->load->view('uploader_sidebar'); ?>
        <style>

#multi 
{
  height:190px;
  width: 250px;
  
  display: inline;
  margin-top: 80px;
}

#multi option
{
  color: blue;
  background-color: #ddffff;
  
}
#content
{
  height:310px;
  width:500px;
  resize:none;
}

#subject
{
  width:508px;
}

#select_all, #select_all_label
{
  display:inline;
}

#button
{
  margin: 20px;
  margin-top: 40px;
}
#span4
{
  margin-left: 80px;
}




</style>
        <div class="span4">
        	<h3>Create a New Notice</h3>
   
<?php echo validation_errors(); ?>

<?php echo form_open_multipart('jss_admin/create') ?>

	<label for="subject">Title</label> 
	<input type="input" name="subject" required id="subject"/><br />

	<label for="content">Content</label>
	<textarea name="content" required id="content" fixed></textarea><br />

	
	

    
    </div>
    <div class="span4" id="span4">
	
	
	<select name="tags[]" multiple id='multi' required>
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
	

    <label for="file">File</label>
	  <?php echo form_upload("file","file"); ?>
	  <input type="submit" name="submit" value="Create News" class="btn btn-primary" id="button" />
    <?php form_close(); ?>
    </form>
          
    </div>


  </div>

</body>
</html>





