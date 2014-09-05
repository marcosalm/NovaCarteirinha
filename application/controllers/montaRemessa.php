<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of montaRemessa
 *
 * @author marcos.almeida
 */
class MY_montaRemessa extends CI_Controller 
{
    //put your code here
    public function __construct(){
		parent::__construct();
		$this->load->model('status_model');
	}
        
   protected function leituraRetornoRemessa($uploadfile){
    	
			$handle = fopen($uploadfile, "r");

			if ($handle) {
			$a_line = array();
				while (($line = fgets($handle)) !== false) {
					// process the line read.
					array_push($a_line, $line);		
				}
				$n_linhas = count($a_line);
				$header = $a_line[0];
				$trailler = end($a_line);
				$data_reg = substr($header, 24, -120);
				$n_seq = substr($a_line[1], 44, -102);
				$T_reg = substr($trailler, 1, -142);
				$V_reg = substr($trailler, 10, -133);
				$E_reg = substr($trailler, 20, -123);
				$data = array("n_seg_remessa"=> $n_seq, "total_enviado" =>$T_reg, "total_validos"=>$V_reg, "total_error"=>$E_reg, "data_envio"=>$data_reg);
				$this->db->insert('crt_historico', $data); 
				$dados_ok = array();
				$dados_erro = array();
				$dados_status = array();
				for ($i=1;$i<$n_linhas-1;$i++){
                                    $linha = $a_line[$i];
                                    $matricula = substr($linha, 2, -135);
                                    $cpf = substr($linha, 17, -124);
                                    $cod_barras = substr($linha, 29, -110);
                                    $tipo_vinculo = substr($linha, 42, -109);
                                    $cod_evento = substr($linha, 43, -108);
                                    $n_seq_remessa = substr($linha, 44, -102);
                                    $cod_error = substr($linha, 51, -3);
                                    /* 	if ($query = $this->db->get_where('crt_t_aluno',array('matricula'=>$matricula))){
                                    $row = $query->row();
				$nome = $row->nome;
					} 
								else { */
									$nome=" ";
								//}
							if (trim($cod_error) === 'C000'){
								array_push($dados_ok, array('matricula'=>$matricula, 'situacao_cart'=>'PROCESS','nome'=>$nome,'lote'=>$n_seq_remessa));
                                                        }else{
                                                                array_push($dados_status, array('matricula'=>$matricula, 'situacao_cart'=>'ERROR','nome'=>$nome,'lote'=>$n_seq_remessa));
									//`matricula`, `cpf`, `cod_barra`, `n_seg_remessa`, `cod_error`,`nome`
                                                                array_push($dados_erro, array('matricula'=>$matricula, 'cpf'=>$cpf, 'cod_barra'=>$cod_barras,'n_seg_remessa'=>$n_seq_remessa,'cod_error'=>$cod_error,'nome'=>$nome));
                                                        }  
						$this->db->delete('crt_status', array('matricula' => $matricula)); 
						$this->db->delete('crt_erro_retorno', array('matricula' => $matricula)); 
					}
				$this->db->insert_batch('crt_status',$dados_status);
				$this->db->insert_batch('crt_status',$dados_ok);
				$this->db->insert_batch('crt_erro_retorno',$dados_erro);

			} 

      }
    
    protected function enviaFotos(){
       
       /*----------------------------Gera ZIP--------------------------*/
       $this->load->library('zip');
       $all = $this->status_model->get_mat_a_enviar_foto_n(); 
       foreach ($all as $mat){
           $this->zip->read_file($mat); 
       }
       $zip_file = $this->zip->archive('/NovaCarteirinha/uploads/lote.zip'); 
       $this->load->library('ftp');
       
       /*----------------------------envia FTP-------------------------*/
        $config['hostname'] = 'ftpmulti.bettersolutions.com.br';
        $config['username'] = 'uvv';
        $config['password'] = 'd4sf$opA86=';
        $config['debug']    = TRUE;

        $this->ftp->connect($config);

        $this->ftp->upload('/NovaCarteirinha/uploads/lote.zip', '/public_html/myfile.html', 'ascii', 0775);

        $this->ftp->close();
        
        /*-----------------------Atualiza Status--------------------*/
        $this->db->where('matricula', $matricula);
        $this->db->update('crt_status', array("status_foto"=>"ENVIADA"));
       
    }
    
    protected function leituraRetornoFotos($uploadfile){
        $this->load->model('historico_model');
    	$uploaddir = FCPATH .'uploads\\';
		$uploadfile = $uploaddir . $_FILES['file']['name'];

		if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
                     $handle = fopen($uploadfile, "r");
                        if ($handle) {
                                $a_line = array();
                                while (($line = fgets($handle)) !== false) {
                                            // process the line read.
                                        array_push($a_line, $line);
                                  }

                        }
                        foreach($a_line as $reg){
                           $mat = substr($reg,-11);
                           $array_mat[]=(int)$mat;
                        }
                    foreach($array_mat as $matricula){
                        $this->historico_model->fotoStatus($matricula,"OK");
                    }
                    
		} else {
			return;
		}
		
                
       

    }
}
