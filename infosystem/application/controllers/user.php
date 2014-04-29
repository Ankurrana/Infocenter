<?php 

class User extends CI_Controller
{
	//////////////////////////////////////////////////////////////////////////////////////////////////////
	public function user_register()
	{

		$this->form_validation->set_rules('user_email', 'Email', 'required|is_unique[users.user_email]');
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('user_register');
			$this->load->view('footer');
		}
		else
		{
  			$this->load->model('user_model');
  			$this->user_model->store();
        	$data['message'] = "Welcome User! You have successfully signed up";
  			$data['attr'] = "class='text-success' id='message'";
			$this->load->view('message',$data);
		}
	}
////////////////////////////////////////////////////////////////////////////////////////////////////
	public function login()
	{
		$this->form_validation->set_rules('user_email', 'Email', 'required|valid_email');
	   

		if ($this->form_validation->run() === FALSE)
		{	
			$this->load->view('user_login');
			$this->load->view('footer');

		}
		else
		{			
				$this->user_model->login();		
		}


	}
///////////////////////////////////////////////////////////////////////////////////////////////
	public function logout()
	{
		setcookie('user_email','',time()-3600,'/');
		setcookie('user_name','',time()-3600,'/');
		header('Location:'.base_url());
	}
////////////////////////////////////////////////////////////////////////////////////////////////
 	public function check_if_loggined()
	{
		
		if(isset($_COOKIE['user_email']))
			return TRUE;
		else
			return FALSE;
	}
///////////////////////////////////////////////////////////////////////////
    
    
}

?>