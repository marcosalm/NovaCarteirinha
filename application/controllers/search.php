<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller 
{
	/* Admin Controller
	 *
	 * @author	Marcos Almeida
	 * @link	http://uvv.br
	*/
	public function __construct(){
		parent::__construct();
		
	}

	public function index(){
	
	}
	
		
	public function student_search(){
			
			
		$html = '';
		$html .= '<div class="alert alert-warning">';
		$html .= ' <p><i class="fa fa-search"></i> <b> Aluno não encontrato!</b> Tente outra busca.</p>';
		$html .= '</div>';

		// Get Search
		$search_string = $_POST['query'];
		
		// Check Length More Than One Character
		if (strlen($search_string) >= 1 && $search_string !== ' ') {
			// Build Query
			
			$query = $this->db->query('SELECT * FROM crt_status WHERE matricula LIKE "%'.$search_string.'%" OR nome LIKE "%'.$search_string.'%"');
			
			// Do Search
		
			foreach ($query->result() as $row){
				$result_array[] = $results;
			}

			// Check If We Have Results
			if (isset($result_array)) {
				foreach ($result_array as $result) {

					// Format Output Strings And Hightlight Matches
					if ($result->situacao_cart == 'OK' || $result->situacao_cart== 'A_ENVIAR' || $result->situacao_cart== 'PROCESS'){		
							//$html_OK = '';
							$html_OK = "
							<script type='text/javascript'>
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
							if ($result->situacao_cart== 'OK'){
							$html_OK.= '<div class="alert alert-success">';
							$is_logged_in = $this->session->userdata('is_logged_in');
							if (isset($is_logged_in) && $is_logged_in){
							$html_OK.=' <a href="#"  id="segvia-'. $result->matricula.'" class="btn btn-success pull-right" role="button" ></i> Solicitar 2º via</a>';
							}
						   $html_OK.=' <h4><i class="fa fa-credit-card"></i> Carteirinha produzida</h4> 
							  <ul>
								<li><b>Aluno:</b> nameString </li>
								<li><b>Matrícula:</b> matString</li>
								<li><b>Lote:</b> loteString</li>
								<li>Procurar a secretaria de apoio do seu curso</li>
							  </ul>
						  </div>';
						  } else if ($result->situacao_cart== 'A_ENVIAR'){
						  $html_OK.= '<div class="alert alert-info">
							<h4><i class="fa fa-credit-card"></i> Carteirinha à enviar ao Santander</h4> 
							  <ul>
								<li><b>Aluno:</b> nameString </li>
								<li><b>Matrícula:</b> matString</li>
								<li>lote nº: loteString</li>
							  </ul>
						  </div>';
						  } else if ($result->situacao_cart== 'PROCESS'){
						 $lote =(int)$result['lote'];
						 $sql = "SELECT * FROM crt_historico WHERE n_seg_remessa = $lote";
						 $res = $connection->query($sql);
						 $info=$res->fetch_assoc();
						 $envio = $info['data_envio'];
						 $entrega = strtotime( $envio."+ 15 days");
						  $html_OK.= '<div class="alert alert-warning">
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
					
					if ($result->situacao_cart== 'A_ENVIAR' && $result['lote']!="a enviar"){
					if (!empty($result->versao_via)){
						$result['lote'] = "Dados prontos para emissão da ".$result->versao_via."º Via da Carteirinha.";
						}else{
						$result['lote'] = "Dados prontos para emissão da Carteirinha.";
						}
					}
					
					$display_url = preg_replace("/".$search_string."/i", "<b class='highlight'>".$search_string."</b>", $result['lote']);
					
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
							$errors = $connection->query($sql);
							$error = $errors->fetch_assoc();
							
						  $html_erro = '';
						 $html_erro .=' <div class="alert alert-danger">
							<h4><i class="fa fa-exclamation-circle"></i> Ocorreram os erros:</h4> ';
							//$html_erro .='<a href="#Listagem" data-toggle="tab" class="btn btn-danger pull-right" role="button" onclick="oTable.fnFilter('.$result->matricula.'); $(\'#listagem_li\').addClass(\'active\');$(\'#consulta_li\').removeClass(\'active\')"> <i class="fa fa-eye"></i> Ver Erros</a>';
							$html_erro .='
							  <b>Aluno:</b> '.$result->nome.' <br>
							  <b>Matrícula:</b> '.$result->matricula.' <br>'; 
							  
							  $erro_array = explode(" ",$error['cod_error']);
				$sql = $this->db->query('SELECT * FROM crt_error');
		
			while ($error = $sql->result()){
				
				 foreach ($erro_array as $erro){
				 if ($erro === $error['cod_error']){
				 $html_erro .= '<p class="dt_erro"><span>Erro:</span> <b>'.$erro.'</b> - '.$error['descricao'].'</p> <p class="dt_solucao"><span>Solução</span>: '.$error['solucao'] .'</p>';
				 }
				 }
				}
									
							$trigger = "";
					  
							
								
							$html_erro .='</div>'.$trigger;
						
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
/* End of file user.php */
/* Location: ./application/controllers/user.php */
