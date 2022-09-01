<?php
if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Reports extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_login_user();
        $this->load->model('common_model');
        $this->load->model('store_model');
        $this->load->model('report_model');
    }



    public function initial()
    {
        $data = array();
        $data['page_title'] = 'Pending Report';
        if ($this->input->server('REQUEST_METHOD') === 'GET') {
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


        $data['main_content'] = $this->load->view('admin/reports/initial', $data, true);
        $this->load->view('admin/index', $data);
    }


    public function initialcomplete()
    {
        $data = array();
        $data['page_title'] = 'Pending Report';
        if ($this->input->server('REQUEST_METHOD') === 'GET') {
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


        $data['main_content'] = $this->load->view('admin/reports/initialcomplete', $data, true);
        $this->load->view('admin/index', $data);
    }



    public function initialtotal()
    {
        $data = array();
        $data['page_title'] = 'Pending Report';
        if ($this->input->server('REQUEST_METHOD') === 'GET') {
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


        $data['main_content'] = $this->load->view('admin/reports/initialtotalreport', $data, true);
        $this->load->view('admin/index', $data);
    }





    public function initialhourly()
    {
        $data = array();
        $data['page_title'] = 'Pending Report';
        if ($this->input->server('REQUEST_METHOD') === 'GET') {
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


        $data['main_content'] = $this->load->view('admin/reports/initialhourly', $data, true);
        $this->load->view('admin/index', $data);
    }




    /*************MISSING GARMENT START**********************/

    public function missingyn()
    {
        $data = array();
        $data['page_title'] = 'Missing Garment Report';
        if ($this->input->server('REQUEST_METHOD') === 'GET') {
            // echo "POST";
            // die();
            $data['condition']=array(
               'from_date'=> $this->input->get('ss_from_date')?$this->input->get('ss_from_date'):date('Y-m-d', strtotime('-3 days')),
               'to_date'=> $this->input->get('ss_to_date')?$this->input->get('ss_to_date'):date('Y-m-d'),
               'store_id'=> $this->input->get('store_id'),
               'filter_type'=> $this->input->get('filter_type')?$this->input->get('filter_type'):1
           );

            $diff=date_diff(date_create($data['condition']['from_date']), date_create($data['condition']['to_date']));

            $data['days']=$diff->format('%a');

            $data['condition'] = $this->security->xss_clean($data['condition']);
            $data['challans']=$this->common_model->missingyn($data['condition']);
            // echo $this->db->last_query();
            $data['stores']=$this->store_model->get_all_stores();
        }


        $data['main_content'] = $this->load->view('admin/reports/missingyn', $data, true);
        $this->load->view('admin/index', $data);
    }

    /********************MISSING GARMENT END****************/

    /********************IMAGE REPORT***********/
    public function imgreport()
    {
        $data = array();
        $data['page_title'] = 'Image Report';
        if ($this->input->server('REQUEST_METHOD') === 'GET') {
            // echo "POST";
            // die();
            $data['condition']=array(
               'from_date'=> $this->input->get('ss_from_date')?$this->input->get('ss_from_date'):date('Y-m-d', strtotime('-0 days')),
               'to_date'=> $this->input->get('ss_to_date')?$this->input->get('ss_to_date'):date('Y-m-d'),
               'store_id'=> $this->input->get('store_id'),
               'primary_service'=> $this->input->get('primary_service'),
               'garment_type'=> $this->input->get('garment_type'),
               'filter_type'=> $this->input->get('filter_type')?$this->input->get('filter_type'):1
           );

            $diff=date_diff(date_create($data['condition']['from_date']), date_create($data['condition']['to_date']));

            $data['days']=$diff->format('%a');

            $data['condition'] = $this->security->xss_clean($data['condition']);
            $data['challans']=$this->common_model->imgreport($data['condition']);
            //echo $this->db->last_query();
            $data['stores']=$this->store_model->get_all_stores();
            $data['services']=$this->common_model->get_all_services();
            $data['garment']=$this->common_model->get_all_garment();
        }


        $data['main_content'] = $this->load->view('admin/reports/imgreport', $data, true);
        $this->load->view('admin/index', $data);
    }



    public function getimage()
    {
        $data = array();
        $data['page_title'] = 'Image Report';
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $data['challans']=$this->common_model->getImageByBarcode($this->input->post('barcode'));
            // echo $this->db->last_query();
        }


        $this->load->view('admin/reports/imageview', $data);
    }
    /***************IMAGE REPORT END************/


    /*********SPot******/
    public function spotcomplete()
    {
        $data = array();
        $data['page_title'] = 'Pending Report';
        if ($this->input->server('REQUEST_METHOD') === 'GET') {
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


        $data['main_content'] = $this->load->view('admin/reports/spotcomplete', $data, true);
        $this->load->view('admin/index', $data);
    }



    public function spottotal()
    {
        $data = array();
        $data['page_title'] = 'Pending Report';
        if ($this->input->server('REQUEST_METHOD') === 'GET') {
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


        $data['main_content'] = $this->load->view('admin/reports/spottotal', $data, true);
        $this->load->view('admin/index', $data);
    }


    public function spothourly()
    {
        $data = array();
        $data['page_title'] = 'Pending Report';
        if ($this->input->server('REQUEST_METHOD') === 'GET') {
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


        $data['main_content'] = $this->load->view('admin/reports/spothourly', $data, true);
        $this->load->view('admin/index', $data);
    }


    /*******Spot End ********/





    public function qccomplete()
    {
        $data = array();
        $data['page_title'] = 'Pending Report';
        if ($this->input->server('REQUEST_METHOD') === 'GET') {
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


        $data['main_content'] = $this->load->view('admin/reports/qccomplete', $data, true);
        $this->load->view('admin/index', $data);
    }


    public function qcreport()
    {
        $data = array();
        $data['page_title'] = 'Pending Report';
        if ($this->input->server('REQUEST_METHOD') === 'GET') {
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


        $data['main_content'] = $this->load->view('admin/reports/qcreport', $data, true);
        $this->load->view('admin/index', $data);
    }



    public function qcreporthourly()
    {
        $data = array();
        $data['page_title'] = 'Pending Report';
        if ($this->input->server('REQUEST_METHOD') === 'GET') {
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


        $data['main_content'] = $this->load->view('admin/reports/qcreporthourly', $data, true);
        $this->load->view('admin/index', $data);
    }




    public function packagingcomplete()
    {
        $data = array();
        $data['page_title'] = 'Pending Report';
        if ($this->input->server('REQUEST_METHOD') === 'GET') {
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


        $data['main_content'] = $this->load->view('admin/reports/packagingcomplete', $data, true);
        $this->load->view('admin/index', $data);
    }





    public function packagingall()
    {
        $data = array();
        $data['page_title'] = 'Pending Report';
        if ($this->input->server('REQUEST_METHOD') === 'GET') {
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


        $data['main_content'] = $this->load->view('admin/reports/packagingall', $data, true);
        $this->load->view('admin/index', $data);
    }

    public function packaging()
    {
        $data = array();
        $data['page_title'] = 'Pending Report';
        if ($this->input->server('REQUEST_METHOD') === 'GET') {
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


        $data['main_content'] = $this->load->view('admin/reports/packaging', $data, true);
        $this->load->view('admin/index', $data);
    }


    /**********photo section***********/

    public function photocomplete()
    {
        $data = array();
        $data['page_title'] = 'Photo Complete Report';
        if ($this->input->server('REQUEST_METHOD') === 'GET') {
            // echo "POST";
            // die();
            $data['condition']=array(
               'from_date'=> $this->input->get('s_from_date')?$this->input->get('s_from_date'):date('Y-m-d'),
               'to_date'=> $this->input->get('s_to_date')?$this->input->get('s_to_date'):date('Y-m-d'),
               'store_id'=> $this->input->get('store_id')
           );
            $data['condition'] = $this->security->xss_clean($data['condition']);
            $data['challans']=$this->common_model->getPhotoData($data['condition']);
            $data['stores']=$this->store_model->get_all_stores();
        }


        $data['main_content'] = $this->load->view('admin/reports/photocomplete', $data, true);
        $this->load->view('admin/index', $data);
    }





    public function photoall()
    {
        $data = array();
        $data['page_title'] = 'Photo Report';
        if ($this->input->server('REQUEST_METHOD') === 'GET') {
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


        $data['main_content'] = $this->load->view('admin/reports/photoall', $data, true);
        $this->load->view('admin/index', $data);
    }

    public function photo()
    {
        $data = array();
        $data['page_title'] = 'Pending Report';
        if ($this->input->server('REQUEST_METHOD') === 'GET') {
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


        $data['main_content'] = $this->load->view('admin/reports/packaging', $data, true);
        $this->load->view('admin/index', $data);
    }

/**********photo section end***********/

/**************TAILOR START*************/
public function tailorcomplete()
{
    $data = array();
    $data['page_title'] = 'Tailor Report';
    if ($this->input->server('REQUEST_METHOD') === 'GET') {
        // echo "POST";
        // die();
        $data['condition']=array(
           'from_date'=> $this->input->get('s_from_date')?$this->input->get('s_from_date'):date('Y-m-d'),
           'to_date'=> $this->input->get('s_to_date')?$this->input->get('s_to_date'):date('Y-m-d'),
           'Primary_Service'=> $this->input->get('Primary_Service'),
           'store_id'=> $this->input->get('store_id')
       );
        $data['condition'] = $this->security->xss_clean($data['condition']);
        $data['challans']=$this->report_model->getTailorCompleteData($data['condition']);
        $data['stores']=$this->store_model->get_all_stores();
        $data['services']=$this->common_model->get_all_services();
    }


    $data['main_content'] = $this->load->view('admin/reports/tailorcomplete', $data, true);
    $this->load->view('admin/index', $data);
}



public function tailorall()
{
    $data = array();
    $data['page_title'] = 'Tailor All Report';
    if ($this->input->server('REQUEST_METHOD') === 'GET') {
        // echo "POST";
        // die();
        $data['condition']=array(
           'from_date'=> $this->input->get('s_from_date')?$this->input->get('s_from_date'):date('Y-m-d'),
           'to_date'=> $this->input->get('s_to_date')?$this->input->get('s_to_date'):date('Y-m-d'),
           'station_id'=> $this->input->get('station_id'),
           'Primary_Service'=> $this->input->get('Primary_Service')
       );
        $data['condition'] = $this->security->xss_clean($data['condition']);
        $data['challans']=$this->report_model->getTailorTotalData($data['condition']);
        // $data['stations']=$this->common_model->getSpotStationId();
        $data['services']=$this->store_model->get_all_service();
        $data['tailor_stations']=$this->report_model->get_all_tailor_stations();
    }


    $data['main_content'] = $this->load->view('admin/reports/tailortotal', $data, true);
    $this->load->view('admin/index', $data);
}


public function tailor()
{
    $data = array();
    $data['page_title'] = 'Tailor Hourly Report';
    if ($this->input->server('REQUEST_METHOD') === 'GET') {
        // echo "POST";
        // die();
        $data['condition']=array(
           'from_date'=> $this->input->get('s_from_date')?$this->input->get('s_from_date'):date('Y-m-d'),
           'to_date'=> $this->input->get('s_to_date')?$this->input->get('s_to_date'):date('Y-m-d'),
           'station_id'=> $this->input->get('station_id'),
           'Primary_Service'=> $this->input->get('Primary_Service')
       );
        $data['condition'] = $this->security->xss_clean($data['condition']);
        $data['challans']=$this->report_model->getToilorTotalHourly($data['condition']);
        $data['tailor_stations']=$this->report_model->get_all_tailor_stations();
        $data['services']=$this->store_model->get_all_service();
    }


    $data['main_content'] = $this->load->view('admin/reports/tailorhourly', $data, true);
    $this->load->view('admin/index', $data);
}

/**************TAILOR END*************/



/**************Garment LOT START*************/
public function lotcomplete()
{
    $data = array();
    $data['page_title'] = 'LOT Report';
    if ($this->input->server('REQUEST_METHOD') === 'GET') {
        // echo "POST";
        // die();
        $data['condition']=array(
           'from_date'=> $this->input->get('s_from_date')?$this->input->get('s_from_date'):date('Y-m-d'),
           'to_date'=> $this->input->get('s_to_date')?$this->input->get('s_to_date'):date('Y-m-d'),
           'Primary_Service'=> $this->input->get('Primary_Service'),
           'store_id'=> $this->input->get('store_id')
       );
        $data['condition'] = $this->security->xss_clean($data['condition']);
        $data['challans']=$this->report_model->getLotCompleteData($data['condition']);
        $data['stores']=$this->store_model->get_all_stores();
        $data['services']=$this->common_model->get_all_services();
    }


    $data['main_content'] = $this->load->view('admin/reports/lotcomplete', $data, true);
    $this->load->view('admin/index', $data);
}



public function lotall()
{
    $data = array();
    $data['page_title'] = 'LOT All Report';
    if ($this->input->server('REQUEST_METHOD') === 'GET') {
        // echo "POST";
        // die();
        $data['condition']=array(
           'from_date'=> $this->input->get('s_from_date')?$this->input->get('s_from_date'):date('Y-m-d'),
           'to_date'=> $this->input->get('s_to_date')?$this->input->get('s_to_date'):date('Y-m-d'),
           'station_id'=> $this->input->get('station_id'),
           'Primary_Service'=> $this->input->get('Primary_Service')
       );
        $data['condition'] = $this->security->xss_clean($data['condition']);
        $data['challans']=$this->report_model->getLotTotalData($data['condition']);
        // $data['stations']=$this->common_model->getSpotStationId();
        $data['services']=$this->store_model->get_all_service();
        $data['lot_stations']=$this->report_model->get_all_lot_stations();
    }


    $data['main_content'] = $this->load->view('admin/reports/lottotal', $data, true);
    $this->load->view('admin/index', $data);
}


public function lot()
{
    $data = array();
    $data['page_title'] = 'Lot Hourly Report';
    if ($this->input->server('REQUEST_METHOD') === 'GET') {
        // echo "POST";
        // die();
        $data['condition']=array(
           'from_date'=> $this->input->get('s_from_date')?$this->input->get('s_from_date'):date('Y-m-d'),
           'to_date'=> $this->input->get('s_to_date')?$this->input->get('s_to_date'):date('Y-m-d'),
           'station_id'=> $this->input->get('station_id'),
           'Primary_Service'=> $this->input->get('Primary_Service')
       );
        $data['condition'] = $this->security->xss_clean($data['condition']);
        $data['challans']=$this->report_model->getLotTotalHourly($data['condition']);
        $data['lot_stations']=$this->report_model->get_all_lot_stations();
        $data['services']=$this->store_model->get_all_service();
    }


    $data['main_content'] = $this->load->view('admin/reports/lothourly', $data, true);
    $this->load->view('admin/index', $data);
}

/**************GARMENT LOT END*************/





/**************Garment Washing START*************/
public function washcomplete()
{
    $data = array();
    $data['page_title'] = 'Washing Report';
    if ($this->input->server('REQUEST_METHOD') === 'GET') {
        // echo "POST";
        // die();
        $data['condition']=array(
           'from_date'=> $this->input->get('s_from_date')?$this->input->get('s_from_date'):date('Y-m-d'),
           'to_date'=> $this->input->get('s_to_date')?$this->input->get('s_to_date'):date('Y-m-d'),
           'Primary_Service'=> $this->input->get('Primary_Service'),
           'store_id'=> $this->input->get('store_id')
       );
        $data['condition'] = $this->security->xss_clean($data['condition']);
        $data['challans']=$this->report_model->getWashingCompleteData($data['condition']);
        $data['stores']=$this->store_model->get_all_stores();
        $data['services']=$this->common_model->get_all_services();
    }


    $data['main_content'] = $this->load->view('admin/reports/washingcomplete', $data, true);
    $this->load->view('admin/index', $data);
}



public function washall()
{
    $data = array();
    $data['page_title'] = 'Washing All Report';
    if ($this->input->server('REQUEST_METHOD') === 'GET') {
        // echo "POST";
        // die();
        $data['condition']=array(
           'from_date'=> $this->input->get('s_from_date')?$this->input->get('s_from_date'):date('Y-m-d'),
           'to_date'=> $this->input->get('s_to_date')?$this->input->get('s_to_date'):date('Y-m-d'),
           'station_id'=> $this->input->get('station_id'),
           'Primary_Service'=> $this->input->get('Primary_Service')
       );
        $data['condition'] = $this->security->xss_clean($data['condition']);
        $data['challans']=$this->report_model->getWashingTotalData($data['condition']);
        // $data['stations']=$this->common_model->getSpotStationId();
        $data['services']=$this->store_model->get_all_service();
        $data['wash_stations']=$this->report_model->get_all_washing_stations();
    }


    $data['main_content'] = $this->load->view('admin/reports/washtotal', $data, true);
    $this->load->view('admin/index', $data);
}


public function wash()
{
    $data = array();
    $data['page_title'] = 'Washing Hourly Report';
    if ($this->input->server('REQUEST_METHOD') === 'GET') {
        // echo "POST";
        // die();
        $data['condition']=array(
           'from_date'=> $this->input->get('s_from_date')?$this->input->get('s_from_date'):date('Y-m-d'),
           'to_date'=> $this->input->get('s_to_date')?$this->input->get('s_to_date'):date('Y-m-d'),
           'station_id'=> $this->input->get('station_id'),
           'Primary_Service'=> $this->input->get('Primary_Service')
       );
        $data['condition'] = $this->security->xss_clean($data['condition']);
        $data['challans']=$this->report_model->getWashingTotalHourly($data['condition']);
        $data['wash_stations']=$this->report_model->get_all_washing_stations();
        $data['services']=$this->store_model->get_all_service();
    }


    $data['main_content'] = $this->load->view('admin/reports/washhourly', $data, true);
    $this->load->view('admin/index', $data);
}

/**************GARMENT Washing END*************/

    public function pendingreport()
    {
        $data = array();
        $data['page_title'] = 'Pending Report';
        if ($this->input->server('REQUEST_METHOD') === 'GET') {
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


        $data['main_content'] = $this->load->view('admin/reports/pendingreport', $data, true);
        $this->load->view('admin/index', $data);
    }



    public function garmentreport()
    {
        $data = array();
        $data['page_title'] = 'Pending Report';
        if ($this->input->server('REQUEST_METHOD') === 'GET') {
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


        $data['main_content'] = $this->load->view('admin/reports/garmentreport', $data, true);
        $this->load->view('admin/index', $data);
    }

    public function exceptionreport()
    {
        $data = array();
        $data['page_title'] = 'Exception Report';
        if ($this->input->server('REQUEST_METHOD') === 'GET') {
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
               'till_time'=> $this->input->get('till_time'),
               'primary_service'=>"'" . implode("','", $this->input->get('primary_service')) . "'"


           );
            $data['condition'] = $this->security->xss_clean($data['condition']);

            if ($data['condition']['from_station']==1 && $data['condition']['to_station']==2) {
                $start_dt=$data['condition']['from_date'].' '.$data['condition']['from_time'].':00';
                $to_dt=$data['condition']['to_date'].' '.$data['condition']['to_time'].':00';
                $till_dt=$data['condition']['till_date'].' '.$data['condition']['till_time'].':00';
                $data['challans']=$this->common_model->incomingtospot1am($start_dt, $to_dt, $till_dt, $data['condition']['primary_service']);
            }

            if ($data['condition']['from_station']==2 && $data['condition']['to_station']==3) {
                $start_dt=$data['condition']['from_date'].' '.$data['condition']['from_time'].':00';
                $to_dt=$data['condition']['to_date'].' '.$data['condition']['to_time'].':00';
                $till_dt=$data['condition']['till_date'].' '.$data['condition']['till_time'].':00';
                $data['spottoqc']=$this->common_model->spottingtoqc1am($start_dt, $to_dt, $till_dt, $data['condition']['primary_service']);
            }

            if ($data['condition']['from_station']==3 && $data['condition']['to_station']==4) {
                $start_dt=$data['condition']['from_date'].' '.$data['condition']['from_time'].':00';
                $to_dt=$data['condition']['to_date'].' '.$data['condition']['to_time'].':00';
                $till_dt=$data['condition']['till_date'].' '.$data['condition']['till_time'].':00';
                $data['qctopack']=$this->common_model->qctopack1am($start_dt, $to_dt, $till_dt, $data['condition']['primary_service']);
            }
        }

        $data['services']=$this->common_model->get_all_Service();

        $data['main_content'] = $this->load->view('admin/reports/exceptionreport', $data, true);
        $this->load->view('admin/index', $data);
    }


    public function pendingorderreport()
    {
        $data = array();
        $data['page_title'] = 'Pending Report';
        if ($this->input->server('REQUEST_METHOD') === 'GET') {
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


        $data['main_content'] = $this->load->view('admin/reports/pendingorderreport', $data, true);
        $this->load->view('admin/index', $data);
    }


    public function orderstatuspriority()
    {
        $data = array();
        $data['page_title'] = 'Pending Report';
        if ($this->input->server('REQUEST_METHOD') === 'GET') {
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


        $data['main_content'] = $this->load->view('admin/reports/orderstatuspriority', $data, true);
        $this->load->view('admin/index', $data);
    }

    public function orderpriority()
    {
        $data = array();
        $data['page_title'] = 'Order Priority';
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
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

        $data['main_content'] = $this->load->view('admin/reports/orderpriority', $data, true);
        $this->load->view('admin/index', $data);
    }



    public function packingdetail()
    {
        $data = array();
        $data['page_title'] = 'Pending Report';
        if ($this->input->server('REQUEST_METHOD') === 'GET') {
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


        $data['main_content'] = $this->load->view('admin/reports/packingdetail', $data, true);
        $this->load->view('admin/index', $data);
    }






    public function readytodispatch()
    {
        $data = array();
        $data['page_title'] = 'Pending Report';
        if ($this->input->server('REQUEST_METHOD') === 'GET') {
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


        $data['main_content'] = $this->load->view('admin/reports/readytodispatch', $data, true);
        $this->load->view('admin/index', $data);
    }



    public function quickwing()
    {
        $data = array();
        $data['page_title'] = 'Quick Wing';
        if ($this->input->server('REQUEST_METHOD') === 'GET') {
            // echo "POST";
            // die();
            $data['condition']=array(
               'from_date'=> $this->input->get('s_from_date')?$this->input->get('s_from_date'):date('Y-m-d', strtotime('- 7 days')),
               'to_date'=> $this->input->get('s_to_date')?$this->input->get('s_to_date'):date('Y-m-d', strtotime('+ 7 days')),
               'store_id'=> $this->input->get('store_id')
           );
            $data['condition'] = $this->security->xss_clean($data['condition']);
            $data['challans']=$this->common_model->quickwing($data['condition']);
            $data['stores']=$this->store_model->get_all_stores();
        }


        $data['main_content'] = $this->load->view('admin/reports/quickwing', $data, true);
        $this->load->view('admin/index', $data);
    }





    public function otherreadytodispatch()
    {
        $data = array();
        $data['page_title'] = 'Pending Report';
        if ($this->input->server('REQUEST_METHOD') === 'GET') {
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


        $data['main_content'] = $this->load->view('admin/reports/otherreadytodispatch', $data, true);
        $this->load->view('admin/index', $data);
    }


    public function dispatchreport()
    {
        $data = array();
        $data['page_title'] = 'Pending Report';
        if ($this->input->server('REQUEST_METHOD') === 'GET') {
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


        $data['main_content'] = $this->load->view('admin/reports/dispatchreport', $data, true);
        $this->load->view('admin/index', $data);
    }


    public function cancelledorder()
    {
        $data = array();
        $data['page_title'] = 'Pending Report';
        if ($this->input->server('REQUEST_METHOD') === 'GET') {
            // echo "POST";
            // die();
            $data['condition']=array(
               'from_date'=> $this->input->get('s_from_date')?$this->input->get('s_from_date'):date('Y-m-d'),
               'to_date'=> $this->input->get('s_to_date')?$this->input->get('s_to_date'):date('Y-m-d'),
               'store_id'=> $this->input->get('store_id')
           );
            $data['condition'] = $this->security->xss_clean($data['condition']);
            $data['challans']=$this->common_model->cancelledorder($data['condition']);
            $data['stores']=$this->store_model->get_all_stores();
        }


        $data['main_content'] = $this->load->view('admin/reports/cancelledorder', $data, true);
        $this->load->view('admin/index', $data);
    }




    public function sendchallan()
    {
        $data = array();
        $data['page_title'] = 'Pending Report';
        if ($this->input->server('REQUEST_METHOD') === 'POST'  && $this->input->post('store_id')) {
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
        $data['main_content'] = $this->load->view('admin/reports/sendchallan', $data, true);
        $this->load->view('admin/index', $data);
    }





    public function sendchallanmail()
    {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $store_id=$this->input->post('store_id');



            $htmlData = file_get_contents("http://centuryfasteners.in/tumbleqr/admin/mailsend/challanmail?store_id=$store_id");


            $storeData=$this->common_model->get_store_email($store_id, "tbl_store");

            //print_r($storeData);

            $email=$storeData->email_id;
            if (!$email) {
                $email='iqbal.alam59@gmail.com';
            }
            if ($this->send($htmlData, $email)) {
                $this->common_model->updatedispatchchallan($store_id);


                $this->session->set_flashdata('msg', 'Mail sent Successfully');
            } else {
                $this->session->set_flashdata('error_msg', 'Error');
            }
            redirect("admin/reports/sendchallan");
        }
    }


    public function send($content, $email)
    {
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
        if (!$mail->send()) {
            return false;
        // echo 'Message could not be sent.';
        //echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            //echo 'Message has been sent';
            return true;
        }
    }




    public function dispatchorder()
    {
        if ($this->input->server('REQUEST_METHOD') === 'GET') {
            $flg=$this->input->get('flg');
            $order_no=$this->input->get('order_no');
            $store_id=$this->input->get('store_id');
            $from=$this->input->get('from');
            $to=$this->input->get('to');
            if ($order_no && $store_id) {
                $this->common_model->dispatchorder($order_no, $store_id);
                $this->session->set_flashdata('msg', 'Store added Successfully');
            } else {
                $this->session->set_flashdata('error_msg', 'Error');
            }
            if ($flg=='other') {
                redirect("admin/reports/otherreadytodispatch?s_from_date=$from&s_to_date=$to&store_id=$store_id");
            } else {
                redirect("admin/reports/readytodispatch?s_from_date=$from&s_to_date=$to&store_id=$store_id");
            }
        }
    }



    public function cancelorder()
    {
        if ($this->input->server('REQUEST_METHOD') === 'GET') {
            $flg=$this->input->get('flg');
            $order_no=$this->input->get('order_no');
            $store_id=$this->input->get('store_id');
            $from=$this->input->get('from');
            $to=$this->input->get('to');
            if ($order_no && $store_id) {
                $this->common_model->cancelorder($order_no, $store_id);
                $this->session->set_flashdata('msg', 'Cancelled Successfully');
            } else {
                $this->session->set_flashdata('error_msg', 'Error');
            }

            // redirect("admin/reports/cancelledorder?s_from_date=$from&s_to_date=$to&store_id=$store_id");
            redirect("admin/reports/cancelledorder");
        }
    }

    public function mobileorderstatus()
    {
        $data = array();
        $data['page_title'] = 'Pending Report';
        if ($this->input->server('REQUEST_METHOD') === 'GET') {
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


        $data['main_content'] = $this->load->view('admin/reports/mobileorderstatus', $data, true);
        $this->load->view('admin/index_mobile', $data);
    }



    public function printpackinglabel()
    {
        $data = array();
        $data['page_title'] = 'Print Packing Label';




        $data['main_content'] = $this->load->view('admin/reports/printpackinglabel', $data, true);
        $this->load->view('admin/index', $data);
    }


    public function printbarcode()
    {
        $data = array();
        $data['challans']=$this->common_model->getBarcode(trim($this->input->get('barcode'), '*'));
        $data['page_title'] = 'Label';
        if (!empty($data['challans'])) {
            $this->load->view('admin/reports/printnew', $data);
        } else {
            $this->session->set_flashdata('error_msg', 'Barcode not exist');
            redirect("admin/reports/printpackinglabel");
        }
    }


    public function mailReport()
    {
    }
}