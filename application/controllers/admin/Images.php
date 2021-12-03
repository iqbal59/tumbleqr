<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Images extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('common_model');
        $this->load->model('store_model');
    }



 public function viewgallery($order_no, $store_id)
    {
        $data['order_no']=$order_no;
        $data['storeData']=$this->store_model->get_store_by_id($store_id);
        $data['pictures']=$this->common_model->getPictures($order_no, $store_id);
        $this->load->view('admin/picture/gallery.php', $data);

        

    }
}