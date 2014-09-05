<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Limbo extends CI_Controller 
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
	}
	
	public function index(){
		$data['content'] = 'pos';
		$data['page'] = 'pos';
		$this->load->view('template/index', $data);
	
	}
	
	public function is_logged_in(){
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != true){
			$this->session->set_flashdata('msg', 'Access denied! You don\'t have permission to access this page or session has expired. Please use login form!');
			redirect('login');		
		}		
	}
	
		
	public function filtroErros(){
	
		$sql = $this->db->query("SELECT * FROM crt_status WHERE situacao_cart ='ERROR'");
				
					while ($info = $sql->result_array()){
						$error[] = $info['matricula'];
					}
				$mat_aluno_erro = implode("," , $error);
				
		$this->db->query("DELETE FROM crt_erro_retorno WHERE matricula NOT IN ({$mat_aluno_erro})");
				
	
	}
	
	
	public function dataTableError(){
       
	/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
	 * Easy set variables
	 */
	
	/* Array of database columns which should be read and sent back to DataTables. Use a space where
	 * you want to insert a non-database field (for example a counter or static image)
	 */
	$aColumns = array( 'nome','matricula');
	
	/* Indexed column (used for fast and accurate table cardinality) */
	$sIndexColumn = "id";
	
	/* DB table to use */
	$sTable = "crt_status";
	
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
        $rResult = $this->db->get_where($sTable,array("situacao_cart" => "LIMBO"));
    
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
		
		  for( $i=0 ; $i<count($erro_array); $i++ ){
			//$query = $this->db->get_where('crt_error',array("cod_error"=> $erro));
			//$errr = $query->result_array();
			//if($erro_array[$i] === $errr['cod_error']){
			$row['extra'].= '<p class="dt_erro"><span>Erro:</span> <b>'.$erro_array[$i].'</b> - </p> <p class="dt_solucao"><span>Solu��o</span>: </p>';
	//	}
		 } 
				
			$output['aaData'][] = $row;
			
        }

	echo json_encode( $output );

    }
	
	
	
}