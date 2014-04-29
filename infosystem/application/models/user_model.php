<?php

class User_model extends CI_model
{
	public function store()
	{
		$datestring = "%Y-%m-%d";
        $time = time();

        
		$data = array(
		'user_name' => $this->input->post('user_name'),
		'user_email' => $this->input->post('user_email'),
		'user_password' => sha1($this->input->post('user_password')),
		'date' => mdate($datestring, $time),
		'user_class' => $this->input->post('class')
		
		);


		$this->db->insert('users', $data);
	}

	public function login()
	{
		$array = array(
						'user_email' => $this->input->post('user_email'),
			            'user_password' => sha1($this->input->post('user_password')),
                      );
		
		
		
		$query = $this->db->get_where('users', $array,1);
		


		if($query->num_rows()==1)
          	{
          	
          		$user = $query->result_array();
          		setcookie('user_email',$this->input->post('user_email'),time()+5000,'/');
          		setcookie('user_name',$user[0]['user_name'],time()+5000,'/');
          		header('Location:'.base_url());
          	}   
        else
        	{
        		echo "<div style='position : fixed; left : 420px; top : 75px;' class='text-error'>Probably you used wrong Combination of password and Email";
        		echo "Please Try again</div>";

        		$this->load->view('user_login');
        		$this->load->view('footer');

        	}
	}

}

?>