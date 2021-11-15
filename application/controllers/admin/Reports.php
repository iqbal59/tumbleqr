<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reports extends CI_Controller {

    public function __construct(){
        parent::__construct();
        check_login_user();
        $this->load->model('common_model');
        $this->load->model('store_model');
    }
    
    
    
     public function initial()
    {
        $data = array();
        $data['page_title'] = 'Pending Report';
        if($this->input->server('REQUEST_METHOD') === 'GET'){
           // echo "POST";
           // die();
           $data['condition']=array(
               'from_date'=> $this->input->get('s_from_date')?$this->input->get('s_from_date'):date('Y-m-d'),
               'to_date'=> $this->input->get('s_to_date')?$this->input->get('s_to_date'):date('Y-m-d'),
               'store_id'=> $this->input->get('store_id')
           );
           $data['condition'] = $this->security->xss_clean($data['condition']);
           $data['challans']=$this->common_model->getInitialData($data['condition']);
           $data['stores']=$this->store_model->get_all_stores();
          

        }   

        
        $data['main_content'] = $this->load->view('admin/reports/initial', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    
     public function initialcomplete()
    {
        $data = array();
        $data['page_title'] = 'Pending Report';
        if($this->input->server('REQUEST_METHOD') === 'GET'){
           // echo "POST";
           // die();
           $data['condition']=array(
               'from_date'=> $this->input->get('s_from_date')?$this->input->get('s_from_date'):date('Y-m-d'),
               'to_date'=> $this->input->get('s_to_date')?$this->input->get('s_to_date'):date('Y-m-d'),
               'store_id'=> $this->input->get('store_id')
           );
           $data['condition'] = $this->security->xss_clean($data['condition']);
           $data['challans']=$this->common_model->getInitialCompleteData($data['condition']);
           $data['stores']=$this->store_model->get_all_stores();
          

        }   

        
        $data['main_content'] = $this->load->view('admin/reports/initialcomplete', $data, TRUE);
        $this->load->view('admin/index', $data);
    }
    
    
    
     public function initialtotal()
    {
        $data = array();
        $data['page_title'] = 'Pending Report';
        if($this->input->server('REQUEST_METHOD') === 'GET'){
           // echo "POST";
           // die();
           $data['condition']=array(
               'from_date'=> $this->input->get('s_from_date')?$this->input->get('s_from_date'):date('Y-m-d'),
               'to_date'=> $this->input->get('s_to_date')?$this->input->get('s_to_date'):date('Y-m-d'),
               'store_id'=> $this->input->get('store_id')
           );
           $data['condition'] = $this->security->xss_clean($data['condition']);
           $data['challans']=$this->common_model->getInitialTotalData($data['condition']);
           $data['stores']=$this->store_model->get_all_stores();
            $data['initial_stations']=$this->common_model->getInitialStations();
          

        }   

        
        $data['main_content'] = $this->load->view('admin/reports/initialtotalreport', $data, TRUE);
        $this->load->view('admin/index', $data);
    }
    
    
    
    
    
     public function initialhourly()
    {
        $data = array();
        $data['page_title'] = 'Pending Report';
        if($this->input->server('REQUEST_METHOD') === 'GET'){
           // echo "POST";
           // die();
           $data['condition']=array(
               'from_date'=> $this->input->get('s_from_date')?$this->input->get('s_from_date'):date('Y-m-d'),
               'to_date'=> $this->input->get('s_to_date')?$this->input->get('s_to_date'):date('Y-m-d'),
               'store_id'=> $this->input->get('store_id')
           );
           $data['condition'] = $this->security->xss_clean($data['condition']);
           $data['challans']=$this->common_model->getInitialDataHourly($data['condition']);
           $data['stores']=$this->store_model->get_all_stores();
           $data['initial_stations']=$this->common_model->getInitialStations();

        }   

        
        $data['main_content'] = $this->load->view('admin/reports/initialhourly', $data, TRUE);
        $this->load->view('admin/index', $data);
    }
    
    
    
    /*********SPot******/
     public function spotcomplete()
    {
        $data = array();
        $data['page_title'] = 'Pending Report';
        if($this->input->server('REQUEST_METHOD') === 'GET'){
           // echo "POST";
           // die();
           $data['condition']=array(
               'from_date'=> $this->input->get('s_from_date')?$this->input->get('s_from_date'):date('Y-m-d'),
               'to_date'=> $this->input->get('s_to_date')?$this->input->get('s_to_date'):date('Y-m-d'),
               'store_id'=> $this->input->get('store_id')
           );
           $data['condition'] = $this->security->xss_clean($data['condition']);
           $data['challans']=$this->common_model->getSpotCompleteData($data['condition']);
           $data['stores']=$this->store_model->get_all_stores();
          

        }   

        
        $data['main_content'] = $this->load->view('admin/reports/spotcomplete', $data, TRUE);
        $this->load->view('admin/index', $data);
    }
    
    
    
     public function spottotal()
    {
        $data = array();
        $data['page_title'] = 'Pending Report';
        if($this->input->server('REQUEST_METHOD') === 'GET'){
           // echo "POST";
           // die();
           $data['condition']=array(
               'from_date'=> $this->input->get('s_from_date')?$this->input->get('s_from_date'):date('Y-m-d'),
               'to_date'=> $this->input->get('s_to_date')?$this->input->get('s_to_date'):date('Y-m-d'),
               'store_id'=> $this->input->get('store_id'),
               'Primary_Service'=> $this->input->get('Primary_Service')
           );
           $data['condition'] = $this->security->xss_clean($data['condition']);
           $data['challans']=$this->common_model->getSpotTotalData($data['condition']);
           $data['stations']=$this->common_model->getSpotStationId();
           $data['services']=$this->store_model->get_all_service();
           $data['spot_stations']=$this->store_model->get_all_stations();
           
          

        }   

        
        $data['main_content'] = $this->load->view('admin/reports/spottotal', $data, TRUE);
        $this->load->view('admin/index', $data);
    }
    
    
     public function spothourly()
    {
        $data = array();
        $data['page_title'] = 'Pending Report';
        if($this->input->server('REQUEST_METHOD') === 'GET'){
           // echo "POST";
           // die();
           $data['condition']=array(
               'from_date'=> $this->input->get('s_from_date')?$this->input->get('s_from_date'):date('Y-m-d'),
               'to_date'=> $this->input->get('s_to_date')?$this->input->get('s_to_date'):date('Y-m-d'),
               'store_id'=> $this->input->get('store_id'),
               'Primary_Service'=> $this->input->get('Primary_Service')
           );
           $data['condition'] = $this->security->xss_clean($data['condition']);
           $data['challans']=$this->common_model->getSpotTotalHourly($data['condition']);
           $data['spot_stations']=$this->store_model->get_all_stations();
            $data['services']=$this->store_model->get_all_service();
          $data['stations']=$this->common_model->getSpotStationId();

        }   

        
        $data['main_content'] = $this->load->view('admin/reports/spothourly', $data, TRUE);
        $this->load->view('admin/index', $data);
    }
    

/*******Spot End ********/
    
    
    
    
   
    public function qccomplete()
    {
        $data = array();
        $data['page_title'] = 'Pending Report';
        if($this->input->server('REQUEST_METHOD') === 'GET'){
           // echo "POST";
           // die();
           $data['condition']=array(
               'from_date'=> $this->input->get('s_from_date')?$this->input->get('s_from_date'):date('Y-m-d'),
               'to_date'=> $this->input->get('s_to_date')?$this->input->get('s_to_date'):date('Y-m-d'),
               'store_id'=> $this->input->get('store_id')
           );
           $data['condition'] = $this->security->xss_clean($data['condition']);
           $data['challans']=$this->common_model->getQcCompleteData($data['condition']);
           $data['stores']=$this->store_model->get_all_stores();
          

        }   

        
        $data['main_content'] = $this->load->view('admin/reports/qccomplete', $data, TRUE);
        $this->load->view('admin/index', $data);
    }


    public function qcreport()
    {
        $data = array();
        $data['page_title'] = 'Pending Report';
        if($this->input->server('REQUEST_METHOD') === 'GET'){
           // echo "POST";
           // die();
           $data['condition']=array(
               'from_date'=> $this->input->get('s_from_date')?$this->input->get('s_from_date'):date('Y-m-d'),
               'to_date'=> $this->input->get('s_to_date')?$this->input->get('s_to_date'):date('Y-m-d'),
               'store_id'=> $this->input->get('store_id')
           );
           $data['condition'] = $this->security->xss_clean($data['condition']);
           $data['challans']=$this->common_model->getQcReportNew($data['condition']);
           $data['stores']=$this->store_model->get_all_stores();
          

        }   

        
        $data['main_content'] = $this->load->view('admin/reports/qcreport', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

   
   
   public function qcreporthourly()
    {
        $data = array();
        $data['page_title'] = 'Pending Report';
        if($this->input->server('REQUEST_METHOD') === 'GET'){
           // echo "POST";
           // die();
           $data['condition']=array(
               'from_date'=> $this->input->get('s_from_date')?$this->input->get('s_from_date'):date('Y-m-d'),
               'to_date'=> $this->input->get('s_to_date')?$this->input->get('s_to_date'):date('Y-m-d'),
               'store_id'=> $this->input->get('store_id')
           );
           $data['condition'] = $this->security->xss_clean($data['condition']);
           $data['challans']=$this->common_model->getQcReportHourly($data['condition']);
           $data['stores']=$this->store_model->get_all_stores();
          

        }   

        
        $data['main_content'] = $this->load->view('admin/reports/qcreporthourly', $data, TRUE);
        $this->load->view('admin/index', $data);
    }
   
   
   
   
   public function packagingcomplete()
    {
        $data = array();
        $data['page_title'] = 'Pending Report';
        if($this->input->server('REQUEST_METHOD') === 'GET'){
           // echo "POST";
           // die();
           $data['condition']=array(
               'from_date'=> $this->input->get('s_from_date')?$this->input->get('s_from_date'):date('Y-m-d'),
               'to_date'=> $this->input->get('s_to_date')?$this->input->get('s_to_date'):date('Y-m-d'),
               'store_id'=> $this->input->get('store_id')
           );
           $data['condition'] = $this->security->xss_clean($data['condition']);
           $data['challans']=$this->common_model->getPackageData($data['condition']);
           $data['stores']=$this->store_model->get_all_stores();
          

        }   

        
        $data['main_content'] = $this->load->view('admin/reports/packagingcomplete', $data, TRUE);
        $this->load->view('admin/index', $data);
    }
   
   
   
   
   
   public function packagingall()
    {
        $data = array();
        $data['page_title'] = 'Pending Report';
        if($this->input->server('REQUEST_METHOD') === 'GET'){
           // echo "POST";
           // die();
           $data['condition']=array(
               'from_date'=> $this->input->get('s_from_date')?$this->input->get('s_from_date'):date('Y-m-d'),
               'to_date'=> $this->input->get('s_to_date')?$this->input->get('s_to_date'):date('Y-m-d'),
               'store_id'=> $this->input->get('store_id')
           );
           $data['condition'] = $this->security->xss_clean($data['condition']);
           $data['challans']=$this->common_model->getPackageDataTotalMailReport($data['condition']);
           $data['stores']=$this->store_model->get_all_stores();
           $data['packing_stations']=$this->common_model->getPackingStations();

        }   

        
        $data['main_content'] = $this->load->view('admin/reports/packagingall', $data, TRUE);
        $this->load->view('admin/index', $data);
    }
   
public function packaging()
    {
        $data = array();
        $data['page_title'] = 'Pending Report';
        if($this->input->server('REQUEST_METHOD') === 'GET'){
           // echo "POST";
           // die();
           $data['condition']=array(
               'from_date'=> $this->input->get('s_from_date')?$this->input->get('s_from_date'):date('Y-m-d'),
               'to_date'=> $this->input->get('s_to_date')?$this->input->get('s_to_date'):date('Y-m-d'),
               'store_id'=> $this->input->get('store_id')
           );
           $data['condition'] = $this->security->xss_clean($data['condition']);
           $data['challans']=$this->common_model->getPackageDataHourly($data['condition']);
           $data['stores']=$this->store_model->get_all_stores();
           $data['packing_stations']=$this->common_model->getPackingStations();

        }   

        
        $data['main_content'] = $this->load->view('admin/reports/packaging', $data, TRUE);
        $this->load->view('admin/index', $data);
    }
   
   
   
   
   public function pendingreport()
    {
        $data = array();
        $data['page_title'] = 'Pending Report';
        if($this->input->server('REQUEST_METHOD') === 'GET'){
           // echo "POST";
           // die();
           $data['condition']=array(
               'from_date'=> $this->input->get('s_from_date')?$this->input->get('s_from_date'):date('Y-m-d'),
               'to_date'=> $this->input->get('s_to_date')?$this->input->get('s_to_date'):date('Y-m-d'),
               'store_id'=> $this->input->get('store_id')
           );
           $data['condition'] = $this->security->xss_clean($data['condition']);
           $data['challans']=$this->common_model->pendingreport($data['condition']);
           $data['stores']=$this->store_model->get_all_stores();
          
        }   

        
        $data['main_content'] = $this->load->view('admin/reports/pendingreport', $data, TRUE);
        $this->load->view('admin/index', $data);
    }



 public function garmentreport()
    {
        $data = array();
        $data['page_title'] = 'Pending Report';
        if($this->input->server('REQUEST_METHOD') === 'GET'){
           // echo "POST";
           // die();
           $data['condition']=array(
               'from_date'=> $this->input->get('s_from_date')?$this->input->get('s_from_date'):date('Y-m-d'),
               'to_date'=> $this->input->get('s_to_date')?$this->input->get('s_to_date'):date('Y-m-d'),
               'store_id'=> $this->input->get('store_id')
           );
           $data['condition'] = $this->security->xss_clean($data['condition']);
           $data['challans']=$this->common_model->garmentreport($data['condition']);
           $data['stores']=$this->store_model->get_all_stores();
          
        }   

        
        $data['main_content'] = $this->load->view('admin/reports/garmentreport', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

public function exceptionreport()
    {
        $data = array();
        $data['page_title'] = 'Exception Report';
        if($this->input->server('REQUEST_METHOD') === 'GET'){
           // echo "POST";
           // die();
           $data['condition']=array(
               'from_station'=> $this->input->get('from_station'),
               'to_station'=> $this->input->get('to_station'),
               'from_date'=> $this->input->get('from_date'),
               'from_time'=> $this->input->get('from_time'),
               'to_date'=> $this->input->get('to_date'),
               'to_time'=> $this->input->get('to_time'),
               'till_date'=> $this->input->get('till_date'),
               'till_time'=> $this->input->get('till_time')
           );
           $data['condition'] = $this->security->xss_clean($data['condition']);
           
           if($data['condition']['from_station']==1 && $data['condition']['to_station']==2)
           {
                $start_dt=$data['condition']['from_date'].' '.$data['condition']['from_time'].':00';
                $to_dt=$data['condition']['to_date'].' '.$data['condition']['to_time'].':00';
                $till_dt=$data['condition']['till_date'].' '.$data['condition']['till_time'].':00';
                $data['challans']=$this->common_model->incomingtospot1am($start_dt, $to_dt, $till_dt);
           }
           
          if($data['condition']['from_station']==2 && $data['condition']['to_station']==3)
           {
                $start_dt=$data['condition']['from_date'].' '.$data['condition']['from_time'].':00';
                $to_dt=$data['condition']['to_date'].' '.$data['condition']['to_time'].':00';
                $till_dt=$data['condition']['till_date'].' '.$data['condition']['till_time'].':00';
                $data['spottoqc']=$this->common_model->spottingtoqc1am($start_dt, $to_dt, $till_dt);
           }

           if($data['condition']['from_station']==3 && $data['condition']['to_station']==4)
           {
                $start_dt=$data['condition']['from_date'].' '.$data['condition']['from_time'].':00';
                $to_dt=$data['condition']['to_date'].' '.$data['condition']['to_time'].':00';
                $till_dt=$data['condition']['till_date'].' '.$data['condition']['till_time'].':00';
                $data['qctopack']=$this->common_model->qctopack1am($start_dt, $to_dt, $till_dt);
           }
          
        }   

        
        $data['main_content'] = $this->load->view('admin/reports/exceptionreport', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

   
   public function pendingorderreport()
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

        
        $data['main_content'] = $this->load->view('admin/reports/pendingorderreport', $data, TRUE);
        $this->load->view('admin/index', $data);
    }
   

    public function orderstatuspriority()
    {
        $data = array();
        $data['page_title'] = 'Pending Report';
        if($this->input->server('REQUEST_METHOD') === 'GET'){
           // echo "POST";
           // die();
           $data['condition']=array(
               'order_no'=> $this->input->get('order_no'),
               'store_id'=> $this->input->get('store_id'),
               'order_priority'=> $this->input->get('order_priority')
           );
           $data['condition'] = $this->security->xss_clean($data['condition']);
           $data['challans']=$this->common_model->priorityorderreport($data['condition']);
           $data['stores']=$this->store_model->get_all_stores();
          
        }   

        
        $data['main_content'] = $this->load->view('admin/reports/orderstatuspriority', $data, TRUE);
        $this->load->view('admin/index', $data);
    }
   
 public function orderpriority()
    {
        $data = array();
        $data['page_title'] = 'Order Priority';
        if($this->input->server('REQUEST_METHOD') === 'POST'){
           // echo "POST";
           // die();
           $data['condition']=array(
               'order_no'=> $this->input->post('order_no'),
               'store_id'=> $this->input->post('store_id'),
                'order_priority'=> $this->input->post('order_priority')
           );
           $data['condition'] = $this->security->xss_clean($data['condition']);
            $this->common_model->setPriority($data['condition']);
            $this->session->set_flashdata('msg', 'Priority added Successfully');     
            redirect("admin/reports/orderpriority");
            
        }   
        $data['stores']=$this->store_model->get_all_stores();
        
        $data['main_content'] = $this->load->view('admin/reports/orderpriority', $data, TRUE);
        $this->load->view('admin/index', $data);
    }



    public function packingdetail()
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

        
        $data['main_content'] = $this->load->view('admin/reports/packingdetail', $data, TRUE);
        $this->load->view('admin/index', $data);
    }
   

   
   
   
   
    public function readytodispatch()
    {
        $data = array();
        $data['page_title'] = 'Pending Report';
        if($this->input->server('REQUEST_METHOD') === 'GET'){
           // echo "POST";
           // die();
           $data['condition']=array(
               'from_date'=> $this->input->get('s_from_date')?$this->input->get('s_from_date'):date('Y-m-d', strtotime('- 7 days')),
               'to_date'=> $this->input->get('s_to_date')?$this->input->get('s_to_date'):date('Y-m-d', strtotime('+ 7 days')),
               'store_id'=> $this->input->get('store_id')
           );
           $data['condition'] = $this->security->xss_clean($data['condition']);
           $data['challans']=$this->common_model->readytodispatch($data['condition']);
           $data['stores']=$this->store_model->get_all_stores();
          

        }   

        
        $data['main_content'] = $this->load->view('admin/reports/readytodispatch', $data, TRUE);
        $this->load->view('admin/index', $data);
    }



public function otherreadytodispatch()
    {
        $data = array();
        $data['page_title'] = 'Pending Report';
        if($this->input->server('REQUEST_METHOD') === 'GET'){
           // echo "POST";
           // die();
           $data['condition']=array(
               'from_date'=> $this->input->get('s_from_date')?$this->input->get('s_from_date'):date('Y-m-d', strtotime('- 7 days')),
               'to_date'=> $this->input->get('s_to_date')?$this->input->get('s_to_date'):date('Y-m-d', strtotime('+ 7 days')),
               'store_id'=> $this->input->get('store_id')
           );
           $data['condition'] = $this->security->xss_clean($data['condition']);
           $data['challans']=$this->common_model->readytodispatch($data['condition']);
           $data['stores']=$this->store_model->get_all_stores();
          

        }   

        
        $data['main_content'] = $this->load->view('admin/reports/otherreadytodispatch', $data, TRUE);
        $this->load->view('admin/index', $data);
    }


 public function dispatchreport()
    {
        $data = array();
        $data['page_title'] = 'Pending Report';
        if($this->input->server('REQUEST_METHOD') === 'GET'){
           // echo "POST";
           // die();
           $data['condition']=array(
               'from_date'=> $this->input->get('s_from_date')?$this->input->get('s_from_date'):date('Y-m-d'),
               'to_date'=> $this->input->get('s_to_date')?$this->input->get('s_to_date'):date('Y-m-d'),
               'store_id'=> $this->input->get('store_id')
           );
           $data['condition'] = $this->security->xss_clean($data['condition']);
           $data['challans']=$this->common_model->dispatchreport($data['condition']);
           $data['stores']=$this->store_model->get_all_stores();
          

        }   

        
        $data['main_content'] = $this->load->view('admin/reports/dispatchreport', $data, TRUE);
        $this->load->view('admin/index', $data);
    }



public function sendchallan()
    {
        $data = array();
        $data['page_title'] = 'Pending Report';
        if($this->input->server('REQUEST_METHOD') === 'POST'  && $this->input->post('store_id') ){
           // echo "POST";
           // die();
           $data['condition']=array(
               'from_date'=> $this->input->post('s_from_date')?$this->input->post('s_from_date'):date('Y-m-d', strtotime('- 7 days')),
               'to_date'=> $this->input->post('s_to_date')?$this->input->post('s_to_date'):date('Y-m-d', strtotime('+ 7 days')),
               'store_id'=> $this->input->post('store_id')
           );
           $data['condition'] = $this->security->xss_clean($data['condition']);
           $data['challans']=$this->common_model->sendchallan($data['condition']);
          
          

        }   

         $data['stores']=$this->store_model->get_all_stores();
        $data['main_content'] = $this->load->view('admin/reports/sendchallan', $data, TRUE);
        $this->load->view('admin/index', $data);
    }





	public function sendchallanmail()
    {
        
        if($this->input->server('REQUEST_METHOD') === 'POST'){
           
            $store_id=$this->input->post('store_id');
            
            
            
           $htmlData = file_get_contents("http://centuryfasteners.in/tumbleqr/admin/mailsend/challanmail?store_id=$store_id");	 
            
            
            $storeData=$this->common_model->get_store_email($store_id, "tbl_store");
            
            //print_r($storeData);
            
            $email=$storeData->email_id;
			if(!$email) 
            $email='iqbal.alam59@gmail.com';
            if($this->send($htmlData, $email)){
			
			$this->common_model->updatedispatchchallan($store_id);
			
			
            $this->session->set_flashdata('msg', 'Mail sent Successfully');           
            }
            else
            {
	          $this->session->set_flashdata('error_msg', 'Error');             
            }
            redirect("admin/reports/sendchallan");
          

        } 
        }  


function send($content, $email){
        // Load PHPMailer library
        $this->load->library('PHPMailer_Lib');

        // PHPMailer object
        $mail = $this->phpmailer_lib->load();

        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'mail.centuryfasteners.in';
        $mail->SMTPAuth = true;
        $mail->Username = 'admin@centuryfasteners.in';
        $mail->Password = 'B5]DIG&#OcNH';
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;

        $mail->setFrom('admin@centuryfasteners.in', 'tumbledry');
        //$mail->addReplyTo('admin@centuryfasteners.in', 'Factory Automation');

        // Add a recipient
		$mail->addAddress($email);
        //$mail->addAddress('iqbal.alam59@gmail.com');

        // Add cc or bcc 
/*
        $mail->addCC('Gaurav.Teotia@tumbledry.in');
        $mail->addCC('gaurishankarm@gmail.com');
*/
		$mail->addAddress('Gaurav.Nigam@tumbledry.in');
        $mail->addBCC('gaurishankarm@gmail.com');

        // Email subject
        $mail->Subject = 'Disptach Challan '.date('Y-m-d', strtotime('+ 330 mins'));

        // Set email format to HTML
        $mail->isHTML(true);

        // Email body content
        $mailContent = $content;
            
        $mail->Body = $mailContent;

        // Send email
        if(!$mail->send()){
	        return false;
           // echo 'Message could not be sent.';
            //echo 'Mailer Error: ' . $mail->ErrorInfo;
        }else{
            //echo 'Message has been sent';
            	        return true;
        }
    }   




public function dispatchorder()
    {
        
        if($this->input->server('REQUEST_METHOD') === 'GET'){
           
            $flg=$this->input->get('flg');
            $order_no=$this->input->get('order_no');
            $store_id=$this->input->get('store_id');
            $from=$this->input->get('from');
            $to=$this->input->get('to');
            if($order_no && $store_id){
			$this->common_model->dispatchorder($order_no, $store_id);
            $this->session->set_flashdata('msg', 'Store added Successfully');           
            }
            else
            {
	          $this->session->set_flashdata('error_msg', 'Error');             
            }
            if($flg=='other')
            redirect("admin/reports/otherreadytodispatch?s_from_date=$from&s_to_date=$to&store_id=$store_id");
            else
            redirect("admin/reports/readytodispatch?s_from_date=$from&s_to_date=$to&store_id=$store_id");
          

        }   

        
        
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



 public function printpackinglabel()
    {
        $data = array();
        $data['page_title'] = 'Print Packing Label';
                 
           

        
        $data['main_content'] = $this->load->view('admin/reports/printpackinglabel', $data, TRUE);
        $this->load->view('admin/index', $data);
    }


public function printbarcode()
    {
        $data = array();
        $data['challans']=$this->common_model->getBarcode(trim($this->input->get('barcode'), '*'));
        $data['page_title'] = 'Label';
        if(!empty($data['challans']) ){
			   $this->load->view('admin/reports/printnew', $data);		
	
       }
      else{
	       $this->session->set_flashdata('error_msg', 'Barcode not exist');             
		   redirect("admin/reports/printpackinglabel");
      }
        
    
       
    }


public function mailReport(){
	
}



    
}