<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contacto extends CI_Controller {

	
	public function contact()
	{
                $data['main_content'] = 'contact';
		$this->load->view('template',$data);
	}
        
        //la vaina es igual pa lo demas
}

/* End of file contacto.php */
/* Location: ./application/controllers/contacto.php */
