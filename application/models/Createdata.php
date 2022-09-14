<?php
    class Createdata extends CI_Model
    {

        public function displayuserrecords()
        {
            return $this->db->select('*')
            ->from('users')
            ->get()->result_array();
        }
        public function displaydriverrecords()
        {
            return $this->db->select('*')
            ->from('driver')
            ->get()->result_array();
        }
        public function displayprofileById($id)
        {
            $query=$this->db->query("select * from admin where id='".$id."'");
            return $query->result();
        }


        public function isvalidate($email, $password)
        {
            $q = $this->db->where(['email'=>$email,'password'=>$password])
                          -> from('admin')
                          -> get(); 
            if ($q->num_rows()) {
                return $q->row()->id;
            }
            else {
                return false;
            }
        }



        public function savedata($data)
        {
            if ($this->db->insert('admin',$data)) {
                return 1;
            }
            else {
                return 0;
            }
        }


        public function adduserdata($adddata)
        {
            if ($this->db->insert('users',$adddata)) {
                return 1;
            }
            else {
                return 0;
            }
        }
        public function adddriverdata($adddata)
        {
            if ($this->db->insert('driver',$adddata)) {
                return 1;
            }
            else {
                return 0;
            }
        }



        public function updateuserdata($id,$firstname,$lastname,$email,$mobile)
        {
            $this->db->query("update users SET first_name='$firstname',last_name='$lastname',email='$email',phone='$mobile' where id='".$id."'");
        }
        public function updatedriverdata($first_name,$last_name,$email,$phone,$vcompany,$vmodel,$vtype,$seats,$modelyear,$plate,$id,$color)
        {
            $this->db->query("update driver SET first_name='$first_name',last_name='$last_name',email='$email',phone='$phone',vtype = '$vtype',vmodel ='$vmodel', vcompany = '$vcompany',seats='$seats',modelyear='$modelyear',plate='$plate',color='$color' where id='".$id."'");
        }
        public function updatedriverdataimg($first_name,$last_name,$email,$phone,$vcompany,$vmodel,$vtype,$seats,$modelyear,$plate,$id,$color,$image_path)
        {
            $this->db->query("update driver SET first_name='$first_name',last_name='$last_name',email='$email',phone='$phone',vtype = '$vtype',vmodel ='$vmodel', vcompany = '$vcompany',seats='$seats',modelyear='$modelyear',plate='$plate',color='$color',image = '$image_path' where id='".$id."'");
        }
        

        
        
    

//               Customer Section Models



        public function check_phone($number)
        {
            $this->db->select('*');
                $this->db->from('users');
                $this->db->where('phone',$number);
                $query=$this->db->get();
                if ($query->num_rows() == '1') {
                    return True;
                }else {
                    return false;
                }
        }

        public function check_otp($number)
        {
                $this->db->select('otp');
                $this->db->from('users');
                $this->db->where('phone',$number);
                return $this->db->get()->row()->otp;
                
        }
        
        public function chqmail($email)
        {
            $this->db->select('*');
                $this->db->from('users');
                $this->db->where('email',$email);
                $query=$this->db->get();
                if ($query->num_rows() == '1') {
                    return True;
                }else {
                    return false;
                }
        }

        public function customer_login_phone($phone)
        {
            $this->db->insert('users',$phone);
        }
        
        public function signup($firstname,$lastname,$email,$id)
        {
            $this->db->query("update users SET first_name='$firstname',last_name='$lastname',email='$email' where id='".$id."'");
        }
           
        public function edit_details($firstname,$lastname,$email,$id)
        {
            $this->db->query("update users SET first_name='$firstname',last_name='$lastname',email='$email' where id='".$id."'");
        }

        public function edit_detailswithimage($firstname,$lastname,$email,$image_name,$id)
        {
            $this->db->query("update users SET first_name='$firstname',last_name='$lastname',email='$email',image='$image_name' where id='".$id."'");
        }
        
        public function customer_details($id)
        {
            $this->db->select('*');
            $this->db->from('users');
            $this->db->where('id',$id);
            $query = $this->db->get();
        	if($query->num_rows() > 0){
                return $query->row();
            }
		}
 
        public function otp($otp, $number)
        {
            $this->db->query("update users SET otp='$otp'where phone='".$number."'");
        }
        
        public function getUserId($number)
        {
            $this->db->select('id');
            $this->db->from('users');
            $this->db->where('phone',$number);
            return $this->db->get()->row()->id;
        }



//                          Driver Section Models

        public function getDriverId($number)
        {
            $this->db->select('id');
            $this->db->from('driver');
            $this->db->where('phone',$number);
            return $this->db->get()->row()->id;
        }

        public function check_phone_driver($number)
        {
            $this->db->select('*');
            $this->db->from('driver');
            $this->db->where('phone',$number);
            $query=$this->db->get();
            if ($query->num_rows() == '1') {
                return True;
            }else {
                return false;
            }
        }

        public function driver_login_phone($phone)
        {
            $this->db->insert('driver',$phone);
        }

        public function driver_check_otp($id)
        {
            $this->db->select('otp');
            $this->db->from('driver');
            $this->db->where('id',$id);
            return $this->db->get()->row()->id;
        }

        public function driver_check_email($number)
        {
            $this->db->select('email');
            $this->db->from('driver');
            $this->db->where('phone',$number);
            return $this->db->get()->row();
        }

        public function driver_add_details($email,$password,$firstname,$lastname,$id)
        {
            $this->db->query("update driver SET email='$email',password='$password',first_name='$firstname',last_name='$lastname' where id='".$id."'");  
        }

        public function driver_details($id)
        {
            $this->db->select('*');
            $this->db->from('driver');
            $this->db->where('id',$id);
            $query = $this->db->get();
        	if($query->num_rows() == '0'){
                return $query->row();
            }
        }
        
    }
?>

