<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Status_model extends CI_Model {
	
	private $table_name = 'crt_status';
	private $mat = 'matricula';
	
	public function get_data($matricula){
		$query = $this->db->get_where($this->table_name, array($this->mat => $matricula));
		return $query->row_array();
	}
	
}
/* End of file status_model.php */
/* Location: ./application/models/status_model.php */