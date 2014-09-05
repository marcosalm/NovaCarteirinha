<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Config_model extends CI_Model {
	
	private $table_options = 'crt_options';
	private $table_fotos = 'crt_foto';
	
	
	public function get_option($name){
		$query = $this->db->get_where($this->table_options, array('option_name' => $name));
		while ($info = $query->row()){
		//if (!empty($info->option_value)){
			return $info->option_value;
			//} else{ return " ";}
			}
	}
		
	public function set_option($name,$value){
	$query = $this->db->get_where($this->table_options, array('option_name' => $name));
	if ($query->num_rows() > 0) 	{
		$data = array ('option_value' => $value);
		$this->db->update($this->table_options, $data, array("option_name"=>$name));
	
	} else{
	$data = array ('option_name' =>$name, 'option_value' => $value);
	$this->db->insert($this->table_options, $data);
	
	}
	}
	
	 public function insert_file($matricula, $path, $url){
	 
	 $this->db->delete('crt_fotos', array('matricula' => $matricula)); 
	 
        $data = array(
            'matricula'      => $matricula,
            'foto_path'         => $path,
            'foto_url'         => $url
        );
        
        $this->db->insert('crt_fotos', $data);
        
        $this->db->where('matricula', $matricula);
        $this->db->update('crt_status', array("status_foto"=>"A_ENV"));
        return $this->db->insert_id();
    }
	
	
	public function get_foto_url($matricula){
	
		$query = $this->db->query("SELECT * FROM crt_fotos WHERE matricula = $matricula");
		$foto = $query->row();
		return $foto->foto_url;
	}
	public function get_foto_path($matricula){
	
		$query = $this->db->query("SELECT * FROM crt_fotos WHERE matricula = $matricula");
		$foto = $query->row();
		return $foto->foto_path;
	
	}
	
}
/* End of file config_model.php */
/* Location: ./application/models/config_model.php */