<?php 
class New_registration extends CI_Controller
{
	public function index()
	{
		$this->load->view('new_registration');
		$this->load->view('footer');
	}


	public function submit()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('uploader_email', 'Email', 'required|is_unique[uploaders.uploader_email]');
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('new_registration');
			$this->load->view('footer');
		}
		else
		{
  			$this->load->model('uploader_model');
  			$this->uploader_model->store();
        	$data['message'] = "Welcome User!You have successfully signed up";
  			$data['attr'] = "class='text-success' id='message'";
			$this->load->view('message',$data);
		}
	}


} 