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
            
		$html = '<div class="alert alert-warning"><p><i class="fa fa-search"></i> <b> Aluno não encontrato!</b> Tente outra busca.</p></div>';
		// Get Search
		$search_string = $_POST['query'];
		// Check Length More Than One Character
                if (strlen($search_string) >= 1 && $search_string !== ' ') {
                // Build Query
		$query = $this->db->query('SELECT * FROM crt_status WHERE matricula LIKE "%'.$search_string.'%" OR nome LIKE "%'.$search_string.'%" ');
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

        public function dataTableError(){
       
	/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
	 * Easy set variables
	 */
	
	/* Array of database columns which should be read and sent back to DataTables. Use a space where
	 * you want to insert a non-database field (for example a counter or static image)
	 */
	$aColumns = array( 'nome','matricula','cod_error' );
	
	/* Indexed column (used for fast and accurate table cardinality) */
	$sIndexColumn = "id";
	
	/* DB table to use */
	$sTable = "crt_erro_retorno";
	
	/* Database connection information */
	
	$input =& $_GET;
	
	  $iDisplayStart = $this->input->get_post('iDisplayStart', true);
        $iDisplayLength = $this->input->get_post('iDisplayLength', true);
        $iSortCol_0 = $this->input->get_post('iSortCol_0', true);
        $iSortingCols = $this->input->get_post('iSortingCols', true);
        $sSearch = $this->input->get_post('sSearch', true);
        $sEcho = $this->input->get_post('sEcho', true);
    
        // Paging
        if(isset($iDisplayStart) && $iDisplayLength != '-1')
        {
            $this->db->limit($this->db->escape_str($iDisplayLength), $this->db->escape_str($iDisplayStart));
        }
        
        // Ordering
        if(isset($iSortCol_0))
        {
            for($i=0; $i<intval($iSortingCols); $i++)
            {
                $iSortCol = $this->input->get_post('iSortCol_'.$i, true);
                $bSortable = $this->input->get_post('bSortable_'.intval($iSortCol), true);
                $sSortDir = $this->input->get_post('sSortDir_'.$i, true);
    
                if($bSortable == 'true')
                {
                    $this->db->order_by($aColumns[intval($this->db->escape_str($iSortCol))], $this->db->escape_str($sSortDir));
                }
            }
        }
        
        /* 
         * Filtering
         * NOTE this does not match the built-in DataTables filtering which does it
         * word by word on any field. It's possible to do here, but concerned about efficiency
         * on very large tables, and MySQL's regex functionality is very limited
         */
        if(isset($sSearch) && !empty($sSearch))
        {
            for($i=0; $i<count($aColumns); $i++)
            {
                $bSearchable = $this->input->get_post('bSearchable_'.$i, true);
                
                // Individual column filtering
                if(isset($bSearchable) && $bSearchable == 'true')
                {
                    $this->db->or_like($aColumns[$i], $this->db->escape_like_str($sSearch));
                }
            }
        }
        
        // Select Data
        $this->db->select('SQL_CALC_FOUND_ROWS '.str_replace(' , ', ' ', implode(', ', $aColumns)), false);
        $rResult = $this->db->get($sTable);
    
        // Data set length after filtering
        $this->db->select('FOUND_ROWS() AS found_rows');
        $iFilteredTotal = $this->db->get()->row()->found_rows;
    
        // Total data set length
        $iTotal = $this->db->count_all($sTable);
    
        // Output
        $output = array(
            'sEcho' => intval($sEcho),
            'iTotalRecords' => $iTotal,
            'iTotalDisplayRecords' => $iFilteredTotal,
            'aaData' => array()
        );
		
        
        foreach($rResult->result_array() as $aRow)
        {
          $row = array();

		/* Add the  details image at the start of the display array */
		$row[] = "<img src='img/details_open.png' id='open_erro' style='min-height:20px !important;'>";

		for ( $i=0 ; $i<count($aColumns) ; $i++ )
		{
			if ( $aColumns[$i] == "version" )
			{
				/* Special output formatting for 'version' column */
				$row[] = ($aRow[ $aColumns[$i] ]=="0") ? '-' : $aRow[ $aColumns[$i] ];
			}
			else if ( $aColumns[$i] != ' ' )
			{
				/* General output */
				$row[] = $aRow[ $aColumns[$i] ];
			}
		}
		
		$erro_banco = $row[3];
		$erro_array = explode(" ",$erro_banco);
		$row['extra']=" ";
		$query = $this->db->get('crt_error');
                foreach ($query->result() as $erro_row){
                    $cod_error = $erro_row->cod_error;
              for( $i=0 ; $i<count($erro_array); $i++ ){
			
		if($erro_array[$i] === $cod_error){
			$row['extra'].= '<p class="dt_erro"><span>Erro:</span> <b>'.$erro_array[$i].'</b> - '.$erro_row->descricao.' </p> <p class="dt_solucao"><span>Solucao</span>: '.$erro_row->solucao.'  </p>';
		}
	} 
			  }	
			$output['aaData'][] = $row;
			
        }

	echo json_encode( $output );

    }
    
        public function limbo_search(){
	
		$html = '<div class="alert alert-warning"><p><i class="fa fa-search"></i> <b> Aluno não encontrato!</b> Tente outra busca.</p></div>';
		// Get Search
		$search_string = $_POST['query'];
		// Check Length More Than One Character
                if (strlen($search_string) >= 1 && $search_string !== ' ') {
                // Build Query
		$query = $this->db->query('SELECT * FROM crt_status WHERE matricula LIKE "%'.$search_string.'%" OR nome LIKE "%'.$search_string.'%"');
		// Do Search
		//$result_array = $query->result();
                
		foreach ($query->result() as $row){
                    $result_array[] = $row;
		}
			// Check If We Have Results
                
		if (isset($result_array)) {
			foreach ($result_array as $result) {
			// Format Output Strings And Hightlight Matches
				if ($result->situacao_cart === 'LIMBO') {
							  $html_OK = "<script type='text/javascript'>
							jQuery(document).ready(function($){
								$('#segvia-". $result->matricula."').click(function(){
								var confirm1 = confirm('Deseja realmente emitir a 2º via deste aluno?');
								if (confirm1) {
									$.ajax({
										type: 'POST',
										url: 'pos_e_pesquisa/ativar',
										data: { matricula: '". $result->matricula."' }
									}).done(function(){ $('#btn_search').click();});
									
									}
								});
							});
							</script> ";
							
                                                        $html_erro = '';
                                                        $html_erro .='<div class="alert alert-limbo card-aluno "> 
                                                             <div class="foto-aluno" style="background-image: url(img/avatar.jpg);"></div>
                                                                 <a href="#" id="segvia-'.$result->matricula.'" class="btn btn-primary pull-right" role="button"> Ativar  Aluno</a>
                                                                    <h4><i class="fa fa-times"></i> Aluno inativo</h4> <br>
                                                                      <ul>';
                                                                $html_erro .='
                                                                  <li><b>Aluno:</b> '.$result->nome.' </li>
                                                                  <li><b>Matrícula:</b> '.$result->matricula.' </li>'; 
												
							$html_erro .='</ul><div style="clear:both;"></div> </div>';
						
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
