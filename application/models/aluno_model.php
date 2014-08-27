<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Aluno_model extends CI_Model {
	
	private $table_name = 'crt_t_alunos';
	private $mat = 'matricula';
	
	public function get_data($matricula){
		$query = $this->db->get_where($this->table_name, array($this->mat => $matricula));
		return $query->row_array();
	}
	
}
/* End of file aluno_model.php */
/* Location: ./application/models/aluno_model.php */