<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reservacion extends CI_Controller {

	
	public function reservar()
	{
                $data['main_content'] = 'reservar';
		$this->load->view('template',$data);
	}
        
        //la vaina es igual pa lo demas
}

/* End of file reservacion.php */
/* Location: ./application/controllers/reservacion.php */