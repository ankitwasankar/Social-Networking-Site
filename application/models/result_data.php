<?php
	class Result_data extends CI_Model{
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
		public $friendship;
	
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
				$o=new Result_data();
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
				$o->friendship=$row->friendship;
		
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
			$o=new Result_data();
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
				$o->friendship=$row->friendship;
				break;
			}
			return $o;
		}
		

		/**********************************************************************
			Get search results
		**********************************************************************/
		public function getResult($query){			
			$records=$this->db->query($query);
			return Result_data::instantiate($records);
		}
		
		
	}	
?>