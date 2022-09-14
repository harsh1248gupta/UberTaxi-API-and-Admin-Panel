<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Admin extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
            $this->load->helper('url');
            $this->load->model('Createdata');
            $this->load->library('form_validation');
            $this->load->library('pagination');
            $this->load->helper('alert_helper');
            $this->load->library('Alert');
            // $this->load->library('M_pdf');

        }
        

        // ===============================>>>>>>>>>>>    Main Screens   <<<<<<<<<<<==========================
        public function login()
        {
            $this->load->view('login');
        }
        public function home()
        {
            $this->load->view('home');
        }
        public function register()
        {
            $this->load->view('register');
        }
        public function logout()
        {
            $this->session->unset_userdata('id');
			return redirect('login');
        }

        // ===============================>>>>>>>>>>>    Listing Screens   <<<<<<<<<<<=========================
        public function customers()
        {
            $result['data']=$this->Createdata->displayuserrecords();
            $this->load->view('usertable',$result);
        }
        public function drivers()
        {
            $result['data']=$this->Createdata->displaydriverrecords();
            $this->load->view('drivertable',$result);
        }


        // ===============================>>>>>>>>>>>    Auth function for login   <<<<<<<<<<<=========================
        public function auth(){
            $this->load->library('form_validation');
            $this->form_validation->set_rules("email","email","required");
            $this->form_validation->set_rules("password","password","required");
            if ($this->form_validation->run() == true) {
                $email = $this->input->post('email');
                $password = $this->input->post('password');

                $id=$this->Createdata->isvalidate($email, $password);
                if ($id) {
                    $this->load->library('session');
                    $data = $this->db->select('*')->where(['id'=>$id])->from('admin')->get()->row();
                    $userdata = array(
                        'id'=>$data->id,
                        'name'=>$data->name,
                        'email'=>$data->email,
                        'phone'=>$data->phone,
                        'image'=> $data->image
                        
                    );
                    $this->session->set_userdata('adminprofile',$userdata);
                    $this->load->view('home');
                }
                else {  
                    $this->session->set_flashdata('Login_failed','Invalid Email/Password');
                    return redirect('login');
                } 
            }
            else{
                $this->session->set_flashdata('Enter_Credentials','Enter Email and Password');
				return redirect('login');
            }
        }
       
        

        // ===============================>>>>>>>>>>>    ADMIN Profile Screens   <<<<<<<<<<<=========================
        public function profile(){
            $this->load->view('show_profile');           
        }
        public function editprofile(){
            $id=$this->input->get('id');
            $result['dataofadmin']=$this->Createdata->displayprofilebyId($id);
            $this->load->view('edit_profile',$result);
            if($this->input->post('update'))
            {
    
                    $config['upload_path']          = './uploads/';
                    $config['allowed_types']        = 'gif|jpg|png';
                    $config['max_size']             = 0;
                    $config['max_width']            = 0;
                    $config['max_height']           = 0;
            
                    $this->load->library('upload', $config);
                    if ( ! $this->upload->do_upload('userfile'))
                    {
                        $name=$this->input->post('name');
                        $email=$this->input->post('email');
                        $mobile=$this->input->post('mobile');
                        $this->db->query("update admin SET name='$name',email='$email',phone='$mobile' where id='".$id."'");
                    }
                    else{
                        $data = $this->upload->data();
                        $image_path=base_url()."uploads/".$data['raw_name'].$data['file_ext'];
                        $name=$this->input->post('name');
                        $email=$this->input->post('email');
                        $mobile=$this->input->post('mobile');
                        $image=$image_path;
                        $this->db->query("update admin SET name='$name',email='$email',phone='$mobile',image='$image' where id='".$id."'");
                        // $this->Createdata->updatedatawithImage($id,$name,$email,$mobile,$image);
                                    /* for session update */
                                    
                            $userdata = $this->db->select('*')->where(['id'=>$id])->from('admin')->get()->row();
                            $userdata1 = array(
                            'id'=>$userdata->id,
                            'name'=>$userdata->name,
                            'email'=>$userdata->email,
                            'phone'=>$userdata->phone,
                            'image'=>$userdata->image
                            );
                        $this->session->set_userdata('adminprofile',$userdata1);
                        /* for session update */
                            redirect('Admin/profile'); 
    
                    }
                /* for session update */
                $userdata = $this->db->select('*')->where(['id'=>$id])->from('admin')->get()->row();
                            $userdata1 = array(
                            'id'=>$userdata->id,
                            'name'=>$userdata->name,
                            'email'=>$userdata->email,
                            'phone'=>$userdata->phone,
                            'image'=>$userdata->image
                            );
                $this->session->set_userdata('adminprofile',$userdata1);
                /* for session update */
                redirect('Admin/profile'); 
            }
        }




         // ===============================>>>>>>>>>>>    Add USER DRIVER Screens   <<<<<<<<<<<=========================
        public function adduser()
        {
            $adddata = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
                'isverfied' => "1"
                
                // 'password' => md5($this->input->post('password')),
            );
            $result=$this->Createdata->adduserdata($adddata);
            if ($result) {
                return redirect('Admin/customers');
            }
            else {
                echo 0;
            } 
        }
        public function showuseradd()
        {
            $this->load->view('add_user');
        }
        public function showdriveradd()
        {
            $result['data'] = $this->db->select('*')->from('vehicle')->get()->result_array();
            $this->load->view('add_driver',$result);
            if($this->input->post('save')){
                    $config['upload_path']          = './uploads/';
                    $config['allowed_types']        = 'gif|jpg|png';
                    $config['max_size']             = 0;
                    $config['max_width']            = 0;
                    $config['max_height']           = 0;
            
                    $this->load->library('upload', $config);
                    if ( ! $this->upload->do_upload('userfile')){
                        $adddata = array(
                            'first_name' => $this->input->post('first_name'),
                            'last_name' => $this->input->post('last_name'),
                            'email' => $this->input->post('email'),
                            'password' => $this->input->post('password'),
                            'phone' => $this->input->post('phone'),
                            'vtype' => $this->input->post('vtype'),
                            'vmodel' => $this->input->post('vmodel'),
                            'vcompany' => $this->input->post('vcompany'),
                            'seats' => $this->input->post('seats'),
                            'modelyear' => $this->input->post('modelyear'),
                            'plate' => $this->input->post('plate'),
                            'color' => $this->input->post('color'),
                            // 'isverfied' => "1"
                        );
                        $result=$this->Createdata->adddriverdata($adddata);
                        if ($result) {
                            return redirect('Admin/drivers');
                        }
                        else {
                            echo 0;
                        }   
        
                    }
                    else {
                        $data = $this->upload->data();
                        $image_path=base_url()."uploads/".$data['raw_name'].$data['file_ext'];
                        $adddata = array(
                            'first_name' => $this->input->post('first_name'),
                            'last_name' => $this->input->post('last_name'),
                            'email' => $this->input->post('email'),
                            'password' => $this->input->post('password'),
                            'phone' => $this->input->post('phone'),
                            'vtype' => $this->input->post('vtype'),
                            'vmodel' => $this->input->post('vmodel'),
                            'vcompany' => $this->input->post('vcompany'),
                            'seats' => $this->input->post('seats'),
                            'modelyear' => $this->input->post('modelyear'),
                            'plate' => $this->input->post('plate'),
                            'color' => $this->input->post('color'),
                            'image' => $image_path,
                            // 'isverfied' => "1"
                        );
                        $result=$this->Createdata->adddriverdata($adddata);
                        if ($result) {
                            return redirect('Admin/drivers');
                        }
                        else {
                            echo 0;
                        }   
                    }

            }
                
        }
        
        


         // ===============================>>>>>>>>>>>    DELETE USER DRIVER Screens   <<<<<<<<<<<=========================
        public function deleteuserdata(){
            $id=$this->input->get('id');
            $this->db->query("delete from users where id='".$id."'");
            $this->alert->set('alert-danger', 'Deleted Successfully', true);
            redirect("Admin/customers");    
        }
        public function deletedriverdata(){
            $id=$this->input->get('id');
            $this->db->query("delete from driver where id='".$id."'");
            $this->alert->set('alert-danger', 'Deleted Successfully', true);
            redirect("Admin/drivers");
        }
        


         // ===============================>>>>>>>>>>>    UPDATE USER DRIVER LISTS Screens   <<<<<<<<<<<=========================
        
        public function updateuserdata()
        {
            $id=$this->input->get('id');
            $user = $this->db->select('*')->where(['id'=>$id])->from('users')->get()->result();
            $result['data']=$user;
            $this->load->view('update_user',$result);
            if($this->input->post('update')){
                $firstname=$this->input->post('first_name');
                $lastname=$this->input->post('last_name');
                $email=$this->input->post('email');
                $mobile=$this->input->post('phone');
                $this->Createdata->updateuserdata($id,$firstname,$lastname,$email,$mobile);
                redirect('Admin/customers'); 
            }
        }
        public function updatedriverdata()
        {
            $id=$this->input->get('id');
            $user = $this->db->select('*')->where(['id'=>$id])->from('driver')->get()->result();
            $result['vehicle'] = $this->db->select('*')->from('vehicle')->get()->result_array();
            $result['data']=$user;
            $this->load->view('update_driver',$result);
            if($this->input->post('update')){
                $config['upload_path']          = './uploads/';
                    $config['allowed_types']        = 'gif|jpg|png';
                    $config['max_size']             = 0;
                    $config['max_width']            = 0;
                    $config['max_height']           = 0;
            
                    $this->load->library('upload', $config);
                    if ( ! $this->upload->do_upload('userfile')){
                       
                            $first_name = $this->input->post('first_name');
                            $last_name = $this->input->post('last_name');
                            $email = $this->input->post('email');
                            // $password = $this->input->post('password');
                            $phone = $this->input->post('phone');
                            $vtype = $this->input->post('vtype');
                            $vmodel = $this->input->post('vmodel');
                            $vcompany = $this->input->post('vcompany');
                            $seats = $this->input->post('seats');
                            $modelyear = $this->input->post('modelyear');
                            $plate = $this->input->post('plate');
                            $color = $this->input->post('color');
                       
                            $this->Createdata->updatedriverdata($first_name,$last_name,$email,$phone,$vcompany,$vmodel,$vtype,$seats,$modelyear,$plate,$id,$color);
                            return redirect('Admin/drivers');
        
                    }
                    else {
                        $data = $this->upload->data();
                        $image_path=base_url()."uploads/".$data['raw_name'].$data['file_ext'];
                            
                        $first_name = $this->input->post('first_name');
                            $last_name = $this->input->post('last_name');
                            $email = $this->input->post('email');
                            // $password = $this->input->post('password');
                            $phone = $this->input->post('phone');
                            $vtype = $this->input->post('vtype');
                            $vmodel = $this->input->post('vmodel');
                            $vcompany = $this->input->post('vcompany');
                            $seats = $this->input->post('seats');
                            $modelyear = $this->input->post('modelyear');
                            $plate = $this->input->post('plate');
                            $color = $this->input->post('color');
                            $this->Createdata->updatedriverdataimg($first_name,$last_name,$email,$phone,$vcompany,$vmodel,$vtype,$seats,$modelyear,$plate,$id,$color,$image_path);
                            return redirect('Admin/drivers');
                           
                    }

                // $firstname=$this->input->post('first_name');
                // $lastname=$this->input->post('last_name');
                // $email=$this->input->post('email');
                // $mobile=$this->input->post('phone');
                // $this->Createdata->updatedriverdata($id,$firstname,$lastname,$email,$mobile);
                // redirect('Admin/drivers'); 
            }
        }


         // ===============================>>>>>>>>>>>    listing LOCATIONS Screens   <<<<<<<<<<<=========================
        public function country()
        {
            $result['data']=$this->db->select('*')->from('country')->get()->result_array();
            $this->load->view('country',$result);
        }
        public function city()
        {
            $result['data']=$this->db->select('*')->from('city')->get()->result_array();
            $this->load->view('city',$result);
        }
        

         // ===============================>>>>>>>>>>>    ADD LOCATIONS Screens   <<<<<<<<<<<=========================

        public function showaddcountry()
        {
            $this->load->view('addcountry');
            if ($this->input->post('adddata')) {
                $adddata = array(
                    'country' => $this->input->post('country'),
                );
                $result=$this->db->insert('country',$adddata);
                if ($result) {
                    return redirect('Admin/country');
                }
                else {
                    echo 0;
                }
            }
        }
        public function showaddcity()
        {
            $result['data'] = $this->db->select('*')->from('country')->get()->result_array();
            $this->load->view('addcity',$result);
            if ($this->input->post('adddata')) {
                $adddata = array(
                    'country' => $this->input->post('country'),
                    'city' => $this->input->post('city'),
                );
                $result=$this->db->insert('city',$adddata);
                if ($result) {
                    return redirect('Admin/city');
                }
                else {
                    echo 0;
                }
            }
        }


         // ===============================>>>>>>>>>>>    DELETE LOCATIONS Screens   <<<<<<<<<<<=========================

        public function deletecountry(){
            $id=$this->input->get('cid');
            $this->db->query("delete from country where cid='".$id."'");
            $this->alert->set('alert-danger', 'Deleted Successfully', true);
            redirect("Admin/country");    
        }
        public function deletecity(){
            $id=$this->input->get('id');
            $this->db->query("delete from city where id='".$id."'");
            $this->alert->set('alert-danger', 'Deleted Successfully', true);
            redirect("Admin/city");    
        }


         // ===============================>>>>>>>>>>>    UPDATE LOCATIONS Screens   <<<<<<<<<<<=========================


        public function updatecountry(){
            $id=$this->input->get('cid');
            $result['data'] = $this->db->select('*')->where(['cid'=>$id])->from('country')->get()->result();
            $this->load->view('updatecountry',$result);
            if($this->input->post('update')){
                $country=$this->input->post('country');
                $this->db->query("update country SET country = '$country' where cid='".$id."'");
                redirect('Admin/country'); 
            }
        }
        public function updatecity(){
            $id=$this->input->get('id');
            $result['data'] = $this->db->select('*')->where(['id'=>$id])->from('city')->get()->result();
            $result['country'] = $this->db->select('*')->from('country')->get()->result_array();
            $this->load->view('updatecity',$result);
            if($this->input->post('adddata')){
                $country=$this->input->post('country');
                $city=$this->input->post('city');
                $this->db->query("update city SET country = '$country',city = '$city' where id='".$id."'");
                redirect('Admin/city'); 
            }
        }


         // ===============================>>>>>>>>>>>    LIST VEHICLE TYPE Screens   <<<<<<<<<<<=========================

        public function vehicle()
        {
            $result['data']=$this->db->select('*')->from('vehicle')->get()->result_array();
            $this->load->view('vehicle',$result);
        }
        public function deletevehicle()
        {
            $id=$this->input->get('id');
            $this->db->query("delete from vehicle where id='".$id."'");
            $this->alert->set('alert-danger', 'Deleted Successfully', true);
            redirect("Admin/vehicle");    
        }
        public function addvehicle()
        {
            $this->load->view('addvehicle');
            if($this->input->post('update'))
            {
                    $config['upload_path']          = './uploads/';
                    $config['allowed_types']        = 'gif|jpg|png';
                    $config['max_size']             = 0;
                    $config['max_width']            = 0;
                    $config['max_height']           = 0;
            
                    $this->load->library('upload', $config);
                    if ( ! $this->upload->do_upload('userfile'))
                    {
                        $adddata = array(
                            'name' => $this->input->post('vehicle'),
                            'cost' => $this->input->post('cost')
                        );
                        $this->db->insert('vehicle',$adddata);
                    }
                    else{
                        $data = $this->upload->data();
                        $image_path=base_url()."uploads/".$data['raw_name'].$data['file_ext'];
                        $adddata = array(
                            'name' => $this->input->post('vehicle'),
                            'cost' => $this->input->post('cost'),
                            'image' => $image_path
                        );
                        $this->db->insert('vehicle',$adddata);
                        redirect('Admin/vehicle'); 
                    }
                redirect('Admin/vehicle'); 
            }
            
        }
        public function updatevehicle()
        {
            $id=$this->input->get('id');
            $result['data'] = $this->db->select('*')->where(['id'=>$id])->from('vehicle')->get()->result();
            $this->load->view('updatevehicle',$result);
            if($this->input->post('update'))
            {
                    $config['upload_path']          = './uploads/';
                    $config['allowed_types']        = 'gif|jpg|png';
                    $config['max_size']             = 0;
                    $config['max_width']            = 0;
                    $config['max_height']           = 0;
            
                    $this->load->library('upload', $config);
                    if ( ! $this->upload->do_upload('userfile'))
                    {
                        
                            $name = $this->input->post('vehicle');
                            $cost = $this->input->post('cost');
                        // echo $name;
                        // echo $cost;
                        $this->db->query("update vehicle SET name='$name',cost='$cost' where id='".$id."'");
                    
                    }

                    else{
                        $data = $this->upload->data();
                        $image_path=base_url()."uploads/".$data['raw_name'].$data['file_ext'];
                       
                            $name = $this->input->post('vehicle');
                            $cost = $this->input->post('cost');
                            $image = $image_path;
                            // echo $name;
                            // echo $cost;
                            // echo $image;
                        $this->db->query("update vehicle SET name='$name',cost='$cost',image='$image_path' where id='".$id."'");
                        
                        redirect('Admin/vehicle'); 

                    }
                redirect('Admin/vehicle'); 
                // echo 'not run';
            }
            
            
        }




         // ===============================>>>>>>>>>>>    LIST VEHICLE TYPE Screens   <<<<<<<<<<<=========================
        public function rides()
        {
            $result['data']=$this->db->select('*')->from('ride')->get()->result_array();
            $this->load->view('ride',$result);
        }

        

}?>
                        






