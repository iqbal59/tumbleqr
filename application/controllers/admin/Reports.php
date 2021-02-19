<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reports extends CI_Controller {

	public function __construct(){
        parent::__construct();
        check_login_user();
       $this->load->model('common_model');
    }


    public function initial()
    {
        $data = array();
        $data['page_title'] = 'Reports Initial Stage';
        if($this->input->server('REQUEST_METHOD') === 'GET'){
           // echo "POST";
           // die();
           $data['condition']=array(
               'from_date'=> $this->input->get('s_from_date'),
               'to_date'=> $this->input->get('s_to_date')
           );
           $data['condition'] = $this->security->xss_clean($data['condition']);
           $data['challans']=$this->common_model->getInitialData($data['condition']);

        }   

        
        $data['main_content'] = $this->load->view('admin/reports/initial', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

   

}