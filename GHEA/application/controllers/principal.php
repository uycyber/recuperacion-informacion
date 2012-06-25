<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Principal extends CI_Controller {

	
	public function index()
	{
                $data['main_content'] = 'index';
		$this->load->view('template',$data);
	}
        
        //la vaina es igual pa lo demas
}

/* End of file principal.php */
/* Location: ./application/controllers/principal.php */