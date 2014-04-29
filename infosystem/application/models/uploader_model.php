<?php

class Uploader_model extends CI_Model
{
	////////////////////////////////////////////////////////////////////////////////////
	public function store()
	{
		$datestring = "%Y-%m-%d";
        $time = time();

        
		$data = array(
		'uploader_name' => $this->input->post('uploader_name'),
		'uploader_email' => $this->input->post('uploader_email'),
		'uploader_password' => sha1($this->input->post('uploader_password')),
		'date' => mdate($datestring, $time)
		
		);


		$this->db->insert('uploaders', $data);

	}


///////////////////////////////////////////////////////////////////////////////////////////
	public function login()
	{

		$array = array(
						'uploader_email' => $this->input->post('uploader_login_email'),
			            'uploader_password' => sha1($this->input->post('uploader_login_password')),
                      );
		
		
		
		$query = $this->db->get_where('uploaders', $array,1);
		


		if($query->num_rows()==1)
          	{
          	
          		$user = $query->result_array();
          		setcookie('uploader_email',$this->input->post('uploader_login_email'),time()+3600,'/');
          		setcookie('uploader_name',$user[0]['uploader_name'],time()+3600,'/');
          		header('Location:'.base_url().'index.php/jss_admin/');
          	}   
        else
        	{
        		echo "<div style='position : fixed; left : 420px; top : 75px;' class='text-error'>Probably you used wrong Combination of password and Email";
        		echo "Please Try again</div>";

        		$this->load->view('uploader_login');
        		$this->load->view('footer');

        	}
	}
/////////////////////////////////////////////////////////////////////////////////
	

/////////////////////////////////////////////////////////////////////////////////////////
	public function check_if_loggined()
	{
		
		if(isset($_COOKIE['uploader_email']))
			return TRUE;
		else
			return FALSE;
	}
/////////////////////////////////////////////////////////////////////////////////////////
	public function logout()
	{
			setcookie('uploader_email','',time()-3600,'/');
			setcookie('uploader_name','',time()-3600,'/');
	}
}



?>