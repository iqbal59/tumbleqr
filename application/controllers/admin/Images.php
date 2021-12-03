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


public function sendPhotoEmail(){
    $data['pictures']=$this->common_model->getPicturestoEmail();
   
    foreach ($data['pictures'] as $p){
        $this->send($p['Order_No'], $p['store_id']);
        $this->common_model->update_email_status($p['Order_No'], $p['store_id']);
    }
    
}



 public function send($order_no, $store_id)
    {
        // Load PHPMailer library
        $this->load->library('PHPMailer_Lib');

        // PHPMailer object
        $mail = $this->phpmailer_lib->load();

        // SMTP configuration
        $mail->isSMTP();
        $mail->Host = 'mail.centuryfasteners.in';
        $mail->SMTPAuth = true;
        $mail->Username = 'admin@centuryfasteners.in';
        $mail->Password = 'B5]DIG&#OcNH';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('admin@centuryfasteners.in', 'Factory Automation');
        $mail->addReplyTo('admin@centuryfasteners.in', 'Factory Automation');

        // Add a recipient
       // $mail->addAddress('Gaurav.Nigam@tumbledry.in');
        $mail->addAddress('iqbal.alam59@gmail.com');

        // Add cc or bcc
       // $mail->addCC('Gaurav.Teotia@tumbledry.in');
       // $mail->addCC('gaurishankarm@gmail.com');
       // $mail->addCC('tumbledryfactory@gmail.com');
        //$mail->addBCC('iqbal.alam59@gmail.com');

        // Email subject
        $mail->Subject = "Order # ".$order_no."_Incoming Photos";

        // Set email format to HTML
        $mail->isHTML(true);

        // Email body content
        $url="https://centuryfasteners.in/tumbleqr/admin/images/viewgallery/".$order_no."/".$store_id;
        
        $mailContent = "<a href=".$url.">".$url."</a>";

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