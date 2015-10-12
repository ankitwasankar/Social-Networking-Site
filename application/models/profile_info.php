<?php
	class Profile_info extends CI_Model{
		public $profile_id;
		public $user_id;
		public $about;
		public $relationship;
		public $location;
		public $hobbies;
		public $fav_books;
		
	
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
				$o=new Profile_info();
				$o->profile_id_id=$row->profile_id;
				$o->user_id=$row->user_id;
				$o->about=$row->about;
				$o->relationship=$row->relationship;
				$o->location=$row->location;
				$o->hobbies=$row->hobbies;
				$o->fav_books=$row->fav_books;
		
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
			$o=new Profile_info();
			foreach($records->result() as $row){
				$o->profile_id_id=$row->profile_id;
				$o->user_id=$row->user_id;
				$o->about=$row->about;
				$o->relationship=$row->relationship;
				$o->location=$row->location;
				$o->hobbies=$row->hobbies;
				$o->fav_books=$row->fav_books;
				break;
			}
			return $o;
		}
		
		/**********************************************************************
			Get single profile data
		**********************************************************************/
		public function getProfile(){
			$query = "select * from user_info natural join profile_info where user_id=".$this->user_id;
			echo $query; die;
			$records = $this->db->query($query);
			return $Profile_data::instantiateSingle($records);
		}
		
	}	
?>