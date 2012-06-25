<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ingresar extends CI_Controller {

	
	public function login()
	{
                $data['main_content'] = 'login';
		$this->load->view('template',$data);
	}
        
        //la vaina es igual pa lo demas
}

/* End of file ingresar.php */
/* Location: ./application/controllers/ingresar.php */