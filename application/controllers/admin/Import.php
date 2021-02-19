<?php
class Import extends CI_Controller{

    public function __construct(){
        parent::__construct();
        check_login_user();
        $this->load->model('common_model');
        //$this->load->model("store_model");
    }

    public function importchallandata(){
        $data['main_content'] = $this->load->view('admin/import/add', null, TRUE);
        $this->load->view('admin/index', $data);   
    }

    public function challandata(){
            $data=array();
         if($this->input->server('REQUEST_METHOD') === 'GET'){
            // echo "POST";
            // die();
            $data['condition']=array(
                'from_date'=> $this->input->get('s_from_date'),
                'to_date'=> $this->input->get('s_to_date')
            );
            $data['condition'] = $this->security->xss_clean($data['condition']);
            $data['challans']=$this->common_model->challan_data($data['condition']);

         }   

        $data['main_content'] = $this->load->view('admin/import/challan_data', $data, TRUE);
        $this->load->view('admin/index', $data);   
    }


    public function importdata(){

        $dataType=$this->input->post('data_type');
      
        if($_FILES){
            $file=$_FILES['excel_file']['tmp_name'];
            if ($file == NULL) {
             error(_('Please select a file to import'));
            $this->session->set_flashdata('error_msg', "Please select file");
            redirect('admin/import/importchallandata');
            }
         else{ 
                $handle = fopen($file, "r") or die("err");
            switch($dataType)
            {
                case '1':
                        // $s_from_date=$this->input->post('s_from_date');
                        // $s_to_date=$this->input->post('s_to_date');
                
                        // $this->common_model->saleRefund($s_from_date, $s_to_date);
                        $row=0;
                        while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
                        {

                           // $odate=date('Y-m-d', strtotime($filesop[2]));
                           if($row++ < 1) 
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
                          list($order_no, $cloth_no, $store_id)=explode("-", trim($filesop[6], "*"));
                          $data['store_id'] = $store_id;
                          

                          
                      //    print_r($data);
                         // echo "<br>";

                        $this->common_model->import_challan($data);
                            
                       
                        }
                       
                        $this->session->set_flashdata('msg', "data upload success");
                        redirect('admin/import/importchallandata');
                break;
             
            }
                
            }   

       
        
        

        }

    }

}
?>