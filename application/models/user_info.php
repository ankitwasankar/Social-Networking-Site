<?php
	class User_info extends CI_Model{
		public $user_id;
		public $user_email;
		public $user_name;
		public $password;
		public $join_time;
		public $verify_condition;
		public $status;
		public $first_name;
		public $last_name;
		public $mobile_number;
		public $gender;
		public $profile_pic;
		public $security_question;
		public $security_answer;
		public $verify_code;
	
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
				$o=new User_info();
				$o->user_id=$row->user_id;
				$o->user_email=$row->user_email;
				$o->user_name=$row->user_name;
				$o->password=$row->password;
				$o->join_time=$row->join_time;
				$o->verify_condition=$row->verify_condition;
				$o->status=$row->status;
				$o->first_name=$row->first_name;
				$o->last_name=$row->last_name;
				$o->mobile_number=$row->mobile_number;
				$o->gender=$row->gender;
				$o->profile_pic=$row->profile_pic;
				$o->security_question=$row->security_question;
				$o->security_answer=$row->security_answer;
				$o->verify_code=$row->verify_code;
		
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
			$o=new User_info();
			foreach($records->result() as $row){
				$o->user_id=$row->user_id;
				$o->user_email=$row->user_email;
				$o->user_name=$row->user_name;
				$o->password=$row->password;
				$o->join_time=$row->join_time;
				$o->verify_condition=$row->verify_condition;
				$o->status=$row->status;
				$o->first_name=$row->first_name;
				$o->last_name=$row->last_name;
				$o->mobile_number=$row->mobile_number;
				$o->gender=$row->gender;
				$o->profile_pic=$row->profile_pic;
				$o->security_question=$row->security_question;
				$o->security_answer=$row->security_answer;
				$o->verify_code=$row->verify_code;
				break;
			}
			return $o;
		}
		
		/**********************************************************************
			Registration process
		**********************************************************************/
		public function register(){
			$user_email = $this->user_email;
			$user_name = $this->user_name;
			$password = $this->password;
			$first_name = $this->first_name;
			$last_name = $this->last_name;
			$verify_code = $this->verify_code;
			$query = "insert into user_info (user_email,user_name, password, first_name, last_name, verify_code) values('".$user_email."','".$user_name."','".$password."','".$first_name."','".$last_name."','".$verify_code."')";
			
			if($this->db->query($query)){
				return true;
			}
			else{
				return false;
			}
		}
		
		/**********************************************************************
			Registration process
		**********************************************************************/
		public function login(){
			$user_email = $this->user_email;
			$password = $this->password;
			$query="select * from user_info where user_email='".$user_email."' and password ='".$password."';";
			$records=$this->db->query($query);
			if($records->num_rows==1){
				return true;
			}
			else{
				return false;
			}
		}	
		
		/**********************************************************************
			getUserInfo
		**********************************************************************/
		public function getUserInfo(){
			$query="select * from user_info where user_email='".$this->user_email."'";
			$records=$this->db->query($query);
			return User_info::instantiateSingle($records);
		}	
		
		/**********************************************************************
			Get friends list
		**********************************************************************/
		public function getFriends(){
			$user_id = $this->user_id;
			$query = "select * from user_info t1 where user_id in (select friend_id as user_id from friend_info where user_id=".$user_id." and friend_status='confirmed' and friend_id<>".$user_id.")";
			$records=$this->db->query($query);
			return User_info::instantiate($records);
		}
		
		/**********************************************************************
			Get pending friends list
		**********************************************************************/
		public function getNewFriends(){
			$user_id = $this->user_id;
			$query = "select * from user_info t1 where user_id in (select user_id from friend_info where friend_id=".$user_id." and friend_status='pending' )";
			$records=$this->db->query($query);
			
			return User_info::instantiate($records);
		}

		
		/**********************************************************************
			Get friends list
		**********************************************************************/
		public function getPendingFriends(){
			$user_id = $this->user_id;
			$query = "select * from user_info t1 where user_id in (select friend_id as user_id from friend_info where user_id=".$user_id." and friend_status='pending' and friend_id<>".$user_id.")";
			$records=$this->db->query($query);
			return User_info::instantiate($records);
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