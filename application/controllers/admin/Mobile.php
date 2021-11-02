<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mobile extends CI_Controller {

    public function __construct(){
        parent::__construct();
       
        $this->load->model('common_model');
        $this->load->model('store_model');
    }
    
    
       public function mobileorderstatus()
    {
        $data = array();
        $data['page_title'] = 'Pending Report';
        if($this->input->server('REQUEST_METHOD') === 'GET'){
           // echo "POST";
           // die();
           $data['condition']=array(
               'order_no'=> $this->input->get('order_no'),
               'store_id'=> $this->input->get('store_id')
           );
           $data['condition'] = $this->security->xss_clean($data['condition']);
           $data['challans']=$this->common_model->pendingorderreport($data['condition']);
           $data['stores']=$this->store_model->get_all_stores();
          
        }   

        
        $data['main_content'] = $this->load->view('admin/reports/mobileorderstatus', $data, TRUE);
        $this->load->view('admin/index_mobile', $data);
    }


    
}