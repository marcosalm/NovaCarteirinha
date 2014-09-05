<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home extends CI_Controller 
{
	/* Pendencia Controller
	 *
	 * @author	Marcos Almeida
	 * @link	http://uvv.br
	*/
	public function __construct(){
		parent::__construct();
		$this->load->model('account_model');
	}
	
	public function index(){
            
                $this->load->model('status_model');
		$data['ERROR'] = $this->status_model->total_ERROR();
                $data['OK'] = $this->status_model->total_OK();
                $data['PROCESS'] = $this->status_model->total_PROCESS();
                $data['PREVISAO'] = $this->status_model->previsao_PROCESS();
                $is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != true){
                $data['content'] = 'home';
		$data['page'] = 'home';
		$this->load->view('template/index', $data);
                } else {
                $data['A_ENVIAR'] = $this->status_model->total_A_ENVIAR();
                $data['content'] = 'admin';
		$data['page'] = 'admin';
		$this->load->view('template/index', $data);
                }
	}
        
        
	public function my_login(){
		$user = $this->input->post('username');
		$pass = $this->input->post('password');
		if(empty($user) or empty($pass)){
			$this->session->set_flashdata('msg', 'Username or password can\'t be blank');
			redirect('home');
		}
				
		$query = $this->account_model->validasi();
		
		if($query)
		{
			$data = array(
				'username' => $user,
				'is_logged_in' => true
			);
			$this->session->set_userdata($data);
			redirect('admin');
		}
		else 
		{
			$this->session->set_flashdata('msg', 'Invalid username and password');
			redirect('home');
		}
	}
	
	public function signup(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('fname', 'First Name', 'trim|required');
		$this->form_validation->set_rules('lname', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');
		$this->form_validation->set_rules('uname', 'Username', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('pass', 'Password', 'trim|required|min_length[6]|max_length[16]');
		$this->form_validation->set_rules('repass', 'Re-Password', 'trim|required|matches[pass]');
		if($this->form_validation->run() == FALSE){
			$data['content'] = 'home';
			$this->load->view('template/index', $data);
		}else
		{			
			if($query = $this->account_model->buat_akun()){
				$this->session->set_flashdata('success', 'Your account successfully created! you can login now');
				redirect('home');
			}else	{
				$this->session->set_flashdata('msg', 'Error insert database');
				redirect('home');			
			}
		}
		
	}
		
	public function logout(){
		$this->session->sess_destroy();
		$this->index();
	}
	
	public function is_logged_in(){
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != true){
			$this->session->set_flashdata('msg', 'Access denied! You don\'t have permission to access this page or session has expired. Please use login form!');
			redirect('login');		
		}		
	}
		
	
	
}