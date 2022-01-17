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
    //$this->send("TEST ORDER NO", "TEST STORE");
    foreach ($data['pictures'] as $p){
       $this->send($p['Order_No'], $p['store_id'], $p['Barcode']);
        $this->common_model->update_email_status($p['Order_No'], $p['store_id']);
       
    }
    
}

function getCustomerEmail($barcode=''){
    $data = array(
    'Barcode' => $barcode,
    'StoreCode' => 'TS0',
    'Token' => 'QhI3bD3cR7iF8kL6wW5DC'
);

$url = "https://api.quickdrycleaning.com/APIQDC/CustomerInfo";
$postdata = json_encode($data);
$ch = curl_init($url); 
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
$result = curl_exec($ch);
curl_close($ch);
$info=json_decode($result);
if($info)
return $info->EmailID; 
else
return;
}




 public function send($order_no, $store_id, $barcode)
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
        $mail->Password = 'Tumble@2022';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;


        // $mail->Host = 'mail.centuryfasteners.in';
        // $mail->SMTPAuth = true;
        // $mail->Username = 'admin@centuryfasteners.in';
        // $mail->Password = 'B5]DIG&#OcNH';
        // $mail->SMTPSecure = 'ssl';
        // $mail->Port = 465;

        $mail->setFrom('order_update@tumbledry.in', 'Tumbledry - Order Update');
        $mail->addReplyTo('order_update@tumbledry.in', 'Tumbledry - Order Update');

        
        // Add a recipient
//GET EMAIL ID OF CUSTOMERS
        $customer_email=$this->getCustomerEmail($barcode);
          if($customer_email)  
          {$mail->addAddress($customer_email);}
          else { return;} 

$storeData=$this->common_model->get_store_email($store_id, "tbl_store");
$store_email=$storeData->email_id;
if($store_email) 
$mail->addBCC($store_email);

//END EMAIL ID OF CUSTOMERS

        $mail->addBCC('Gaurav.Nigam@tumbledry.in');
        //$mail->addAddress('iqbal.alam59@gmail.com');

        // Add cc or bcc
       // $mail->addCC('Gaurav.Teotia@tumbledry.in');
        $mail->addBCC('gaurishankarm@gmail.com');
        $mail->addBCC('kunal.batra@tumbledry.in');
       // $mail->addCC('tumbledryfactory@gmail.com');
        //$mail->addBCC('iqbal.alam59@gmail.com');


        // Email subject
        $mail->Subject = "Update: Tumbledry Order # ".$order_no;

        // Set email format to HTML
        $mail->isHTML(true);

        // Email body content
        $url="https://centuryfasteners.in/tumbleqr/admin/images/viewgallery/".$order_no."/".$store_id;
        
        $mailContent = "Dear Customer<br><br>
 
Thank you for choosing Tumbledry as your Dry Clean Service Partner. This is an update regarding your order # ".$order_no.".<br><br>
 
We have few observations in order # ".$order_no." during the Pre-Processing inspection by our Dry Cleaning experts which can be seen by clicking on below link:
<br><br>
<a href=".$url.">Update on your order # ".$order_no."</a><br><br>
Our Team of Experts at Tumbledry will try their best to resolve it and deliver your garments fresh as new.<br><br>

In case you feel there is any discrepancy, please feel free to contact us on 8080809334<br/><r/>

Warm Regards,<br>
Tumbledry <br><br><br><br><br> <em>This is an auto generated mail. Please do not reply to this. To know more about our services, please visit: <a href='https://www.tumbledry.in'>www.tumbledry.in</a>
</em>";

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