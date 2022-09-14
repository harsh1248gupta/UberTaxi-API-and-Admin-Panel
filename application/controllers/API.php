<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
/*     require ('/vendor/autoload.php');
 */
    use Twilio\Rest\Client;

    class API extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
            $this->load->helper('url');
		    $this->load->model('webservice_general_model');
            $this->load->model('Createdata');
            $this->load->library('form_validation');
            $this->load->library('session');
		require_once(APPPATH.'libraries/twilio-php-master/Twilio/autoload.php');

        }
        public function loginNew()
        {
            header('Content-type:application/json');
            $number=trim($this->input->post('number'));
			$code=trim($this->input->post('country_code'));
		
			
            if ($number == "") {
                $data['status']='false';    
                $data['message']='Please enter Mobile Number ';
            }
            else {
                $userexist=$this->Createdata->check_phone($number);
           
				if ($userexist) {
                    $randome = rand(1000,9999);
                     
					
					try
            {
						
		 // Demo SMS code				
				$sid    = "AC153995210da2ba1813dd97f9c27da893"; 
$token  = "4e5d891f8578dc33370aa8640879d02c"; 
$twilio = new Client($sid, $token); 
 
$message = $twilio->messages 
                  ->create($number, // to 
                           array(  
                               "messagingServiceSid" => "MG41d57958868766dec7822304862b1e95",      
                               "body" => "Welcome to Uber App Your OTP is $randome."
                           ) 
                  ); 
 		
	
						
 /*   // Live SMS code
 $client = new Twilio\Rest\Client($sid, $token);
             $client->messages->create(
                 $number,
                array(
                    "from" => "+61485871211",
                    'body' => "Welcome to Uber App Your OTP is $randome."
                )
            ); */
            
            $this->Createdata->otp($randome,$number);
                    $id = $this->Createdata->getUserId($code+$number);
                    // $this->session->set_userdata('id', $id);
                    $data['status']='true';
                    $data['message']='OTP send to Your Mobile Number';
                    $data['details']=$randome;
                    $data['CustomerId']=$id;
           
            }
            catch(Exception $e)
            {

            $data['status'] = "false";
            $data['message'] = "$e Please enter valid mobile number"; 
            }
	
                }
                else {
					
					   $randome = rand(1000,9999);
    	
					
					try
                {
						
												
		 // Demo SMS code				
				$sid    = "AC153995210da2ba1813dd97f9c27da893"; 
$token  = "4e5d891f8578dc33370aa8640879d02c"; 
$twilio = new Client($sid, $token); 
 
$message = $twilio->messages 
                  ->create($number, // to 
                           array(  
                               "messagingServiceSid" => "MG41d57958868766dec7822304862b1e95",      
                               "body" => "Welcome to Uber App Your OTP is $randome."
                           ) 
                  ); 
 		
               /* // Live Sms Code
			   $client = new Twilio\Rest\Client($sid, $token);
                 $client->messages->create(
                     $number,
                    array(
                        "from" => "+61485871211",
                        'body' => "Welcome to Uber App Your OTP is $randome."
                    )
                ); */
					
                   
                    $phone = array(
                        'phone'=> $code+$number,
                        'otp' => $randome
                    );
                    $this->Createdata->customer_login_phone($phone);
                    $id = $this->Createdata->getUserId($number);

                    // $this->Createdata->otp($otp,$number);             
                    $data['status']='true';
                    $data['message']='OTP send to Your Mobile Number';
                    $data['details']=$phone;
                    $data['CustomerId']=$id;
                    $this->session->set_userdata('number', $number);
	
                }
                catch(Exception $e)
                {
                $data['status'] = "false";
                $data['message'] = "$e Please enter valid mobile number"; 
                }
					
					
                   

                }
            }
            echo json_encode($data);
        }
		
		
		
      public function SendSmsNew()
        {
		     header('Content-type:application/json');
            $number=trim($this->input->post('mobile'));
		
 
// Update the path below to your autoload.php, 
// see https://getcomposer.org/doc/01-basic-usage.md 
//require_once '/path/to/vendor/autoload.php'; 
 
//use Twilio\Rest\Client; 
 
$sid    = "AC153995210da2ba1813dd97f9c27da893"; 
$token  = "4e5d891f8578dc33370aa8640879d02c"; 
$twilio = new Client($sid, $token); 
 
$message = $twilio->messages 
                  ->create($number, // to 
                           array(  
                               "messagingServiceSid" => "MG41d57958868766dec7822304862b1e95",      
                               "body" => "HELLO" 
                           ) 
                  ); 
 
//print($message->sid);
		
		}
		
		
		
		    public function sendEmailNew()
        {
				  header('Content-type:application/json');
            $email=trim($this->input->post('email'));
            $subject=trim($this->input->post('subject'));
			 $msg=trim($this->input->post('msg'));
					
				
		$ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,"http://139.59.69.59/ebaba/webservice/sendMyMail");
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS,
                  "email=$email&subject=$subject&message=$msg");

      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $server_output = curl_exec($ch);
      curl_close ($ch);
				
				  echo json_encode($email);
		
			}
		

		
        public function login()
        {
            header('Content-type:application/json');
            $number=trim($this->input->post('number'));
            $code=trim($this->input->post('country_code'));
	

            if ($number == "" | $code == "") {
                $data['status']='false';    
                $data['message']='Please enter Mobile Number ';
            }
            else {
                $userexist=$this->Createdata->check_phone($number);
                if ($userexist) {
                    $randome = rand(1000,9999);
                    // $randome = "1234";
					
							 // Demo SMS code				
				$sid    = "AC153995210da2ba1813dd97f9c27da893"; 
$token  = "4e5d891f8578dc33370aa8640879d02c"; 
$twilio = new Client($sid, $token); 
 $mobile = $code.$number;
$message = $twilio->messages 
                  ->create($mobile, // to 
                           array(  
                               "messagingServiceSid" => "MG41d57958868766dec7822304862b1e95",      
                               "body" => "Welcome to Uber App Your OTP is $randome."
                           ) 
                  ); 
					
					
            $this->Createdata->otp($randome,$number,$code);
                    //$id = $this->Createdata->getUserId($number);
                    // $this->session->set_userdata('id', $id);
                    $data['status']='true';
                    $data['message']='OTP send to Your Mobile Number';
					    $details = array(
                                'phone'=> $number,
                                'otp'=> (string)$randome,
                            );
                    $data['details']=$details;
                    //$data['CustomerId']=$id;
           
        
                }
                else {
					
					
					  $randome = rand(1000,9999);
       //$randome = "1234";
					
					$mobile = $code.$number;
					
												 // Demo SMS code				
				$sid    = "AC153995210da2ba1813dd97f9c27da893"; 
$token  = "4e5d891f8578dc33370aa8640879d02c"; 
$twilio = new Client($sid, $token); 
 
$message = $twilio->messages 
                  ->create($mobile, // to 
                           array(  
                               "messagingServiceSid" => "MG41d57958868766dec7822304862b1e95",      
                               "body" => "Welcome to Uber App Your OTP is $randome."
                           ) 
                  ); 
					
					
					
                    $details = array(
                        'phone'=> $number,
                        'otp' => (string)$randome,
						'country_code' => $code						
                    );
                    $this->Createdata->customer_login_phone($details);
                    //$id = $this->Createdata->getUserId($number);

                    // $this->Createdata->otp($otp,$number);             
                    $data['status']='true';
                    $data['message']='OTP send to Your Mobile Number';
                    $data['details']=$details;
                    //$data['CustomerId']=$id;
                    $this->session->set_userdata('number', $number);
	
               
                }
            }
            echo json_encode($data);
        }
		
		public function googleSignIn()
    {
        header('Content-Type: application/json');
        // date_default_timezone_set('Asia/Kuwait');
        $date = Date('y/m/d');
        $google_id = (trim($this->input->post('google_id')));
        $image = (trim($this->input->post('image')));
        $email = (trim($this->input->post('email')));
        $firstname = (trim($this->input->post('firstname')));
		$lastname = (trim($this->input->post('lastname')));
        //$lastname = (trim($this->input->post('last_name')));
        if ($google_id == "" ||  $email == "") {
            $data['status'] = "false";
            $data['message'] = "please entered all the required field";
        } else {
            $this->db->select('*');
            $this->db->from('users');
            $this->db->where('email', $email);
            $query = $this->db->get();
            if ($query->num_rows() == '0') {
                $insert_data = array(
                    'email' => $email,
                    'google_id' => $google_id,
                    'first_name' => $firstname,
                    'last_name' => $lastname,
                    'image' => $image,
                );
                $this->db->insert('users', $insert_data);
                $user = $this->db->select("id,first_name,last_name,email,image,google_id")->where(['email' => $email])->get("users")->row();
                $data['status'] = "true";
                $data['message'] = "registration successful";
                $data['data'] = $user;
            } else {
                $this->db->select('*');
                $this->db->from('users');
                $this->db->where('email', $email);
                $this->db->where('google_id', $google_id);
                $query = $this->db->get();
                if ($query->num_rows() == '1') {
                    $user = $this->db->select("id,first_name,last_name,email,image,google_id")->where(['email' => $email])->get("users")->row();
                    $data['status'] = "true";
                    $data['message'] = "Login successfully";
                    $data['data'] = $user;
                } else {
                    $data['status'] = "false";
                    $data['message'] = "Invalid user details";
                }
            }
        }
        echo json_encode($data);
    }
		
		
		        public function addNumber()
				{
					header('Content-type:application/json');
					$id = trim($this->input->post('id'));
					$phone = trim($this->input->post('number'));
					$code=trim($this->input->post('country_code'));

					if ($id == "" || $phone == "")
					{
						$data['status']='false';    
						$data['message']='Please enter OTP';
         		   	}
					else
					{
						$filter2['id'] = $id;
						$set2['phone'] = $phone;
						$set2['country_code'] = $code;
						$this->webservice_general_model->update('users', $filter2, $set2);
						$data['status']='true';    
						$data['message']='Mobile Number Added Successfully';
					}
				echo json_encode($data);

				}

		
		
        public function verifyotp()
        {
            header('Content-type:application/json');
            $otp = trim($this->input->post('otp'));
            $number = trim($this->input->post('number'));
            if ($otp == "") {
                $data['status']='false';    
                $data['message']='Please enter OTP';
            }
            else {
                // $id = $this->session->userdata('id');
				$otpexist = $this->db->select("otp")->where(['phone' => $number])->get("users")->row()->otp;
				$id = $this->Createdata->getUserId($number);
				$isverfied = $this->db->select('isverfied')->where(['phone' => $number])->get("users")->row()->isverfied;
                if ($otpexist == $otp) {
                    $data['status']='true';    
                    $data['message']='Login Successful';
                    $data['CustomerId']=$id;
					$data['IsVerified']=(string)$isverfied;
                }
                else {
                    $data['status']='false';    
                    $data['message']='Please enter correct OTP.';
                } 
            }
            echo json_encode($data);
        }

        public function signup()
        {   
            header('Content-type:application/json');

            $firstname=trim($this->input->post('first_name'));
            $lastname=trim($this->input->post('last_name'));
            $email=trim($this->input->post('email'));
            $id=trim($this->input->post('id'));
			$isverfied="1";
            // $id=$this->session->userdata('id');

            $this->load->config("email");
            $this->load->library('email');
            $from= $this->config->item("smtp_user");
            $email=$this->input->post('email');

            if($firstname == "" | $lastname == "" | $email == "" | $id == ""){
                $data['status']='false';    
                $data['message']='Please enter All the Fields';
            }
            else{
                $usermailexist=$this->Createdata->chqmail($email);
                if ($usermailexist) {
                    $data['status']='false';    
                    $data['message']='Email Already Exist';
                }
                else {
                    $details= array(
                        'first_name' => $firstname,
                        'last_name' => $lastname,
                        'email' => $email,
                        'id' => $id,
						'isverfied' => $isverfied
                    );
                    $this->Createdata->signup($firstname,$lastname,$email,$id,$isverfied);   
                    $data['status']='true';    
                    $data['message']='Registered Successfully';
                    $data['details']=$details;

                }        
            }
            echo json_encode($data);
            
        }

        public function sendmail()
        {
            
           header('Content-Type: application/json');
           $this->load->library('email');
           $config['protocol']='sendmail';
           $config['smtp_host']='ssl://smtp.googlemail.com';
           $config['smtp_port']='465';
           $config['smtp_timeout']='30';
           $config['smtp_user']='harsh.ixora@gmail.com';
           $config['smtp_pass']='harsh@123!';
           $config['charset']='utf-8';
           $config['newline']="\r\n";
           $config['wordwrap'] = TRUE;
           $config['mailtype'] = 'html';
           $this->email->initialize($config);
           $this->email->from('harsh.ixora@gmail.com');
           $this->email->to("ankur.ixora@gmail.com");
		   $subject="Welcome to uberTaxi";
           $this->email->subject($subject);
		   $msg="Thanks for registering on ubertaxi";
           $this->email->message($msg);
		   if($this->email->send()){
				$data['status']="True";
				$data['message']="email send successfully";
		    }
			else{
				echo $this->email->print_debugger(); die;
			}
      
            echo json_encode($data);
        }      


        public function get_details()
        {
            header('Content-type:application/json');
            $id=trim($this->input->post('id'));
            // $id=$this->session->userdata('id');
            
            if ($id) {
                $details = $this->Createdata->customer_details($id);
                $data['status']='true';
                $data['message']='Details Fetched';
                $data['details']=$details;

            }
            else {
                $data['status']='false';
                $data['message']='Error!';
                
            }
            echo json_encode($data);
            
        }

		
		public function editCustomerProfile()
{
		
    header('Content-Type: application/json');
    $id = (trim($this->input->post('id')));
    $mobile = (trim($this->input->post('mobile')));
    $gender = (trim($this->input->post('gender')));
    $firstname = (trim($this->input->post('first_name')));
	$lastname = (trim($this->input->post('last_name')));
    $email = (trim($this->input->post('email')));
	$password = (trim($this->input->post('password')));
			
    if ($id == "") {
        $data['status'] = "false";
        $data['message'] = "Please enter required details";
    } else {
        $user = $this->db->select("*")->where(['id' => $id])->get("users")->num_rows();
        if ($user == '1') {
            if ($_FILES) {
                $image_name1 = "";
                $image_name_thumb1 = "";
                // Upload profile picture
                $random = time();
                $config['upload_path'] = $_SERVER['DOCUMENT_ROOT'] . "/UberTaxi/uploads/profile/";
                $config['allowed_types'] = '*';
                $config['file_name'] = $random;
                $config['encrypt_name'] = TRUE;
                $this->load->library('image_lib');
                $this->image_lib->clear();
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                ini_set('upload_max_filesize', '64M');
                ini_set('memory_limit', '-1');
                if ($this->upload->do_upload('image')) {
                    $imageArray = $this->upload->data();
                    $image_name1 = $imageArray['raw_name'] . '' . $imageArray['file_ext']; // Job Attachment
                    $config1['image_library'] = 'gd2';
                    $config1['source_image'] = $_SERVER['DOCUMENT_ROOT'] . "/UberTaxi/uploads/profile/" . $image_name1;
                    $config1['create_thumb'] = TRUE;
                    $config1['maintain_ratio'] = TRUE;
                    $config1['width']     = 300;
                    $config1['height']   = 377;
                    $this->load->library('image_lib', $config);
                    $this->image_lib->initialize($config1);
                    $this->image_lib->resize();
                    $this->image_lib->clear();
                    $image_name = 'http://ixorainfotech.in/UberTaxi/uploads/profile/'.$imageArray['raw_name'] . $imageArray['file_ext'];
                   
					   $details = array(
                                'first_name'=> $firstname,
                                'last_name'=> $lastname,
                                'email' => $email,
                                'id' => $id,
                                'image' => $image_name,
						     //'mobile' => $mobile
                            );
                            $this->Createdata->edit_detailswithimage($firstname,$lastname,$email,$image_name,$id);
                            $data['status']='true';
                            $data['message']='Details Updated Successfully';
                            $data['details']=$details;
					
					
                } else {
                     $details = array(
                                'first_name'=> $firstname,
                                'last_name'=> $lastname,
                                'email' => $email,
                                'id' => $id,
						     //'mobile' => $mobile
                            );
                            $this->Createdata->edit_details($firstname,$lastname,$email,$id);
                            $data['status']='true';
                            $data['message']='Details Updated Successfully';
                            $data['details']=$details;
                }
            } else {
              $details = array(
                                'first_name'=> $firstname,
                                'last_name'=> $lastname,
                                'email' => $email,
                                'id' => $id,
						     //'mobile' => $mobile
                            );
                            $this->Createdata->edit_details($firstname,$lastname,$email,$id);
                            $data['status']='true';
                            $data['message']='Details Updated Successfully';
                            $data['details']=$details;
            }
        } else {
            $data['status'] = "false";
            $data['message'] = "Enter valid user id";
        }
    }
    echo json_encode($data);
}

		
				
		public function editCustomerProfileNew()
{
		
    header('Content-Type: application/json');
    $id = (trim($this->input->post('id')));
    //$mobile = (trim($this->input->post('mobile')));
    $gender = (trim($this->input->post('gender')));
    $firstname = (trim($this->input->post('name')));
	$lastname = (trim($this->input->post('lastname')));
    $email = (trim($this->input->post('email')));
	$password = (trim($this->input->post('password')));
			
    if ($id == "") {
        $data['status'] = "false";
        $data['message'] = "Please enter required details";
    } else {
        $user = $this->db->select("*")->where(['id' => $id])->get("users")->num_rows();
        if ($user == '1') {
            if ($_FILES) {
                $image_name1 = "";
                $image_name_thumb1 = "";
                // Upload profile picture
                $random = time();
                $config['upload_path'] = $_SERVER['DOCUMENT_ROOT'] . "/UberTaxi/uploads/profile/";
                $config['allowed_types'] = '*';
                $config['file_name'] = $random;
                $config['encrypt_name'] = TRUE;
                $this->load->library('image_lib');
                $this->image_lib->clear();
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                ini_set('upload_max_filesize', '64M');
                ini_set('memory_limit', '-1');
                if ($this->upload->do_upload('image')) {
                    $imageArray = $this->upload->data();
                    $image_name1 = $imageArray['raw_name'] . '' . $imageArray['file_ext']; // Job Attachment
                    $config1['image_library'] = 'gd2';
                    $config1['source_image'] = $_SERVER['DOCUMENT_ROOT'] . "/UberTaxi/uploads/profile/" . $image_name1;
                    $config1['create_thumb'] = TRUE;
                    $config1['maintain_ratio'] = TRUE;
                    $config1['width']     = 300;
                    $config1['height']   = 377;
                    $this->load->library('image_lib', $config);
                    $this->image_lib->initialize($config1);
                    $this->image_lib->resize();
                    $this->image_lib->clear();
                    $image_name = 'http://ixorainfotech.in/UberTaxi/uploads/profile/'.$imageArray['raw_name'] . $imageArray['file_ext'];
                   
					   $details = array(
                                'name'=> $firstname,
                                'lastname'=> $lastname,
                                'email' => $email,
                                'id' => $id,
                                'image' => $image_name,
						     //'mobile' => $mobile
                            );
                            $this->Createdata->edit_detailswithimage($firstname,$lastname,$email,$image_name,$id);
                            $data['status']='true';
                            $data['message']='Details Updated Successfully';
                            $data['details']=$details;
					
					
                } else {
                     $details = array(
                                'name'=> $firstname,
                                'lastname'=> $lastname,
                                'email' => $email,
                                'id' => $id,
						     //'mobile' => $mobile
                            );
                            $this->Createdata->edit_details($firstname,$lastname,$email,$id);
                            $data['status']='true';
                            $data['message']='Details Updated Successfully';
                            $data['details']=$details;
                }
            } else {
              $details = array(
                                'name'=> $firstname,
                                'lastname'=> $lastname,
                                'email' => $email,
                                'id' => $id,
						     //'mobile' => $mobile
                            );
                            $this->Createdata->edit_details($firstname,$lastname,$email,$id);
                            $data['status']='true';
                            $data['message']='Details Updated Successfully';
                            $data['details']=$details;
           }
        } else {
            $data['status'] = "false";
            $data['message'] = "Enter valid user id";
        }
    }
    echo json_encode($data);
}


        public function editprofile()
        {
            header('Content-type:application/json');
            $firstname=trim($this->input->post('first_name'));
            $lastname=trim($this->input->post('last_name'));
            $email=trim($this->input->post('email'));
            $id=trim($this->input->post('id'));
			
            // $id=$this->session->userdata('id');
            
            if ($firstname == "" |$lastname == "" | $email == "") {
                $data['status']='false';
                $data['message']='Enter All the Details.';
            }
            else {
                $user = $this->db->select("*")->where(['id' => $id])->get("users")->num_rows();
                if ($user == '1') {
                    if($_FILES){
    
                        $image_name1 = "";
                        $image_name_thumb1 = "";
    
                        $random = time();
                        $config['upload_path'] =$_SERVER['DOCUMENT_ROOT']."/UberTaxi/upload/" ;
                        $config['allowed_types']= "*";
                        $config['file_name']= "$random";
                        $config['encrypt_name']= TRUE;
                        $this->load->library('image_lib');
                        $this->image_lib->clear();
                        $this->load->library('upload',$config);
                        $this->upload->initialize($config);
    
                        ini_set('upload_max_filesize','64M');
                        ini_set('memory_limit','-1');
    
                        if ($this->upload->do_upload('image')) {
                            $imageArray = $this->upload->data();
    
                            $image_name1 = $imageArray['raw_name'].''.$imageArray['file_ext'];
    
                            $config1['image_library'] ='gd2';
                            $config1['source_image'] = $_SERVER['DOCUMENT_ROOT']."/UberTaxi/upload/".$image_name1;
                            $config1['create_thumb'] = TRUE;
                            $config1['maintain_ratio'] = TRUE;
                            $config1['width'] = 300;
                            $config1['height'] = 377;
                    
                            $this->load->library('image_lib',$config);
                            $this->image_lib->initialize($config1);
                            $this->image_lib->resize();
                            $this->image_lib->clear();
                            $image_name = $imageArray['raw_name'].$imageArray['file_ext'];
							
							
                            $details = array(
                                'first_name'=> $firstname,
                                'last_name'=> $lastname,
                                'email' => $email,
                                'id' => $id,
                                'image' => $image_name
                            );
                            $this->Createdata->edit_detailswithimage($firstname,$lastname,$email,$image_name,$id,"135651");
                            $data['status']='true';
                            $data['message']='Details Updated Successfully';
                            $data['details']=$details;
                        }
                        else{
                            $details = array(
                                'first_name'=> $firstname,
                                'last_name'=> $lastname,
                                'email' => $email,
                                'id' => $id
                            );
                            $this->Createdata->edit_details($firstname,$lastname,$email,$id,"995959");
                            $data['status']='true';
                            $data['message']='Details Updated Successfully';
                            $data['details']=$details;
                        }
    
                    }
                }
                else {
                    $data['status'] = "false";
                    $data['message'] = "Enter valid user id";
                }

            }
            echo json_encode($data);
    }

        public function userimage()
        {
            
        }

        public function sendSms()
        {
            header('Content-type:application/json');
 
            $this->load->library('twilio');
            $this->load->config('twilio');
            $sms_sender = '17085787547';
            $sms_reciever = '918770148013';
            $from = '+'.$sms_sender; //trial account twilio number
            $to = $sms_reciever; //sms recipient number
            
            if ($sms_reciever == "") 
            {
                $data['status']='false';
                $data['message']='Please Enter Number';
            }
            else {
                $randome = rand(1000, 9999);
                $message = /* $randome. */'is your one Time Password. Do not share it with anybody';
                $response = $this->twilio->sms($from, $to,$message);
                 
                if($response->IsError){
                    $data['status']='false';
                    $data['otp']=$randome;
                    $data['from']=$from;
                    $data['to']=$to;
                    $data['message']=$message;
                }
                else{
                    $data['status']='true';
                    $data['message']=$randome;
                }
            }
            echo json_encode($data);

        }





        public function driverLogin()
        {
            header('Content-type:application/json');
            $number=trim($this->input->post('number'));
            if ($number == "") {
                $data['status']='false';    
                $data['message']='Please enter Mobile Number ';
            }
            else {
                $userexist=$this->Createdata->check_phone_driver($number);
                if ($userexist) {
                   //  $randome = rand(1000,9999);
                   $randome = "1234";
                    $this->Createdata->driverotp($randome,$number);
                    $id = $this->Createdata->getDriverId($number);
                    $data['status']='true';
                    $data['message']='OTP send to Your Mobile Number';
                    $details = array(
                        'phone'=> $number,
                        'otp'=> (string)$randome
                    );
                    $data['details']=$details;
                    $data['DriverId']=$id;

                }
                else {
                      // $randome = rand(1000,9999);
                      $randome = "1234";
                    $phone = array(
                        'phone'=> $number,
                        'otp' => (string)$randome
                    );
                    $this->Createdata->driver_login_phone($phone);
                    $id = $this->Createdata->getDriverId($number);
                    // $this->session->set_userdata('id', $id);
                    // $this->Createdata->otp($otp,$number);             
                    $data['status']='true';
                    $data['message']='OTP send to Your Mobile Number';
                    $data['details']=$phone;
                    $data['DriverId']=$id;
                    $this->session->set_userdata('number', $number);


                }
            }
            echo json_encode($data);
        }
		
        public function driverVerifyOtp()
        {
            header('Content-type:application/json');
            $otp = trim($this->input->post('otp'));
            $number = trim($this->input->post('number'));
            if ($otp == "") {
                $data['status']='false';    
                $data['message']='Please enter OTP';
            }
            else {
                // $id = $this->session->userdata('id');
                $otpexist=$this->Createdata->driver_check_otp($number);
                $id = $this->Createdata->getDriverId($number);
				$isverfied = $this->db->select('isverfied')->where(['phone' => $number])->get("driver")->row()->isverfied;
                if ($otpexist == $otp) {
                    $data['status']='true';    
                    $data['message']='Login Successful';
					$data['DriverId']=$id;
					$data['IsVerified']=(string)$isverfied;

                }
                else {
                    $data['status']='false';    
                    $data['message']='Login Unsuccessful';
                } 
            }
            echo json_encode($data);
        }
		
        public function driverAddDetails()
        {
            header('Content-type:application/json');
            $email=trim($this->input->post('email'));
            $password=trim($this->input->post('password'));
            $firstname=trim($this->input->post('first_name'));
            $lastname=trim($this->input->post('last_name'));
            $id=trim($this->input->post('id'));
            if ($email == "" | $password == "" | $firstname == "" | $lastname == "") {
                $data['status']='false';
                $data['message']='Please Enter All the Required Details';
            }
            else {
                // $id = $this->session->userdata('id');
                $this->Createdata->driver_add_details($email,$password,$firstname,$lastname,$id);
                $data['status']='true';
                $data['message']='Account Created Successfully';
                $data['email']=$email;
                $data['firstname']=$firstname;
                $data['lastname']=$lastname;
                $data['DriverId']=$id;
							

            }
            echo json_encode($data);
        } 
        
        
        public function driverGetDetails()
        {
            header('Content-type:application/json');
            $id=trim($this->input->post('id'));
            if ($id) {
                $details = $this->Createdata->driver_details($id);
                $data['status']='true';
                $data['message']='Details Fetched';
                $data['details']=$details;
        
            }
            else {
                $data['status']='false';
                $data['message']='Error!';
                
            }
            echo json_encode($data);
        }
		
		
		public function editDriverProfile()
        {
                
            header('Content-Type: application/json');
            $id = (trim($this->input->post('id')));
            $gender = (trim($this->input->post('gender')));
            $firstname = (trim($this->input->post('first_name')));
            $lastname = (trim($this->input->post('last_name')));
            $email = (trim($this->input->post('email')));
            $password = (trim($this->input->post('password')));
                    
            if ($id == "") {
                $data['status'] = "false";
                $data['message'] = "Please enter required details";
            } else {
                $user = $this->db->select("*")->where(['id' => $id])->get("driver")->num_rows();
                if ($user == '1') {
                    if ($_FILES) {
                        $image_name1 = "";
                        $image_name_thumb1 = "";
                        // Upload profile picture
                        $random = time();
                        $config['upload_path'] = $_SERVER['DOCUMENT_ROOT'] . "/UberTaxi/uploads/profile/";
                        $config['allowed_types'] = '*';
                        $config['file_name'] = $random;
                        $config['encrypt_name'] = TRUE;
                        $this->load->library('image_lib');
                        $this->image_lib->clear();
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
                        ini_set('upload_max_filesize', '64M');
                        ini_set('memory_limit', '-1');
                        if ($this->upload->do_upload('image')) {
                            $imageArray = $this->upload->data();
                            $image_name1 = $imageArray['raw_name'] . '' . $imageArray['file_ext']; // Job Attachment
                            $config1['image_library'] = 'gd2';
                            $config1['source_image'] = $_SERVER['DOCUMENT_ROOT'] . "/UberTaxi/uploads/profile/" . $image_name1;
                            $config1['create_thumb'] = TRUE;
                            $config1['maintain_ratio'] = TRUE;
                            $config1['width']     = 300;
                            $config1['height']   = 377;
                            $this->load->library('image_lib', $config);
                            $this->image_lib->initialize($config1);
                            $this->image_lib->resize();
                            $this->image_lib->clear();
                            $image_name = 'http://ixorainfotech.in/UberTaxi/uploads/profile/'.$imageArray['raw_name'] . $imageArray['file_ext'];
                           
                               $details = array(
                                        'first_name'=> $firstname,
                                        'last_name'=> $lastname,
                                        'email' => $email,
                                        'id' => $id,
                                        'image' => $image_name,
                                    );
                                    $this->Createdata->edit_Driverdetailswithimage($firstname,$lastname,$email,$image_name,$id);
                                    $data['status']='true';
                                    $data['message']='Details Updated Successfully';
                                    $data['details']=$details;
                            
                            
                        } else {
                             $details = array(
                                        'name'=> $firstname,
                                        'lastname'=> $lastname,
                                        'email' => $email,
                                        'id' => $id,
                                    );
                                    $this->Createdata->edit_Driverdetails($firstname,$lastname,$email,$id);
                                    $data['status']='true';
                                    $data['message']='Details Updated Successfully';
                                    $data['details']=$details;
                        }
                    } else {
                      $details = array(
                                        'name'=> $firstname,
                                        'lastname'=> $lastname,
                                        'email' => $email,
                                        'id' => $id,
                                    );
                                    $this->Createdata->edit_Driverdetails($firstname,$lastname,$email,$id);
                                    $data['status']='true';
                                    $data['message']='Details Updated Successfully';
                                    $data['details']=$details;
                    }
                } else {
                    $data['status'] = "false";
                    $data['message'] = "Enter valid user id";
                }
            }
            echo json_encode($data);
        }
		
		
		
		public function driverPanCard()
        {
                
            header('Content-Type: application/json');
            $id = (trim($this->input->post('id')));
            $isverfied="1";
            if ($id == "") {
                $data['status'] = "false";
                $data['message'] = "Please enter required details";
            } else {
                $user = $this->db->select("*")->where(['id' => $id])->get("driver")->num_rows();
                if ($user == '1') {
                    if ($_FILES) {
                        $image_name1 = "";
                        $image_name_thumb1 = "";
                        // Upload profile picture
                        $random = time();
                        $config['upload_path'] = $_SERVER['DOCUMENT_ROOT'] . "/UberTaxi/uploads/panCard/";
                        $config['allowed_types'] = '*';
                        $config['file_name'] = $random;
                        $config['encrypt_name'] = TRUE;
                        $this->load->library('image_lib');
                        $this->image_lib->clear();
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
                        ini_set('upload_max_filesize', '64M');
                        ini_set('memory_limit', '-1');
                        if ($this->upload->do_upload('image')) {
                            $imageArray = $this->upload->data();
                            $image_name1 = $imageArray['raw_name'] . '' . $imageArray['file_ext']; // Job Attachment
                            $config1['image_library'] = 'gd2';
                            $config1['source_image'] = $_SERVER['DOCUMENT_ROOT'] . "/UberTaxi/uploads/panCard/" . $image_name1;
                            $config1['create_thumb'] = TRUE;
                            $config1['maintain_ratio'] = TRUE;
                            $config1['width']     = 300;
                            $config1['height']   = 377;
                            $this->load->library('image_lib', $config);
                            $this->image_lib->initialize($config1);
                            $this->image_lib->resize();
                            $this->image_lib->clear();
                            $image_name = 'http://ixorainfotech.in/UberTaxi/uploads/panCard/'.$imageArray['raw_name'] . $imageArray['file_ext'];
                           
                               $details = array(
                                        //'first_name'=> $firstname,
                                        //'last_name'=> $lastname,
                                        //'email' => $email,
                                        'id' => $id,
                                        'image' => $image_name,
                                    );
                                    $this->Createdata->uploadPanCard($image_name,$id,$isverfied);
                $get = $this->db->select("id,first_name,email,last_name,image,pancard,phone")->where(['id' => $id])->get("driver")->row();
                                    $data['status']='true';
                                    $data['message']='Details Updated Successfully';
                                    $data['details']=$get;
									$data['IsVerified']=$isverfied;

                            
                            
                        } else {
                             $details = array(
                                        //'name'=> $firstname,
                                       // 'lastname'=> $lastname,
                                       // 'email' => $email,
                                        'id' => $id,
                                    );
                                    //$this->Createdata->edit_Driverdetails($firstname,$lastname,$email,$id);
                                    $data['status']='true';
                                    $data['message']='Details Updated Successfully';
                                    $data['details']=$details;
                        }
                    } else {
                      $details = array(
                                        //'name'=> $firstname,
                                        //'lastname'=> $lastname,
                                        //'email' => $email,
                                        'id' => $id,
                                    );
                                    //$this->Createdata->edit_Driverdetails($firstname,$lastname,$email,$id);
                                    $data['status']='true';
                                    $data['message']='Details Updated Successfully';
                                    $data['details']=$details;
                    }
                } else {
                    $data['status'] = "false";
                    $data['message'] = "Enter valid user id";
                }
            }
            echo json_encode($data);
        }



 



        













}?>
                        






