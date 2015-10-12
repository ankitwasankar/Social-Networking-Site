<?php
	class Post_info extends CI_Model{
		public $post_id;
		public $user_id;
		public $post_data;
		public $post_time;
		public $number_likes;
		public $number_comments;
		
	
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
				$o=new Post_info();
				$o->post_id=$row->post_id;
				$o->user_id=$row->user_id;
				$o->post_data=$row->post_data;
				$o->post_time=$row->post_time;
				$o->number_likes=$row->number_likes;
				$o->number_likes=$row->number_comments;
						
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
			$o=new Post_info();
			foreach($records->result() as $row){
				$o->post_id=$row->post_id;
				$o->user_id=$row->user_id;
				$o->post_data=$row->post_data;
				$o->post_time=$row->post_time;
				$o->number_likes=$row->number_likes;
				$o->number_likes=$row->number_comments;
				break;
			}
			return $o;
		}
		
		/**********************************************************************
			add new post and return object of same post.
		**********************************************************************/
		public function addPost(){
			$query = "insert into post_info(user_id,post_data) values('".$this->user_id."','".$this->post_data."')";
			$this->db->query($query);
			$query = "select * from post_info where user_id='".$this->user_id."' and post_data='".$this->post_data."'";
			$records = $this->db->query($query);
			return Post_info::instantiateSingle($records);
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