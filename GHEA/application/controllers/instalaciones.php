<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Instalaciones extends CI_Controller {

	
	public function galeria()
	{
                $data['main_content'] = 'galeria';
		$this->load->view('template',$data);
	}
        
        //la vaina es igual pa lo demas
}

/* End of file instalaciones.php */
/* Location: ./application/controllers/instalaciones.php */