<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin
 *
 * @author marcos.almeida
 */

class Admin extends CI_Controller 
{
	
	public function __construct(){
		parent::__construct();
		$this->is_logged_in();
	}

	public function index(){
            $this->load->model('status_model');
            $data['ERROR'] = $this->status_model->total_ERROR();
            $data['OK'] = $this->status_model->total_OK();
            $data['PROCESS'] = $this->status_model->total_PROCESS();
            $data['PREVISAO'] = $this->status_model->previsao_PROCESS();
            $data['A_ENVIAR'] = $this->status_model->total_A_ENVIAR();
            $data['content'] = 'admin';
            $data['page'] = 'admin';
            $this->load->view('template/index', $data);
	}
	
	public function view_account(){
		$this->load->model('account_model');		
		$data['account'] = $this->account_model->get_data($this->session->userdata('username'));			
		$data['content'] = 'user_detail';
		$this->load->view('template/index', $data);
	}
	
	public function is_logged_in(){
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != true){
			$this->session->set_flashdata('msg', 'Access denied! You don\'t have permission to access this page or session has expired. Please use login form!');
			redirect('login');		
		}		
	}	
	
	
}
/* End of file user.php */
/* Location: ./application/controllers/user.php */
