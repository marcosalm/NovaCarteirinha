<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Libfunction {

	public function __construct()
		{
			// Do something with $params
		}
	
	
	public function error_total(){
	$query = $this->db->query("SELECT * FROM crt_status WHERE situacao_cart = 'ERROR'");
	if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		} else{
		
			return 0;
			}
	}
	
	public function pronto_total(){
		$query = $this->db->query("SELECT * FROM crt_status WHERE situacao_cart = 'OK'");
		if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		} else{
		
			return 0;
			}
	}
	
	public function process_total(){
		$query = $this->db->query("SELECT * FROM crt_status WHERE situacao_cart = 'PROCESS'");
		if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		} else{
		
			return 0;
			}
	}
	
	public function next_total(){
		$query = $this->db->query("SELECT * FROM crt_a_enviar");
		if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		} else{
		
			return 0;
			}
	}
	
	public function get_option($name){
		$query = $this->db->query("SELECT * FROM crt_options WHERE option_name='{$name}'");
		while ($info = $query->result()){
			return $info->option_value;
			}
	}
		
	public function set_option($name,$value){
	$query = $this->db->query("SELECT option_value FROM `crt_options` WHERE option_name='{$name}'");
	if ($query->num_rows() > 0)
		{
		$data = array ('option_value' => $value);
		$this->db->update('crt_options', $data, "option_name='{$name}'");
	
	} else{
	$data = array ('option_name' =>$name, 'option_value' => $value);
	$this->db->insert('crt_options', $data);
	
	}
	}
	
	
	
}

/* End of file function.php */