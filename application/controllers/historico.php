<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class historico extends CI_Controller
{
	/* Pendencia Controller
	 *
	 * @author	Marcos Almeida
	 * @link	http://uvv.br
	*/
	public function __construct(){
		parent::__construct();
		//$this->is_logged_in();
		//$this->filtroErros();
                   $this->load->model('historico_model');
	}
	
	public function index(){
                $data['lista_hist']= $this->lista_lotes();
		$data['content'] = 'historico';
		$data['page'] = 'historico';
                $data['lotes'] = $this->lista_lotes();
		$this->load->view('template/index', $data);
	
	}
	
	public function is_logged_in(){
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != true){
			$this->session->set_flashdata('msg', 'Access denied! You don\'t have permission to access this page or session has expired. Please use login form!');
			redirect('login');		
		}		
	}
	
	public function getErrorData($error){
	$query = $this->db->get("crt_error");
	$db = $query->result_array();	
	return $db;	
	}
	
	public function filtroErros(){
	
		$sql = $this->db->query("SELECT * FROM crt_status WHERE situacao_cart ='ERROR'");
				
					while ($info = $sql->result_array()){
						$error[] = $info['matricula'];
					}
				$mat_aluno_erro = implode("," , $error);
				
		$this->db->query("DELETE FROM crt_erro_retorno WHERE matricula NOT IN ({$mat_aluno_erro})");
				
	
	}

        public function lista_lotes(){
            
           $periodo = $this->input->post('periodo');
           if(empty($periodo)){
               $periodo = $this->historico_model->last_periodo();
           }
           $lotes_per= $this->historico_model->get_lotes_periodo($periodo);
           
                   $html            ="";
                                 
           foreach($lotes_per as $lote){
                $data_env_foto = "aguardando";$class_env_f = "cor-aguardando"; 
                $data_conf_foto = "aguardando";$class_conf_f = "cor-aguardando";
                $data_env_remes = "aguardando"; $class_remes = "cor-aguardando";
                $data_env_retor = "aguardando"; $class_env_ret = "cor-aguardando";
                $data_env_ok = "aguardando"; $class_env_ok = "cor-aguardando";
                   
            if ($lote->data_envio_fotos!= NULL){
                  $data_env_foto = date("d/m/Y",strtotime($lote->data_envio_fotos));
                  $class_env_f ="";

                if ($lote->data_fotos_confirmada!= NULL){
                      $data_conf_foto = date("d/m/Y",strtotime($lote->data_fotos_confirmada));
                      $class_conf_f =" ";
                        
                      if ($lote->data_envio_remessa!= NULL){
                                $data_env_remes = date("d/m/Y",strtotime($lote->data_envio_remessa));
                                $class_remes =" ";
                
                                if ($lote->data_retorno!= NULL){
                                    $data_env_retor = date("d/m/Y",strtotime($lote->data_retorno));
                                    $class_env_ret = " ";
                     
                
                                    if ($lote->data_retorno!= NULL){
                                        $data_env_retor = date("d/m/Y",strtotime($lote->data_retorno));
                                        $class_env_ret = " ";
                 
                                        if ($lote->data_OK!= NULL){
                                            $data_env_ok = date("d/m/Y",strtotime($lote->data_OK));
                                            $class_env_ok =" ";
             
                                            } else {
                                                $data_env_ok ='aguardando<br><a href="historico/confirmar_chegada_carteirinhas/'.$lote->n_seg_remessa.'" class="btn btn-success btn-xs ">Confirmar recebimento</a>';
                                                $class_env_ok = "cor-aguardando";
                                            }
              
                                            
                                        }
              
                                        
                                } else{
                                    $data_env_retor = 'aguardando<br><button type="button" class="btn btn-primary btn-xs " data-toggle="modal" data-target="#myModal2">Enviar retorno</button>'; 
                                    $class_env_ret = "cor-aguardando";
                                    
                                }
            
                        }
                                        
                } else {
                    
                    $data_conf_foto = 'aguardando<br><button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal">Retorno das fotos</button>'; 
                     $class_conf_f = "cor-aguardando";
                }
           
            }
           
            $html .= '<tr>
                         <td><a data-toggle="modal" data-target="#myModal3" class="label label-lote label-info" id="'.$lote->n_seg_remessa.'">#'.$lote->n_seg_remessa.'</a> <input type="hidden" id="lote" value="'.$lote->n_seg_remessa.'" /></td> 
                         <td class="'.$class_env_f.'" >'.$data_env_foto.'</td>
                         <td class="'.$class_conf_f.'"> <ul>
                              <li>'.$data_conf_foto.'</li>
                              <li><span class="cor-danger">Fotos com erro: 15</span></a></li>
                            </ul></td>
                         <td class="'.$class_remes.'"><ul>
                              <li>'.$data_env_remes.'</li>
                              <li><span class="cor-info">Enviados: 7835</span></a></li>
                            </ul>
                         </td>
                         <td class="'.$class_env_ret.'"><ul>
                              <li>'.$data_env_retor.'</li>
                              <li><span class="cor-success">Processados: 7330</span></a></li>
                              <li><span class="cor-danger">Com erro: 505</span></a></li>
                            </ul></td> 
                        <td class="'.$class_env_ok.'"><ul>
                              <li>'.$data_env_ok.'</li>
                              <li><span class="cor-success" >Entregues: 7330</span></a></li>
                            </ul>
                            </td>
                      </tr>';
                 
           }
           return $html;
        }
        
        public function confirmar_chegada_carteirinhas($lote){
           
        $data = array(
               'situacao_cart' => "OK"
                    );

        $this->db->where(array('situacao_cart'=> 'PROCESS', 'lote'=> $lote));
        $this->db->update('crt_status', $data); 
        $this->historico_model->dataOK($lote);
        redirect('historico');
            
        }

        public function historico_search(){
		
		$html = '<div class="alert alert-warning"><p><i class="fa fa-search"></i> <b> Aluno não encontrato!</b> Tente outra busca.</p></div>';
		// Get Search
		$search_string = $_POST['query'];
		// Check Length More Than One Character
                if (strlen($search_string) >= 1 && $search_string !== ' ') {
                // Build Query
		$query = $this->db->query('SELECT * FROM crt_status WHERE lote LIKE "%'.$search_string.'%"');
		// Do Search
		//$result_array = $query->result();
                
		foreach ($query->result() as $row){
                    $result_array[] = $row;
		}
			// Check If We Have Results
                
		if (isset($result_array)) {
			foreach ($result_array as $result) {
			// Format Output Strings And Hightlight Matches
				if ($result->situacao_cart == 'OK' || $result->situacao_cart== 'A_ENVIAR' || $result->situacao_cart== 'PROCESS'){		
                                    $html_OK = "<script type='text/javascript'>
							jQuery(document).ready(function($){
								$('#segvia-". $result->matricula."').click(function(){
								var confirm1 = confirm('Deseja realmente emitir a 2º via deste aluno?');
								if (confirm1) {
									$.ajax({
										type: 'POST',
										url: '2_via_emitir.php',
										data: { matricula: '". $result->matricula."' }
									}).done(function(){ $('#btn_search').click();});
									
									}
								});
							});
							</script> 
							";
							if ($result->situacao_cart == 'OK'){
							$html_OK.= '<div class="alert alert-success">';
							$is_logged_in = $this->session->userdata('is_logged_in');
							if (isset($is_logged_in) && $is_logged_in){
                                                                $html_OK .= ' <div class="foto-aluno" style="background-image: url(img/avatar.jpg);"></div><a href="#"  id="segvia-'. $result->matricula.'" class="btn btn-success pull-right" role="button" ></i> Solicitar 2º via</a>';
                                                            }
                                                             $html_OK .= '<h4><i class="fa fa-credit-card"></i> Carteirinha produzida</h4> 
                                                                                <ul>
                                                                                      <li><b>Aluno:</b> nameString </li>
                                                                                      <li><b>Matrícula:</b> matString</li>
                                                                                      <li><b>Lote:</b> loteString</li>
                                                                                      <li>Procurar a secretaria de apoio do seu curso</li>
                                                                                </ul>
                                                                        </div>';
						  } else if ($result->situacao_cart== 'A_ENVIAR'){
						  $html_OK .= '<div class="alert alert-info">
                                                                    <div class="foto-aluno" style="background-image: url(img/avatar.jpg);"></div>
                                                                    <h4><i class="fa fa-credit-card"></i> Carteirinha à enviar ao Santander</h4> 
                                                                      <ul>
                                                                            <li><b>Aluno:</b> nameString </li>
                                                                            <li><b>Matrícula:</b> matString</li>
                                                                            <li>lote nº: loteString</li>
                                                                      </ul>
                                                              </div>';
						  } else if ($result->situacao_cart == 'PROCESS'){
						 $lote =(int)$result->lote;
						 $sql = $this->db->query("SELECT * FROM crt_historico WHERE n_seg_remessa = $lote");
						 
						 $info=$sql->row();
						 $envio = $info->data_envio;
						 $entrega = strtotime( $envio."+ 15 days");
						  $html_OK .= '<div class="alert alert-warning">
                                                       <div class="foto-aluno" style="background-image: url(img/avatar.jpg);"></div>
                                                                    <h4><i class="fa fa-credit-card"></i> Carteirinhas em processamento pelo Santander</h4> 
                                                                      <ul>
                                                                            <li><b>Aluno:</b> nameString </li>
                                                                            <li><b>Matrícula:</b> matString</li>
                                                                            <li>lote nº loteString enviado dia <b>'.date("d/m/Y",strtotime($envio)).'</b> previsão para entrega <b>'.date("d/m/Y",$entrega).'</b></li>
                                                                      </ul>
                                                              </div>';
						  }
						  
					$display_function = preg_replace("/".$search_string."/i", "<b class='highlight'>".$search_string."</b>", $result->matricula);
					$display_name = preg_replace("/".$search_string."/i", "<b class='highlight'>".$search_string."</b>", $result->nome);
					
					if ($result->situacao_cart== 'A_ENVIAR' && $result->lote!="a enviar"){
                                        
                                            if (!empty($result->versao_via)){
                                                   $result->lote = "Dados prontos para emissão da ".$result->versao_via."º Via da Carteirinha.";
                                                }else{
                                                    $result->lote= "Dados prontos para emissão da Carteirinha.";
                                                    }
                                            }
					
					$display_url = preg_replace("/".$search_string."/i", "<b class='highlight'>".$search_string."</b>", $result->lote);
					
					// Insert Name
					$output = str_replace('nameString', $display_name, $html_OK);

					// Insert Function
					$output = str_replace('matString', $display_function, $output);

					// Insert URL
					$output = str_replace('loteString', $display_url, $output);

					// Output
					echo($output);
						  
						  
						  } else  if ($result->situacao_cart== 'ERROR') {
							
							$sql = $this->db->query('SELECT * FROM crt_erro_retorno WHERE matricula= '.$result->matricula);
							
							$error = $sql->row();
							
                                                        $html_erro = '';
                                                        $html_erro .=' <div class="alert alert-danger">
                                                             <div class="foto-aluno" style="background-image: url(img/avatar.jpg);"></div>
                                                                <h4><i class="fa fa-exclamation-circle"></i> Ocorreram os erros:</h4> ';
                                                                //$html_erro .='<a href="#Listagem" data-toggle="tab" class="btn btn-danger pull-right" role="button" onclick="oTable.fnFilter('.$result->matricula.'); $(\'#listagem_li\').addClass(\'active\');$(\'#consulta_li\').removeClass(\'active\')"> <i class="fa fa-eye"></i> Ver Erros</a>';
                                                                $html_erro .='
                                                                  <b>Aluno:</b> '.$result->nome.' <br>
                                                                  <b>Matrícula:</b> '.$result->matricula.' <br>'; 
							  
							$erro_array = explode(" ",$error->cod_error);
                                                        $sql = $this->db->query('SELECT * FROM crt_error');		
                                                   
                                                     foreach ($sql->result() as $err){
                                                         if ($err){
                                                        foreach ($erro_array as $erro){
                                                           if ($erro === $err->cod_error){
                                                               $html_erro .= '<p class="dt_erro"><span>Erro:</span> <b>'.$erro.'</b> - '.$err->descricao.'</p> <p class="dt_solucao"><span>Solução</span>: '.$err->solucao .'</p>';
                                                           }
                                                        }
                                                         }
                                                    }
									
															
							$html_erro .='</div>';
						
						$output = $html_erro;    					  
					echo($output);								

                                    }
                                }
			}else{

				// Format No Results Output
				$output = str_replace('urlString', 'javascript:void(0);', $html);
				$output = str_replace('nameString', '<b>No Results Found.</b>', $output);
				$output = str_replace('functionString', 'Sorry :(', $output);

				// Output
				echo($output);
			}
		
		
		}
	
	}
	
	
	
}