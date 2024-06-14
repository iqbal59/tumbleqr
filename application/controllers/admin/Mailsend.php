<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Mailsend extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('common_model');
        $this->load->model('store_model');
        $this->load->model('report_model');
    }

    public function index()
    {
        $data['condition'] = array(
            'from_date' => date('Y-m-d', strtotime('-' . (24 * 60 * 1 - 330) . ' mins')),
            'to_date' => date('Y-m-d', strtotime('-' . (24 * 60 * 1 - 330) . ' mins')),

        );

        //  print_r($data['condition']);

        $data['dateData'] = $data['condition']['from_date'];
        //$data['allusers'] = $this->common_model->getAllUserName();
        $data['initialTotals'] = $this->common_model->getInitialTotalData($data['condition']);
        //echo $this->db->last_query();
        $data['mtdinitial'] = $this->common_model->getInitialTotalDataMonth($data['condition']);

        $data['initial_stations'] = $this->common_model->getInitialStations();
        $data['initialTotalsHourly'] = $this->common_model->getInitialDataHourly($data['condition']);

        $data['spotTotal'] = $this->common_model->getSpotTotalReport($data['condition']);
        $data['spotTotalMonth'] = $this->common_model->getSpotTotalMonthReport($data['condition']);

        $data['stations'] = $this->common_model->getSpotStationId();
        $data['spot_stations'] = $this->store_model->get_all_stations();

        $data['qc_by_spotter_id'] = $this->common_model->getQcReportBySpotterId($data['condition']);

        $data['qc_by_month_spotter_id'] = $this->common_model->getQcReportMonthBySpotterId($data['condition']);

        $data['spotTotalHourly'] = $this->common_model->getSpotTotalHourly($data['condition']);

        $data['qctotal'] = $this->common_model->getQcReportNew($data['condition']);
        $data['qctotalmonthly'] = $this->common_model->getQcReportNewMonthly($data['condition']);
        $data['qchourly'] = $this->common_model->getQcReportHourly($data['condition']);

        $data['packingtotal'] = $this->common_model->getPackageDataTotalMailReport($data['condition']);
        $data['packingtotalmonthly'] = $this->common_model->getPackageDataTotalMailReportMonthly($data['condition']);

        $data['packing_stations'] = $this->common_model->getPackingStations();

        $data['packinghourly'] = $this->common_model->getPackageDataHourly($data['condition']);

        $data['dispatchData'] = $this->common_model->getDispatchReportMail($data['condition']);
        // echo $this->db->last_query();
        $data['dispatchDataMonthly'] = $this->common_model->getDispatchReportMailMonthly($data['condition']);

        $this->load->view('admin/mail/index', $data);
    }

    public function challanmail()
    {
        $data = array();
        //$data['page_title'] = 'Pending Report';
        if (($this->input->server('REQUEST_METHOD') === 'GET' || $this->input->server('REQUEST_METHOD') === 'POST') && $this->input->get('store_id')) {
            // echo "POST";
            // die();
            $data['condition'] = array(
                'from_date' => $this->input->post('s_from_date') ? $this->input->post('s_from_date') : date('Y-m-d', strtotime('- 7 days')),
                'to_date' => $this->input->post('s_to_date') ? $this->input->post('s_to_date') : date('Y-m-d', strtotime('+ 7 days')),
                'store_id' => $this->input->get('store_id'),
            );
            $data['condition'] = $this->security->xss_clean($data['condition']);
            $data['challans'] = $this->common_model->sendchallan($data['condition']);

            $this->load->view('admin/mail/mailchallan', $data);
        }
    }

    public function sendvendorreport()
    {
        $data = array();
        //$data['page_title'] = 'Pending Report';
        if (($this->input->server('REQUEST_METHOD') === 'GET' || $this->input->server('REQUEST_METHOD') === 'POST') && $this->input->get('vendor_id')) {
            // echo "POST";
            // die();
            $data['condition'] = array(
                'from_date' => $this->input->post('s_from_date') ? $this->input->post('s_from_date') : date('Y-m-d', strtotime('- 7 days')),
                'to_date' => $this->input->post('s_to_date') ? $this->input->post('s_to_date') : date('Y-m-d', strtotime('+ 7 days')),
                'vendor_name' => $this->input->post('vendor_name'),
            );
            $data['condition'] = $this->security->xss_clean($data['condition']);
            $data['challans'] = $this->common_model->vendorreport($data['condition']);

            $this->load->view('admin/mail/printvendor', $data);
        }
    }

    public function imagemailcontent()
    {
        $data = array();
        //$data['page_title'] = 'Pending Report';
        if ($this->input->server('REQUEST_METHOD') === 'GET' && $this->input->get('store_id') && $this->input->get('order_no')) {
            $data['imagesData'] = $this->common_model->getmailimages($this->input->get('order_no'), $this->input->get('store_id'));

            $this->load->view('admin/mail/mailpicture', $data);
        }
    }

    public function sendimagemailcontent($store_id, $order_no)
    {
        $data = array();
        //$data['page_title'] = 'Pending Report';
        // if ($this->input->server('REQUEST_METHOD') === 'GET' && $this->input->get('store_id') && $this->input->get('order_no')) {
        if ($store_id != null && $order_no != null) {

            $content = file_get_contents('https://centuryfasteners.in/tumbleqr/admin/mailsend/imagemailcontent?store_id=' . $store_id . '&order_no=' . $order_no);

            //$content = "Testing email by iqbal";
            if (!$content) {
                return;
            }

            $this->load->library('PHPMailer_Lib');

            // PHPMailer object
            $mail = $this->phpmailer_lib->load();

            // SMTP configuration
            $mail->isSMTP();
            // $mail->Host = 'mail.centuryfasteners.in';
            // $mail->SMTPAuth = true;
            // $mail->Username = 'admin@centuryfasteners.in';
            // $mail->Password = 'B5]DIG&#OcNH';
            // $mail->SMTPSecure = 'ssl';
            // $mail->Port = 465;

            $mail->Host = 'smtp.office365.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'mis2@tumbledry.in';
            $mail->Password = 'Dag79650';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // $mail->SMTPDebug = 2;
            // $mail->Host = 'smtp.office365.com';
            // $mail->SMTPAuth = true;
            // $mail->Username = 'support@mailyellowpages.ae';
            // $mail->Password = '#TF@12346#';
            // $mail->SMTPSecure = 'tls';
            // $mail->Port = 587;

            $mail->setFrom('mis2@tumbledry.in', 'tumbledry');
            $mail->addReplyTo('mis2@tumbledry.in', 'tumbledry');

            // Add a recipient
            $mail->addAddress('iqbal.alam59@gmail.com');


            //$mail->addCC('anuj18.9999@gmail.com');
            // $mail->addCC('iqbal.alam59@gmail.com');
            // $mail->addCC('tech@tumbledry.in');
            // $mail->addCC('Romigaurav@gmail.com');
            //$mail->addCC('Akash.patel@tumbledry.in');
            //$mail->addBCC('iqbal.alam59@gmail.com');

            // Add cc or bcc
            // $mail->addCC('Gaurav.Teotia@tumbledry.in');
            // $mail->addCC('gaurishankarm@gmail.com');
            // $mail->addCC('tumbledryfactory@gmail.com');
            // $mail->addBCC('iqbal.alam59@gmail.com');

            // Email subject
            $mail->Subject = 'Image email';

            // Set email format to HTML
            $mail->isHTML(true);

            // Email body content
            $mailContent = $content;

            $mail->Body = $mailContent;

            // Send email
            if (!$mail->send()) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                echo 'Message has been sent';
            }
        }
    }

    public function initialmail()
    {
        $htmlData = file_get_contents('http://centuryfasteners.in/tumbleqr/admin/mailsend/?aaa');

        $this->send($htmlData);

        // $this->send("Test Message");

        /*
        $this->load->library('email');

        $this->email->from('iqbal@konceptsoftware.com', 'Iqbal Alam');
        $this->email->to('Gaurav.Nigam@tumbledry.in');
        $this->email->cc('Gaurav.Teotia@tumbledry.in');
        $this->email->cc('gaurishankarm@gmail.com');
        $this->email->bcc('iqbal.alam59@gmail.com');

        $this->email->subject('Incoming Report');
        $this->email->message($htmlData);
        $this->email->set_mailtype("html");

        $this->email->send();
         */
    }

    public function send($content)
    {
        // Load PHPMailer library
        $this->load->library('PHPMailer_Lib');

        // PHPMailer object
        $mail = $this->phpmailer_lib->load();

        // SMTP configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.office365.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'order_update@tumbledry.in';
        $mail->Password = 'Fuw39630';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->SMTPDebug = 2;

        // $mail->Host = 'mail.centuryfasteners.in';
        // $mail->SMTPAuth = true;
        // $mail->Username = 'admin@centuryfasteners.in';
        // $mail->Password = 'B5]DIG&#OcNH';
        // $mail->SMTPSecure = 'ssl';
        // $mail->Port = 465;

        $mail->setFrom('order_update@tumbledry.in', 'Factory Automation');
        $mail->addReplyTo('order_update@tumbledry.in', 'Factory Automation');


        // Add a recipient
        $mail->addAddress('Gaurav.Nigam@tumbledry.in');
        //$mail->addAddress('iqbal.alam59@gmail.com');

        // Add cc or bcc
        $mail->addCC('Gaurav.Teotia@tumbledry.in');
        $mail->addCC('gaurishankarm@gmail.com');
        $mail->addCC('tumbledryfactory@gmail.com');
        $mail->addCC('Akash.patel@tumbledry.in');
        $mail->addCC('kunal.batra@tumbledry.in');
        $mail->addCC('ranjan.tumbledry@gmail.com');
        $mail->addBCC('iqbal.alam59@gmail.com');

        // Email subject
        $mail->Subject = 'Factory Closely Watched Numbers (CWN) ' . date('Y-m-d', strtotime('-' . (24 * 60 - 330) . ' mins'));

        // Set email format to HTML
        $mail->isHTML(true);

        // Email body content
        $mailContent = $content;

        $mail->Body = $mailContent;

        // Send email
        if (!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }
    }

    public function qccomplete()
    {
        $data = array();
        $data['page_title'] = 'Pending Report';
        if ($this->input->server('REQUEST_METHOD') === 'GET') {
            // echo "POST";
            // die();
            $data['condition'] = array(
                'from_date' => $this->input->get('s_from_date') ? $this->input->get('s_from_date') : date('Y-m-d'),
                'to_date' => $this->input->get('s_to_date') ? $this->input->get('s_to_date') : date('Y-m-d'),
                'store_id' => $this->input->get('store_id'),
            );
            $data['condition'] = $this->security->xss_clean($data['condition']);
            $data['challans'] = $this->common_model->getQcCompleteData($data['condition']);
            $data['stores'] = $this->store_model->get_all_stores();
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
            $data['condition'] = array(
                'from_date' => $this->input->get('s_from_date') ? $this->input->get('s_from_date') : date('Y-m-d'),
                'to_date' => $this->input->get('s_to_date') ? $this->input->get('s_to_date') : date('Y-m-d'),
                'store_id' => $this->input->get('store_id'),
            );
            $data['condition'] = $this->security->xss_clean($data['condition']);
            $data['challans'] = $this->common_model->getQcReport($data['condition']);
            $data['stores'] = $this->store_model->get_all_stores();
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
            $data['condition'] = array(
                'from_date' => $this->input->get('s_from_date') ? $this->input->get('s_from_date') : date('Y-m-d'),
                'to_date' => $this->input->get('s_to_date') ? $this->input->get('s_to_date') : date('Y-m-d'),
                'store_id' => $this->input->get('store_id'),
            );
            $data['condition'] = $this->security->xss_clean($data['condition']);
            $data['challans'] = $this->common_model->getQcReportHourly($data['condition']);
            $data['stores'] = $this->store_model->get_all_stores();
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
            $data['condition'] = array(
                'from_date' => $this->input->get('s_from_date') ? $this->input->get('s_from_date') : date('Y-m-d'),
                'to_date' => $this->input->get('s_to_date') ? $this->input->get('s_to_date') : date('Y-m-d'),
                'store_id' => $this->input->get('store_id'),
            );
            $data['condition'] = $this->security->xss_clean($data['condition']);
            $data['challans'] = $this->common_model->getPackageData($data['condition']);
            $data['stores'] = $this->store_model->get_all_stores();
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
            $data['condition'] = array(
                'from_date' => $this->input->get('s_from_date') ? $this->input->get('s_from_date') : date('Y-m-d'),
                'to_date' => $this->input->get('s_to_date') ? $this->input->get('s_to_date') : date('Y-m-d'),
                'store_id' => $this->input->get('store_id'),
            );
            $data['condition'] = $this->security->xss_clean($data['condition']);
            $data['challans'] = $this->common_model->getPackageDataTotal($data['condition']);
            $data['stores'] = $this->store_model->get_all_stores();
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
            $data['condition'] = array(
                'from_date' => $this->input->get('s_from_date') ? $this->input->get('s_from_date') : date('Y-m-d'),
                'to_date' => $this->input->get('s_to_date') ? $this->input->get('s_to_date') : date('Y-m-d'),
                'store_id' => $this->input->get('store_id'),
            );
            $data['condition'] = $this->security->xss_clean($data['condition']);
            $data['challans'] = $this->common_model->getPackageDataHourly($data['condition']);
            $data['stores'] = $this->store_model->get_all_stores();
        }

        $data['main_content'] = $this->load->view('admin/reports/packaging', $data, true);
        $this->load->view('admin/index', $data);
    }

    public function pendingreport()
    {
        $data = array();
        $data['page_title'] = 'Pending Report';
        if ($this->input->server('REQUEST_METHOD') === 'GET') {
            // echo "POST";
            // die();
            $data['condition'] = array(
                'from_date' => $this->input->get('s_from_date') ? $this->input->get('s_from_date') : date('Y-m-d'),
                'to_date' => $this->input->get('s_to_date') ? $this->input->get('s_to_date') : date('Y-m-d'),
                'store_id' => $this->input->get('store_id'),
            );
            $data['condition'] = $this->security->xss_clean($data['condition']);
            $data['challans'] = $this->common_model->pendingreport($data['condition']);
            $data['stores'] = $this->store_model->get_all_stores();
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
            $data['condition'] = array(
                'from_date' => $this->input->get('s_from_date') ? $this->input->get('s_from_date') : date('Y-m-d'),
                'to_date' => $this->input->get('s_to_date') ? $this->input->get('s_to_date') : date('Y-m-d'),
                'store_id' => $this->input->get('store_id'),
            );
            $data['condition'] = $this->security->xss_clean($data['condition']);
            $data['challans'] = $this->common_model->garmentreport($data['condition']);
            $data['stores'] = $this->store_model->get_all_stores();
        }

        $data['main_content'] = $this->load->view('admin/reports/garmentreport', $data, true);
        $this->load->view('admin/index', $data);
    }

    public function pendingorderreport()
    {
        $data = array();
        $data['page_title'] = 'Pending Report';
        if ($this->input->server('REQUEST_METHOD') === 'GET') {
            // echo "POST";
            // die();
            $data['condition'] = array(
                'order_no' => $this->input->get('order_no'),
                'store_id' => $this->input->get('store_id'),
            );
            $data['condition'] = $this->security->xss_clean($data['condition']);
            $data['challans'] = $this->common_model->pendingorderreport($data['condition']);
            $data['stores'] = $this->store_model->get_all_stores();
        }

        $data['main_content'] = $this->load->view('admin/reports/pendingorderreport', $data, true);
        $this->load->view('admin/index', $data);
    }

    public function readytodispatch()
    {
        $data = array();
        $data['page_title'] = 'Pending Report';
        if ($this->input->server('REQUEST_METHOD') === 'GET') {
            // echo "POST";
            // die();
            $data['condition'] = array(
                'from_date' => $this->input->get('s_from_date') ? $this->input->get('s_from_date') : date('Y-m-d', strtotime('- 7 days')),
                'to_date' => $this->input->get('s_to_date') ? $this->input->get('s_to_date') : date('Y-m-d', strtotime('+ 7 days')),
                'store_id' => $this->input->get('store_id'),
            );
            $data['condition'] = $this->security->xss_clean($data['condition']);
            $data['challans'] = $this->common_model->readytodispatch($data['condition']);
            $data['stores'] = $this->store_model->get_all_stores();
        }

        $data['main_content'] = $this->load->view('admin/reports/readytodispatch', $data, true);
        $this->load->view('admin/index', $data);
    }

    public function otherreadytodispatch()
    {
        $data = array();
        $data['page_title'] = 'Pending Report';
        if ($this->input->server('REQUEST_METHOD') === 'GET') {
            // echo "POST";
            // die();
            $data['condition'] = array(
                'from_date' => $this->input->get('s_from_date') ? $this->input->get('s_from_date') : date('Y-m-d', strtotime('- 7 days')),
                'to_date' => $this->input->get('s_to_date') ? $this->input->get('s_to_date') : date('Y-m-d', strtotime('+ 7 days')),
                'store_id' => $this->input->get('store_id'),
            );
            $data['condition'] = $this->security->xss_clean($data['condition']);
            $data['challans'] = $this->common_model->readytodispatch($data['condition']);
            $data['stores'] = $this->store_model->get_all_stores();
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
            $data['condition'] = array(
                'from_date' => $this->input->get('s_from_date') ? $this->input->get('s_from_date') : date('Y-m-d'),
                'to_date' => $this->input->get('s_to_date') ? $this->input->get('s_to_date') : date('Y-m-d'),
                'store_id' => $this->input->get('store_id'),
            );
            $data['condition'] = $this->security->xss_clean($data['condition']);
            $data['challans'] = $this->common_model->dispatchreport($data['condition']);
            $data['stores'] = $this->store_model->get_all_stores();
        }

        $data['main_content'] = $this->load->view('admin/reports/dispatchreport', $data, true);
        $this->load->view('admin/index', $data);
    }

    public function dispatchorder()
    {
        if ($this->input->server('REQUEST_METHOD') === 'GET') {
            $flg = $this->input->get('flg');
            $order_no = $this->input->get('order_no');
            $store_id = $this->input->get('store_id');
            $from = $this->input->get('from');
            $to = $this->input->get('to');
            if ($order_no && $store_id) {
                $this->common_model->dispatchorder($order_no, $store_id);
                $this->session->set_flashdata('msg', 'Store added Successfully');
            } else {
                $this->session->set_flashdata('error_msg', 'Error');
            }
            if ($flg == 'other') {
                redirect("admin/reports/otherreadytodispatch?s_from_date=$from&s_to_date=$to");
            } else {
                redirect("admin/reports/readytodispatch?s_from_date=$from&s_to_date=$to");
            }
        }
    }

    public function mobileorderstatus()
    {
        $data = array();
        $data['page_title'] = 'Pending Report';
        if ($this->input->server('REQUEST_METHOD') === 'GET') {
            // echo "POST";
            // die();
            $data['condition'] = array(
                'order_no' => $this->input->get('order_no'),
                'store_id' => $this->input->get('store_id'),
            );
            $data['condition'] = $this->security->xss_clean($data['condition']);
            $data['challans'] = $this->common_model->pendingorderreport($data['condition']);
            $data['stores'] = $this->store_model->get_all_stores();
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
        $data['challans'] = $this->common_model->getBarcode(trim($this->input->get('barcode'), '*'));
        $data['page_title'] = 'Label';
        if (!empty($data['challans'])) {
            $this->load->view('admin/reports/printnew', $data);
        } else {
            $this->session->set_flashdata('error_msg', 'Barcode not exist');
            redirect("admin/reports/printpackinglabel");
        }
    }

    public function incomingtospot4pm()
    {
        $data = array();
        //         //$data['page_title'] = 'Pending Report';
        //         if($this->input->server('REQUEST_METHOD') === 'GET'  && $this->input->get('store_id') ){
        //           // echo "POST";
        //           // die();
        //           $data['condition']=array(
        //               'from_date'=> $this->input->post('s_from_date')?$this->input->post('s_from_date'):date('Y-m-d', strtotime('- 7 days')),
        //               'to_date'=> $this->input->post('s_to_date')?$this->input->post('s_to_date'):date('Y-m-d', strtotime('+ 7 days')),
        //               'store_id'=> $this->input->get('store_id')
        //           );
        //           $data['condition'] = $this->security->xss_clean($data['condition']);

        $data['start_date'] = date('Y-m-d 08:00:00');
        $data['end_date'] = date('Y-m-d 13:00:00');

        $data['challans'] = $this->common_model->incomingtospot4pm($data['start_date'], $data['end_date']);

        $this->load->view('admin/mail/incomingtospot', $data);
    }

    public function exceptionreport1am()
    {
        $data = array();

        $data['start_date'] = date('Y-m-d 15:00:00', strtotime('-2 day'));
        $data['end_date'] = date('Y-m-d 15:00:00', strtotime('-1 day'));
        $data['current_date'] = date('Y-m-d');


        $data['challans'] = $this->common_model->incomingtospot1am($data['start_date'], $data['end_date'], $data['current_date']);
        $data['spottoqc'] = $this->common_model->spottingtoqc1am($data['start_date'], $data['end_date'], $data['current_date']);
        $data['qctopack'] = $this->common_model->qctopack1am($data['start_date'], $data['end_date'], $data['current_date']);
        $this->load->view('admin/mail/exceptionreport1am.php', $data);
    }


    public function exportexceptionincomingtospot($start_date, $end_date, $current_date, $file_name)
    {
        header("Content-type: application/csv");
        header("Content-Disposition: attachment; filename=\"exception_report_" . $file_name . "_" . date('d-m-Y_H_i_s') . ".csv\"");
        header("Pragma: no-cache");
        header("Expires: 0");
        $handle = fopen('php://output', 'w');
        fputcsv($handle, array('Sr No.', 'Barcode', 'Store Name', 'Garment', 'Incoming Time', 'Packing Status'));




        $dataItems = $this->common_model->incomingtospotexport(urldecode($start_date), urldecode($end_date), urldecode($current_date));
        $i = 0;
        foreach ($dataItems as $item) {
            fputcsv($handle, array(++$i, $item['Barcode'], $item['Store_Name'], $item['Sub_Garment'], $item['incoming'], $item['packaging_stage']));
        }

        fclose($handle);
        exit;
    }


    public function exportexceptionspottoqc($start_date, $end_date, $current_date, $file_name)
    {
        header("Content-type: application/csv");
        header("Content-Disposition: attachment; filename=\"exception_report_" . $file_name . "_" . date('d-m-Y_H_i_s') . ".csv\"");
        header("Pragma: no-cache");
        header("Expires: 0");
        $handle = fopen('php://output', 'w');
        fputcsv($handle, array('Sr No.', 'Barcode', 'Store Name', 'Garment', 'Spot Time', 'Packing Status'));




        $dataItems = $this->common_model->spottingtoqcexport(urldecode($start_date), urldecode($end_date), urldecode($current_date));
        $i = 0;
        foreach ($dataItems as $item) {
            fputcsv($handle, array(++$i, $item['Barcode'], $item['Store_Name'], $item['Sub_Garment'], $item['incoming'], $item['packaging_stage']));
        }

        fclose($handle);
        exit;
    }

    public function exportexceptionqctopack($start_date, $end_date, $current_date, $file_name)
    {
        header("Content-type: application/csv");
        header("Content-Disposition: attachment; filename=\"exception_report_" . $file_name . "_" . date('d-m-Y_H_i_s') . ".csv\"");
        header("Pragma: no-cache");
        header("Expires: 0");
        $handle = fopen('php://output', 'w');
        fputcsv($handle, array('Sr No.', 'Barcode', 'Store Name', 'Garment', 'QC Time', 'Packing Status'));


        $dataItems = $this->common_model->qctopackexport(urldecode($start_date), urldecode($end_date), urldecode($current_date));
        $i = 0;
        foreach ($dataItems as $item) {
            fputcsv($handle, array(++$i, $item['Barcode'], $item['Store_Name'], $item['Sub_Garment'], $item['incoming'], $item['packaging_stage']));
        }

        fclose($handle);
        exit;
    }


    public function exportexceptionqctospot($start_date, $end_date, $current_date, $file_name)
    {
        header("Content-type: application/csv");
        header("Content-Disposition: attachment; filename=\"exception_report_" . $file_name . "_" . date('d-m-Y_H_i_s') . ".csv\"");
        header("Pragma: no-cache");
        header("Expires: 0");
        $handle = fopen('php://output', 'w');
        fputcsv($handle, array('Sr No.', 'Barcode', 'Store Name', 'Garment', 'QC Fail Time', 'Re Spot Time', 'Difference in Hr.'));


        $dataItems = $this->common_model->qctospotting1am(urldecode($start_date), urldecode($end_date), urldecode($current_date));
        $i = 0;
        foreach ($dataItems as $item) {
            fputcsv($handle, array(++$i, $item['Barcode'], $item['Store_Name'], $item['Sub_Garment'], $item['qc_fail_time'], $item['re_spot_time'], $item['diff_in_hr']));
        }

        fclose($handle);
        exit;
    }



    public function exceptionreport10am()
    {
        $data = array();

        $data['start_date'] = date('Y-m-d 15:00:00', strtotime('-1 day'));
        $data['end_date'] = date('Y-m-d 10:00:00');
        $data['current_date'] = date('Y-m-d 10:00:00');

        $data['challans'] = $this->common_model->incomingtospot1am($data['start_date'], $data['end_date'], $data['current_date']);
        $data['spottoqc'] = $this->common_model->spottingtoqc1am($data['start_date'], $data['end_date'], $data['current_date']);
        $data['qctopack'] = $this->common_model->qctopack1am($data['start_date'], $data['end_date'], $data['current_date']);
        $this->load->view('admin/mail/exceptionreport1am.php', $data);
    }

    public function exceptionreport2pm()
    {
        $data = array();

        $data['start_date'] = date('Y-m-d 15:00:00', strtotime('-1 day'));
        $data['end_date'] = date('Y-m-d 14:00:00');
        $data['current_date'] = date('Y-m-d 14:00:00');


        $data['challans'] = $this->common_model->incomingtospot1am($data['start_date'], $data['end_date'], $data['current_date']);
        $data['spottoqc'] = $this->common_model->spottingtoqc1am($data['start_date'], $data['end_date'], $data['current_date']);
        $data['qctopack'] = $this->common_model->qctopack1am($data['start_date'], $data['end_date'], $data['current_date']);
        $this->load->view('admin/mail/exceptionreport1am.php', $data);
    }

    public function exceptionreport6pm()
    {
        $data = array();

        $data['start_date'] = date('Y-m-d 15:00:00', strtotime('-1 day'));
        $data['end_date'] = date('Y-m-d 15:00:00');
        $data['current_date'] = date('Y-m-d 18:00:00');


        $data['challans'] = $this->common_model->incomingtospot1am($data['start_date'], $data['end_date'], $data['current_date']);
        $data['spottoqc'] = $this->common_model->spottingtoqc1am($data['start_date'], $data['end_date'], $data['current_date']);
        $data['qctopack'] = $this->common_model->qctopack1am($data['start_date'], $data['end_date'], $data['current_date']);
        $this->load->view('admin/mail/exceptionreport1am.php', $data);
    }


    //Qc to Re-Spot

    public function exceptionreportqctospot6am()
    {
        $data = array();

        $data['start_date'] = date('Y-m-d 20:00:00', strtotime('-1 day'));
        $data['end_date'] = date('Y-m-d 04:00:00');
        $data['current_date'] = date('Y-m-d 06:00:00');


        $data['qctospot'] = $this->common_model->qctospotting1am($data['start_date'], $data['end_date'], $data['current_date']);
        $this->load->view('admin/mail/exceptionreport.php', $data);
    }

    public function exceptionreportqctospot6pm()
    {
        $data = array();

        $data['start_date'] = date('Y-m-d 08:00:00');
        $data['end_date'] = date('Y-m-d 16:00:00');
        $data['current_date'] = date('Y-m-d 18:00:00');


        $data['qctospot'] = $this->common_model->qctospotting1am($data['start_date'], $data['end_date'], $data['current_date']);
        // print_r($data['qctospot']);
        $this->load->view('admin/mail/exceptionreport.php', $data);
    }


    //Qc to Re-Spot end





    public function incomingtospot8am()
    {
        $data = array();

        $data['start_date'] = date('Y-m-d 13:00:00', strtotime('-1 day'));
        $data['end_date'] = date('Y-m-d 08:00:00');
        $data['to_end_date'] = date('Y-m-d 11:00:00');
        $data['to_end_date_pack'] = date('Y-m-d 10:00:00');

        $data['challans'] = $this->common_model->incomingtospot8am($data['start_date'], $data['end_date'], $data['to_end_date']);

        $data['spottoqc'] = $this->common_model->spottingtoqc($data['start_date'], $data['end_date'], $data['to_end_date']);

        $data['qctopack'] = $this->common_model->qctopack($data['start_date'], $data['end_date'], $data['to_end_date_pack']);
        $this->load->view('admin/mail/incomingspot8am.php', $data);
    }

    public function send8am()
    {
        $htmlData = file_get_contents('https://centuryfasteners.in/tumbleqr/admin/mailsend/incomingtospot8am');

        //$this->sendEmail($htmlData, "Exception Report", "Gaurav.Nigam@tumbledry.in", array('tumbledryfactory@gmail.com', 'gaurishankarm@gmail.com', 'raj575384@gmail.com','Gaurav.Teotia@tumbledry.in'));
    }


    public function send5am()
    {
        $htmlData = file_get_contents('https://centuryfasteners.in/tumbleqr/admin/mailsend/exceptionreport1am');

        //$this->sendEmail($htmlData, "Today Exception Report", "Gaurav.Nigam@tumbledry.in", array('tumbledryfactory@gmail.com', 'gaurishankarm@gmail.com', 'raj575384@gmail.com', 'Gaurav.Teotia@tumbledry.in'));
    }


    public function send10am()
    {
        $htmlData = file_get_contents('https://centuryfasteners.in/tumbleqr/admin/mailsend/exceptionreport10am');

        //$this->sendEmail($htmlData, "Today Exception Report", "Gaurav.Nigam@tumbledry.in", array('tumbledryfactory@gmail.com', 'gaurishankarm@gmail.com', 'raj575384@gmail.com', 'Gaurav.Teotia@tumbledry.in'));
    }

    public function send2pm()
    {
        $htmlData = file_get_contents('https://centuryfasteners.in/tumbleqr/admin/mailsend/exceptionreport2pm');

        //$this->sendEmail($htmlData, "Today Exception Report", "Gaurav.Nigam@tumbledry.in", array('tumbledryfactory@gmail.com', 'gaurishankarm@gmail.com', 'raj575384@gmail.com', 'Gaurav.Teotia@tumbledry.in'));
    }

    public function send6pm()
    {
        $htmlData = file_get_contents('https://centuryfasteners.in/tumbleqr/admin/mailsend/exceptionreport6pm');

        //$this->sendEmail($htmlData, "Today Exception Report", "Gaurav.Nigam@tumbledry.in", array('tumbledryfactory@gmail.com', 'gaurishankarm@gmail.com', 'raj575384@gmail.com', 'Gaurav.Teotia@tumbledry.in'));
    }

    //

    public function sendqtos6am()
    {
        $htmlData = file_get_contents('https://centuryfasteners.in/tumbleqr/admin/mailsend/exceptionreportqctospot6am');

        //$this->sendEmail($htmlData, "Today  Re-Spotting Exception Report", "Gaurav.Nigam@tumbledry.in", array('tumbledryfactory@gmail.com', 'gaurishankarm@gmail.com', 'raj575384@gmail.com', 'Gaurav.Teotia@tumbledry.in'));
    }


    public function sendqtos6pm()
    {
        $htmlData = file_get_contents('https://centuryfasteners.in/tumbleqr/admin/mailsend/exceptionreportqctospot6pm');

        //$this->sendEmail($htmlData, "Today Re-Spotting Exception Report", "Gaurav.Nigam@tumbledry.in", array('tumbledryfactory@gmail.com', 'gaurishankarm@gmail.com', 'raj575384@gmail.com', 'Gaurav.Teotia@tumbledry.in'));
    }


    public function send4pm()
    {
        $htmlData = file_get_contents('https://centuryfasteners.in/tumbleqr/admin/mailsend/incomingtospot4pm');

        //$this->sendEmail($htmlData, "Exception Report", "Gaurav.Nigam@tumbledry.in");
    }

    public function sendEmail($content, $subject, $to, $cc = array(), $attachmentFile = '')
    {
        // Load PHPMailer library
        $this->load->library('PHPMailer_Lib');

        // PHPMailer object
        $mail = $this->phpmailer_lib->load();

        // SMTP configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.office365.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'order_update@tumbledry.in';
        $mail->Password = 'Fuw39630';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;


        // $mail->Host = 'mail.centuryfasteners.in';
        // $mail->SMTPAuth = true;
        // $mail->Username = 'admin@centuryfasteners.in';
        // $mail->Password = 'B5]DIG&#OcNH';
        // $mail->SMTPSecure = 'ssl';
        // $mail->Port = 465;

        $mail->setFrom('order_update@tumbledry.in', 'Factory Automation');
        $mail->addReplyTo('order_update@tumbledry.in', 'Factory Automation');

        // Add a recipient

        $mail->addAddress($to);
        foreach ($cc as $c) {
            $mail->addCC($c);
        }

        // Add cc or bcc
        // $mail->addCC('Gaurav.Teotia@tumbledry.in');
        // $mail->addAddress('iqbal.alam59@gmail.com');
        $mail->addBCC('iqbal.alam59@gmail.com');

        if ($attachmentFile) {
            $mail->AddAttachment($attachmentFile);
        }
        // Email subject
        $mail->Subject = $subject;

        // Set email format to HTML
        $mail->isHTML(true);

        // Email body content
        $mailContent = $content;

        $mail->Body = $mailContent;

        // Send email
        if (!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }
    }


    //Cloth Stuck Report

    public function sendClothReport()
    {
        $file_name = "assets/file.csv";
        $file = fopen($file_name, 'w');

        //SPOT
        fputcsv($file, array("Spotting"));
        fputcsv($file, array('Barcode', 'Store Name', 'Cloth Name', 'Due On', 'Incoming Time'));
        $clothes = $this->report_model->getSpotPendingClothes();
        foreach ($clothes as $c) {
            fputcsv($file, array($c['Barcode'], $c['Store_Name'], $c['Sub_Garment'], $c['Due_on'], $c['initial_time']));
        }
        fputcsv($file, array());
        fputcsv($file, array());

        //QC
        fputcsv($file, array("QC"));
        fputcsv($file, array('Barcode', 'Store Name', 'Cloth Name', 'Due On', 'Incoming Time'));
        $clothes = $this->report_model->getQcPendingClothes();
        foreach ($clothes as $c) {
            fputcsv($file, array($c['Barcode'], $c['Store_Name'], $c['Sub_Garment'], $c['Due_on'], $c['initial_time']));
        }
        fputcsv($file, array());
        fputcsv($file, array());

        //IRON
        fputcsv($file, array("Iron"));
        fputcsv($file, array('Barcode', 'Store Name', 'Cloth Name', 'Due On', 'Incoming Time'));
        $clothes = $this->report_model->getIronPendingClothes();
        foreach ($clothes as $c) {
            fputcsv($file, array($c['Barcode'], $c['Store_Name'], $c['Sub_Garment'], $c['Due_on'], $c['initial_time']));
        }
        fputcsv($file, array());
        fputcsv($file, array());

        //Packing
        fputcsv($file, array("Packing"));
        fputcsv($file, array('Barcode', 'Store Name', 'Cloth Name', 'Due On', 'Incoming Time'));
        $clothes = $this->report_model->getPackingPendingClothes();
        foreach ($clothes as $c) {
            fputcsv($file, array($c['Barcode'], $c['Store_Name'], $c['Sub_Garment'], $c['Due_on'], $c['initial_time']));
        }
        fputcsv($file, array());
        fputcsv($file, array());
        //Ready to Dispatch
        fputcsv($file, array("Ready to Dispatch"));
        fputcsv($file, array('Barcode', 'Store Name', 'Cloth Name', 'Due On', 'Incoming Time'));
        $clothes = $this->report_model->getRtdPendindClothes();
        foreach ($clothes as $c) {
            fputcsv($file, array($c['Barcode'], $c['Store_Name'], $c['Sub_Garment'], $c['Due_on'], $c['initial_time']));
        }




        fclose($file);

        $this->sendEmail("Pending Clothes Report", "Pending Report", "Akash.patel@tumbledry.in", array('Gaurav.Teotia@tumbledry.in', 'tumbledryfactory@gmail.com'), $file_name);
    }
}