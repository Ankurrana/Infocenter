<?php

class News extends CI_Controller
{
	public function index()
	{
		$this->load->view('index');
		
	}

 	public function main()
	{
		//Make changes in the get_all function in the news controller if you ever change the configuration!
		$this->load->library('pagination');
		
		$config['base_url'] = base_url().'/index.php/news/main';
		$config['total_rows'] = $this->db->get('news_item')->num_rows();
		$config['per_page'] = 10;
		$config['num_links'] = 5;
		

		
		$this->db->order_by("id", "desc"); 

		$this->pagination->initialize($config);
		$data['news'] = $this->db->get('news_item',$config['per_page'],$this->uri->segment(3))->result_array();
		   
		$this->load->view('view',$data);
		$this->load->view('footer');

	}

//////////////////////////////////////////////////////////////////////////////////////////////////
	public function filtered_search($propertie="uploader",$value='ankurrana')
	{
      //for filtered search according to the searching propertie (like id and uploader) and its value @value
		$this->load->library('pagination');
   		$this->load->helper('inflector');



		$config['base_url'] = base_url().'/index.php/news/filtered_search/'.$propertie."/".$value;
		$config['total_rows'] = $this->db->get_where('news_item', array($propertie => humanize($value)))->num_rows();
		$config['per_page'] = 10;
		$config['num_links'] = 5;
		$config['uri_segment'] = 5;
		$this->pagination->initialize($config);

		$this->db->order_by("id", "desc"); 

		$data['news'] = $this->db->get_where('news_item',array($propertie => humanize($value)),$config['per_page'],$this->uri->segment(5))->result_array();
		
		$this->load->view('view',$data);
		$this->load->view('footer');
		

	}
///////////////////////////////////////////////////////////////////////////////////////////////////
	public function section_view($section)
	{
		//Acceopts a section name like cs1 and returns details of all the ids mentioned in the section table using the
		
		$this->load->library('pagination');
		
		$config['base_url'] = base_url().'/index.php/news/section_view/'.$section;
		$config['total_rows'] = $this->db->get($section)->num_rows();
		$config['per_page'] = 10;
		$config['num_links'] = 2;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);

		$ids = $this->db->get($section)->result_array();
		foreach($ids as $id)
             $this->db->or_where('id', $id['id']);
        
        $this->db->order_by('id','desc');
        $data['news'] = $this->db->get('news_item',$config['per_page'],$this->uri->segment(4))->result_array();

        $this->load->view('view',$data);
        $this->load->view('footer');

	}
//////////////////////////////////////////////////////////////////////////////////////////////////////
	
	public function download($name)
	{
		if(isset($_COOKIE['user_name']) || isset($_COOKIE['uploader_name']))
		{
		$this->load->helper('file');
		
		$this->load->helper('download');
        $url = base_url()."/uploads/".$name;
        $data = file_get_contents($url);
        force_download($name,$data);
        }
        else
        {
        	header('Location:'.base_url().'index.php/user/login');
        }
        
	}

 ///////////////////////////////////////////////////////////////////////////////////////////////////////////////  
	public function view_news( $id = 1)
	{
		if(isset($_COOKIE['user_name']) || isset($_COOKIE['uploader_name']))
		{



		if(isset($_POST['id']))
		{

			$id=$this->input->post( 'id');
		}

		$data = $this->news_model->get_filtered_news('id',$id);
	    if($data == TRUE)
	    {
		$this->load->view('view_news',$data[0]);
		$this->load->view('footer');
        }
        else
        {
        	$data['message']="Your requested file doesn't exists";
        	$data['attr']='class="text-error" id="message"';
        	$this->load->view('message',$data);
        }
        }
        else
        {
        	
           header('Location:'.base_url().'index.php/user/login');
        }
	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



public function search_by_uploader()
{
	$this->load->helper('inflector');
	$this->db->select('uploader_name');

	$data['uploaders'] = $this->db->get('uploaders')->result_array();
	
	$this->load->view('search_by_uploader',$data);
	$this->load->view('footer');
}

}



?>




