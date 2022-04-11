<?php
class Import extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_login_user();
        $this->load->model('common_model');
        $this->load->model("store_model");
    }

    public function importchallandata()
    {
        $data['main_content'] = $this->load->view('admin/import/add', null, true);
        $this->load->view('admin/index', $data);
    }

    public function importstorechallandata()
    {
        $data['stores']=$this->store_model->get_all_stores();
        $data['main_content'] = $this->load->view('admin/import/add_store', $data, true);
        $this->load->view('admin/index', $data);
    }

    public function challandata()
    {
        $data=array();
        if ($this->input->server('REQUEST_METHOD') === 'GET') {
            // echo "POST";
            // die();
            $data['condition']=array(
                'from_date'=> $this->input->get('s_from_date'),
                'to_date'=> $this->input->get('s_to_date')
            );
            $data['condition'] = $this->security->xss_clean($data['condition']);
            $data['challans']=$this->common_model->challan_data($data['condition']);
        }

        $data['main_content'] = $this->load->view('admin/import/challan_data', $data, true);
        $this->load->view('admin/index', $data);
    }


    public function importdata()
    {
        $dataType=$this->input->post('data_type');
      
        if ($_FILES) {
            $file=$_FILES['excel_file']['tmp_name'];
            if ($file == null) {
                error(_('Please select a file to import'));
                $this->session->set_flashdata('error_msg', "Please select file");
                redirect('admin/import/importchallandata');
            } else {
                
                
                $handle = fopen($file, "r") or die("err");
                switch ($dataType) {
                case '1':
                        // $s_from_date=$this->input->post('s_from_date');
                        // $s_to_date=$this->input->post('s_to_date');
                
                        $storesData=$this->store_model->get_all_active_stores();
                        foreach($storesData as $s){
                            $stores[]=$s['store_id'];
                        }
                        
                       // print_r($stores);
                        $row=0;
                        while (($filesop = fgetcsv($handle, 1000, ",")) !== false) {

                           // $odate=date('Y-m-d', strtotime($filesop[2]));
                            if ($row++ < 1) {
                                continue;
                            }
                            
                            list($order_no, $cloth_no, $store_id)=explode("-", trim($filesop[6], "*"));
                            if(!in_array($store_id, $stores))
                             continue;
                            
                            $data['Store_Name'] = $filesop[0];
                            $data['Order_No'] = $filesop[1];
                            $data['Order_Date'] = date('Y-m-d', strtotime($filesop[2]));
                            $data['Order_Time'] = date('H:i:s', strtotime($filesop[3]));
                            $data['Garment'] = $filesop[4];
                            $data['Sub_Garment'] = $filesop[5];
                            $data['Barcode'] = trim($filesop[6], "*");
                            $data['Primary_Service'] = $filesop[7];
                            $data['Top_Up_1'] = $filesop[8];
                            $data['Top_Up_2'] = $filesop[9];
                            $data['Top_Up_3'] = $filesop[10];
                            $data['Top_Up_4'] = $filesop[11];
                            $data['Defects'] = $filesop[12];
                            $data['Color'] = $filesop[13];
                            $data['Brand'] = $filesop[14];
                            $data['Due_on'] = date('Y-m-d', strtotime($filesop[15]));
                            $data['Gross_Amount'] = $filesop[16];
                            $data['Discount'] = $filesop[17];
                            $data['Net_Amount'] = $filesop[18];
                            $data['Package'] = $filesop[19];
                            $data['Garment_Status'] = $filesop[20];
                            $data['Send_to_Workshop'] = $filesop[21];
                            $data['Workshop_name'] = $filesop[22];
                            $data['Send_on'] = date('Y-m-d', strtotime($filesop[23]));
                            $data['Received_from_Workshop'] = date('Y-m-d', strtotime($filesop[24]));
                            $data['Delivered_on'] = date('Y-m-d', strtotime($filesop[25]));
                            $data['store_id'] = $store_id;
                           // $data['Due_on'] = date('Y-m-d', strtotime($data['Due_on']. ' - 1 days'));           
                            $facatory_due_date= strtotime($data['Due_on']. ' - 1 days');

                            $diff=$facatory_due_date-strtotime($filesop[2]);

                            $due_days=ceil(abs($diff / 86400));
                          

                            if($due_days < 2)
                            $data['order_priority']=2;
                            else
                            $data['order_priority']=0;
                                // print_r($data);
                                 //echo "<br>";

                            $this->common_model->import_challan($data);
                        }
                       
                        $this->session->set_flashdata('msg', "data upload success");
                        redirect('admin/import/importchallandata');
                break;
             
            }
            }
        }
    }


    public function importstoredata()
    {
        $dataType=$this->input->post('data_type');
        $store_name=$this->input->post('store_name');
      
        if ($_FILES) {
            $file=$_FILES['excel_file']['tmp_name'];
            if ($file == null) {
                error(_('Please select a file to import'));
                $this->session->set_flashdata('error_msg', "Please select file");
                redirect('admin/import/importstorechallandata');
            } else {
                $handle = fopen($file, "r") or die("err");
                switch ($dataType) {
                case '1':
                        // $s_from_date=$this->input->post('s_from_date');
                        // $s_to_date=$this->input->post('s_to_date');
                
                        // $this->common_model->saleRefund($s_from_date, $s_to_date);
                        $row=0;
                        while (($filesop = fgetcsv($handle, 1000, ",")) !== false) {

                           // $odate=date('Y-m-d', strtotime($filesop[2]));
                            if ($row++ < 1) {
                                continue;
                            }
                            $data['Store_Name'] = $store_name;
                            $data['Order_No'] = $filesop[0];
                            $data['Order_Date'] = date('Y-m-d', strtotime($filesop[1]));
                            $data['Order_Time'] = date('H:i:s', strtotime($filesop[2]));
                            $data['Garment'] = $filesop[3];
                            $data['Sub_Garment'] = $filesop[4];
                            $data['Barcode'] = trim($filesop[5], "*");
                            $data['Primary_Service'] = $filesop[6];
                            $data['Top_Up_1'] = $filesop[7];
                            $data['Top_Up_2'] = $filesop[8];
                            $data['Top_Up_3'] = $filesop[9];
                            $data['Top_Up_4'] = $filesop[10];
                            $data['Defects'] = $filesop[11];
                            $data['Color'] = $filesop[12];
                            $data['Brand'] = $filesop[13];
                            $data['Due_on'] = date('Y-m-d', strtotime($filesop[14]));
                            $data['Gross_Amount'] = $filesop[15];
                            $data['Discount'] = $filesop[16];
                            $data['Net_Amount'] = $filesop[17];
                            $data['Package'] = $filesop[18];
                            $data['Garment_Status'] = $filesop[19];
                            $data['Send_to_Workshop'] = $filesop[20];
                            $data['Workshop_name'] = $filesop[21];
                            $data['Send_on'] = date('Y-m-d', strtotime($filesop[22]));
                            $data['Received_from_Workshop'] = date('Y-m-d', strtotime($filesop[23]));
                            $data['Delivered_on'] = date('Y-m-d', strtotime($filesop[24]));
                            list($order_no, $cloth_no, $store_id)=explode("-", trim($filesop[5], "*"));
                            $data['store_id'] = $store_id;
                          

                          
                            //    print_r($data);
                            // echo "<br>";

                            $this->common_model->import_challan($data);
                        }
                       
                        $this->session->set_flashdata('msg', "data upload success");
                        redirect('admin/import/importstorechallandata');
                break;
             
            }
            }
        }
    }
}