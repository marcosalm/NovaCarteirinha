<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Configuracao extends CI_Controller 
{
	/* Config Controller
	 *
	 * @author	Marcos Almeida
	 * @link	http://uvv.br
	*/
	public function __construct(){
		parent::__construct();
		//$this->is_logged_in();
                //parent::montaRemessa();
		$this->load->model('config_model');
	}

	public function index(){
		$this->load->model('account_model');		
		$data['account'] = $this->account_model->get_data($this->session->userdata('username'));			
		$data['Inputfoto'] = $this->config_model->get_option('Inputfoto');
		$data['InputEmail'] = $this->config_model->get_option('InputEmail');
		$data['Inputerro'] = $this->config_model->get_option('Inputerro');
		$data['content'] = 'config';
		$data['page'] = 'config';
		$this->load->view('template/index', $data);
	}
	
	public function emailRetorno(){
	
		$Inputfoto = $_POST['Inputfoto'];
		$InputEmail = $_POST['InputEmail'];
		$Inputerro = $_POST['Inputerro'];
		$this->config_model->set_option('Inputfoto',$Inputfoto);
		$this->config_model->set_option('InputEmail',$InputEmail);
		$this->config_model->set_option('Inputerro',$Inputerro);
		redirect('configuracao');
	}
	
	public function is_logged_in(){
		$is_logged_in = $this->session->userdata('is_logged_in');
                    if(!isset($is_logged_in) || $is_logged_in != true){
                            $this->session->set_flashdata('msg', 'Acesso Negado! Você não tem permissão ou a sessão expirou. Favor logar!');
                            redirect('login');		
                    }		
	}	
	
	public function uploadRetorno(){
				
		$uploaddir = FCPATH .'uploads\\';
		$uploadfile = $uploaddir . $_FILES['file']['name'];

		if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
		   $this->retornoRead($uploadfile);
		   redirect('admin');	
		} else {
			print "Possivel ataque de upload! Aqui esta alguma informação:\n";
			print_r($_FILES);
		}
		print "</pre>";
	}
	
	
	
	
	public function multiupload(){
				
		$allowed = array('png', 'jpg', 'gif','zip');
		if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){
			$extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);
			if(!in_array(strtolower($extension), $allowed)){
				echo '{"status":"error"}';
				exit;
			}

			if(move_uploaded_file($_FILES['upl']['tmp_name'], FCPATH .'uploads\\fotos\\'.$_FILES['upl']['name'])){
				echo '{"status":"success"}';
				$file = $_FILES['upl']['name'];
				$x = explode(".",$file);
				$this->config_model->insert_file($x[0],FCPATH .'uploads\\fotos\\'.$file,base_url().'uploads/fotos/'. $file);
				exit;
			}
		}

		echo '{"status":"error"}';
		exit;
			
	}
        
        public function inserirUser(){
            $nome = $this->input->post('nome');
            $email = $this->input->post('email');
            $username = $this->input->post('username');
            $pass = $this->input->post('pass');
            $pass2 = $this->input->post('pass2');
             if($pass === $pass2){
             $this->db->insert('account',array('name'=>$nome,"email"=>$email,"username"=>$username,"password"=>$pass));
             $this->session->set_flashdata('msg', 'Usuário cadastrado com sucesso!');   			
                redirect('configuracao');
             } else { 
              $this->session->set_flashdata('msg', 'Senha não confere!');   			
                redirect('configuracao');
             }
        }
        
        public function changeUserPass(){
             $pass = $this->input->post('pass');
             $pass2 = $this->input->post('pass2');
             $username = $this->session->userdata('username');
             
             if($pass === $pass2){
                 $this->db->update('account', array('password'=>$pass), array('username'=>$username));
                 $this->session->set_flashdata('msg', 'Senha atualizado com sucesso!');   			
                redirect('configuracao');
             } else {
             $this->session->set_flashdata('msg', 'Senha não confere!');
             redirect('configuracao');
             }
            
        }
        
        public function excluirUser($username){
            $this->db->delete('account', array('username' => $username)); 
            $this->session->set_flashdata('msg', 'Usuário deletado com sucesso!');
            redirect('configuracao');
        }
        
        public function editUser(){
            
        }
}
/* End of file configuracao.php */
/* Location: ./application/controllers/configuracao.php */
