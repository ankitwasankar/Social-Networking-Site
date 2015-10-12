<?php
	class Wall_data extends CI_Model{
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
		
		public $post_id;
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
				$o=new Wall_data();
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
				
				$o->post_id=$row->post_id;
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
			$o=new Wall_data();
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
				
				$o->post_id=$row->post_id;
				$o->post_data=$row->post_data;
				$o->post_time=$row->post_time;
				$o->number_likes=$row->number_likes;
				$o->number_likes=$row->number_comments;
				
				
				break;
			}
			return $o;
		}
		
		/**********************************************************************
			get Wall data
		**********************************************************************/
		public function getWallData($user_id){
			$query = "select * from (select * from user_info t1 where user_id in ( select friend_id as user_id from friend_info where user_id=".$user_id." and friend_status='confirmed'))t2 natural join post_info order by post_time desc";
			$records = $this->db->query($query);
			return Wall_data::instantiate($records);
		}
	}	
?>