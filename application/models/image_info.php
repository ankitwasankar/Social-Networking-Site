<?php
	class Image_info extends CI_Model{
		public $image_id;
		public $user_id;
		public $image_type;
		public $id;
		public $image_time;
		
	
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
				$o=new Image_info();
				$o->image_id=$row->image_id;
				$o->user_id=$row->user_id;
				$o->image_type=$row->image_type;
				$o->id=$row->id;
				$o->image_time=$row->image_time;
						
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
			$o=new Image_info();
			foreach($records->result() as $row){
				$o=new Image_info();
				$o->image_id=$row->image_id;
				$o->user_id=$row->user_id;
				$o->image_type=$row->image_type;
				$o->id=$row->id;
				$o->image_time=$row->image_time;
				break;
			}
			return $o;
		}
		
		/**********************************************************************
			add new image and return object of same image.
		**********************************************************************/
		public function addImage(){
			$this->db->trans_start(); //transaction starts
			$query = "insert into image_info(user_id,image_type,id) values('".$this->user_id."','".$this->image_type."','".$this->id."')";
			$this->db->query($query);
			$insert_id = $this->db->insert_id();
			$this->db->trans_complete(); //transaction ends
			$query = "select * from image_info where image_id='".$insert_id."'";
			$records = $this->db->query($query);
			return Image_info::instantiateSingle($records);
		}
		
		/**********************************************************************
			add new image and return object of same image.
		**********************************************************************/
		public function getImages($type,$id){
			$query = "select * from image_info where image_type='".$type."' and id = ".$id;
			$records = $this->db->query($query);
			return Image_info::instantiate($records);
		}
	}	
?>