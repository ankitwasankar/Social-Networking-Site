<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Guest extends CI_Controller {

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
		$this->load->model('login_info');	
	}
		
	/*************************************************
					Login Page
	**************************************************/	
	public function index(){
		$data['message1']="";
		$data['message2']="";
		$this->form_validation->set_rules('email','Email','trim|required|valid_email|max_length[60]|xxs_clean'); 
		$this->form_validation->set_rules('password','Password','trim|required|max_length[16]|min_length[5]|md5');
		if($this->form_validation->run()==TRUE ){	
			$user = new User_info();
			$user->user_email = $this->input->post('email');
			$user->password = $this->input->post('password');
			if($user->login()){
				Guest::setSession($user->user_email);
				Guest::recordLoginEvent("Successful",$user->user_email);
				$url=base_url()."user/index/";
				redirect($url,'Location');
			}else{
				$data['message1']="Email and password does not match";
				$data['message2']="retry";
				Guest::recordLoginEvent("Unsuccessful",$user->user_email);
			}
		}else{
			if(isset($_POST['email'])){
				$data['message2']="retry";
			}
		}
		$this->load->view('guest/header',$data);
		$this->load->view('guest/home',$data);
		$this->load->view('guest/footer',$data);
	}
	
	/*************************************************
			Registration function
	**************************************************/	
	public function register(){
		$data['message1']="";
		$data['message2']="";
		$this->form_validation->set_rules('email','Email','trim|required|valid_email|max_length[60]|xxs_clean'); 
		$this->form_validation->set_rules('firstname','First name','trim|required|max_length[30]|min_length[2]');
		$this->form_validation->set_rules('lastname','Last name','trim|required|max_length[30]|min_length[2]');
		$this->form_validation->set_rules('passwd','Password','trim|required|matches[cnfpasswd]|max_length[16]|min_length[5]|md5');
		$this->form_validation->set_rules('cnfpasswd','Confirm password','trim|required|max_length[16]|md5');
		if($this->form_validation->run()==TRUE ){	
			if(ctype_alpha($this->input->post('firstname')) && ctype_alpha($this->input->post('lastname'))){	
				$user = new User_info();
				$user->user_email = $this->input->post('email');
				$user->user_name = $this->input->post('email');
				$user->password = $this->input->post('passwd');
				$user->first_name = $this->input->post('firstname');
				$user->last_name = $this->input->post('lastname');
				$user->verify_code = mt_rand(999999,99999999);
				if($user->register()){
					/**********Send email verification**************/				
					Guest::sendMail($user->email,$user->first_name, $user->verify_code);
					Guest::setSession($user->user_email);
					Guest::recordLoginEvent("Successful",$user->user_email);
					$url=base_url()."user/index/";
					redirect($url,'Location');
				}
				else{
					$data['message1']="Email already registered.";
					$data['message2']="retry";
				}
			}else{
				$data['message1']="First & Last Name must be valid.";
				$data['message2']="retry";
			}	
		}else{
			if(isset($_POST['email'])){
				$data['message2']="retry";
			}
		}
		$this->load->view('guest/header',$data);
		$this->load->view('guest/register',$data);
		$this->load->view('guest/footer',$data);
	}

	/*************************************************
			Forgot password page
	**************************************************/
	public function forgot(){
		$this->load->view('guest/forgot');
	}
	
	/*************************************************
			verification mail sender function
	**************************************************/
	public function sendMail($to,$name,$verify_code){
		$subject = "Verification Link";
		
		$url = base_url()."guest/verify/".$to."/".$verify_code;		
		/** preparing the mail body which is $message**/
		$message = "<html>Hi ".$name.",<br>Please verify your email address for accessing the account.<br><br>Link:<br><a href='".$url."'>".$url."</a></html>";
		/** configuring email **/
		$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => $this->config->item('smtp_host'),
			'smtp_port' => 465,
			'smtp_user' => $this->config->item('smtp_user'),
			'smtp_pass' => $this->config->item('smtp_pass'),
			'mailtype'  => 'html', 
			'charset'   => 'iso-8859-1'
		);
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		/** creating email **/
		$this->email->from("verify@mytechblog.in", "Team");
		$this->email->to($to); 
		$this->email->subject($subject);
		$this->email->message($message);
		/** sending email **/
		if($this->email->send()) {
			$data['message']="Your query submitted successfully. You will receive a reply soon..";
		} else {
			$data['message']="Sorry, Please try again later.. ";
		}
	}
	
	/*************************************************
			Session Manager
	**************************************************/
	public function setSession($user_email){
		$user1 = new User_info();
		$user1->user_email = $user_email;
		$user=$user1->getUserInfo();
		$s_data=array(
				'user_email'=>$user->user_email,
				'user_id'=>$user->user_id,
				'user_name'=> $user->user_name  , 
				'first_name'=>$user->first_name,
				'session'=>'login#key23$%F'
				);
		$this->session->set_userdata($s_data);
		
		/* to check the session values */
		//echo $this->session->userdata('user_email'); die;
	}
	
	/*************************************************
			recordLoginEvent
	**************************************************/
	public function recordLoginEvent($status, $user_email){
		$user1 = new Login_info();
		$user1->user_email = $user_email;
		/** identifying browser, platform and ip address **/
			$agent = "";
			if ($this->agent->is_browser())				{
				$agent = $this->agent->browser().' '.$this->agent->version();
			}elseif ($this->agent->is_robot()){
				$agent = $this->agent->robot();
			}elseif ($this->agent->is_mobile()){
				$agent = $this->agent->mobile();
			}else{
				$agent = 'Unidentified User Agent';
			}
			$user1->browser = $agent;
			$user1->system = $this->agent->platform();
			$user1->ip = $this->input->ip_address();	
			$user1->login_status= $status;
		
		$user1->recordLoginEvent();		
	}	
}

/* End of file guest.php */
/* Location: ./application/controllers/guest.php */