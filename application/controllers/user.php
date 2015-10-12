<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	/*************************************************
						Constructor 
	**************************************************/
		public function __construct(){
			parent::__construct();
			/********* helper **********/
			$this->load->helper('form');
			$this->load->helper('url');
			/********* Library **********/
			$this->load->library('form_validation');
			$this->load->library('encrypt');
			$this->load->library('session');
			$this->load->library('pagination');
			$this->load->library('user_agent');
			/********* model **********/
			$this->load->model('user_info');
			$this->load->model('post_info');
			$this->load->model('image_info');
			$this->load->model('wall_data');
			$this->load->model('result_data');
			$this->load->model('profile_data');
			$this->load->model('friend_info');
			
		}
		
		
	/*************************************************
				Home page for logged in user 
	**************************************************/		
		public function index(){
			
			$data['wda']=User::getWallData(); // array of post_info object poa = wallDataArray
			
			$this->load->view('user/header');
			$this->load->view('user/sidebar_left');
			$this->load->view('user/navbar_top');
			$this->load->view('user/index',$data);
			$this->load->view('user/footer');
		}
		
		
	/*************************************************
				Profile page
	**************************************************/		
	public function profile(){
			
			$profile = new Profile_data();
			$profile->user_id = $this->session->userdata('user_id');
			$data['object'] = $profile->getProfile();
			
			$this->load->view('user/header');
			$this->load->view('user/sidebar_left');
			$this->load->view('user/navbar_top');
			$this->load->view('user/profile',$data);
			$this->load->view('user/footer');
	}


	/*************************************************
				Login details page
	**************************************************/		
	public function login_details(){
			$this->load->view('user/header');
			$this->load->view('user/sidebar_left');
			$this->load->view('user/navbar_top');
			$this->load->view('user/login_details');
			$this->load->view('user/footer');
	}
	
	
	
	/*************************************************
				groups
	**************************************************/		
	public function groups(){
			$this->load->view('user/header');
			$this->load->view('user/sidebar_left');
			$this->load->view('user/navbar_top');
			$this->load->view('user/groups');
			$this->load->view('user/footer');
	}
	
	/*************************************************
				messages
	**************************************************/		
	public function messages(){
			$this->load->view('user/header');
			$this->load->view('user/sidebar_left');
			$this->load->view('user/navbar_top');
			$this->load->view('user/messages');
			$this->load->view('user/footer');
	}
	
	/*************************************************
			Account settings
	**************************************************/		
	public function account_settings(){
			$this->load->view('user/header');
			$this->load->view('user/sidebar_left');
			$this->load->view('user/navbar_top');
			$this->load->view('user/account_settings');
			$this->load->view('user/footer');
	}
	
	
	/*************************************************
				Friends
	**************************************************/		
	public function friends(){
		
		// confirmed friends
		$user = new User_info();
		$user->user_id = $this->session->userdata('user_id');
		$data['object']= $user->getFriends();
		
		// new friend request
		$user1 = new User_info();
		$user1->user_id = $this->session->userdata('user_id');
		$data['object1']= $user1->getNewFriends();
		
		// pending friend requests
		$user2 = new User_info();
		$user2->user_id = $this->session->userdata('user_id');
		$data['object2']= $user2->getPendingFriends();
				
		
		$this->load->view('user/header');
		$this->load->view('user/ajax');
		$this->load->view('user/sidebar_left');
		$this->load->view('user/navbar_top');
		$this->load->view('user/friends',$data);
		$this->load->view('user/footer');
		
	}	
	

	/*************************************************
			add new Post
	**************************************************/		
	public function post(){
		$data['message1']="";
		$data['message2']="";
		$data['message']="";
		$this->form_validation->set_rules('post_data','Post data','trim|required|max_length[800]|xxs_clean'); 
		if($this->form_validation->run()==TRUE ){	
			$post = new Post_info();
			$post->user_id = $this->session->userdata('user_id');
			$post->post_data = $this->input->post('post_data');
			$postObj=$post->addPost();
			
			if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
				foreach ($_FILES['files']['name'] as $f => $name) {
					
					/* adding database information for image */
					$imageData = new Image_info();
					$imageData->user_id=$this->session->userdata('user_id');
					$imageData->image_type="post";
					$imageData->id = $postObj->post_id;
					$imageObj = $imageData->addImage();
					
					/* uploading file on server file system */
					$valid_formats = array("jpg", "jpeg", "png", "gif", "bmp");
					$max_file_size = 1024*1024; //1 mb
					$path="assets/sns_img";
					$count = 0;
					$ImageName=$path."/".$imageObj->image_id;
					
					if ($_FILES['files']['error'][$f] == 4) {
						continue; // Skip file if any error found
					}
					if ($_FILES['files']['error'][$f] == 0) {	           
						if ($_FILES['files']['size'][$f] > $max_file_size) {
							$data['message1']="File too large";
							continue; // Skip large files
						}
						elseif( ! in_array(pathinfo($name, PATHINFO_EXTENSION), $valid_formats) ){
							$data['message1']=$data['message1']." File extension unsupported";
							continue; // Skip invalid file formats
						}
						else{ // No error found! Move uploaded files 
							
							if(move_uploaded_file($_FILES["files"]["tmp_name"][$f], $ImageName)){
							$count++; // Number of successfully uploaded file
							$data['message1']="posted successful";
							}
						}
					}

				}
			}
			$url=base_url()."user/index/".$data['message1'];
			redirect($url,'Location');		
		}
	}	
	
	/*************************************************
			Show posts on getWallData
	**************************************************/		
	public function getWallData(){
		$user_id = $this->session->userdata('user_id');
		return Wall_data::getWallData($this->session->userdata('user_id'));
	}


	/*************************************************
			Search 
	**************************************************/		
	public function search(){
		$term = $this->input->post('term');
		$arr = explode(' ',$term);
		$final = new Result_data();
		$subQuery="";
		$i = 1;
		$j = count($arr);
		foreach($arr as $a){
			$subQuery = $subQuery."first_name like '".$a."%' or last_name like '".$a."%'";
			if($i++==$j){
				break;
			}
			$subQuery = $subQuery." or ";
		}
		$user = $this->session->userdata('user_id');
		//$query =  "select user_id,user_email,user_name,password,join_time,verify_condition,status,first_name,last_name,mobile_number,gender,profile_pic,security_question,security_answer,verify_code, 'true' as friendship from (select * from user_info where ".$subQuery.")t1 natural join (select friend_id as user_id from friend_info where user_id=".$user." and friend_id<>".$user.")t2 union distinct select user_id,user_email,user_name,password,join_time,verify_condition,status,first_name,last_name,mobile_number,gender,profile_pic,security_question,security_answer,verify_code, 'false' as friendship from (select * from user_info where ".$subQuery.")t1 where user_id not in(select friend_id as user_id from friend_info where user_id=".$user." and friend_id<>".$user.") and user_id<>".$user."";
		$query = "select user_id,user_email,user_name,password,join_time,verify_condition,status,first_name,last_name,mobile_number,gender,profile_pic,security_question,security_answer,verify_code, 'true' as friendship from (select * from user_info where ".$subQuery.")t1 natural join (select friend_id as user_id from friend_info where user_id=".$user." and friend_id<>".$user." and friend_status='confirmed')t2 union distinct select user_id,user_email,user_name,password,join_time,verify_condition,status,first_name,last_name,mobile_number,gender,profile_pic,security_question,security_answer,verify_code, 'pending' as friendship from (select * from user_info where ".$subQuery.")t1 natural join (select friend_id as user_id from friend_info where user_id=".$user." and friend_id<>".$user." and friend_status='pending')t2 union distinct select user_id,user_email,user_name,password,join_time,verify_condition,status,first_name,last_name,mobile_number,gender,profile_pic,security_question,security_answer,verify_code, 'false' as friendship from (select * from user_info where ".$subQuery.")t1 where user_id not in(select friend_id as user_id from friend_info where user_id=".$user." and friend_id<>".$user.") and user_id<>".$user."";
		//echo $query;die;
		$data['object'] = Result_data::getResult($query);
		
		
		$this->load->view('user/header');
		$this->load->view('user/ajax');
		$this->load->view('user/sidebar_left');
		$this->load->view('user/navbar_top');
		$this->load->view('user/results',$data);
		$this->load->view('user/footer');
	}
	
	
	/*************************************************
			view user profile
	**************************************************/		
	public function view($user_id,$name){
		$profile = new Profile_data();
		$profile->user_id = $user_id;
		$data['object'] = $profile->getProfile();
		
		$friend = new Friend_info();
		$friend->friend_id = $user_id;
		$friend->user_id = $this->session->userdata('user_id');
		
		$data['isFriend'] = $friend->isFriend();
		
		$this->load->view('user/header');
		$this->load->view('user/ajax');
		$this->load->view('user/sidebar_left');
		$this->load->view('user/navbar_top');
		$this->load->view('user/view',$data);
		$this->load->view('user/footer');
	}
	
	/*************************************************
			Connect
	**************************************************/		
	public function connect(){
		$user=$this->session->userdata('user_id');
		$friend_id = $this->input->post('type');
		$friend = new Friend_info();
		$friend->user_id=$user;
		$friend->friend_id=$friend_id;
		$friend->connect();
	}

	/*************************************************
			accept
	**************************************************/		
	public function accept(){
		$user=$this->session->userdata('user_id');
		$friend_id = $this->input->post('type');
		$friend = new Friend_info();
		$friend->user_id=$user;
		$friend->friend_id=$friend_id;
		$friend->accept();
	}
	
	/*************************************************
			unfriend
	**************************************************/		
	public function unfriend(){
		$user=$this->session->userdata('user_id');
		$friend_id = $this->input->post('type');
		$friend = new Friend_info();
		$friend->user_id=$user;
		$friend->friend_id=$friend_id;
		$friend->unfriend();
	}	
	
	
	/*************************************************
			friend request notification
	**************************************************/		
	public function request_notification(){
		$user=$this->session->userdata('user_id');
		$friend = new Friend_info();
		$friend->user_id=$user;
		return $friend->getRequestCount();
	}
	
	/*************************************************
			Group home
	**************************************************/		
		public function grouphome(){
			
			$data['message']="";
			
			$this->load->view('user/header');
			$this->load->view('user/sidebar_left');
			$this->load->view('user/navbar_top');
			$this->load->view('user/grouphome',$data);
			$this->load->view('user/footer');
		}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/user.php */