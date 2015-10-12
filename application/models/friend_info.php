<?php
	class Friend_info extends CI_Model{
		public $f_id;
		public $user_id;
		public $friend_id;
		public $friend_time;
		public $friend_status;
		public $friend_rank;
		
	
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
				$o->f_id=$row->f_id;
				$o->user_id=$row->user_id;
				$o->friend_id=$row->friend_id;
				$o->friend_time=$row->friend_time;
				$o->friend_status=$row->friend_status;
				$o->friend_rank=$row->friend_rank;
	
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
				$o->f_id=$row->f_id;
				$o->user_id=$row->user_id;
				$o->friend_id=$row->friend_id;
				$o->friend_time=$row->friend_time;
				$o->friend_status=$row->friend_status;
				$o->friend_rank=$row->friend_rank;
				break;
			}
			return $o;
		}
		
		/**********************************************************************
			add new friend // return false (not friend), true (friend), pending (pending) 
		**********************************************************************/
		public function isFriend(){
			$query = "select friend_status from friend_info where user_id=".$this->user_id." and friend_id=".$this->friend_id;
			$records=$this->db->query($query);
			foreach($records->result() as $r){
				if($r->friend_status == "confirmed"){
					return "true";
				}
				else if($r->friend_status == "pending"){
					return "pending";
				}
			}
			return "false";
		}
		
		public function unfriend(){
			$query = "delete from friend_info  where user_id = ".$this->user_id." and friend_id = ".$this->friend_id;
			$this->db->query($query);
			
			$query = "delete from friend_info  where user_id = ".$this->friend_id." and friend_id = ".$this->user_id;
			$this->db->query($query);
			
			echo "removed from friends";die;
			return;
		}
		
		public function connect(){
			
			$query = "select * from friend_info where user_id=".$this->friend_id." and friend_id=".$this->user_id;
			$records = $this->db->query($query);
			$v=false;
			foreach($records->result() as $r){
				$v=true;
			}
			
			if($v==true){
				$query = "update friend_info set friend_status='confirmed' where user_id=".$this->friend_id." and friend_id=".$this->user_id;
				$this->db->query($query);
				$query = "insert into friend_info(user_id,friend_id,friend_status) values (".$this->user_id.",".$this->friend_id.",'confirmed')";
				$this->db->query($query);
				echo "Friend request accepted.";
			}
			else{
				$query = "insert into friend_info(user_id,friend_id) values (".$this->user_id.",".$this->friend_id.")";
				$this->db->query($query);
				echo "request send successfully";
				return;
			}
		}
		
		public function accept(){
			$query = "update friend_info set friend_status='confirmed' where user_id=".$this->friend_id." and friend_id=".$this->user_id;
			$this->db->query($query);
			$query = "insert into friend_info(user_id,friend_id,friend_status) values (".$this->user_id.",".$this->friend_id.",'confirmed')";
			$this->db->query($query);
			echo "Friend request accepted.";
			return;
		}
		
		public function getRequestCount(){
			$user = $this->session->userdata('user_id');
			$query = "select count(*) as no from friend_info where friend_id=".$user." and friend_status='pending'";
			$i=0;
			$records=$this->db->query($query);
			foreach($records->result() as $r){
				$i=$r->no;
				break;
			}
			return $i;
		}
		
		
		
	}	
?>