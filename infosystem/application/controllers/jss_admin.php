<?php


class Jss_admin extends CI_controller
{
	
	public function index()
	{
		$this->load->model('uploader_model');


		if($this->uploader_model->check_if_loggined())
		{
			


		$config['base_url'] = base_url().'/index.php/jss_admin/index';
		$config['total_rows'] = $this->db->get_where('news_item', array('uploader' => $_COOKIE['uploader_name']))->num_rows();
		$config['per_page'] = 10;
		$config['num_links'] = 5;
		$config['uri_segment'] = 3;
		$this->pagination->initialize($config);

		$this->db->order_by("id", "desc"); 

		$data['news'] = $this->db->get_where('news_item',array('uploader' => $_COOKIE['uploader_name']),$config['per_page'],$this->uri->segment(3))->result_array();
		$this->load->view('profile',$data);
		$this->load->view('footer');

		}
		else
		{
			$this->load->view('uploader_login');
			$this->load->view('footer');
		}

	}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	
	public function login()
	{
		$this->load->model('uploader_model');
		$this->uploader_model->logout();
        $this->form_validation->set_rules('uploader_login_email', 'Email', 'required|valid_email');
	   

		if ($this->form_validation->run() === FALSE)
		{	
			$this->load->view('uploader_login');
			$this->load->view('footer');

		}
		else
		{
				$this->uploader_model->login();		
		}
	}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////


	public function create()
	{
		$this->load->Model('uploader_model');
		if(!$this->uploader_model->check_if_loggined())
		 	{
                 header('Location:'.base_url().'index.php/jss_admin/login');
		 	}
		$this->form_validation->set_rules('subject', 'Subject', 'required');
	    $this->form_validation->set_rules('content', 'News Content', 'required');
	    $this->form_validation->set_rules('tags[]','Tags','required');

	if ($this->form_validation->run() === FALSE)
	{			
		$this->load->view('create');
		$this->load->view('footer');			
	}
	else
	{
		
        
        if($_FILES['file']['size']>0)
        {
        	if($_FILES['file']['error']==0)
        	{
        		$extension = end(explode(".", $_FILES["file"]["name"]));
        		$unique_file_name = uniqid().".".$extension;
        		move_uploaded_file($_FILES['file']['tmp_name'],"uploads/".$unique_file_name);
        		$this->news_model->set_news($unique_file_name);
        		header('Location:'.base_url().'index.php/jss_admin/');
        
        	}
             else
        		echo "There was an error while uploading the file";

        }
		else
		{
			$this->news_model->set_news("null");
			header('Location:'.base_url().'index.php/jss_admin/');
		}  
	}
    }
////////////////////////////////////////////////////////////////////////////////////////////////
	

	public function delete_record($id)
	{
		//Same goes for this function should redirect to the profile page of the uploader!
		if($this->authority_check($id,$_COOKIE['uploader_name']))
		{
		$this->db->delete('news_item', array('id' => $id)); 
	    }
	    else
	    {
	       $data['message'] = "Sorry but you not authorised to make changes on this News item!";
	    	$data['attr']='class="text-error" id="message"';
	    	$this->load->view('message',$data);
	    	
	    }
}

/////////////////////////////////////////////////////////////////////////////////////////////////////
	
	public function edit_record($id)
	{
		if($this->authority_check($id,$_COOKIE['uploader_name']))
		{
		//This function should only run if the news for id=$id belongs to the person logged in else redirect to the profile page of the uplaoder!
		$data = $this->news_model->get_filtered_news('id',$id);
		$this->load->view('edit_news',$data[0]);
		
	    }
	    else
	    {
	    	$data['message'] = "Sorry but you not authorized to make changes on this News item!";
	    	$data['attr']='class="text-error" id="message"';
	    	$this->load->view('message',$data);
	    	
	    }  
	 }


////////////////////////////////////////////////////////////////////////////////////////////
	public function update_record()
	{
		$this->load->Model('uploader_model');
		if(!$this->uploader_model->check_if_loggined())
		 	{
                 header('Location:'.base_url().'index.php/jss_admin/login');
		 	}
		$this->form_validation->set_rules('subject', 'Subject', 'required');
	    $this->form_validation->set_rules('content', 'News Content', 'required');
	    $this->form_validation->set_rules('tags[]','Tags','required');

	if ($this->form_validation->run() === FALSE)
	{			
		$this->load->view('edit_record');
		$this->load->view('footer');			
	}
	else
	{
		
        
        if($_FILES['file']['size']>0)
        {
        	if($_FILES['file']['error']==0)
        	{
        		$extension = end(explode(".", $_FILES["file"]["name"]));
        		$unique_file_name = uniqid().".".$extension;
        		move_uploaded_file($_FILES['file']['tmp_name'],"uploads/".$unique_file_name);
        		$this->news_model->edit_news($unique_file_name,$this->input->post('id'));
        
        	}
             else
        		echo "There was an error while uploading the file";

        }
		else
		{
			$this->news_model->edit_news("null",$this->input->post('id'));
			$data['message'] = "Your News is Successfully Updated!";
			$data['attr'] = 'class="text-info" id="message"';
			$this->load->view('message',$data);
		}  
	}
}






///////////////////////////////////////////////////////////////////////////////////////////////
	public function logout()
	{
		$this->load->model('uploader_model');
		$this->uploader_model->logout();
		header('Location:'.base_url());


	}

//////////////////////////////////////////////////////
  public function authority_check($id,$uploader_name="Ankur rana")
{
	//Returns true if news with id $id belongs to the uploader $uploader_name
	$query = $this->db->get_where('news_item', array('id' => $id, 'uploader' => $uploader_name),1)->num_rows();
	if($query == 1)
	{
		return TRUE;

	}
        return FALSE;
}	





}