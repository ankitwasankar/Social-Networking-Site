<?php
	class Login_info extends CI_Model{
		public $login_id;
		public $user_email;
		public $login_time;
		public $system;
		public $browser;
		public $login_status;
		public $ip;
	
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}
		/**********************************************************************
			Instantiate multiple objects
		**********************************************************************/
		public function instantiate($records){
			$obj=Array();
			$i=0;
			foreach($records->result() as $row){
				$o=new Login_info();
				$o->login_id=$row->login_id;
				$o->user_email=$row->user_email;
				$o->login_time=$row->login_time;
				$o->system=$row->system;
				$o->browser=$row->browser;
				$o->login_status=$row->login_status;
						
				$obj[$i]=$o;
				$i++;
			}
			return $obj;
		}
		/**********************************************************************
			Instantiate single object
		**********************************************************************/
		public function instantiateSingle($records){
			$i=0;
			$o=new Login_info();
			foreach($records->result() as $row){
				$o->login_id=$row->login_id;
				$o->user_email=$row->user_email;
				$o->login_time=$row->login_time;
				$o->system=$row->system;
				$o->browser=$row->browser;
				$o->login_status=$row->login_status;
				break;
			}
			return $o;
		}
		
		
		/**********************************************************************
			recordLoginInfo
		**********************************************************************/
		public function recordLoginEvent(){
			$query="insert into login_info (user_email, system, browser, login_status, ip) values('".$this->user_email."','".$this->system."','".$this->browser."','".$this->login_status."','".$this->ip."')";
			$this->db->query($query);
		}
		
		
		
		public function update_pass($username,$pass){
			$pass=md5($pass);
			$query="update user_auth set u_pass='$pass' where u_name='$username'";
			if($records=$this->db->query($query))
				return true;
			else
				return false;
		}
		
		public function find($username){
			$query="select * from user_auth where u_name='$username'";
			$records=$this->db->query($query);
			if($records->num_rows>0)
				return true;
			else
				return false;
		}
		
		public function match_answer($username,$ans){
			$query="select * from user_auth where u_name='$username' and s_ans='$ans'";
			$records=$this->db->query($query);
			if($records->num_rows>0)
				return true;
			else
				return false;
		}
		public function security_qstn($username){
			$query="select s_que from user_auth where u_name='$username'";
			$records=$this->db->query($query);
			foreach($records->result() as $row){
				$que=$row->s_que;
			}
			return $que;
		}
		
		public function old_pass_exist($fid,$psd){
			$uid=$this->session->userdata('userid');	
			$query="select * from user_auth".$fid." where u_id=$uid and u_pass='$psd';";
			$record=$this->db->query($query);
			$i=0;
			foreach($record->result() as $row){
				$i=1;break;
			}
			if($i==1){
				return true;
			}
			else{
				return false;
			}
		}
		
		public function change_password($fid,$pass_new,$pass_old){
			$uid=$this->session->userdata('userid');
			$query="update user_auth".$fid." set u_pass='$pass_new' where u_pass='$pass_old' and u_id='$uid';";
			if($this->db->query($query)){
				return true;
			}
			else{
				return false;
			}
		}
		
		public function save_info($fid,$mb,$loc,$sp,$gd,$dob,$fb,$ld,$site,$bio){
			$uid=$this->session->userdata('userid');
			$query="update user_auth".$fid." set u_mbno=\"$mb\", u_location=\"$loc\", u_dob=\"$dob\", u_gender=\"$gd\", u_fb=\"$fb\", u_linkden=\"$ld\", u_site=\"$site\", u_bio=\"$bio\" where u_id=$uid;";
			
			if($this->db->query($query)){
				return true;
			}
			else{
				return false;
			}
		}
		
		public function get_info($fid){
			$uid=$this->session->userdata('userid');
			$query="select * from user_auth".$fid." where u_id=$uid;";
			$records=$this->db->query($query);
			return User_auth::instantiate($records);			
		}
		
		public function get_user_info($fid,$uid){
			$query="select * from user_auth".$fid." where u_id=$uid;";
			$records=$this->db->query($query);
			return User_auth::instantiate($records);			
		}
		public function delete_acc($fid){
			$uid=$this->session->userdata('userid');
			$query="update user_auth".$fid." set u_delstat='yes' where u_id=$uid";
			if($this->db->query($query)){
				
				return true;
			}
			else{
				return false;
			}
		}
	}	
?>