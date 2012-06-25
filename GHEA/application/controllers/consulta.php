<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Consulta extends CI_Controller {

	
    public function consultar()
    {
            $data['main_content'] = 'consultar';
            $this->load->view('templateconsulta',$data);
    }
        
    
}

/* End of file principal.php */
/* Location: ./application/controllers/principal.php */

/*
function Form()
{
    parent::Controller();   
}

function index()
{   
        $this->load->view('form');
}

function search()
{
        $term = $this->input->post('search');
        /*
            In order for this to work you will need to 
            change the method on your form.
            (Since you do not specify a method in your form, 
            it will default to the *get* method -- and CodeIgniter
            destroys the $_GET variable unless you change its 
            default settings.)

            The *action* your form needs to have is
            index.php/form/search/
        *//*
        //Operate on your search data here.
        //One possible way to do this:
        $this-load-model('search_model');
        $results_from_search = $this->search->find_data($term);
        // Make sure your model properly escapes incoming data.
        $this->load->view('results', $results_from_search);
}
*/