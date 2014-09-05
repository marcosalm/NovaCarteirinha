<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Status_model extends CI_Model {
	
	private $table_name = 'crt_status';
	private $mat = 'matricula';
	
	public function get_data($matricula){
		$query = $this->db->get_where($this->table_name, array($this->mat => $matricula));
		return $query->row_array();
	}
        
        public function total_ERROR(){
             $query = $this->db->get_where($this->table_name, array("situacao_cart" => "ERROR"));
	if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		} else{
		return 0;
                }
        }
	
        public function total_OK(){
            $query = $this->db->get_where($this->table_name, array("situacao_cart" => "OK"));
            if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		} else{
		
			return 0;
			}
        }
	
        public function total_PROCESS(){
            $query = $this->db->get_where($this->table_name, array("situacao_cart" => "PROCESS"));
            if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		} else{
		
			return 0;
			}
        }
        
        public function previsao_PROCESS(){
            $query = $this->db->query('SELECT * FROM crt_historico ORDER BY id ');
				if ($query){
				while ($info = $query->result()){
                                    $lote = isset($info->data_envio)? $info->data_envio : "";
                                    $n_lote = isset($info->n_seg_remessa)? $info->n_seg_remessa : "";
                                    $entrega = strtotime( $lote."+ 15 days");
                                    $today = strtotime("today");
                                    if ($today < $entrega){
                                        return "<br>Lote nº:".$n_lote." enviado dia ".date("d/m/Y",strtotime($lote))." previsão para <span class='cor-warning numero-destaque '>". date("d/m/Y",$entrega)."</span>";
                                       }
                                    }
                                }
        }

        public function total_A_ENVIAR(){
             $query = $this->db->get_where($this->table_name, array("situacao_cart" => "A_ENVIAR"));
	if ($query->num_rows() > 0)
		{
			return $query->num_rows();
		} else{
		
			return 0;
			}
        }
        
        public function total_LIMBO(){
            $query = $this->db->get_where($this->table_name, array("situacao_cart" => "LIMBO"));
            if ($query->num_rows() > 0)
                    {
                            return $query->num_rows();
                    } else{
                            return 0;
                       }
        }
        
        public function get_mat_a_enviar_foto_n(){
             $query = $this->db->get_where($this->table_name, array("situacao_cart" => "A_ENVIAR", "status_foto" => "N_ENVIADA"));
             foreach($query->result() as $aluno){
                 $matricula[] = $aluno->matricula;
             }
             return $matricula;
        }
        
        
}
/* End of file status_model.php */
/* Location: ./application/models/status_model.php */