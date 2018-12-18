<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Upload extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('pic_model');
		$this->load->library('form_validation');
		
		$this->load->view('header');

	}
	
	public function form(){
		$this->load->view('upload_form');
		$this->load->view('footer');
	}
	
	public function file_data(){
		//validate the form data 

		$this->form_validation->set_rules('pic_title', 'Picture Title', 'required');

        if ($this->form_validation->run() == FALSE){
			$this->load->view('upload_form');
		}else{
			
			//get the form values
			$data['pic_title'] = $this->input->post('pic_title');
			$data['pic_desc'] = $this->input->post('pic_desc');

			//file upload code 
			//set file upload settings 
			$config['upload_path']          = APPPATH. '../assets/uploads/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 1000;

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('pic_file')){
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('upload_form', $error);
			
			}else{

				//file is uploaded successfully
				//now get the file uploaded data 
				$upload_data = $this->upload->data();

				//get the uploaded file name
				$data['pic_file'] = $upload_data['file_name'];

				//store pic data to the db
				$this->pic_model->store_pic_data($data);

				redirect('/');
			}
			$this->load->view('footer');
		}
	}

	public function edit()
    {
        $pic_id = $this->uri->segment(3);

        
        if (empty($pic_id))
        {
            show_404();
        }

        $data['pic_title'] = 'Edit a news item';        

        $data['pic_id'] = $this->pic_model->get_data_by_id($pic_id);
        
        $this->form_validation->set_rules('pic_title', 'Title', 'required');

       $this->form_validation->set_rules('pic_desc', 'Text', 'required');
 
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('edit');
 
        }
        else
        {
        	$data['pic_title'] = $this->input->post('pic_title');
			$data['pic_desc'] = $this->input->post('pic_desc');
            //$this->pic_model->store_pic_data($pic_id);
            //$this->load->view('news/success');
            redirect( base_url() . 'index.php');
           // $this->load->view('edit');

        }
    }

  public function view($pic_id = NULL)
    {
       //  $this->load->view('view', array('error' => ' ' )); 
        $data['pic_id'] = $this->pic_model->get_data_by_id($pic_id);
        
        if (empty($data['pic_id']))
        {
            show_404();
        }
 
        $data['title'] = $data['pic_id']['title'];
 
        $this->load->view('header', $data);
        $this->load->view('view', $data);
        $this->load->view('footer');
    }
    

    public function delete()
    {
        $pic_id = $this->uri->segment(3);
        
        if (empty($pic_id))
        {
            show_404();
        }
                
        $pic= $this->pic_model->get_data_by_id($pic_id);  
        
        $this->pic_model->delete_pic($pic_id); 

        redirect( base_url() . 'index.php');       

    }


}
