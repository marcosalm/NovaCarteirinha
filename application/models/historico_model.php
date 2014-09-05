<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Historico_model extends CI_Model {
    
    private $table_name = "crt_historico";
    
    public function getall_lotes(){
        $this->db->order_by('n_seg_remessa', 'desc');
        $lotes = $this->db->get('crt_historico');
        foreach ($lotes->result() as $lote){
            $out[]=$lote;
        }
        return $out;
    }
    
    public function get_lotes_periodo($periodo){
       $query = $this->db->get_where('crt_historico',array('periodo'=>$periodo));
       return $query->result();
    }
    
    public function get_last_lote(){
        $this->db->select_max('n_seg_remessa');
        $query = $this->db->get('crt_historico');
        return $query->result();
    }
    
    public function set_nxt_lote($lote){
        
        $nx_lote = (int)$lote +1;
        $query = $this->db->query("SELECT * FROM crt_historico WHERE n_seg_remessa > '{$lote}'");
        if ($query->num_rows() < 1){
        $this->db->insert($this->table_name, array('n_seg_remessa'=>$nx_lote));
        return $this->db->insert_id();
        }
    }

    public function fotoStatus($matricula,$status){
        $data = array('status_foto',$status);
        $this->db->update('crt_status', $data, array('matricula' => $matricula));
    }
    
    public function getEnvioFoto($lote){
       $query = $this->db->get_where('crt_historico',array('n_seg_remessa'=>$lote));
       $result = $query->row();
       return $result->data_envio_fotos;
    }
    
    public function setEnvioFoto($lote){
        $today = strtotime("now");
        $data= array("data_envio_fotos" => $today);
        $this->db->update('crt_historico',$data, array('n_seg_remessa'=>$lote));
    }
    
    public function setRespostaFoto($lote){
        $today = strtotime("now");
        $data= array("data_fotos_confirmada" => $today);
        $this->db->update('crt_historico',$data, array('n_seg_remessa'=>$lote));
    }
    
    public function set_get_Periodo($lote){
       $query = $this->db->get_where('crt_historico',array('n_seg_remessa'=>$lote));
       $result = $query->row();
       $date = $result->data_envio_fotos;
       $YEAR = date("Y",$date);
       $MONTH = date("n",$date);
       if ($MONTH >6){
           $periodo = $YEAR."/2";
           } else{
            $periodo = $YEAR."/1";   
        }
       $data = array("periodo"=>$periodo);
       $this->db->update('crt_historico',$data, array('n_seg_remessa'=>$lote));
         return $periodo;
    } 
    
    public function last_periodo(){
        $query = $this->db->query("SELECT * FROM crt_historico ORDER BY n_seg_remessa DESC;");
        $row = $query->row(0);
        return $row->periodo;
    }
    
    public function dataOK($lote){
        $today = date("d-m-Y",strtotime('today'));
        $this->db->where(array('n_seg_remessa' => $lote));
        $this->db->update($this->table_name, array('data_OK'=> $today));
        $this->set_nxt_lote();
    }
    
    
}
	

