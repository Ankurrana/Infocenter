<?php

class News_model extends CI_Model
{
    public function set_news($unique_file_name)
	{
		$datestring = "%Y-%m-%d";
        $time = time();
        $this->load->library('typography');

        $data = array(
		'subject' => $this->input->post('subject'),
		'file' => $unique_file_name,
		'content' => $this->typography->auto_typography($this->input->post('content')),
		'date' => mdate($datestring, $time),
		'uploader' => $_COOKIE['uploader_name'],
		);


		$this->load->dbforge();

	    $this->db->insert('news_item', $data);

	    $query = $this->db->get('news_item');
        $result = $query->last_row('array');

   
        foreach ($this->input->post('tags') as $tag) 
  		{
  		    //Tag is the name of the field like CS1, CS2  etc! , I am creating a new table if it doesnot exist

  		    $this->create_field_and_table($tag);
  		    
  		    $data = array(
		                   'id' => $result['id'],
		                 );		    	
        	$this->db->insert($tag,$data);
        }

        

	}
///////////////////////////////////////////////////////////////////////////////////////



	public function edit_news($unique_file_name,$id)
	{
		$datestring = "%Y-%m-%d";
        $time = time();
        $this->load->library('typography');

        $data = array(
		'subject' => $this->input->post('subject'),
		'file' => $unique_file_name,
		'content' => $this->typography->auto_typography($this->input->post('content')),
		'date' => mdate($datestring, $time),
		'uploader' => $_COOKIE['uploader_name'],
		);

		$this->db->where('id', $id);
		$this->db->update('news_item', $data); 
  
	}





///////////////////////////////////////////////////////////////////////
	public function get_all_news()
	{
		$query = $this->db->get('news_item');
		return $query->result_array();
	}

////////////////////////////////////////////////////////////////////////////////
	public function get_filtered_news($propertie,$value)
	{
		$query = $this->db->get_where('news_item', array($propertie => $value));
		return $query->result_array();
	}


//////////////////////////////////////////////////////////////////////////////////
	public function create_field_and_table($table_name)
	{
	  //This creates a new Table in the database if a particular id doesn't exist! It eases the database system	iff a new section is added!
		$this->dbforge->add_field("id INT(10) NOT NULL");
		$this->dbforge->create_table($table_name,TRUE);
	}


//////////////////////////////////////////////////////////////////////////////////

}

?>