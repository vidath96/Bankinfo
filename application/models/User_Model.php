<?php
	class User_Model extends CI_Model {

        public function user_all(){
            return $this->db->get_where('user',['status' => 'active'])->result();
        }

        //Insert  New user into user table
		public function new_user_in($data){
    		$this->db->insert('user',$data);
    	}

        //Retrieve Userinfo from the Database
        public function login_user($userid, $encPassword){
            //$sql = "SELECT * FROM admin a_id='".$userid."' AND a_pwd='".$password."'";
            //$query = $this->db->query($sql);
            //return $query->result();
            $this->db->select('*');
            $this->db->from('user');
            $this->db->where('nic', $userid);
            $this->db->where('password', $encPassword);
            $this->db->where('status', 'active');
            if ($query = $this->db->get()) {
                return $query->row_array();
            } else {
                return false;
            }

        }

        public function user_one($user_id)
        {
        if ($query = $this->db->get_where('user', ['user_id' => $user_id, 'status' => 'active'])) {
            return $query->result();
        } else {
            return false;
        }
    }
        
    }
