<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quienesomos extends CI_Controller {

	
	public function info()
	{
                $data['main_content'] = 'quienesomos';
		$this->load->view('template',$data);
	}
        
        //la vaina es igual pa lo demas
}

/* End of file quienesomos.php */
/* Location: ./application/controllers/quienesomos.php */